<?php

use App\Http\Controllers\PieceController;
use App\Http\Controllers\SpectacleController;
use App\Http\Controllers\SalleController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::resource('salles', SalleController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('spectacles', SpectacleController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('pieces', PieceController::class);
});
