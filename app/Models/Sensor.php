<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Log;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'Device_Type',
        'Date_Time_of_log_created',
        'S/N',
        'Build_Type_Region',
        'Production_App_Version',
        'Scanned_Barcodes_Data:',
        'Sensor',
        'Transceiver',
        'PCB_Serial',
        'PCB_Issue',
        'Sensor_Serial_Barcode',
        'Model_Number',
        'P/N',
        'Sensor_Application',
        'Sensor_Model',
        'Demo_Model',
        'Firmware_Version'
    ];

    public static $firstLabels = [
        'Device_Type',
        'Date_Time_of_log_created',
        'S/N',
        'username',
        'station',
        'station_id',
        'DSP_ID_[48-bit]'
    ];

    public static $removeHeaders = [
        'password',
        'remember_token',
        'api_token',
        'id',
        'created_at',
        'updated_at',
    ];

    protected $table = "sensors";

    protected $primaryKey = "id";

    public $incrementing = true;

    /**
     * Get the presets associated with the sensor.
     */
    public function presets()
    {
        return $this->hasOne(presets::class);
    }

    /**
     * Get the production_info associated with the sensor.
     */
    public function production_info()
    {
        return $this->hasOne(Production_Info::class);
    }

    /**
     * Get the eth0_network_configuration associated with the sensor.
     */
    public function eth0_network_configuration()
    {
        return $this->hasOne(Eth0_Network_Configuration::class);
    }

    /**
     * Get the wifi_network_configuration associated with the sensor.
     */
    public function wifi_network_configuration()
    {
        return $this->hasOne(Wifi_Network_Configuration::class);
    }

    /**
     * Get the pi_info associated with the sensor.
     */
    public function pi_info()
    {
        return $this->hasOne(Pi_Info::class);
    }

    /**
     * Get the pi_camera_configuration associated with the sensor.
     */
    public function pi_camera_configuration()
    {
        return $this->hasOne(Pi_Camera_Configuration::class);
    }

    /**
     * Get the avr_info associated with the sensor.
     */
    public function avr_info()
    {
        return $this->hasOne(AVR_Info::class);
    }

    /**
     * Get the dsp_parameters associated with the sensor.
     */
    public function dsp_parameters()
    {
        return $this->hasOne(DSP_Parameters::class);
    }

    /**
     * Get the first camera_parameters associated with the sensor.
     */
    public function camera_parameters()
    {
        return $this->hasOne(Camera_Parameters::class);
    }

    /**
     * Get the cam_mode_1 settings associated with the sensor.
     */
    public function cam_mode_1()
    {
        return $this->hasOne(Cam_Mode_1::class);
    }

    /**
     * Get the cam_mode_2 settings associated with the sensor.
     */
    public function cam_mode_2()
    {
        return $this->hasOne(Cam_Mode_2::class);
    }

    /**
     * Get the tilt_parameters associated with the sensor.
     */
    public function tilt_parameters()
    {
        return $this->hasOne(Tilt_Parameters::class);
    }

    /**
     * Get the if_parameters associated with the sensor.
     */
    public function if_parameters()
    {
        return $this->hasOne(IF_Parameters::class);
    }

    /**
     * Get the user associated with the sensor.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the dsp_tilt_calobration associated with the sensor.
     */
    public function dsp_tilt_calobration()
    {
        return $this->hasOne(DSP_Tilt_Calobration::class);
    }

    /**
     * Get the avr_tilt_calobration associated with the sensor.
     */
    public function avr_tilt_calobration()
    {
        return $this->hasOne(AVR_Tilt_Calobration::class);
    }
    
    /**
     * Get the bank associated with the sensor.
     */
    public function bank()
    {
        return $this->hasOne(Bank::class);
    }

    /**
     * Get the tilt_thermal_calibration associated with the sensor.
     */
    public function tilt_thermal_calibration()
    {
        return $this->hasOne(Tilt_Thermal_Calibration::class);
    }
    
    /**
     * Get the power_information associated with the sensor.
     */
    public function power_information()
    {
        return $this->hasOne(Power_Information::class);
    }
    
    /**
     * Get the wireless_avr associated with the sensor.
     */
    public function wireless_avr()
    {
        return $this->hasOne(Wireless_AVR::class);
    }

    /**
     * Get the rf_beam_panel associated with the sensor.
     */
    public function rf_beam_panel()
    {
        return $this->hasOne(RF_Beam_Panel::class);
    }

    /**
     * Get the production_info_strings associated with the sensor.
     */
    public function production_info_strings()
    {
        return $this->hasOne(Production_Info_Strings::class);
    }

    /**
     * Get the production_info_strings associated with the sensor.
     */
    public function file()
    {
        return $this->hasOne(File::class);
    }

    public static function getFirstMembers(){
        $sensors = Sensor::query()
            ->with('user')
            ->with('dsp_parameters')
            ->limit(100)
            ->get();

        return $sensors;
    }

    public static function allData(){
        return Sensor::query()
            ->with('presets')
            ->with('production_info')
            ->with('eth0_network_configuration')
            ->with('wifi_network_configuration')
            ->with('pi_info')
            ->with('pi_camera_configuration')
            ->with('avr_info')
            ->with('dsp_parameters')
            ->with('camera_parameters')
            ->with('cam_mode_1')
            ->with('cam_mode_2')
            ->with('tilt_parameters')
            ->with('if_parameters')
            ->with('user')
            ->with('dsp_tilt_calobration')
            ->with('bank')
            ->with('avr_tilt_calobration')
            ->with('tilt_thermal_calibration')
            ->with('power_information')
            ->with('wireless_avr')
            ->with('rf_beam_panel')
            ->with('production_info_strings')
            ->get();
    }

    public static function getTableHeaders(){
        return self::$firstLabels;
    }

    public static function getAllTableHeaders(){
        $headers = DB::select("select column_name from `information_schema`.`columns` where `table_schema` = 'baldor_db' and `table_name` in ('avr_info', 'cam_mode_1', 'cam_mode_2', 'camera_parameters', 'dsp_parameters', 'eth0_network_configuration', 'if_parameters', 'pi_camera_configuration', 'pi_info', 'presets', 'production_info', 'sensors', 'tilt_parameters', 'users', 'wifi_network_configuration', 'dsp_tilt_calobration','bank','avr_tilt_calobration','tilt_thermal_calibration','power_information','wireless_avr','rf_beam_panel','production_info_strings')");

        $headers_array = [];
        foreach ($headers as $key => $value) {
            if (in_array($value->{'COLUMN_NAME'}, self::$removeHeaders)) {
                continue;
            }
            $headers_array[] = $value->{'COLUMN_NAME'};
        }

        return $headers_array;
    }

    public static function getMevo2TableHeaders(){
        $headers = DB::select("select column_name from `information_schema`.`columns` where `table_schema` = 'baldor_db' and `table_name` in ('sensors','presets','production_info','eth0_network_configuration','wifi_network_configuration','pi_info','pi_camera_configuration','avr_info','dsp_parameters','camera_parameters','cam_mode_1','cam_mode_2','tilt_parameters','if_parameters','user')");

        $headers_array = [];
        foreach ($headers as $key => $value) {
            if (in_array($value->{'COLUMN_NAME'}, self::$removeHeaders)) {
                continue;
            }
            $headers_array[] = $value->{'COLUMN_NAME'};
        }

        return $headers_array;
    }

    public static function getX3TableHeaders(){
        $headers = DB::select("select column_name from `information_schema`.`columns` where `table_schema` = 'baldor_db' and `table_name` in ('sensors', 'production_info','eth0_network_configuration','wifi_network_configuration','avr_info','dsp_parameters','camera_parameters','cam_mode_1','cam_mode_2','tilt_parameters','if_parameters','user','dsp_tilt_calobration','bank','avr_tilt_calobration','tilt_thermal_calibration','power_information','wireless_avr','rf_beam_panel','production_info_strings')");

        $headers_array = [];
        foreach ($headers as $key => $value) {
            if (in_array($value->{'COLUMN_NAME'}, self::$removeHeaders)) {
                continue;
            }
            $headers_array[] = $value->{'COLUMN_NAME'};
        }

        return $headers_array;
    }

    public static function getSearchData($field, $term){
        if ($field && $term) {
            switch ($field) {
                case 'Device_Type':
                case 'Date_Time_of_log_created':
                case 'S/N':
                    $members = Sensor::query()
                                    ->with('presets')
                                    ->with('production_info')
                                    ->with('eth0_network_configuration')
                                    ->with('wifi_network_configuration')
                                    ->with('pi_info')
                                    ->with('pi_camera_configuration')
                                    ->with('avr_info')
                                    ->with('dsp_parameters')
                                    ->with('camera_parameters')
                                    ->with('cam_mode_1')
                                    ->with('cam_mode_2')
                                    ->with('tilt_parameters')
                                    ->with('if_parameters')
                                    ->with('dsp_tilt_calobration')
                                    ->with('bank')
                                    ->with('avr_tilt_calobration')
                                    ->with('tilt_thermal_calibration')
                                    ->with('power_information')
                                    ->with('wireless_avr')
                                    ->with('rf_beam_panel')
                                    ->with('user')
                                    ->with('production_info_strings')
                                    ->where($field, 'like', '%' . $term . '%')
                                    ->get();
                    
                    break;
                case 'username':
                case 'station':
                case 'station_id':
                    $members = Sensor::query()->with(['presets','production_info','eth0_network_configuration','wifi_network_configuration','pi_info','pi_camera_configuration','avr_info','dsp_parameters','camera_parameters','cam_mode_1','cam_mode_2','tilt_parameters','if_parameters','user','dsp_tilt_calobration','bank','avr_tilt_calobration','tilt_thermal_calibration','power_information','wireless_avr','rf_beam_panel','production_info_strings'])
                                    ->whereHas('user', function($q) use($term, $field) {
                                        $q->where($field, 'like', '%' . $term . '%'); // '=' is optional
                                    })
                                    ->get();
                    break;
                case 'DSP_ID_[48-bit]':
                    $members = Sensor::query()
                                    ->with('presets')
                                    ->with('production_info')
                                    ->with('eth0_network_configuration')
                                    ->with('wifi_network_configuration')
                                    ->with('pi_info')
                                    ->with('pi_camera_configuration')
                                    ->with('avr_info')
                                    ->with('dsp_parameters')
                                    ->with('camera_parameters')
                                    ->with('cam_mode_1')
                                    ->with('cam_mode_2')
                                    ->with('tilt_parameters')
                                    ->with('if_parameters')
                                    ->with('dsp_tilt_calobration')
                                    ->with('bank')
                                    ->with('avr_tilt_calobration')
                                    ->with('tilt_thermal_calibration')
                                    ->with('power_information')
                                    ->with('wireless_avr')
                                    ->with('rf_beam_panel')
                                    ->with('user')
                                    ->with('production_info_strings')
                                    ->whereHas('dsp_parameters', function($q) use($term) {
                                        // Query the name field in status table
                                        $q->where('DSP_ID_[48-bit]', '=', $term); // '=' is optional
                                    })
                                    ->get();
                    break;
            }
        } else {
            $members = Sensor::allData()->limit(100);
        }

        return $members;
    }

}
