<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presets extends Model
{
    use HasFactory;

    protected $table = "presets";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Preset_Name',
        'Base_Folder',
        'Base_Log_Folder',
        'Selected_Preset_for_CHECK-IN',
        'Selected_Preset_for_CHECK-OUT',
        'Serial_Printer_Comport',
        'Do_AVR_Checks',
        'Do_DSP_Checks',
        'Do_Pi_Checks',
        'Do_AVR_Bootman_Check',
        'AVR_Bootman_Version',
        'Do_AVR_Firmware_Check',
        'AVR_Firmware_Version',
        'AVR_Firmware_File',
        'AVR_Firmware_File_V4',
        'Do_AVR_Fuse_Bits_Check',
        'AVR_Fuse_Bits',
        'Do_AVR_Build_Version_Check',
        'AVR_Build_Version',
        'Do_AVR_PLD_Version_Check',
        'AVR_PLD_Version_Check',
        'Do_AVR_Hardware_ID_Check',
        'AVR_Hardware_ID',
        'Do_AVR_Parameters_Check',
        'AVR_Parameters_File',
        'Do_Battery_Level_Check',
        'Minimum_Battery_Charge',
        'Do_Production_Info_Check',
        'Production_Info_Filename',
        'Do_DSP_Firmware_Version_Check',
        'DSP_Firmware_Version',
        'DSP_Firmware_File',
        'Do_DSP_Type_Check',
        'Dsp_Type',
        'Do_DSP_PCB_Version_Check',
        'DSP_PCB_Version',
        'Do_DSP_PLD_Version_Check',
        'Dsp_PLD_(General)',
        'Dsp_PLD_(Sample)',
        'Do_DSP_Bootman_Version_Check',
        'DSP_Bootman_Version',
        'DSP_App_Version',
        'Do_DSP_Parameters_Check',
        'DSP_Parameters_File',
        'Do_Pi_Firmware_Version_Check',
        'Pi_Firmware_Version',
        'Do_Pi_Camera_Config_Check',
        'Do_Pi_Network_Config_Check',
        'Do_Camera_Parameters_Check',
        'Camera_Modes_Filename',
        'Camera_Image_Width_from_Preset',
        'Camera_Image_height_from_Preset',
        'Do_Tilt_Parameters_Check',
        'Do_IF_Parameters_Check',
        'Minimum_Frequency',
        'Maximum_Frequency',
        'Maximum_Noise_Power',
        'Minimum_SNR'
    ];
    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
