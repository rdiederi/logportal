<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations
     */
    public function up(): void
    {
        if (!Schema::hasTable('dsp_parameters')) {
            Schema::create('dsp_parameters', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('DSP_type')->nullable();
                $table->text('DSP_PCB')->nullable();
                $table->text('DSP_ID_[48-bit]')->nullable();
                $table->text('Internal_Temperature')->nullable();
                $table->text('DSP_xtal')->nullable();
                $table->text('DSP_PLLmf')->nullable();
                $table->text('PLD_version_(General)')->nullable();
                $table->text('PLD_version_(Sample)')->nullable();
                $table->text('Flash_Device')->nullable();
                $table->text('Flash_Sector_Size')->nullable();
                $table->text('Flash_Num_Pages')->nullable();
                $table->text('Number_of_channels')->nullable();
                $table->text('Samples_per_channel')->nullable();
                $table->text('A/D_bit_resolution')->nullable();
                $table->text('Code_Version')->nullable();
                $table->text('Compile_Date')->nullable();
                $table->text('Compile_Time')->nullable();
                $table->text('Device_Sensor_Model_Represents')->nullable();
                $table->text('DSP_parameters_RESULT')->nullable();
                $table->text('Max_Vel_(m/s)')->nullable();
                $table->text('Min_Trigger_Vel_(m/s)')->nullable();
                $table->text('Min_Proc_Vel_(m/s)')->nullable();
                $table->text('Antenna_Freq_(MHz)')->nullable();
                $table->text('DopTrigEnable_(bool)')->nullable();
                $table->text('DopTrigLength')->nullable();
                $table->text('DopTrigThresh')->nullable();
                $table->text('DopMinPeak_[10000]')->nullable();
                $table->text('DopSNR')->nullable();
                $table->text('ProcMinPeak_[10000]')->nullable();
                $table->text('ProcSNR')->nullable();
                $table->text('SampleSize_in_K')->nullable();
                $table->text('NumFFTs/FFTdelta')->nullable();
                $table->text('RegressLen')->nullable();
                $table->text('Antenna_X_(behind_T)')->nullable();
                $table->text('Antenna_Y_(height)')->nullable();
                $table->text('Antenna_Z_(right>0)')->nullable();
                $table->text('Antenna_Angle_(deg)')->nullable();
                $table->text('Antenna_Azim_(01mm)')->nullable();
                $table->text('Antenna_Elev_(01mm)')->nullable();
                $table->text('Ball2Club_Scale_(%)')->nullable();
                $table->text('TrigOptions_rearm_(s)')->nullable();
                $table->text('SkipBlocks')->nullable();
                $table->text('ClubDopTrigThreshold')->nullable();
                $table->text('ClubDopMinPeak[10000]')->nullable();
                $table->text('Timeout_(0_=_none)')->nullable();
                $table->text('SwapSign_(0_=_none)')->nullable();
                $table->text('Units_Flags_(mask)')->nullable();
                $table->text('Pre-trigger')->nullable();
                $table->text('Post-trigger')->nullable();
                $table->text('Landing_Height_(m)')->nullable();
                $table->text('Angle_Offset_(01deg)')->nullable();
                $table->text('Wind_Direction_(deg)')->nullable();
                $table->text('Extract_Distance_(m)')->nullable();
            });
       }
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('dsp_parameters');
    }
};
