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
        if (!Schema::hasTable('presets')) {
            Schema::create('presets', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Preset_Name')->nullable();
                $table->text('Base_Folder')->nullable();
                $table->text('Base_Log_Folder')->nullable();
                $table->text('Selected_Preset_for_CHECK-IN')->nullable();
                $table->text('Selected_Preset_for_CHECK-OUT')->nullable();
                $table->text('Serial_Printer_Comport')->nullable();
                $table->text('Do_AVR_Checks')->nullable();
                $table->text('Do_DSP_Checks')->nullable();
                $table->text('Do_Pi_Checks')->nullable();
                $table->text('Do_AVR_Bootman_Check')->nullable();
                $table->text('AVR_Bootman_Version')->nullable();
                $table->text('Do_AVR_Firmware_Check')->nullable();
                $table->text('AVR_Firmware_Version')->nullable();
                $table->text('AVR_Firmware_File')->nullable();
                $table->text('AVR_Firmware_File_V4')->nullable();
                $table->text('Do_AVR_Fuse_Bits_Check')->nullable();
                $table->text('AVR_Fuse_Bits')->nullable();
                $table->text('Do_AVR_Build_Version_Check')->nullable();
                $table->text('AVR_Build_Version')->nullable();
                $table->text('Do_AVR_PLD_Version_Check')->nullable();
                $table->text('AVR_PLD_Version_Check')->nullable();
                $table->text('Do_AVR_Hardware_ID_Check')->nullable();
                $table->text('AVR_Hardware_ID')->nullable();
                $table->text('Do_AVR_Parameters_Check')->nullable();
                $table->text('AVR_Parameters_File')->nullable();
                $table->text('Do_Battery_Level_Check')->nullable();
                $table->text('Minimum_Battery_Charge')->nullable();
                $table->text('Do_Production_Info_Check')->nullable();
                $table->text('Production_Info_Filename')->nullable();
                $table->text('Do_DSP_Firmware_Version_Check')->nullable();
                $table->text('DSP_Firmware_Version')->nullable();
                $table->text('DSP_Firmware_File')->nullable();
                $table->text('Do_DSP_Type_Check')->nullable();
                $table->text('Dsp_Type')->nullable();
                $table->text('Do_DSP_PCB_Version_Check')->nullable();
                $table->text('DSP_PCB_Version')->nullable();
                $table->text('Do_DSP_PLD_Version_Check')->nullable();
                $table->text('Dsp_PLD_(General)')->nullable();
                $table->text('Dsp_PLD_(Sample)')->nullable();
                $table->text('Do_DSP_Bootman_Version_Check')->nullable();
                $table->text('DSP_Bootman_Version')->nullable();
                $table->text('DSP_App_Version')->nullable();
                $table->text('Do_DSP_Parameters_Check')->nullable();
                $table->text('DSP_Parameters_File')->nullable();
                $table->text('Do_Pi_Firmware_Version_Check')->nullable();
                $table->text('Pi_Firmware_Version')->nullable();
                $table->text('Do_Pi_Camera_Config_Check')->nullable();
                $table->text('Do_Pi_Network_Config_Check')->nullable();
                $table->text('Do_Camera_Parameters_Check')->nullable();
                $table->text('Camera_Modes_Filename')->nullable();
                $table->text('Camera_Image_Width_from_Preset')->nullable();
                $table->text('Camera_Image_height_from_Preset')->nullable();
                $table->text('Do_Tilt_Parameters_Check')->nullable();
                $table->text('Do_IF_Parameters_Check')->nullable();
                $table->text('Minimum_Frequency')->nullable();
                $table->text('Maximum_Frequency')->nullable();
                $table->text('Maximum_Noise_Power')->nullable();
                $table->text('Minimum_SNR')->nullable();
               
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presets');
    }
};
