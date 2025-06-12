<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function login(Request $request)
    {
            $credentials = $request->validate([
                'email'    => 'required|email',
                'password' => 'required|string|min:8',
            ]);

            // Step 2: Attempt to login
            if (!Auth::attempt($credentials)) {
                return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
            }

            // Step 3: Check user role after login
            $user = Auth::user();
            if (!in_array($user->role, ['super_admin', 'school_admin'])) {
                Auth::logout(); 
                return back()->withErrors(['error' => 'Unauthorized access.'])->withInput();
            }

            // Step 4: Regenerate session and redirect to dashboard
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');

    }



        public function showLoginForm(){
           //return view('login');
           return view('auth.login');

        }




}
