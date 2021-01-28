<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;


Route::group(['prefix' => 'auth'], function (){
   Route::post('/register', [AuthController::class, 'register']);
   Route::post('/login', [AuthController::class, 'login']);
   Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('protected', function (){
    return "protected";
})->middleware('auth:sanctum');
