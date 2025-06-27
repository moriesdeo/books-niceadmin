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

// Book resource routes (with constant route names)
Route::get('/books', [BookController::class, 'index'])->name(ViewName::BOOK_INDEX);
Route::get('/books/create', [BookController::class, 'create'])->name(ViewName::BOOK_CREATE);
Route::post('/books/store', [BookController::class, 'store'])->name(ViewName::BOOK_STORE);
Route::get('/books/{book}', [BookController::class, 'show'])->name(ViewName::BOOK_SHOW);
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name(ViewName::BOOK_EDIT);
Route::put('/books/{book}', [BookController::class, 'update'])->name(ViewName::BOOK_UPDATE);
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name(ViewName::BOOK_DESTROY);

// Auth routes (login/logout)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name(RouteName::LOGIN);
Route::post('/login', [LoginController::class, 'login'])->name(RouteName::LOGIN_POST);
Route::post('/logout', [LoginController::class, 'logout'])->name(RouteName::LOGOUT);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name(RouteName::REGISTER);
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
