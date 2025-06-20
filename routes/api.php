<?php

use App\Http\Controllers\Api\BookApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('books', BookApiController::class);
