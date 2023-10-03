<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Str;

class Book extends Model implements Searchable
{
    use HasFactory;
    use HasSlug;

    protected $table = 'books';
    protected $casts = [
        'data' => 'array',
        'import_data' => 'array',
        'publish_date' => 'datetime',
    ];
    protected $fillable = [
        'user_id', 'category_id','uuid', 'state', 'title', 'subtitle', 'author', 'cover',
        'slug', 'publish_date', 'description', 'data', 'import_data'
    ];


    // Relations
    public function volumes()
    {
        return $this->hasMany(Volume::class, 'book_id', 'id');
    }

    public function chapters()
    {
        return $this->hasManyThrough(Chapter::class, Volume::class);
    }

    public function category()
    {
        return $this->hasOne(BookCategory::class, 'id', 'category_id');
    }

    public function volumes_with_chapters() {
        return $this->hasMany(Volume::class, 'book_id', 'id')->with('chapters')->orderBy('sequence');
    }

    public function getSearchResult(): SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
        );
    }


    // Methods
    public function update_state() {
        if (count($this->volumes) > 0 && count($this->chapters) > 0) {
            if ($this->state == 'completed') { return; }
            $this->state = 'completed';
            if ($this->save()) {
                print("Updating state for book: $this->id \n");
            }
        }
    }

    // TODO Update this for text only books
    public function is_complete() {
        return count($this->volumes) >= 1 && count($this->chapters) >= 1 ? true : false;
    }

    public function date() {
        return isset($this->publish_date) ? $this->publish_date->format('Y') : null;
    }

    public function cover_art() {
        $url_key = isset($this->import_data['web_url']) ? Str::beforeLast($this->import_data['web_url'], '/') : null;
        $cover = empty($this->cover) ? null : $this->cover;
        return ($cover && $url_key) ? "$url_key/$this->cover" : null;
    }

    public function chapters_list() {
        return $this->volumes_with_chapters->map(function ($volume, $key) {
            if ($volume->chapters != null) {
                return $volume->chapters;
            }
        })->flatten();
    }

    public function imported_categories() {
        return isset($this->import_data['categories']) && !empty($this->import_data['categories']) ? $this->import_data['categories'] : null;
    }

    public function imported_book_url() {
        return isset($this->import_data['categories']) && !empty($this->import_data['categories']) ? $this->import_data['categories'] : null;
    }

    public function imported_category_list() {
        return array_keys($this->imported_categories());
    }

    public function update_book_sequence() {
        $this->chapters_list()->each(function ($chapter, $key) {
            $chapter->book_sequence = $key + 1;
            if($chapter->save()) { print("Chapter saved: $chapter->id \n"); }
        });
    }

    public function chapter_at_index($index, $dir = '=') {
        $chapter = $this->chapters_list()->firstWhere('book_sequence', $dir, $index);
        return $chapter ? $chapter : $this->chapters_list()->first();
    }

    // Static Methods
    public static function comprehensive_category_list() {
        return Book::all()->map(function (Book $book) {
            if ($book->imported_categories()) {
                return $book->imported_category_list();
            }
        })->filter()->flatten();
    }

    public static function check_current_state($ids) {
        Book::whereBetween('id', $ids)->get()->map(function (Book $book) {
            print("Checking state for book: $book->id\n");
            $book->update_state();
        });
    }

    public function scopeState($query, $value)
    {
        return $query->where('state', $value);
    }

    // Sluggable config
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
