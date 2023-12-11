<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = "bank";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'BANK_#0_DCIF_Base_Frequency',
        'BANK_#0_DCIF_CH0_(a_b_c)',
        'BANK_#0_DCIF_CH1_(a_b_c)',
        'BANK_#0_DCIF_CH2_(a_b_c)',
        'BANK_#0_DCIF_CH3_(a_b_c)',
        'BANK_#0_DCIF_CH4_(a_b_c)',
        'BANK_#0_DCIF_CH5_(a_b_c)',
        'BANK_#0_DCIF_CH6_(a_b_c)',
        'BANK_#0_DCIF_CH7_(a_b_c)',
        'BANK_#0_DCIF_CH8_(a_b_c)',
        'BANK_#0_DCIF_CH9_(a_b_c)',
        'BANK_#0_DCIF_CH10_(a_b_c)',
        'BANK_#0_DCIF_CH11_(a_b_c)',
        'BANK_#1_DCIF_Base_Frequency',
        'BANK_#1_DCIF_CH0_(a_b_c)',
        'BANK_#1_DCIF_CH1_(a_b_c)',
        'BANK_#1_DCIF_CH2_(a_b_c)',
        'BANK_#1_DCIF_CH3_(a_b_c)',
        'BANK_#1_DCIF_CH4_(a_b_c)',
        'BANK_#1_DCIF_CH5_(a_b_c)',
        'BANK_#1_DCIF_CH6_(a_b_c)',
        'BANK_#1_DCIF_CH7_(a_b_c)',
        'BANK_#1_DCIF_CH8_(a_b_c)',
        'BANK_#1_DCIF_CH9_(a_b_c)',
        'BANK_#1_DCIF_CH10_(a_b_c)',
        'BANK_#1_DCIF_CH11_(a_b_c)',
        'BANK_#2_DCIF_Base_Frequency',
        'BANK_#2_DCIF_CH0_(a_b_c)',
        'BANK_#2_DCIF_CH1_(a_b_c)',
        'BANK_#2_DCIF_CH2_(a_b_c)',
        'BANK_#2_DCIF_CH3_(a_b_c)',
        'BANK_#2_DCIF_CH4_(a_b_c)',
        'BANK_#2_DCIF_CH5_(a_b_c)',
        'BANK_#2_DCIF_CH6_(a_b_c)',
        'BANK_#2_DCIF_CH7_(a_b_c)',
        'BANK_#2_DCIF_CH8_(a_b_c)',
        'BANK_#2_DCIF_CH9_(a_b_c)',
        'BANK_#2_DCIF_CH10_(a_b_c)',
        'BANK_#2_DCIF_CH11_(a_b_c)',
        'BANK_#3_DCIF_Base_Frequency',
        'BANK_#3_DCIF_CH0_(a_b_c)',
        'BANK_#3_DCIF_CH1_(a_b_c)',
        'BANK_#3_DCIF_CH2_(a_b_c)',
        'BANK_#3_DCIF_CH3_(a_b_c)',
        'BANK_#3_DCIF_CH4_(a_b_c)',
        'BANK_#3_DCIF_CH5_(a_b_c)',
        'BANK_#3_DCIF_CH6_(a_b_c)',
        'BANK_#3_DCIF_CH7_(a_b_c)',
        'BANK_#3_DCIF_CH8_(a_b_c)',
        'BANK_#3_DCIF_CH9_(a_b_c)',
        'BANK_#3_DCIF_CH10_(a_b_c)',
        'BANK_#3_DCIF_CH11_(a_b_c)',
        'BANK_#4_DCIF_Base_Frequency',
        'BANK_#4_DCIF_CH0_(a_b_c)',
        'BANK_#4_DCIF_CH1_(a_b_c)',
        'BANK_#4_DCIF_CH2_(a_b_c)',
        'BANK_#4_DCIF_CH3_(a_b_c)',
        'BANK_#4_DCIF_CH4_(a_b_c)',
        'BANK_#4_DCIF_CH5_(a_b_c)',
        'BANK_#4_DCIF_CH6_(a_b_c)',
        'BANK_#4_DCIF_CH7_(a_b_c)',
        'BANK_#4_DCIF_CH8_(a_b_c)',
        'BANK_#4_DCIF_CH9_(a_b_c)',
        'BANK_#4_DCIF_CH10_(a_b_c)',
        'BANK_#4_DCIF_CH11_(a_b_c)',
        'BANK_#5_DCIF_Base_Frequency',
        'BANK_#5_DCIF_CH0_(a_b_c)',
        'BANK_#5_DCIF_CH1_(a_b_c)',
        'BANK_#5_DCIF_CH2_(a_b_c)',
        'BANK_#5_DCIF_CH3_(a_b_c)',
        'BANK_#5_DCIF_CH4_(a_b_c)',
        'BANK_#5_DCIF_CH5_(a_b_c)',
        'BANK_#5_DCIF_CH6_(a_b_c)',
        'BANK_#5_DCIF_CH7_(a_b_c)',
        'BANK_#5_DCIF_CH8_(a_b_c)',
        'BANK_#5_DCIF_CH9_(a_b_c)',
        'BANK_#5_DCIF_CH10_(a_b_c)',
        'BANK_#5_DCIF_CH11_(a_b_c)',
        'BANK_#6_DCIF_Base_Frequency',
        'BANK_#6_DCIF_CH0_(a_b_c)',
        'BANK_#6_DCIF_CH1_(a_b_c)',
        'BANK_#6_DCIF_CH2_(a_b_c)',
        'BANK_#6_DCIF_CH3_(a_b_c)',
        'BANK_#6_DCIF_CH4_(a_b_c)',
        'BANK_#6_DCIF_CH5_(a_b_c)',
        'BANK_#6_DCIF_CH6_(a_b_c)',
        'BANK_#6_DCIF_CH7_(a_b_c)',
        'BANK_#6_DCIF_CH8_(a_b_c)',
        'BANK_#6_DCIF_CH9_(a_b_c)',
        'BANK_#6_DCIF_CH10_(a_b_c)',
        'BANK_#6_DCIF_CH11_(a_b_c)',
        'BANK_#7_DCIF_Base_Frequency',
        'BANK_#7_DCIF_CH0_(a_b_c)',
        'BANK_#7_DCIF_CH1_(a_b_c)',
        'BANK_#7_DCIF_CH2_(a_b_c)',
        'BANK_#7_DCIF_CH3_(a_b_c)',
        'BANK_#7_DCIF_CH4_(a_b_c)',
        'BANK_#7_DCIF_CH5_(a_b_c)',
        'BANK_#7_DCIF_CH6_(a_b_c)',
        'BANK_#7_DCIF_CH7_(a_b_c)',
        'BANK_#7_DCIF_CH8_(a_b_c)',
        'BANK_#7_DCIF_CH9_(a_b_c)',
        'BANK_#7_DCIF_CH10_(a_b_c)',
        'BANK_#7_DCIF_CH11_(a_b_c)'
    ];

    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
