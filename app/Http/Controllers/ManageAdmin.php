<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;

class ManageAdmin extends Controller
{
     
    public function index(){
      
    $user = Auth::user();
      if($user->role != "super_admin"){
       return redirect()->back();
      }
      $adminData  = User::with('school')->where('role', 'school_admin')->get();

      return view('dashboard.viewAdmin' , compact('adminData'));



    }
}
