<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    // Optional if the table name matches the default (plural snake_case of model)
    protected $table = 'schools';

    // Allow mass-assignment on these fields
    protected $fillable = [
        'name',
        'address',
    ];

    /**
     * A school has many users (admins, teachers, students, parents).
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
