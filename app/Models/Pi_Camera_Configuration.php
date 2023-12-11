<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pi_Camera_Configuration extends Model
{
    use HasFactory;

    protected $table = "pi_camera_configuration";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Cam_Width',
        'Cam_Height',
        'Cam_Rotation',
        'Cam_EV',
        'Cam_Quality',
        'Cam_FPS',
        'Cam_Stream_Rate',
        'Cam_Prebuffer_Time_(ms)',
        'Cam_Postbuffer_Time_(ms)',
        'Cam_Read/Write_Dynamic_Config'
    ];
    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
