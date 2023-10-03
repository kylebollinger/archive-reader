<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Chapter extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $table = 'book_chapters';
    protected $casts = ['data' => 'array', 'import_data' => 'array'];
    protected $fillable = [
        'volume_id', 'sequence', 'title', 'book_sequence',
        'body', 'data', 'import_data'
    ];

    public function volume()
    {
        return $this->belongsTo(Volume::class, 'volume_id', 'id');
    }

    public function book()
    {
        return $this->belongsToThrough(Book::class, Volume::class, null, '', [Volume::class => 'volume_id']);
    }

    public function full_title()
    {
        return Str::startsWith($this->title, 'Chapter') ? $this->title : "Chapter $this->book_sequence: $this->title";
    }

    public function clean_imported_body()
    {
        $body = $this->body;
        $body = preg_replace("/\\\\n/", "", $body);
        $body = preg_replace("/\\\\'/", "'", $body);
        $this->body = $body;
        if($this->save()) { print("Saved"); }
    }
}

