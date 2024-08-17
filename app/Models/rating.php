<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class rating extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ride_id', 'customer_id', 'user_id', 'rating', 'review'
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
