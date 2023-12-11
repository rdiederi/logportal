<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DSP_Tilt_Calobration extends Model
{
    use HasFactory;

    protected $table = "dsp_tilt_calobration";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Flags',
        'Tilt_Slope',
        'Tilt_Offset',
        'Roll_Slope',
        'Roll_Offset'
    ];

    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
