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
        Schema::create('calibrations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->text('Date')->nullable();
            $table->text('System')->nullable();
            $table->text('Batch_No')->nullable();
            $table->text('RF_Version')->nullable();
            $table->text('RF_Serial_No')->nullable();
            $table->text('Dist_Calib')->nullable();
            $table->text('Sim_Calib_No')->nullable();
            $table->text('Noise_Main')->nullable();
            $table->text('Noise_Azim')->nullable();
            $table->text('Noise_Elev')->nullable();
            $table->text('Noise_Spin')->nullable();
            $table->text('Signal_Main')->nullable();
            $table->text('Signal_Azim')->nullable();
            $table->text('Signal_Elev')->nullable();
            $table->text('Signal_Spin')->nullable();
            $table->text('SNR_Main')->nullable();
            $table->text('SNR_Azim')->nullable();
            $table->text('SNR_Elev')->nullable();
            $table->text('SNR_Spin')->nullable();
            $table->text('PuttSignal_Main')->nullable();
            $table->text('PuttSignal_Azim')->nullable();
            $table->text('PuttSignal_Elev')->nullable();
            $table->text('PuttSignal_Spin')->nullable();
            $table->text('SignalDelta_Main')->nullable();
            $table->text('SignalDelta_Azim')->nullable();
            $table->text('SignalDelta_Elev')->nullable();
            $table->text('SignalDelta_Spin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calibrations');
    }
};
