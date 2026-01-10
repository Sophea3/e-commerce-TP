<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
class Comment extends Model
{
    use HasFactory;

    // Comment belongs to user (author of comment)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Polymorphic relationship (commentable can be Audience, Article, Author)
    public function commentable()
    {
        return $this->morphTo();
    }
}
