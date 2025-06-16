<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ParentStudent extends Pivot

{
    protected $table = 'parent_student';

    protected $fillable = [
        'parents_id',
        'student_id',
    ];

    public $timestamps = true;

    public function parent()
    {
        return $this->belongsTo(Parents::class, 'parents_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
