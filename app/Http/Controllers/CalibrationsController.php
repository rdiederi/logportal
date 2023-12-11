<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calibrations;
use App\Http\Controllers\Controller;
use Log;

class CalibrationsController extends Controller
{
    public function show($id)
    {
        return Calibrations::where('id', '=', $id)->first();
    }

    public function showAllBySerialNumber($id)
    {
        return Calibrations::query()
                            ->where('System', 'like', '%' . $id . '%')
                            ->get()
                            ->toArray();
    }

    public function showLatestLogBySerialNumber($serialNumber){
        return Calibrations::query()
                            ->where('System', 'like', $serialNumber)
                            ->orderBy('created_at', 'desc')
                            ->limit(1)
                            ->get()
                            ->toArray();
    }

    public function store(Request $request){
        // Validate the incoming data if needed
        $validatedData = $request->validate([
            'Date' => 'required',
            'System' => 'required',
            'Batch_No' => 'nullable',
            'RF_Version' => 'required',
            'RF_Serial_No' => 'required',
            'Dist_Calib' => 'nullable',
            'Sim_Calib_No' => 'nullable',
            'Noise_Main' => 'nullable',
            'Noise_Azim' => 'nullable',
            'Noise_Elev' => 'nullable',
            'Noise_Spin' => 'nullable',
            'Signal_Main' => 'nullable',
            'Signal_Azim' => 'nullable',
            'Signal_Elev' => 'nullable',
            'Signal_Spin' => 'nullable',
            'SNR_Main' => 'nullable',
            'SNR_Azim' => 'nullable',
            'SNR_Elev' => 'nullable',
            'SNR_Spin' => 'nullable',
            'PuttSignal_Main' => 'nullable',
            'PuttSignal_Azim' => 'nullable',
            'PuttSignal_Elev' => 'nullable',
            'PuttSignal_Spin' => 'nullable',
            'SignalDelta_Main' => 'nullable',
            'SignalDelta_Azim' => 'nullable',
            'SignalDelta_Elev' => 'nullable',
            'SignalDelta_Spin' => 'nullable',
        ]);

        // Create a new instance of your model
        $calibration = Calibrations::create($validatedData);

        $calibration->user_id = $request->user()->id;

        if ($calibration->save()){
            return response(["message" => "Data added successfully"], 200);
        } else {
            return response(["message" => "Something Went Wrong"], 404);
        }
    }

    public function index() {
        $headers = Calibrations::getTableHeaders();
        $firstMembers = Calibrations::getFirstMembers();

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

        $headers = Calibrations::getTableHeaders();
        $members = Calibrations::getSearchData($request->input('selectedField'), $searchTerm);

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

        if ($request->input('id')) {
            $members = Calibrations::query()
                                    ->where('id', '=', $request->input('id'))
                                    ->get()
                                    ->toArray();

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

        $columns = Calibrations::getAllTableHeaders();

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
            $members = Calibrations::getSearchData($request->input('selectedField'),$request->input('searchTerm'));

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

        $columns = Calibrations::getAllTableHeaders();

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
