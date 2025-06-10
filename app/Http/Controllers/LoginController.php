<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        public function login(Request $request)
            {
                $credentials = $request->validate([
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                ]);

                if (Auth::attempt($credentials, $request->remember)) {
                    $request->session()->regenerate();
                    $this->storeUserSessionData($request);
                    $role = Auth::user()->role;
                    return match ($role) {
                        'super_admin' => redirect()->intended('/dashboard'),
                        'school_admin' => redirect()->intended('/dashboard'),
                        'teacher' => redirect()->intended('/dashboard'),
                        'student' => redirect()->intended('/dashboard'),
                        'parent' => redirect()->intended('/dashboard'),
                        default => redirect()->intended('/dashboard'),
                    };



                }

                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            }

        public function showLoginForm(){
           return view('login');
        }



    protected function storeUserSessionData(Request $request)
            {
                $user = Auth::user();
                session([
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'user_email' => $user->email,
                    'user_role' => $user->role,
                    'school_id' => $user->school_id, 
                    'profile_image' => $user->profile_image,
                    'permissions' => $user->permissions()->pluck('name')->toArray() 
                ]);
            }

}
