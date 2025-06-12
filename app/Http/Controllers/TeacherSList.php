<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;

class TeacherSList extends Controller
{
     
     public function index(){

          $adminData  = Teacher::with('user')->get();
          
          return view('dashboard.teacherlisting' , compact('adminData'));

     }



}
