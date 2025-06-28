<?php

use App\Constants\RouteName;
use App\Constants\ViewName;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route(RouteName::HOME);
    } else {
        return view(ViewName::LOGIN);
    }
})->name('root');

Route::get('/home', function () {
    return view(ViewName::HOME);
})->name(RouteName::HOME);

// Book resource routes
Route::resource('books', BookController::class);

// Auth routes (login/logout)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name(RouteName::LOGIN_VIEW_SHOW);
Route::post('/login', [LoginController::class, 'login'])->name(RouteName::LOGIN_POST);
Route::post('/logout', [LoginController::class, 'logout'])->name(RouteName::LOGOUT);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name(RouteName::REGISTER_VIEW_SHOW);
Route::post('/register', [RegisterController::class, 'register'])->name(RouteName::REGISTER_POST);
