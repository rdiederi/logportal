<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Calibrations extends Model
{
    use HasFactory;

    protected $table = "calibrations";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Date',
        'System',
        'Batch_No',
        'RF_Version',
        'RF_Serial_No',
        'Dist_Calib',
        'Sim_Calib_No',
        'Noise_Main',
        'Noise_Azim',
        'Noise_Elev',
        'Noise_Spin',
        'Signal_Main',
        'Signal_Azim',
        'Signal_Elev',
        'Signal_Spin',
        'SNR_Main',
        'SNR_Azim',
        'SNR_Elev',
        'SNR_Spin',
        'PuttSignal_Main',
        'PuttSignal_Azim',
        'PuttSignal_Elev',
        'PuttSignal_Spin',
        'SignalDelta_Main',
        'SignalDelta_Azim',
        'SignalDelta_Elev',
        'SignalDelta_Spin'
    ];

    public static $firstLabels = [
        'Date',
        'System',
        'RF_Version',
        'RF_Serial_No'
    ];

    public static $removeHeaders = [
        'password',
        'remember_token',
        'api_token',
        'id',
        'created_at',
        'updated_at',
    ];

    public static function getTableHeaders(){
        return self::$firstLabels;
    }

    public static function getFirstMembers(){
        return Calibrations::query()
                            ->limit(100)
                            ->get()
                            ->toArray();
    }

    public static function getSearchData($field, $term){
        return Calibrations::query()
                            ->where($field, 'like', '%' . $term . '%')
                            ->get()
                            ->toArray();
    }

    public static function getAllTableHeaders(){
        $headers = DB::select("select column_name from `information_schema`.`columns` where `table_schema` = 'baldor_db' and `table_name` in ('calibrations')");

        $headers_array = [];
        foreach ($headers as $key => $value) {
            if (in_array($value->{'COLUMN_NAME'}, self::$removeHeaders)) {
                continue;
            }
            $headers_array[] = $value->{'COLUMN_NAME'};
        }

        return $headers_array;
    }
}
