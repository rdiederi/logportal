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
        if (!Schema::hasTable('tilt_parameters')) {
            Schema::create('tilt_parameters', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Tilt_Calibration_Flags')->nullable();
                $table->text('Tilt_Calibration_xSlope')->nullable();
                $table->text('Tilt_Calibration_ySlope')->nullable();
                $table->text('Tilt_Calibration_xOffset')->nullable();
                $table->text('Tilt_Calibration_yOffset')->nullable();
                $table->text('Tilt_Calibration_RefTemp')->nullable();
                $table->text('Tilt_Calibration_xTempSlope')->nullable();
                $table->text('Tilt_Calibration_yTempSlope')->nullable();
            });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tilt_parameters');
    }
};
