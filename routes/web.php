<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::middleware(['auth', 'role:admin'])->group(function () {

Route::get('/dashboard', function () {
    return view('dashboard');
});


});



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
