<?php

declare(strict_types=1);

use App\Http\Controllers\QuoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('quotes', QuoteController::class)
    ->only(['index', 'show']);

/**
 * Authenticated routes
 *
 */
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('quotes', QuoteController::class)
        ->except(['index', 'show']);
});

