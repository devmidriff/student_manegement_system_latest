<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Teacher;

class TeacherRegister extends Controller
{

    public function index(){
        
       return view('dashboard.teacherRegister');

    }




    public function registerTeacher(Request $request){

        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'qualification' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'subjects' => 'required|string|max:255',
        ]);

        $admin  = Auth::user();
        $teacherUser = User::create([
            'name' => $validated['firstName'].' '.$validated['lastName'],
            'email' => $validated['email'],
            'password' => bcrypt('123456789'),
            'role' => 'teacher',
            'school_id' => $admin->school_id,
        ]);
         $teacher = Teacher::create([
            'user_id' => $teacherUser->id,
            'subjects' => $validated['subjects'],
            'phone'=> $validated['phone'],
            'qualification'=>$validated['qualification'],
            'specialization'=>$validated['specialization'],
            'experience'=>$validated['experience']
        ]);

        return array($teacherUser,$teacher);

     }


}
