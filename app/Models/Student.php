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
        'roll_no',
        'dob',
        'gender',
        'phone',
        'address',
        'admission_date',
        'admission_number',
        'class',
        'section',
        'roll_number',
        'house',
        'father_name',
        'father_occupation',
        'father_phone',
        'father_email',
        'mother_name',
        'mother_occupation',
        'mother_phone',
        'mother_email',
        'guardian_address',
        'photo_path',
        'birth_certificate_path',
        'aadhar_card_path',
        'previous_report_card_path'
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
