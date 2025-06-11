<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterAdminController extends Controller
{
 public function adminRegister(Request $request)
    {
 
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'required',
        ]);

        if (auth()->user()->role !== 'super_admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $school = School::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'school_admin',
            'school_id' => $school->id,
        ]);

        return view('dashboard', [
        'success' => 'Admin registered successfully!',
        'new_user' => $user
        ]);
    
    }
}
