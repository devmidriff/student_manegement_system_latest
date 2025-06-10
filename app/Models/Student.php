<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    // Optional if you want Laravel to know the table name explicitly
    protected $table = 'students';

    // Allow mass-assignment on these fields
    protected $fillable = [
        'user_id',
        'class',
        'roll_no',
    ];

    /**
     * Get the user associated with the student.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
