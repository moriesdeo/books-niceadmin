<?php

use App\Http\Controllers\Api\BookApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('books', BookApiController::class)->names([
    'index' => 'api.books.index',
    'show' => 'api.books.show',
    'store' => 'api.books.store',
    'update' => 'api.books.update',
    'destroy' => 'api.books.destroy',
]);

