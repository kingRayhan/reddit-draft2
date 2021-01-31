<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ThreadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;


Route::group(['prefix' => 'auth'], function (){
   Route::get('/user', [AuthController::class, 'user']);
   Route::post('/register', [AuthController::class, 'register']);
   Route::post('/login', [AuthController::class, 'login']);
   Route::post('/logout', [AuthController::class, 'logout']);
   Route::post('/update-profile', [AuthController::class, 'updateProfile']);
});

Route::apiResource('threads', ThreadController::class);
