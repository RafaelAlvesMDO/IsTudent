<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landlord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank_code',
        'branch',
        'account_number',
        'account_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
