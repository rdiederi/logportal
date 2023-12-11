<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IF_Parameters extends Model
{
    use HasFactory;

    protected $table = "if_parameters";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Flags',
        'Host_Software',
        'Date_Time',
        'Part_No_1',
        'Serial_No',
        'DCIF_Bank_Index',
        'DCIF_Base_Frequency',
        'DCIF_CH0_coef_a',
        'DCIF_CH0_coef_b',
        'DCIF_CH0_coef_c',
        'DCIF_CH1_coef_a',
        'DCIF_CH1_coef_b',
        'DCIF_CH1_coef_c',
        'DCIF_CH2_coef_a',
        'DCIF_CH2_coef_b',
        'DCIF_CH2_coef_c',
        'DCIF_CH3_coef_a',
        'DCIF_CH3_coef_b',
        'DCIF_CH3_coef_c',
        'DCIF_CH4_coef_a',
        'DCIF_CH4_coef_b',
        'DCIF_CH4_coef_c',
        'DCIF_CH5_coef_a',
        'DCIF_CH5_coef_b',
        'DCIF_CH5_coef_c',
        'DCIF_CH6_coef_a',
        'DCIF_CH6_coef_b',
        'DCIF_CH6_coef_c',
        'DCIF_CH7_coef_a',
        'DCIF_CH7_coef_b',
        'DCIF_CH7_coef_c',
        'DCIF_CH8_coef_a',
        'DCIF_CH8_coef_b',
        'DCIF_CH8_coef_c',
        'DCIF_CH9_coef_a',
        'DCIF_CH9_coef_b',
        'DCIF_CH9_coef_c',
        'DCIF_CH10_coef_a',
        'DCIF_CH10_coef_b',
        'DCIF_CH10_coef_c',
        'DCIF_CH11_coef_a',
        'DCIF_CH11_coef_b',
        'DCIF_CH11_coef_c',
        'DCIF_CH12_coef_a',
        'DCIF_CH12_coef_b',
        'DCIF_CH12_coef_c',
        'DCIF_CH13_coef_a',
        'DCIF_CH13_coef_b',
        'DCIF_CH13_coef_c',
        'DCIF_CH14_coef_a',
        'DCIF_CH14_coef_b',
        'DCIF_CH14_coef_c',
        'DCIF_CH15_coef_a',
        'DCIF_CH15_coef_b',
        'DCIF_CH15_coef_c',
        'UW_CH0_Amp',
        'UW_CH1_Amp',
        'UW_CH2_Amp',
        'UW_CH3_Amp',
        'UW_CH4_Amp',
        'UW_CH5_Amp',
        'UW_CH6_Amp',
        'UW_CH7_Amp',
        'UW_CH8_Amp',
        'UW_CH9_Amp',
        'UW_CH10_Amp',
        'UW_CH11_Amp',
        'UW_CH12_Amp',
        'UW_CH13_Amp',
        'UW_CH14_Amp',
        'UW_CH15_Amp',
        'UW_CH0_Phase',
        'UW_CH1_Phase',
        'UW_CH2_Phase',
        'UW_CH3_Phase',
        'UW_CH4_Phase',
        'UW_CH5_Phase',
        'UW_CH6_Phase',
        'UW_CH7_Phase',
        'UW_CH8_Phase',
        'UW_CH9_Phase',
        'UW_CH10_Phase',
        'UW_CH11_Phase',
        'UW_CH12_Phase',
        'UW_CH13_Phase',
        'UW_CH14_Phase',
        'UW_CH15_Phase',
        'Delta_Frequency'
    ];

    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
