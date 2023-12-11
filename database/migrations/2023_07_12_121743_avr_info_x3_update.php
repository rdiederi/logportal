<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('avr_info', function($table) {
            $table->text('Tilt_Sensor_read_Time-out_(s)')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avr_info', function($table) {
            $table->dropColumn('Tilt_Sensor_read_Time-out_(s)');
        });
    }
};
