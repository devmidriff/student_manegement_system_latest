<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Parents;

class DemoDataSeeder extends Seeder
{
    public function run()
    {
        $school = School::create([
            'name' => 'Demo High School',
            'address' => '123 Main Street',
        ]);

        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => bcrypt('password'),
            'role' => 'super_admin',
        ]);

        $schoolAdmin = User::create([
            'name' => 'School Admin',
            'email' => 'admin@school.com',
            'password' => bcrypt('password'),
            'role' => 'school_admin',
            'school_id' => $school->id,
        ]);

        $teacherUser = User::create([
            'name' => 'John Teacher',
            'email' => 'teacher@school.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
            'school_id' => $school->id,
        ]);

        $teacher = Teacher::create([
            'user_id' => $teacherUser->id,
            'subjects' => 'Mathematics',
            'phone'=> '123456789',
            'qualification'=>'MCA',
            'specialization'=>'Computer Science',
            'experience'=>'10'
        ]);

        $studentUser = User::create([
            'name' => 'Jane Student',
            'email' => 'student@school.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'school_id' => $school->id,
        ]);

        $student = Student::create([
            'user_id' => $studentUser->id,
            'roll_no' => '101',
        'dob' =>'03/08/1998',
        'gender'=>"male",
        'phone'=>"1234568",
        'address'=>"ambala",
        'admission_date'=>"03/08/2022",
        'admission_number'=>"123",
        'class'=>"10",
        'section'=>"A",
        'roll_number'=>"135",
        'house'=>"AMBALA",
        'father_name'=>"Avtar",
        'father_occupation'=>"testing",
        'father_phone'=>"21212",
        'father_email'=>"1454",
        'mother_name'=>"Nirmala",
        'mother_occupation'=>"houese wife",
        'mother_phone'=>"2545",
        'mother_email'=>"kdfbshkdf@gmail.com",
        'guardian_address'=>"father",
        'photo_path'=>"fhkahdf",
        'birth_certificate_path'=>"kabdhas",
        'aadhar_card_path'=>"fsdjfvgsd",
        'previous_report_card_path'=>"fjgsdvhf"
        ]);

        $parentUser = User::create([
            'name' => 'Mary Parent',
            'email' => 'parent@school.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'school_id' => $school->id,
        ]);

        $parent = Parents::create([
            'user_id' => $parentUser->id,
        ]);


        $teacher->students()->attach($student->id);
        $parent->students()->attach($student->id);
    }
}
