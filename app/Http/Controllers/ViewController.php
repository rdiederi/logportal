<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
Use App\Models\Sensor;
Use Log;

class ViewController extends Controller
{
    public function show($serialNumber)
    {
        // return Response::make($tableContent, 200)->header('Content-Type', 'text/html');
        // return Sensor::allData()->where('id', '=', $id)->first();
        $headers = Sensor::getAllTableHeaders();
        $members = Sensor::getSearchData('S/N', $serialNumber)->toArray();

        if (empty($members)) {
            return Response::make("<h1>Log Not Found</h1>", 200)->header('Content-Type', 'text/html');
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

        $div = "<div>";
        foreach ($members as $key => $log){
            $tableContent = '<table border="1">';
            $tableContent .= '<tr>
                                <th>Field</th>
                                <th>Value</th>
                             </tr>';
    
            foreach ($headers as $key => $value) {
                if (!array_key_exists($value, $log)) {
                    continue;
                }
                $tableContent .= "<tr>
                                    <th>{$value}</th>
                                    <th>{$log[$value]}</th>
                                  </tr>";
            }
    
            $tableContent .= '</table>';
            $div .= $tableContent;
        }
        $div .= '</div>';
        

        return Response::make($div, 200)->header('Content-Type', 'text/html');
    }
}
