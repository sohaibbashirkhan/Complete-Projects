<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users'); // Assuming 'users' table for customers
            $table->foreignId('user_id')->constrained('users'); // Assuming 'users' table for drivers
            $table->foreignId('vehicle_id')->constrained('vehicles'); // Assuming 'vehicles' table
            $table->string('start_location');
            $table->string('end_location');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->decimal('distance', 8, 2);
            $table->decimal('fare', 8, 2);
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rides');
    }
}