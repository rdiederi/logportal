<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production_Info extends Model
{
    use HasFactory;

    protected $table = "production_info";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Sensor_Info',
        'PCB_Info',
        'WIFI_Dongle',
        'Microwave_Panel',
        'Camera',
        'Station',
        'Station_ID',
        'Production_App_Version',
        'Preset',
        'Created',
        'Microwave_Panel_2',
        'Actuators',
        'User_Interface'
    ];
    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
