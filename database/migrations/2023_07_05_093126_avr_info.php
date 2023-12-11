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
        if (!Schema::hasTable('avr_info')) {
            Schema::create('avr_info', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Device_ID')->nullable();
                $table->text('Build_Version')->nullable();
                $table->text('PLD_Version')->nullable();
                $table->text('Hardware_ID')->nullable();
                $table->text('One_Wire')->nullable();
                $table->text('Oscillator_Frequency')->nullable();
                $table->text('Oscillator_Multiplier')->nullable();
                $table->text('AVR_Fuses_and_lock_bits_0')->nullable();
                $table->text('AVR_Fuses_and_lock_bits_1')->nullable();
                $table->text('AVR_Fuses_and_lock_bits_2')->nullable();
                $table->text('AVR_Fuses_and_lock_bits_3')->nullable();
                $table->text('AVR_Fuses_and_lock_bits_4')->nullable();
                $table->text('AVR_Fuses_and_lock_bits_5')->nullable();
                $table->text('AVR_Fuses_and_lock_bits_6')->nullable();
                $table->text('AVR_Fuses_and_lock_bits_7')->nullable();
                $table->text('Code_Version')->nullable();
                $table->text('Compile_Date')->nullable();
                $table->text('Compile_Time')->nullable();
                $table->text('33_FS_Mevo_2')->nullable();
                $table->text('AVR_Parameters_RESULT')->nullable();
                $table->text('Actuator_Flags')->nullable();
                $table->text('Default_Tilt')->nullable();
                $table->text('Default_Roll')->nullable();
                $table->text('Bluetooth_Enabled')->nullable();
                $table->text('WiFi_External_Antenna_Enabled')->nullable();
                $table->text('WiFi_Internal_Antenna_Enabled')->nullable();
                $table->text('Start-up_Power_Mode')->nullable();
                $table->text('Standby_Time-out_(s)')->nullable();
                $table->text('Power_off_Time-out')->nullable();
                $table->text('Battery_I2C_read_Time-out_(s)')->nullable();
                $table->text('Audio_Feedback_Disable')->nullable();
                $table->text('Actuator_Extend_Rate')->nullable();
                $table->text('Actuator_Retract_Rate')->nullable();
                $table->text('Actuator_Roll_Left_Rate')->nullable();
                $table->text('Actuator_Roll_Right_Rate')->nullable();
                $table->text('Overcharge_Threshold_(X2)')->nullable();
                $table->text('Debug_Message_Level_(Xi)')->nullable();
                $table->text('Default_App_A_ID_(Xi)')->nullable();
                $table->text('Default_App_B_ID_(Xi)')->nullable();
                $table->text('Charge_level_(X2E)')->nullable();
                $table->text('Spare_1')->nullable();
                $table->text('Spare_2')->nullable();
                $table->text('Spare_3')->nullable();
                $table->text('Spare_4')->nullable();
                $table->text('Spare_5')->nullable();
                $table->text('Spare_6')->nullable();
                $table->text('Spare_7')->nullable();
                $table->text('Spare_8')->nullable();
                $table->text('Spare_9')->nullable();
                $table->text('Spare_10')->nullable();
                $table->text('Spare_11')->nullable();
                $table->text('Spare_12')->nullable();
                $table->text('Spare_13')->nullable();
                $table->text('Battery_Charging')->nullable();
                $table->text('Battery_External_Power_Connected')->nullable();
                $table->text('Battery_Level_Check')->nullable();
                $table->text('Battery_Percentage_Level')->nullable();
                $table->text('DSP_Parameters_read_from_system')->nullable();
            });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avr_info');
    }
};
