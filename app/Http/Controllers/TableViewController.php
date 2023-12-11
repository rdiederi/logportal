<?php

namespace App\Http\Controllers;

use DB;
use Log;
use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Exports\MembersExport;
use Excel;


class TableViewController extends Controller
{
    public function index() {
        $headers = Sensor::getTableHeaders();
        $firstMembers = Sensor::getFirstMembers()->toArray();

        foreach ($firstMembers as $key => $sensor) {
            $array = [];
            $sensorID = $sensor['id'];

            foreach ($sensor as $index => $value) {
                if (is_array($value)) {
                    unset($value['id']);
                    unset($value['created_at']);
                    unset($value['updated_at']);
                    unset($value['sensor_id']);

                    $array = array_merge($array, $value);
                    unset($firstMembers[$key][$index]);
                }
            }

            $firstMembers[$key] = array_merge($firstMembers[$key], $array);
        }

        session(['MIX_GET_ENV' => env('MIX_GET_ENV')]);

        return view('tables',['members'=>$firstMembers, 'headers' => $headers]);
    }

    public function search(Request $request) {
        $searchTerm = $request->input('searchTerm');

        $firstTwoCharacters = substr($searchTerm, 0, 2);
        if ($firstTwoCharacters == "FS") {
            $searchTerm = substr($searchTerm, 2);
        }

        $headers = Sensor::getTableHeaders();
        $members = Sensor::getSearchData($request->input('selectedField'), $searchTerm)->toArray();

        foreach ($members as $key => $sensor) {
            $array = [];

            foreach ($sensor as $index => $value) {
                if (is_array($value)) {
                    unset($value['id']);
                    unset($value['created_at']);
                    unset($value['updated_at']);
                    unset($value['sensor_id']);

                    $array = array_merge($array, $value);
                    unset($members[$key][$index]);
                }
            }

            $members[$key] = array_merge($members[$key], $array);
        }

        return response()->json([
            'members' => $members,
            'headers' => $headers,
        ]);
    }


    public function exportCSVByID(Request $request)
    {
        $fileName = 'sensors_'.date('Y_m_d_H_i_s').'.csv';

        $members = [];

        if ($request->input('id') && $request->input('device_type')) {
            if(strpos($request->input('device_type'), 'Mevo 2') !== false){
                $members = Sensor::query()->with(['presets','production_info','eth0_network_configuration','wifi_network_configuration','pi_info','pi_camera_configuration','avr_info','dsp_parameters','camera_parameters','cam_mode_1','cam_mode_2','tilt_parameters','if_parameters','user'])
                                ->where('id', '=', $request->input('id'))
                                ->get()->toArray();

                $columns = Sensor::getMevo2TableHeaders();
            } elseif(strpos($request->input('device_type'), 'X3') !== false){
                $members = Sensor::query()->with(['presets','production_info','eth0_network_configuration','wifi_network_configuration','avr_info','dsp_parameters','camera_parameters','cam_mode_1','cam_mode_2','tilt_parameters','if_parameters','user','dsp_tilt_calobration','bank','avr_tilt_calobration','tilt_thermal_calibration','power_information','wireless_avr','rf_beam_panel','production_info_strings'])
                                ->where('id', '=', $request->input('id'))
                                ->get()->toArray();
                
                $columns = Sensor::getX3TableHeaders();
            }

            foreach ($members as $key => $sensor) {
                $array = [];

                foreach ($sensor as $index => $value) {
                    if (is_array($sensor[$index])) {
                        unset($sensor[$index]['id']);
                        unset($sensor[$index]['created_at']);
                        unset($sensor[$index]['updated_at']);
                        unset($sensor[$index]['sensor_id']);
                        $array = array_merge($array, $value);
                        unset($members[$key][$index]);
                        
                    }
                }

                $members[$key] = array_merge($members[$key], $array);
            }
        }

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        // $columns = Sensor::getAllTableHeaders();
        // Log::debug($request->all());

        $callback = function() use($members, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($members as $member) {
                $row = [];
                foreach ($columns as $key => $value) {
                    $row[] = $member[$value];
                }
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportCSV(Request $request)
    {

        $fileName = 'sensors_'.date('Y_m_d_H_i_s').'.csv';

        $members = [];
        if ($request->input('searchTerm') && $request->input('selectedField')) {

            $firstTwoCharacters = substr($request->input('searchTerm'), 0, 2);
            if ($firstTwoCharacters == "FS") {
                $searchTerm = substr($request->input('searchTerm'), 2);
            } else {
                $searchTerm = $request->input('searchTerm');
            }
            // $members = Sensor::where($request->input('selectedField'), 'like', '%' . $request->input('searchTerm') . '%')->get();

            // Sensor::where($request->input('selectedField'), 'like', '%' . $request->input('searchTerm') . '%')->chunkById(1000, function ($datas) use (&$members) {
            //     foreach ($datas as $data) {
            //         $members[] = $data->toArray();
            //     }
            // });

            $members = Sensor::getSearchData($request->input('selectedField'),$searchTerm)->toArray();

            foreach ($members as $key => $sensor) {
                $array = [];

                foreach ($sensor as $index => $value) {
                    if (is_array($sensor[$index])) {
                        unset($sensor[$index]['id']);
                        unset($sensor[$index]['created_at']);
                        unset($sensor[$index]['updated_at']);
                        unset($sensor[$index]['sensor_id']);
                        $array = array_merge($array, $value);
                        unset($members[$key][$index]);
                        
                    }
                }

                $members[$key] = array_merge($members[$key], $array);
            }
        }

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = Sensor::getAllTableHeaders();

        $callback = function() use($members, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($members as $member) {
                $row = [];
                foreach ($columns as $key => $value) {
                    if (!array_key_exists($value, $member)) {
                        $row[] = '';
                    } else {
                        $row[] = $member[$value];
                    }
                }
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
