<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power_Information extends Model
{
    use HasFactory;

    protected $table = "power_information";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Capacity',
        'Charge_Level_Set',
        'Charge_Level',
        'Power_Levels',
        'Power_In_Use_(not_charging)_V/A',
        'Power_In_Use_(charging)_V/A',
        'Battery_In_Use_V/A',
        'Battery_Temperature'
    ];

    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
