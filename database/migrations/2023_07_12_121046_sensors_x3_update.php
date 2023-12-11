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
        Schema::table('sensors', function($table) {
            $table->text('Model_Number')->nullable();
            $table->text('P/N')->nullable();
            $table->text('Sensor_Application')->nullable();
            $table->text('Sensor_Model')->nullable();
            $table->text('Demo_Model')->nullable();
            $table->text('Firmware_Version')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sensors', function($table) {
            $table->dropColumn('Model_Number');
            $table->dropColumn('P/N');
            $table->dropColumn('Sensor_Application');
            $table->dropColumn('Sensor_Model');
            $table->dropColumn('Demo_Model');
            $table->dropColumn('Firmware_Version');
        });
    }
};
