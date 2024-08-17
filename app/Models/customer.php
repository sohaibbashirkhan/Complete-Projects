<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class customer extends Model
// {
//     use HasFactory;
//     protected $table ="customers";
//     protected $primaryKey ="id";
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'phone_number', 'password'];
    protected $hidden = ['password'];
    
    // Define the relationship with the Order model
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
