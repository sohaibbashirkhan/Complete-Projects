<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';

    protected $fillable = [
        'user_id',
        'driver_name',
        'cnic_back_side',
        'cnic_front_side',
        'photo',
        'city',
        'driving_license',
        'vehicle_registration',
        'vehicle_id',
        'phonenumber',
    ];

    /**
     * Get the user that owns the driver.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
