<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

         // return view('studentRegisterForm');
         return view('dashboard.studentRegister');
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

 $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'admission_date' => 'nullable|date',
            'admission_number' => 'nullable|string|max:255|unique:students',
            'class' => 'nullable|string|max:50',
            'section' => 'nullable|string|max:10',
            'roll_number' => 'nullable|string|max:50',
            'house' => 'nullable|string|max:100',
            'father_name' => 'nullable|string|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'father_phone' => 'nullable|string|max:20',
            'father_email' => 'nullable|email|max:255',
            'mother_name' => 'nullable|string|max:255',
            'mother_occupation' => 'nullable|string|max:255',
            'mother_phone' => 'nullable|string|max:20',
            'mother_email' => 'nullable|email|max:255',
            'guardian_address' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:5120',
            'aadhar_card' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:5120',
            'previous_report_card' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:5120',
            'terms_agreed' => 'nullable|accepted',
        ]);
           

            $admin  = Auth::user();

            $student = User::create([
                'name' => $validated['first_name'].' '.$validated['last_name'],
                'email' => $validated['email'],
                'password' => bcrypt('123456789'),
                'role' => 'student',
                'school_id' => $admin->school_id,
            ]);



            $studentCreate = Student::create([
                'user_id' => $student->id,
                'roll_no' => $validated['roll_number'],
                'dob' =>$validated['dob'],
                'gender'=>$validated['gender'],
                'phone'=>$validated['phone'],
                'address'=>$validated['address'],
                'admission_date'=>$validated['admission_date'],
                'admission_number'=>$validated['admission_number'],
                'class'=>$validated['class'],
                'section'=>$validated['section'],
                'roll_number'=>$validated['roll_number'],
                'house'=>$validated['house'],
                'father_name'=>$validated['father_name'],
                'father_occupation'=>$validated['father_occupation'],
                'father_phone'=>$validated['father_phone'],
                'father_email'=>$validated['father_email'],
                'mother_name'=>$validated['mother_name'],
                'mother_occupation'=>$validated['mother_occupation'],
                'mother_phone'=>$validated['mother_phone'],
                'mother_email'=>$validated['mother_email'],
                'guardian_address'=>$validated['guardian_address'],
                'photo_path'=>'',
                'birth_certificate_path'=>'',
                'aadhar_card_path'=>'',
                'previous_report_card_path'=>''
            ]);


            if (!empty($validated['father_email']) || !empty($validated['mother_email'])) {
                $nameToSave = null;
                $emailToSave = null;

                if (!empty($validated['father_email'])) {
                    $nameToSave = $validated['father_name'];
                    $emailToSave = $validated['father_email'];
                } elseif (!empty($validated['mother_email'])) {
                    $nameToSave = $validated['mother_name'];
                    $emailToSave = $validated['mother_email'];
                }

                if ($emailToSave && $nameToSave) {
                    $parentUser = User::create([
                        'name'      => $nameToSave,
                        'email'     => $emailToSave,
                        'password'  => bcrypt('123456789'),
                        'role'      => 'parent', 
                        'school_id' => $admin->school_id,
                    ]);

                    $parent = Parents::create([
                        'user_id' => $parentUser->id,
                        
                    ]);
                }
            }










return array($student,$studentCreate);






    }














}


