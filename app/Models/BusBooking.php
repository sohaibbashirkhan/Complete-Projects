<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusBooking extends Model
{
    use HasFactory;

    protected $table = 'bus_bookings'; // Use the correct table name

    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'pickup_location', 
        'dropoff_location', 
        'pickup_date', 
        'dropoff_date', 
        'service_type', 
        'comments'
    ];
}
