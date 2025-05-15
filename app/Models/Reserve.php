<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'name',
        'cpf',
        'matriculation',
        'email',
        'phone',
        'renter_quantity',
        'check_in_date',
        'check_out_date',
        'monthly_price',
        'payment_form',
        'room_id',
        'landlord_id',
    ];

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
