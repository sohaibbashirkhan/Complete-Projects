<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings'; // Use the correct table name

    protected $fillable = [
        'customer_name',
        'pickup_location',
        'dropoff_location',
        'pickup_date',
        'pickup_time',
    ];
}
