<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/update-profile', [AuthController::class, 'updateProfile']);
});

Route::apiResource('threads', ThreadController::class);
Route::post('threads/link', [ThreadController::class, 'storeLinkThread']);
Route::post('threads/text', [ThreadController::class, 'storeTextThread']);

Route::get('comments', [CommentController::class, 'index']);
