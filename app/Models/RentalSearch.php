<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalSearch extends Model
{
    protected $fillable = ['name', 'vehicle_type', 'city', 'image'];
}
