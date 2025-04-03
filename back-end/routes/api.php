<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// posts api routes

// all posts
Route::get('/posts', [PostController::class, 'getAllPosts']);

// get post by id
Route::get('/posts/{id}', [PostController::class, 'show']);


