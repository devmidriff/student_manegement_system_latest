<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StudentRegisterion;



Route::middleware(['auth'])->group(function () {

Route::get('/dashboard', function(){
    return view('dashboard');
});
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterAdminController::class, 'adminRegister'])->name('register.store');
//Route::post('/register-school', [RegisterAdminController::class, 'adminRegister'])->name('register.school');
Route::post('/register-student',[StudentRegisterion::class,'studentRegister'])->name("register.student");

Route::get('/register/student', [StudentRegisterion::class, 'studentRegisterForm'])->name('register.student');

Route::post('/register/student', [StudentRegisterion::class, 'submitForm'])->name('submition.student');

});



//Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('checklogin');





Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
