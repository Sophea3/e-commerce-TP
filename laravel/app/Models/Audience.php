<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;

    // An audience has one user
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // An audience has many comments (polymorphic)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Many-to-many with articles
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}

