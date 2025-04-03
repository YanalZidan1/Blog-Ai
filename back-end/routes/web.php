<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('posts.index');
// });


Route::redirect('/', '/login');
// midddleware('guest')
Route::middleware('guest')->group(function () {

    // register
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register');

    // login
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    
});

// middleware('auth')
Route::middleware('auth')->group(function () {

    // logout
     Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    //dashboard
     Route::view('/dashboard', 'dashboard.index')->name('dashboard');

     //  profile
     Route::view('/users', 'users.profile')->name('profile');
     Route::get('/users', [ProfileController::class, 'index'])->name('profile');
     Route::post('/users', [ProfileController::class, 'update'])->name('profile');

    //  logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

  // posts
  Route::view('/index', 'posts.index')->name('posts');
  Route::resource('/posts', PostController::class);
  Route::get('/index', [PostController::class, 'index'])->name('posts');
