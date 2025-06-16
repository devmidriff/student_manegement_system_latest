<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GoalStudent extends Pivot
{
    use HasFactory;

    protected $table = 'goal_student';

    protected $fillable = [
        'goal_id',
        'student_id',
    ];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
