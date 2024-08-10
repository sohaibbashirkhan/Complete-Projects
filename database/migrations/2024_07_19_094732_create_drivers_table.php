<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('driver_name');
            $table->string('cnic_back_side');
            $table->string('cnic_front_side');
            $table->string('photo');
            $table->string('city');
            $table->string('driving_license');
            $table->string('vehicle_registration');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('phonenumber');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
