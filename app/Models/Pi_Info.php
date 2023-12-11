<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pi_Info extends Model
{
    use HasFactory;
    protected $table = "pi_info";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Pi_Firmware_Version'
    ];
    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
