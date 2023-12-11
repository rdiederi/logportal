<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AVR_Info extends Model
{
    use HasFactory;

    protected $table = "avr_info";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Device_ID',
        'Build_Version',
        'PLD_Version',
        'Hardware_ID',
        'One_Wire',
        'Oscillator_Frequency',
        'Oscillator_Multiplier',
        'AVR_Fuses_and_lock_bits_0',
        'AVR_Fuses_and_lock_bits_1',
        'AVR_Fuses_and_lock_bits_2',
        'AVR_Fuses_and_lock_bits_3',
        'AVR_Fuses_and_lock_bits_4',
        'AVR_Fuses_and_lock_bits_5',
        'AVR_Fuses_and_lock_bits_6',
        'AVR_Fuses_and_lock_bits_7',
        'Code_Version',
        'Compile_Date',
        'Compile_Time',
        '33_FS_Mevo_2',
        'AVR_Parameters_RESULT',
        'Actuator_Flags',
        'Default_Tilt',
        'Default_Roll',
        'Bluetooth_Enabled',
        'WiFi_External_Antenna_Enabled',
        'WiFi_Internal_Antenna_Enabled',
        'Start-up_Power_Mode',
        'Standby_Time-out_(s)',
        'Power_off_Time-out',
        'Battery_I2C_read_Time-out_(s)',
        'Audio_Feedback_Disable',
        'Actuator_Extend_Rate',
        'Actuator_Retract_Rate',
        'Actuator_Roll_Left_Rate',
        'Actuator_Roll_Right_Rate',
        'Overcharge_Threshold_(X2)',
        'Debug_Message_Level_(Xi)',
        'Default_App_A_ID_(Xi)',
        'Default_App_B_ID_(Xi)',
        'Charge_level_(X2E)',
        'Spare_1',
        'Spare_2',
        'Spare_3',
        'Spare_4',
        'Spare_5',
        'Spare_6',
        'Spare_7',
        'Spare_8',
        'Spare_9',
        'Spare_10',
        'Spare_11',
        'Spare_12',
        'Spare_13',
        'Battery_Charging',
        'Battery_External_Power_Connected',
        'Battery_Level_Check',
        'Battery_Percentage_Level',
        'DSP_Parameters_read_from_system',
        'Tilt_Sensor_read_Time-out_(s)'
    ];
    
    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
