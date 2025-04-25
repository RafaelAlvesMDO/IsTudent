<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'description',
        'monthly_price',
        'availability_start',
        'availability_end',
        'rules',
        'course_id',
        'image',
        'landlord_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_room', 'room_id', 'feature_id');
    }
}
