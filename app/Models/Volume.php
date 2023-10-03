<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    use HasFactory;

    protected $table = 'book_volumes';
    protected $casts = ['data' => 'array', 'import_data' => 'array'];
    protected $fillable = [
        'book_id', 'chapter_id', 'title', 'sequence',
        'book_sequence', 'data', 'import_data'
    ];

    // Relationships
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'volume_id', 'id')->orderBy('sequence');
    }
}
