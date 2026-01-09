<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CategoryController::class)->prefix('categories')->group(function(){
    Route::get('/', 'getCategories');
    Route::post('/', 'createCategory');
    Route::get('/{categoryId', 'getCategory');
    Route::patch('/{categoryId', 'updateCategory');
    Route::delete('/{categoryId', 'deleteCategory');

});

Route::post('/login', function (Request $request) {
    // Validate the incoming request
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to log in the user
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Get the authenticated user
    $user = $request->user();

    // Create a personal access token
    $token = $user->createToken('mobile')->accessToken;

    // Return the token in JSON response
    return response()->json([
        'token' => $token,
        'user' => $user->load('roles') // optional: include roles
    ]);
});
Route::middleware('auth:api')->group(function (){
    Route::gt('/me', fn(Request $r) => $r->user()->load('role'));
});
