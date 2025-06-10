<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /*
        public function login(Request $request)
            {
                $credentials = $request->validate([
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                ]);

                if (Auth::attempt($credentials, $request->remember)) {
                    $request->session()->regenerate();
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

    */


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
       // $token = $user->createToken('passportToken')->accessToken;

       // return response()->json(compact('user', 'token'), 200);
       return response()->json(compact('user'), 200);
    }



        public function showLoginForm(){
           return view('login');
        }




}
