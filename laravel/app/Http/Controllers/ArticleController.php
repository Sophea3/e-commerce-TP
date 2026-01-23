<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Article;

class ArticleController extends Controller
{
    public function store()
    {
        $articles = [
            'Sok' => [
                'Climate changes in the last 3 years',
                'Global warming is in its critical stage'
            ],
            'Sao' => [
                'Computers in the next generation',
                'Quantum computers, is it coming?'
            ],
            'Dara' => [
                'Chemistry in nature form',
                'The origin of water'
            ]
        ];

        foreach ($articles as $authorName => $titles) {
            $author = Author::where('name', $authorName)->first();
            foreach ($titles as $title) {
                Article::create([
                    'name' => $title,
                    'author_id' => $author->id
                ]);
            }
        }

        return response()->json(['message' => 'Articles created']);
    }
}

