<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Parents;
use App\Models\User;

class StudentRegisterion extends Controller
{
    public function studentRegister(Request $request){
       
    $rules = [
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'class'    => 'required|string|max:100',
        'password' => 'required|string|min:8',
        'role'     => 'required|in:student',
        'parent_registered' => 'required|in:yes,no',
    ];

    if ($request->parent_registered === 'yes') {
        $rules['existing_parent_id'] = 'required|string';
    } else {
        $rules['parent_name']     = 'required|string|max:255';
        $rules['parent_email']    = 'required|email|unique:users,email';
        $rules['parent_password'] = 'required|string|min:6';
        $rules['parent_phone']    = 'nullable|string|max:20';
    }
        $validated = $request->validate($rules);




if ($request->parent_registered === 'yes') {
    $parentIdentifier = $request->existing_parent_id;
    if (filter_var($parentIdentifier, FILTER_VALIDATE_EMAIL)) {
        $parentUser = User::where('email', $parentIdentifier)
                        ->where('role', 'parent')
                        ->first();
        if (!$parentUser) {
            return back()->withErrors(['existing_parent_id' => 'Parent with this email does not exist.']);
        }

    } elseif (is_numeric($parentIdentifier)) {
        $parentRecord = Parents::find($parentIdentifier);
        if (!$parentRecord) {
            return back()->withErrors(['existing_parent_id' => 'Parent ID not found.']);
        }
        $linkedUser = User::find($parentRecord->parent_user_id ?? $parentRecord->user_id);
        if (!$linkedUser || $linkedUser->role !== 'parent') {
            return back()->withErrors(['existing_parent_id' => 'The linked user is not a valid parent.']);
        }
        $parentUser = $linkedUser; 
    
    } else {
        return back()->withErrors(['existing_parent_id' => 'Invalid parent identifier.']);
    }

   
}

        $user = auth()->user();       
        $schoolId = $user->school_id; 

        $studentRegister = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',
            'school_id' => $schoolId,
        ]);


        $sudentAdd =  Student::create([
            'user_id' => $studentRegister->id,
            'class' => $validated['email'],
        ]);


        if ($request->parent_registered === 'no') {

                $parents =  Parents::create([
                    'user_id' => $studentRegister->id,
                    'contact_number' => $validated['parent_phone'],
                ]);


            }


    }

    public function studentRegisterForm(){

          return view('studentRegisterForm');
    }


    
    public function  submitForm(Request $request){


            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name'  => 'required|string|max:255',
                'dob'        => 'required|date|before:today',
                'gender'     => 'required|in:male,female,other',
                'email'      => 'required|email|max:255',
                'phone'      => 'required|string|max:20',
                'address'    => 'required|string|max:255',
                'city'       => 'required|string|max:255',
                'zip'        => 'required|string|max:20',
                'username'   => 'required|string|max:255',
                'password'   => 'required|string|min:8|confirmed',
                'terms'      => 'accepted',
            ]);
           


    }














}


