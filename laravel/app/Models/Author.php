<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // An author has one user
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // An author wrote multiple articles
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // An author has many comments (polymorphic)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // An author has many audiences through articles
    public function audiences()
    {
        return $this->hasManyThrough(Audience::class, Article::class);
    }
}

