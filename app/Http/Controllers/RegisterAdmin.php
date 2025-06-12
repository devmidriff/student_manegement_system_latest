<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegisterAdmin extends Controller
{
     
    public function index(){
        
      $user = Auth::user();

      if($user->role != "super_admin"){
       return redirect()->back();
      }

      return view('dashboard.addAdmin');

    }

}
