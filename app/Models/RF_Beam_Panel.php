<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RF_Beam_Panel extends Model
{
    use HasFactory;

    protected $table = "rf_beam_panel";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Antenna_F1',
        'Antenna_F2',
        'Strings[0]',
        'Strings[1]',
        'Strings[2]',
        'Strings[3]',
        'Strings[4]',
        'Strings[5]',
        'Strings[6]',
        'Strings[7]',
        'Strings[8]',
        'Strings[9]',
        'Strings[10]',
        'Strings[11]',
        'Strings[12]'
    ];

    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
