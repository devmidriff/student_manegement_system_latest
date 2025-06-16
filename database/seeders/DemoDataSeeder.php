<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Parents;
use App\Models\Goal;
use App\Models\GoalStudent;


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
            'phone' => '12345678910',
            'address'=> 'ambala '
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

        $goal =   Goal::create([
            'title' => 'Complete Math Homework',
            'description' => 'Finish all exercises from Chapter 5',
            'goal_type' => 'daily',
            'start_date' => '2025-06-20',
            'end_date' => '2025-06-25'
        ]);

        $goalStudent =  GoalStudent::create([
              'goal_id'=>$goal->id,
              'student_id'=>$student->id,  
        ]);




        $teacher->students()->attach($student->id);
        $parent->students()->attach($student->id);
    }
}
