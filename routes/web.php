<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\RegisterAdmin;
use App\Http\Controllers\TeacherRegister;
use App\Http\Controllers\TeacherSList;
use App\Http\Controllers\ManageAdmin;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StudentRegisterion;
use App\Http\Controllers\GoalInformation;



Route::middleware(['auth'])->group(function () {

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterAdminController::class, 'adminRegister'])->name('register.store');
//Route::post('/register-school', [RegisterAdminController::class, 'adminRegister'])->name('register.school');
//Route::post('/register-student',[StudentRegisterion::class,'studentRegister'])->name("register.student");

Route::get('/register/student', [StudentRegisterion::class, 'studentRegisterForm'])->name('register.student');
Route::post('/register/student', [StudentRegisterion::class, 'submitionProcess'])->name('submition.student');



Route::get('/register/teacher', [TeacherRegister::class, 'index'])->name('register.teacher');
Route::post('/register/teacher', [TeacherRegister::class, 'registerTeacher'])->name('registerFrom.teacher');


Route::get('/register/admin', [RegisterAdmin::class, 'index'])->name('register.admin');
Route::get('/manage/admin',[ManageAdmin::class, 'index'])->name('manage.admin');


// manege teacher 

Route::get('/teachers/list', [TeacherSList::class, 'index'])->name('teachers.list');

Route::get('/add/goal',[GoalInformation::class, 'show_goal'])->name('show.goal');
Route::post('/goal/store',[GoalInformation::class,'goal_store' ])->name('goal.store');


Route::get('/assign/goal', [GoalInformation::class, 'assignGoalForm'])->name('goals.assign.form');
Route::post('/assign/goal', [GoalInformation::class, 'assignGoalToStudents'])->name('goals.assign.store');









});



//Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('checklogin');





Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
