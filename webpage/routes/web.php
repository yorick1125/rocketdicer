<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\BlogController as BlogController;
use App\Http\Controllers\MusicController as MusicController;
use App\Http\Controllers\UserController as UserController;



Route::get('/', function () {
    return view('home');
});

/* User Controller */
Route::get('/home', [HomeController::class, 'index']);

/* Blog Controller */
Route::get('/blog', [BlogController::class, 'index']);

/* Music Controller */
Route::get('/music', [MusicController::class, 'index']);

/* User Controller */
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);





