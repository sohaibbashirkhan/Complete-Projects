<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class payment extends Model
{
    use SoftDeletes;

    protected $fillable = ['ride_id', 'customer_id', 'amount', 'payment_method', 'payment_status'];

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
