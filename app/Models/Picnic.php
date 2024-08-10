<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picnic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'picnic_location',
        'picnic_date',
        'number_of_guests',
        'start_time',
        'end_time',
        'service_type',
        'comments',
    ];
}
