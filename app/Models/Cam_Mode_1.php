<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cam_Mode_1 extends Model
{
    use HasFactory;

    protected $table = "cam_mode_1";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Cam_Mode[0]_Name',
        'Cam_Mode[0]_Width',
        'Cam_Mode[0]_Height',
        'Cam_Mode[0]_XScale',
        'Cam_Mode[0]_XOffset',
        'Cam_Mode[0]_YScale',
        'Cam_Mode[0]_YOffset',
        'Cam_Mode[0]_FusionMode',
        'Cam_Mode[0]_Bin44',
        'Cam_Mode[0]_RoiU',
        'Cam_Mode[0]_RoiV',
        'Cam_Mode[0]_Rotation',
        'Cam_Mode[0]_RoiWidth',
        'Cam_Mode[0]_RoiHeight',
        'Cam_Mode[0]_TimeErrorConst_ms',
        'Cam_Mode[0]_TimeErrorVCoef_ms',
        'Cam_Mode[1]_Name',
        'Cam_Mode[1]_Width',
        'Cam_Mode[1]_Height',
        'Cam_Mode[1]_XScale',
        'Cam_Mode[1]_XOffset',
        'Cam_Mode[1]_YScale',
        'Cam_Mode[1]_YOffset',
        'Cam_Mode[1]_FusionMode',
        'Cam_Mode[1]_Bin44',
        'Cam_Mode[1]_RoiU',
        'Cam_Mode[1]_RoiV',
        'Cam_Mode[1]_Rotation',
        'Cam_Mode[1]_RoiWidth',
        'Cam_Mode[1]_RoiHeight',
        'Cam_Mode[1]_TimeErrorConst_ms',
        'Cam_Mode[1]_TimeErrorVCoef_ms',
        'Cam_Mode[2]_Name',
        'Cam_Mode[2]_Width',
        'Cam_Mode[2]_Height',
        'Cam_Mode[2]_XScale',
        'Cam_Mode[2]_XOffset',
        'Cam_Mode[2]_YScale',
        'Cam_Mode[2]_YOffset',
        'Cam_Mode[2]_FusionMode',
        'Cam_Mode[2]_Bin44',
        'Cam_Mode[2]_RoiU',
        'Cam_Mode[2]_RoiV',
        'Cam_Mode[2]_Rotation',
        'Cam_Mode[2]_RoiWidth',
        'Cam_Mode[2]_RoiHeight',
        'Cam_Mode[2]_TimeErrorConst_ms',
        'Cam_Mode[2]_TimeErrorVCoef_ms',
        'Cam_Mode[3]_Name',
        'Cam_Mode[3]_Width',
        'Cam_Mode[3]_Height',
        'Cam_Mode[3]_XScale',
        'Cam_Mode[3]_XOffset',
        'Cam_Mode[3]_YScale',
        'Cam_Mode[3]_YOffset',
        'Cam_Mode[3]_FusionMode',
        'Cam_Mode[3]_Bin44',
        'Cam_Mode[3]_RoiU',
        'Cam_Mode[3]_RoiV',
        'Cam_Mode[3]_Rotation',
        'Cam_Mode[3]_RoiWidth',
        'Cam_Mode[3]_RoiHeight',
        'Cam_Mode[3]_TimeErrorConst_ms',
        'Cam_Mode[3]_TimeErrorVCoef_ms',
        'Cam_Mode[4]_Name',
        'Cam_Mode[4]_Width',
        'Cam_Mode[4]_Height',
        'Cam_Mode[4]_XScale',
        'Cam_Mode[4]_XOffset',
        'Cam_Mode[4]_YScale',
        'Cam_Mode[4]_YOffset',
        'Cam_Mode[4]_FusionMode',
        'Cam_Mode[4]_Bin44',
        'Cam_Mode[4]_RoiU',
        'Cam_Mode[4]_RoiV',
        'Cam_Mode[4]_Rotation',
        'Cam_Mode[4]_RoiWidth',
        'Cam_Mode[4]_RoiHeight',
        'Cam_Mode[4]_TimeErrorConst_ms',
        'Cam_Mode[4]_TimeErrorVCoef_ms',
        'Cam_Mode[5]_Name',
        'Cam_Mode[5]_Width',
        'Cam_Mode[5]_Height',
        'Cam_Mode[5]_XScale',
        'Cam_Mode[5]_XOffset',
        'Cam_Mode[5]_YScale',
        'Cam_Mode[5]_YOffset',
        'Cam_Mode[5]_FusionMode',
        'Cam_Mode[5]_Bin44',
        'Cam_Mode[5]_RoiU',
        'Cam_Mode[5]_RoiV',
        'Cam_Mode[5]_Rotation',
        'Cam_Mode[5]_RoiWidth',
        'Cam_Mode[5]_RoiHeight',
        'Cam_Mode[5]_TimeErrorConst_ms',
        'Cam_Mode[5]_TimeErrorVCoef_ms'
    ];
    
    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
