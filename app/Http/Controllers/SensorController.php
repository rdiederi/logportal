<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Sensor;
Use App\Models\presets;
Use App\Models\Production_Info;
Use App\Models\Eth0_Network_Configuration;
Use App\Models\Wifi_Network_Configuration;
Use App\Models\Pi_Info;
Use App\Models\Pi_Camera_Configuration;
Use App\Models\AVR_Info;
Use App\Models\DSP_Parameters;
Use App\Models\Camera_Parameters;
Use App\Models\Cam_Mode_1;
Use App\Models\Cam_Mode_2;
Use App\Models\Tilt_Parameters;
Use App\Models\IF_Parameters;
Use App\Models\DSP_Tilt_Calobration;
Use App\Models\AVR_Tilt_Calobration;
Use App\Models\Bank;
Use App\Models\Tilt_Thermal_Calibration;
Use App\Models\Power_Information;
Use App\Models\Wireless_AVR;
Use App\Models\RF_Beam_Panel;
Use App\Models\Production_Info_Strings;
use App\Models\File;
use Carbon\Carbon;



use Log;

class SensorController extends Controller
{
    public function show($id)
    {
        return Sensor::allData()->where('id', '=', $id)->first();
    }

    public function showAllBySerialNumber($id)
    {
        $logs = Sensor::query()
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
            ->with('production_info_strings')
            ->with('user')
            ->where('S/N', 'like', '%' . $id . '%')
            ->get()
            ->toArray();

        foreach ($logs as $key => $sensor) {
            $array = [];
            $sensorID = $sensor['id'];

            foreach ($sensor as $index => $value) {
                if (is_array($sensor[$index])) {
                    unset($sensor[$index]['id']);
                    unset($sensor[$index]['created_at']);
                    unset($sensor[$index]['updated_at']);
                    unset($sensor[$index]['sensor_id']);
                    if ($index == 'user') {
                        unset($sensor[$index]['api_token']);
                    }
                    $array = array_merge($array, $value);
                    unset($logs[$key][$index]);
                }
            }

            $logs[$key] = array_merge($logs[$key], $array);
        }

        return $logs;
    }

    public function showLatestLogBySerialNumber($serialNumber){
        $firstTwoCharacters = substr($serialNumber, 0, 2);
        if ($firstTwoCharacters == "FS") {
            $serialNumber = substr($serialNumber, 2);
        }

        $logs = Sensor::query()
                        ->where('S/N', 'like', $serialNumber)
                        ->orderBy('created_at', 'desc')
                        // ->where('created_at', $formattedDate)
                        ->with(['presets','production_info','eth0_network_configuration','wifi_network_configuration','pi_info','pi_camera_configuration','avr_info','dsp_parameters','camera_parameters','cam_mode_1','cam_mode_2','tilt_parameters','if_parameters','user','dsp_tilt_calobration','bank','avr_tilt_calobration','tilt_thermal_calibration','power_information','wireless_avr','rf_beam_panel','production_info_strings'])
                        ->limit(1)
                        ->get()
                        ->toArray();


        foreach ($logs as $key => $sensor) {
            $array = [];
            $sensorID = $sensor['id'];

            foreach ($sensor as $index => $value) {
                if (is_array($sensor[$index])) {
                    unset($sensor[$index]['id']);
                    unset($sensor[$index]['created_at']);
                    unset($sensor[$index]['updated_at']);
                    unset($sensor[$index]['sensor_id']);
                    if ($index == 'user') {
                        unset($sensor[$index]['api_token']);
                    }
                    $array = array_merge($array, $value);
                    unset($logs[$key][$index]);
                }
            }

            $logs[$key] = array_merge($logs[$key], $array);
        }

        return $logs;
    }

    public function showBySerialNumber($serialNumber, $date)
    {
        $carbonDate = Carbon::parse($date);
        $formattedDate = $carbonDate->toDateTimeString(); 

        $firstTwoCharacters = substr($serialNumber, 0, 2);
        if ($firstTwoCharacters == "FS") {
            $serialNumber = substr($serialNumber, 2);
        }

        $logs = Sensor::query()
                        ->where('S/N', 'like', $serialNumber)
                        ->where('created_at', $formattedDate)
                        // ->where('created_at', $formattedDate)
                        ->with(['presets','production_info','eth0_network_configuration','wifi_network_configuration','pi_info','pi_camera_configuration','avr_info','dsp_parameters','camera_parameters','cam_mode_1','cam_mode_2','tilt_parameters','if_parameters','user','dsp_tilt_calobration','bank','avr_tilt_calobration','tilt_thermal_calibration','power_information','wireless_avr','rf_beam_panel','production_info_strings'])
                        ->limit(1)
                        ->get()
                        ->toArray();


        foreach ($logs as $key => $sensor) {
            $array = [];
            $sensorID = $sensor['id'];

            foreach ($sensor as $index => $value) {
                if (is_array($sensor[$index])) {
                    unset($sensor[$index]['id']);
                    unset($sensor[$index]['created_at']);
                    unset($sensor[$index]['updated_at']);
                    unset($sensor[$index]['sensor_id']);
                    if ($index == 'user') {
                        unset($sensor[$index]['api_token']);
                    }
                    $array = array_merge($array, $value);
                    unset($logs[$key][$index]);
                }
            }

            $logs[$key] = array_merge($logs[$key], $array);
        }

        return $logs;
    }

    public function store(Request $request)
    {
        $data = json_decode($request->input('data'));

        if(strpos($data->sensors->Device_Type, 'Mevo 2') !== false){
            if ($this->mevo2($request)) {
                return response(["message" => "Data added successfully"], 200);
            }
        } elseif(strpos($data->sensors->Device_Type, 'X3') !== false){
            if ($this->x3($request)) {
                return response(["message" => "Data added successfully"], 200);
            }
        }
        return response(["message" => "Something Went Wrong"], 404);
    }

    public function update(Request $request, $id)
    {
        $Sensor = Sensor::findOrFail($id);
        $Sensor->update($request->all());

        return $Sensor;
    }

    public function delete(Request $request, $id)
    {
        $Sensor = Sensor::findOrFail($id);
        $Sensor->delete();

        return 204;
    }

    public function mevo2(Request $request)
    {
        $data = json_decode($request->input('data'), true);

        $sensor = Sensor::create($data['sensors']);
        $sensor->user_id = $request->user()->id;
        $sensor->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            $content = file_get_contents($file->getRealPath());
    
            $newFile = new File();
            $newFile->name = $file->getClientOriginalName();
            $newFile->content = $content;
            $newFile->Sensor()->associate($sensor);
            $newFile->save();
        }

        $Tilt_Parameters = Tilt_Parameters::create($data['tilt_parameters']);
        $Tilt_Parameters->Sensor()->associate($sensor);

        $Cam_Mode_2 = Cam_Mode_2::create($data['cam_mode_2']);
        $Cam_Mode_2->Sensor()->associate($sensor);

        $Cam_Mode_1 = Cam_Mode_1::create($data['cam_mode_1']);
        $Cam_Mode_1->Sensor()->associate($sensor);

        $AVR_Info = AVR_Info::create($data['avr_info']);
        $AVR_Info->Sensor()->associate($sensor);

        $Pi_Camera_Configuration = Pi_Camera_Configuration::create($data['pi_camera_configuration']);
        $Pi_Camera_Configuration->Sensor()->associate($sensor);

        $Pi_Info = Pi_Info::create($data['pi_info']);
        $Pi_Info->Sensor()->associate($sensor);

        $Wifi_Network_Configuration = Wifi_Network_Configuration::create($data['wifi_network_configuration']);
        $Wifi_Network_Configuration->Sensor()->associate($sensor);

        $Eth0_Network_Configuration = Eth0_Network_Configuration::create($data['eth0_network_configuration']);
        $Eth0_Network_Configuration->Sensor()->associate($sensor);

        $Production_Info = Production_Info::create($data['production_info']);
        $Production_Info->Sensor()->associate($sensor);

        $presets = presets::create($data['presets']);
        $presets->Sensor()->associate($sensor);

        $DSP_Parameters = DSP_Parameters::create($data['dsp_parameters']);
        $DSP_Parameters->Sensor()->associate($sensor);

        $IF_Parameters = IF_Parameters::create($data['if_parameters']);
        $IF_Parameters->Sensor()->associate($sensor);

        $Camera_Parameters = Camera_Parameters::create($data['camera_parameters']);
        $Camera_Parameters->Sensor()->associate($sensor);

        return (
            $Camera_Parameters->save() &&
            $IF_Parameters->save() &&
            $DSP_Parameters->save() &&
            $presets->save() &&
            $Production_Info->save() &&
            $Eth0_Network_Configuration->save() &&
            $Wifi_Network_Configuration->save() &&
            $Pi_Info->save() &&
            $Pi_Camera_Configuration->save() &&
            $AVR_Info->save() &&
            $Cam_Mode_1->save() &&
            $Cam_Mode_2->save() &&
            $Tilt_Parameters->save()
        );
    }

    public function x3(Request $request)
    {
        $data = json_decode($request->input('data'), true);

        $sensor = Sensor::create($data['sensors']);
        $sensor->user_id = $request->user()->id;
        $sensor->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $content = file_get_contents($file->getRealPath());
    
            $newFile = new File();
            $newFile->name = $file->getClientOriginalName();
            $newFile->content = $content;
            $newFile->Sensor()->associate($sensor);
            $newFile->save();
    
        }

        $Tilt_Parameters = Tilt_Parameters::create($data['tilt_parameters']);
        $Tilt_Parameters->Sensor()->associate($sensor);

        $Cam_Mode_2 = Cam_Mode_2::create($data['cam_mode_2']);
        $Cam_Mode_2->Sensor()->associate($sensor);

        $Cam_Mode_1 = Cam_Mode_1::create($data['cam_mode_1']);
        $Cam_Mode_1->Sensor()->associate($sensor);

        $AVR_Info = AVR_Info::create($data['avr_info']);
        $AVR_Info->Sensor()->associate($sensor);

        $Wifi_Network_Configuration = Wifi_Network_Configuration::create($data['wifi_network_configuration']);
        $Wifi_Network_Configuration->Sensor()->associate($sensor);

        $Eth0_Network_Configuration = Eth0_Network_Configuration::create($data['eth0_network_configuration']);
        $Eth0_Network_Configuration->Sensor()->associate($sensor);

        $Production_Info = Production_Info::create($data['production_info']);
        $Production_Info->Sensor()->associate($sensor);

        $DSP_Parameters = DSP_Parameters::create($data['dsp_parameters']);
        $DSP_Parameters->Sensor()->associate($sensor);

        $IF_Parameters = IF_Parameters::create($data['if_parameters']);
        $IF_Parameters->Sensor()->associate($sensor);

        $Camera_Parameters = Camera_Parameters::create($data['camera_parameters']);
        $Camera_Parameters->Sensor()->associate($sensor);

        $DSP_Tilt_Calobration = DSP_Tilt_Calobration::create($data['dsp_tilt_calobration']);
        $DSP_Tilt_Calobration->Sensor()->associate($sensor);

        $AVR_Tilt_Calobration = AVR_Tilt_Calobration::create($data['avr_tilt_calobration']);
        $AVR_Tilt_Calobration->Sensor()->associate($sensor);
        
        $Bank = Bank::create($data['bank']);
        $Bank->Sensor()->associate($sensor);

        $Tilt_Thermal_Calibration = Tilt_Thermal_Calibration::create($data['tilt_thermal_calibration']);
        $Tilt_Thermal_Calibration->Sensor()->associate($sensor);
        
        $Power_Information = Power_Information::create($data['power_information']);
        $Power_Information->Sensor()->associate($sensor);

        $Wireless_AVR = Wireless_AVR::create($data['wireless_avr']);
        $Wireless_AVR->Sensor()->associate($sensor);

        $RF_Beam_Panel = RF_Beam_Panel::create($data['rf_beam_panel']);
        $RF_Beam_Panel->Sensor()->associate($sensor);

        $Pi_Info = Pi_Info::create($data['pi_info']);
        $Pi_Info->Sensor()->associate($sensor);

        $Production_Info_Strings = Production_Info_Strings::create($data['production_info_strings']);
        $Production_Info_Strings->Sensor()->associate($sensor);
        
        return (
            $RF_Beam_Panel->save() &&
            $Wireless_AVR->save() &&
            $Power_Information->save() &&
            $Tilt_Thermal_Calibration->save() &&
            $Bank->save() &&
            $AVR_Tilt_Calobration->save() &&
            $DSP_Tilt_Calobration->save() &&
            $Camera_Parameters->save() &&
            $IF_Parameters->save() &&
            $DSP_Parameters->save() &&
            $Production_Info->save() &&
            $Eth0_Network_Configuration->save() &&
            $Wifi_Network_Configuration->save() &&
            $AVR_Info->save() &&
            $Cam_Mode_1->save() &&
            $Cam_Mode_2->save() &&
            $Tilt_Parameters->save() && 
            $Pi_Info->save() &&
            $Production_Info_Strings->save()
        );
    }
}
