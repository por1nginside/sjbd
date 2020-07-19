<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'page_count',
        'annotation',
        'image',
        'author_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
