<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\BlogController as BlogController;
use App\Http\Controllers\MusicController as MusicController;
use App\Http\Controllers\UserController as UserController;



Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/music', [MusicController::class, 'index']);
Route::get('/register', [UserController::class, 'index']);



