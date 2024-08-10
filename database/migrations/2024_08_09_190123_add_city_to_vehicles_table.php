<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityToVehiclesTable extends Migration
{
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('city')->nullable(); // Add this line
        });
    }
    
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('city'); // Rollback column
        });
    }
    
}
