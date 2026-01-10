<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Article belongs to an author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Article has many audiences (many-to-many)
    public function audiences()
    {
        return $this->belongsToMany(Audience::class);
    }

    // Article has many comments (polymorphic)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

