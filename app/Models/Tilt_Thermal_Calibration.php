<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tilt_Thermal_Calibration extends Model
{
    use HasFactory;

    protected $table = "tilt_thermal_calibration";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Reference_Temperature',
        'Tilt_Temperature_Slope',
        'Roll_Temperature_Slope'
    ];

    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
