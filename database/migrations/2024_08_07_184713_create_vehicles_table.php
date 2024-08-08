<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('vehicles'); // Add this line to drop the table if it exists
        
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('driver_name');
            $table->string('photo_driver');
            $table->string('vehicle_type');
            $table->string('vehicle_model');
            $table->string('license_plate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
