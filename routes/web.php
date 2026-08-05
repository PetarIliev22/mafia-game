<?php

use Illuminate\Support\Facades\Route;

Route::view('/auth', 'pages.auth')->name('auth');
Route::view('/', 'pages.home')->name('home');
Route::view('/games', 'pages.games')->name('games');
Route::view('/chat', 'pages.chat')->name('chat');
Route::view('/profile', 'pages.profile')->name('profile');
