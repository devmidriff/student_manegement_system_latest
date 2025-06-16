<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);

Route::post('/forget', [AuthController::class, 'forget']);


Route::post('/forget', [AuthController::class, 'forget']);


Route::post('/changePassword', [AuthController::class, 'changePassword']);

// middleware::group('auth:sanctum',function(){

// });