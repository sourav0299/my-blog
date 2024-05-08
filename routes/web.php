<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', function () {
    $post = Post::where('user_id', auth()->id())->get();
    return view('home', ['posts' => $post]);
});
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::post('create-post', [PostController::class, 'createPost']);
// Route::get();
