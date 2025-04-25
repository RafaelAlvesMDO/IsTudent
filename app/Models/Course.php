<?php

namespace App\Models;

use App\Models\tenants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function renter()
    {
        return $this->hasMany(Renter::class);
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
