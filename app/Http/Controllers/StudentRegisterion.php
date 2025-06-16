<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Parents;
use App\Models\User;
use App\Models\ParentStudent;
use App\Mail\SendLoginDetails;
use Illuminate\Support\Facades\Mail;


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

         // return view('studentRegisterForm');
            $guardians = Parents::with('user')->get();
            return view('dashboard.studentRegister', compact('guardians'));


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





    public function submitionProcess(Request $request){

  $rules = [
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|digits_between:10,15',
        'address' => 'nullable|string|max:500',

        'guardian_option' => 'nullable|in:existing,new',
        'existing_guardian_id' => 'nullable|required_if:guardian_option,existing|exists:parents,id',
        'guardian_name' => 'nullable|required_if:guardian_option,new|string|max:255',
        'guardian_email' => 'nullable|required_if:guardian_option,new|email|unique:users,email',
        'guardian_phone' => 'nullable|required_if:guardian_option,new|digits_between:10,15',
    ];
    $messages = [
        'existing_guardian_id.required_if' => 'Please select an existing guardian.',
        'guardian_name.required_if' => 'Guardian name is required when adding new.',
        'guardian_email.required_if' => 'Guardian email is required when adding new.',
        'guardian_phone.required_if' => 'Guardian phone is required when adding new.',
    ];

     $validated = $request->validate($rules, $messages);


            $admin  = Auth::user();
            $student = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt('123456789'),
                'role' => 'student',
                'school_id' => $admin->school_id,
            ]);

            Mail::raw('Your login email is: '.$validated['email'].' and password is: 123456789', function ($message) use ($validated) {
                $message->to($validated['email'])
                        ->subject('Login Details');
            });

            $studentCreate = Student::create([
                'user_id' => $student->id,
                'phone'=>$validated['phone'],
                'address'=>$validated['address'],
            ]);

     if($validated['guardian_option'] == "existing"){

            ParentStudent::create([
                'parents_id' => $validated['existing_guardian_id'],
                'student_id' => $studentCreate->id,
            ]);

     }elseif($validated['guardian_option'] == "new"){


            $parent = User::create([
                'name' => $validated['guardian_name'],
                'email' => $validated['guardian_email'],
                'password' => bcrypt('123456789'),
                'role' => 'parent',
                'school_id' => $admin->school_id,
            ]);
                Mail::raw('Your login email is: '.$validated['guardian_email'].' and password is: 123456789', function ($message) use ($validated) {
                    $message->to($validated['guardian_email'])
                            ->subject('Login Details');
                });

            $parent = Parents::create([
                'user_id' => $parent->id,
            ]);

            ParentStudent::create([
                'parents_id' => $parent->id,
                'student_id' => $studentCreate->id,
            ]);

     }




    }














}


