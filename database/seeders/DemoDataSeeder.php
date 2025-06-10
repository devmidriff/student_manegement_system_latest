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
            'subject' => 'Mathematics',
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
            'class' => '10A',
            'roll_no' => '101',
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
