<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToVehiclesTable extends Migration
{
    public function up()
    {
        // Check if the 'image' column does not exist before adding
        if (!Schema::hasColumn('vehicles', 'image')) {
            Schema::table('vehicles', function (Blueprint $table) {
                $table->string('image')->nullable();
            });
        }
    }

    public function down()
    {
        // Optional: define how to revert the migration if needed
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
