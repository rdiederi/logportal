<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DSP_Parameters extends Model
{
    use HasFactory;

    protected $table = "dsp_parameters";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'DSP_type',
        'DSP_PCB',
        'DSP_ID_[48-bit]',
        'Internal_Temperature',
        'DSP_xtal',
        'DSP_PLLmf',
        'PLD_version_(General)',
        'PLD_version_(Sample)',
        'Flash_Device',
        'Flash_Sector_Size',
        'Flash_Num_Pages',
        'Number_of_channels',
        'Samples_per_channel',
        'A/D_bit_resolution',
        'Code_Version',
        'Compile_Date',
        'Compile_Time',
        'Device_Sensor_Model_Represents',
        'DSP_parameters_RESULT',
        'Max_Vel_(m/s)',
        'Min_Trigger_Vel_(m/s)',
        'Min_Proc_Vel_(m/s)',
        'Antenna_Freq_(MHz)',
        'DopTrigEnable_(bool)',
        'DopTrigLength',
        'DopTrigThresh',
        'DopMinPeak_[10000]',
        'DopSNR',
        'ProcMinPeak_[10000]',
        'ProcSNR',
        'SampleSize_in_K',
        'NumFFTs/FFTdelta',
        'RegressLen',
        'Antenna_X_(behind_T)',
        'Antenna_Y_(height)',
        'Antenna_Z_(right>0)',
        'Antenna_Angle_(deg)',
        'Antenna_Azim_(01mm)',
        'Antenna_Elev_(01mm)',
        'Ball2Club_Scale_(%)',
        'TrigOptions_rearm_(s)',
        'SkipBlocks',
        'ClubDopTrigThreshold',
        'ClubDopMinPeak[10000]',
        'Timeout_(0_=_none)',
        'SwapSign_(0_=_none)',
        'Units_Flags_(mask)',
        'Pre-trigger',
        'Post-trigger',
        'Landing_Height_(m)',
        'Angle_Offset_(01deg)',
        'Wind_Direction_(deg)',
        'Extract_Distance_(m)',
        'Parameter_File_Name',
        'PLD_Version',
        'Antenna_Frequency',
        'Tilt',
        'Tilt_Offset'
    ];

    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
