<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tilt_Parameters extends Model
{
    use HasFactory;

    protected $table = "tilt_parameters";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Tilt_Calibration_Flags',
        'Tilt_Calibration_xSlope',
        'Tilt_Calibration_ySlope',
        'Tilt_Calibration_xOffset',
        'Tilt_Calibration_yOffset',
        'Tilt_Calibration_RefTemp',
        'Tilt_Calibration_xTempSlope',
        'Tilt_Calibration_yTempSlope',
        'Expected_Block_Angle',
        'Bubble_Centered_Tilt',
        'Bubble_Centered_Roll',
        'AVR/DSP_Dual_Tilt_Sensor_Discrepancy_Tolerance'
    ];
    
    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
