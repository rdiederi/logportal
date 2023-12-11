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
       Schema::table('tilt_parameters', function($table) {
            $table->text('Expected_Block_Angle')->nullable();
            $table->text('Bubble_Centered_Tilt')->nullable();
            $table->text('Bubble_Centered_Roll')->nullable();
            $table->text('AVR/DSP_Dual_Tilt_Sensor_Discrepancy_Tolerance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tilt_parameters', function($table) {
            $table->dropColumn('Expected_Block_Angle');
            $table->dropColumn('Bubble_Centered_Tilt');
            $table->dropColumn('Bubble_Centered_Roll');
            $table->dropColumn('AVR/DSP_Dual_Tilt_Sensor_Discrepancy_Tolerance');
        });
    }
};
