<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\Student;


class GoalInformation extends Controller
{
    public function show_goal(){
      return  view('dashboard.goaladdpage');
    }


public function goal_store(Request $request){
        
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'goal_type' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $goal = Goal::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'goal_type' => $validated['goal_type'],
        'start_date' => $validated['start_date'],
        'end_date' => $validated['end_date']
    ]);

    return redirect()->back()->with('success', 'Goal Created Successfully!');
}



public function assignGoalForm()
{
    $goals = Goal::all(); 
    $students = Student::with('user')->get();

    return view('dashboard.assignGoal', compact('goals', 'students'));
}




public function assignGoalToStudents(Request $request)
{
    $validated = $request->validate([
        'goal_id' => 'required|exists:goals,id',
        'student_ids' => 'required|array',
        'student_ids.*' => 'exists:students,id',
    ]);
    $goal = Goal::findOrFail($validated['goal_id']);
    $existingStudentIds = $goal->students()->pluck('students.id')->toArray();
    $newStudentIds = array_diff($validated['student_ids'], $existingStudentIds);
    $goal->students()->attach($newStudentIds);
    return redirect()->back()->with('success', 'Goal assigned to selected students successfully!');
}











}
