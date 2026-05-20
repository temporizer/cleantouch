<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ContactController;

Route::get('/portfolio', [PortfolioController::class, 'index']);
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show']);
Route::get('/search', [SearchController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Illuminate\Http\Request $request) {
    return $request->user();
});
