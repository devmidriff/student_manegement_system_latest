<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    // Optional if you want Laravel to know the table name explicitly
    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'class',
        'roll_no',
    ];


    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_student');
    }

    public function parents()
    {
        return $this->belongsToMany(Parents::class, 'parent_student');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
