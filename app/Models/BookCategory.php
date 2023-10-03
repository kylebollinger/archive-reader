<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Str;


class BookCategory extends Model implements Searchable
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;


    protected $table = 'book_categories';
    protected $casts = ['data' => 'array'];
    protected $hidden = ["deleted_at"];
    protected $appends = ['book_count'];
    protected $fillable = [
        'name', 'slug', 'description', 'data'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'category_id', 'id');
    }

    public function completed_books()
    {
        return $this->hasMany(Book::class, 'category_id', 'id')->state('completed');
    }

    public function getSearchResult(): SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
        );
    }

    // Sluggable config
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public static function alphabetical_indicies() {
        return ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
    }

    public function bookCount(): Attribute
    {
        return new Attribute(
            get: fn () => Book::state('completed')->where('category_id', $this->id)->count()
        );
    }
}
