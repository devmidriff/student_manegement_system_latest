<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParentModel extends Model
{
    // Specify the table name since the model name is different
    protected $table = 'parents';

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'contact_number',
    ];

    /**
     * Get the user that owns the parent profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
