<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Author;

class AuthorController extends Controller
{
    public function store()
    {
        $authors = [
            ['author' => 'Sok', 'user' => 'sok123'],
            ['author' => 'Sao', 'user' => 'sao'],
            ['author' => 'Dara', 'user' => 'd.dara'],
        ];

        foreach ($authors as $data) {
            $user = User::create(['name' => $data['user']]);
            Author::create([
                'name' => $data['author'],
                'user_id' => $user->id
            ]);
        }

        return response()->json(['message' => 'Authors created']);
    }
}
