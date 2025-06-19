<?php

use App\Constants\RouteName;
use App\Constants\ViewName;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view(ViewName::LAYOUT_MAIN);
})->name(RouteName::HOME);

// Book resource routes (with constant route names)
Route::get('/books', [BookController::class, 'index'])->name(RouteName::BOOK_INDEX);
Route::get('/books/create', [BookController::class, 'create'])->name(RouteName::BOOK_CREATE);
Route::post('/books', [BookController::class, 'store'])->name(RouteName::BOOK_STORE);
Route::get('/books/{book}', [BookController::class, 'show'])->name(RouteName::BOOK_SHOW);
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name(RouteName::BOOK_EDIT);
Route::put('/books/{book}', [BookController::class, 'update'])->name(RouteName::BOOK_UPDATE);
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name(RouteName::BOOK_DESTROY);

// Auth routes (login/logout)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name(RouteName::LOGIN);
Route::post('/login', [LoginController::class, 'login'])->name(RouteName::LOGIN_POST);
Route::post('/logout', [LoginController::class, 'logout'])->name(RouteName::LOGOUT);
