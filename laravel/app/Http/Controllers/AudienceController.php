<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Audience;
use App\Models\Article;

class AudienceController extends Controller
{
    // CREATE AUDIENCES + USERS
    public function store()
    {
        $audiences = [
            ['name' => 'Veasna', 'user' => 'veasna'],
            ['name' => 'Samnang', 'user' => 'samnang'],
            ['name' => 'Ratana', 'user' => 'ratana'],
        ];

        foreach ($audiences as $data) {
            $user = User::create(['name' => $data['user']]);

            Audience::create([
                'name' => $data['name'],
                'user_id' => $user->id
            ]);
        }

        return response()->json(['message' => 'Audiences created']);
    }

    // SUBSCRIBE AUDIENCES TO ARTICLES
    public function subscribe()
    {
        $subscriptions = [
            'Samnang' => [
                'Computers in the next generation',
                'Chemistry in nature form',
                'The origin of water'
            ],
            'Veasna' => [
                'Climate changes in the last 3 years',
                'The origin of water',
                'Quantum computers, is it coming?'
            ],
            'Ratana' => [
                'Climate changes in the last 3 years',
                'Global warming is in its critical stage'
            ],
        ];

        foreach ($subscriptions as $audienceName => $articleNames) {
            $audience = Audience::where('name', $audienceName)->first();

            foreach ($articleNames as $title) {
                $article = Article::where('name', $title)->first();

                // based on your diagram: audience has ONE article_id
                $audience->article_id = $article->id;
                $audience->save();
            }
        }

        return response()->json(['message' => 'Subscribed successfully']);
    }
}
