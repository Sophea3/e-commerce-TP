<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AudienceController;
use App\Http\Controllers\CommentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CategoryController::class)
    ->prefix('categories')
    ->group(function () {
        Route::get('/', 'getCategories');
        Route::post('/', 'createCategory');
        Route::get('/{categoryId}', 'getCategory');
        Route::patch('/{categoryId}', 'updateCategory');
        Route::delete('/{categoryId}', 'deleteCategory');
    });

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = $request->user();
    $token = $user->createToken('mobile')->accessToken;

    return response()->json([
        'token' => $token,
        'user' => $user->load('roles'),
    ]);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/me', fn (Request $r) => $r->user()->load('role'));
});

Route::post('/authors', [AuthorController::class, 'store']);
Route::post('/articles', [ArticleController::class, 'store']);
Route::post('/audiences', [AudienceController::class, 'store']);
Route::post('/subscribe', [AudienceController::class, 'subscribe']);
Route::post('/comments', [CommentController::class, 'store']);

Route::get('/author/{name}/articles', [AuthorController::class, 'articles']);
Route::get('/article/{name}/audiences', [ArticleController::class, 'audiences']);
Route::get('/author/{name}/audiences', [AuthorController::class, 'audiences']);
Route::get('/audience/{name}/comments', [AudienceController::class, 'comments']);
Route::get('/comments', [CommentController::class, 'index']);