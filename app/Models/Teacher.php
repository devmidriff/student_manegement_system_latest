<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    // Optional (Laravel infers it automatically from class name)
    protected $table = 'teachers';

    // Fields that can be mass-assigned
    protected $fillable = [
        'user_id',
        'subject',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'teacher_student');
    }


    /**
     * Get the user account for this teacher.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
