<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function(){
    Route::post('register','signup');
    Route::post('login','login');
});

//Authentication routes
Route::middleware('auth:sanctum')->group(function(){
    Route::controller(ProfileController::class)->prefix('profile')->group(function(){
        Route::get('/','profile');
        Route::get('logout','logout');
    });
});
