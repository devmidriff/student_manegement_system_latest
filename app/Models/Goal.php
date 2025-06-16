<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'goal_type',
        'start_date',
        'end_date'
    ];


    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
