<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicnicsTable extends Migration
{
    public function up()
    {
        Schema::create('picnics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('picnic_location');
            $table->date('picnic_date');
            $table->integer('number_of_guests');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('service_type');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('picnics');
    }
}
