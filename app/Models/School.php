<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{

    protected $table = 'schools';
    protected $fillable = [
        'name',
        'address',
    ];
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
