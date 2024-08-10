<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'driver_name', 'cnic_back_side', 'cnic_front_side', 'photo', 'driving_license',
        'vehicle_registration', 'vehicle_id', 'phonenumber'
    ];
}
