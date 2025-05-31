<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketReplyController;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        Route::get('user', 'userProfile');
        Route::post('logout', 'userLogout');
    });

    Route::apiResources([
        'categories' => CategoryController::class,
        'faqs' => FaqController::class,
        'tickets' => TicketController::class,
    ]);

    Route::post('replies', [TicketReplyController::class, 'store']);
});
