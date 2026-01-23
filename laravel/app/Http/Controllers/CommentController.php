<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Author, Audience, Article, Comment};

class CommentController extends Controller
{
    public function store()
    {
        // Author Sok → his article
        $article = Article::where('name', 'Climate changes in the last 3 years')->first();
        $article->comments()->create([
            'name' => 'Thank you to all the subscribers',
            'user_id' => Author::where('name', 'Sok')->first()->user_id
        ]);

        // Audience Samnang → author Sao
        Author::where('name', 'Sao')->first()
            ->comments()
            ->create([
                'name' => 'Your article is amazing',
                'user_id' => Audience::where('name', 'Samnang')->first()->user_id
            ]);

        // Author Sao → audience Samnang
        Audience::where('name', 'Samnang')->first()
            ->comments()
            ->create([
                'name' => 'Welcome to read my article',
                'user_id' => Author::where('name', 'Sao')->first()->user_id
            ]);

        // Audience Veasna → article
        Article::where('name', 'Quantum computers, is it coming?')->first()
            ->comments()
            ->create([
                'name' => "I can't wait this thing happening",
                'user_id' => Audience::where('name', 'Veasna')->first()->user_id
            ]);

        return response()->json(['message' => 'Comments created']);
    }
}
