<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wireless_AVR extends Model
{
    use HasFactory;

    protected $table = "wireless_avr";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Hardware_ID',
        'Boot_Manager_Version',
        'Firmware_Version',
        'Revision_ID',
        'Board_Build_Version',
        'Hardware_Type_ID',
        'Oscillator_Frequency',
        'Oscillator_Multiplier',
        'Fuse_And_Lock_Bits',
        'PLD_Version'
    ];

    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
