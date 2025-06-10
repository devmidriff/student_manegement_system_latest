<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parents extends Model
{
    // Specify the table name since the model name is different
    protected $table = 'parents';

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'contact_number',
    ];
 

    public function students()
    {
        return $this->belongsToMany(Student::class, 'parent_student');
    }


    /**
     * Get the user that owns the parent profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
