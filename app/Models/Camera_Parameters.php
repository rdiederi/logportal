<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera_Parameters extends Model
{
    use HasFactory;

    protected $fillable = [
        'Cam_Structure_Version',
        'Cam_Flags',
        'Cam_Location_ID',
        'Cam_Host_Software',
        'Cam_Date,_Time',
        'Cam_Width',
        'Cam_Height',
        'Cam_Focal_Length_Fx',
        'Cam_Focal_Length_Fy',
        'Cam_Principle_Point_Cx',
        'Cam_Principle_Point_Cy',
        'Cam_Distortion0',
        'Cam_Distortion1',
        'Cam_Distortion2',
        'Cam_Distortion3',
        'Cam_Distortion4',
        'Cam_Distortion5',
        'Cam_Distortion6',
        'Cam_Distortion7',
        'Cam_Position_X',
        'Cam_Position_Y',
        'Cam_Position_Z',
        'Cam_Rotation_X',
        'Cam_Rotation_Y',
        'Cam_Rotation_Z'
    ];

    protected $table = "camera_parameters";

    protected $primaryKey = "id";

    public $incrementing = true;

    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

    /**
     * Get the second camera_parameters associated with the sensor.
     */
    public function camera_parameters_2()
    {
        return $this->hasOne(Camera_Parameters_2::class);
    }
}
