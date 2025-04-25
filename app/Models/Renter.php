<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Renter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matriculation',
        'college_id',
        'period',
        'course_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
