<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        Route::get('user', 'userProfile');
        Route::post('logout', 'userLogout');
    });

    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/faqs', FaqController::class);
    Route::apiResource('/tickets', TicketController::class);
});

