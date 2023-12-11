<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CalibrationsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['cors', 'json.response']], function () {
    // Checkout Logs
    Route::get('/sensors/{ID}', [SensorController::class, 'show']);
    Route::get('/sensor/{sensorSerialNumber}/{date}', [SensorController::class, 'showBySerialNumber']);
    Route::get('/sensorLatest/{sensorSerialNumber}', [SensorController::class, 'showLatestLogBySerialNumber']);
    Route::get('/sensorAllData/{sensorSerialNumber}', [SensorController::class, 'showAllBySerialNumber']);

    // Calibration Logs
    Route::get('/calibration/{ID}', [CalibrationsController::class, 'show']);
    Route::get('/calibration/{sensorSerialNumber}/{date}', [CalibrationsController::class, 'showLatestLogBySerialNumber']);
    Route::get('/calibrationLatest/{sensorSerialNumber}', [CalibrationsController::class, 'showLatestLogBySerialNumber']);
    Route::get('/calibrationAllData/{sensorSerialNumber}', [CalibrationsController::class, 'showAllBySerialNumber']);
    
});

Route::middleware('auth:api')->group(function () {
    // Checkout Logs
    Route::post('/sensors', [SensorController::class, 'store']);
    Route::put('/sensors/{sensor}', [SensorController::class, 'update']);
    Route::delete('/sensors/{sensor}', [SensorController::class, 'delete']);

    // Calibration Logs
    Route::post('/calibrations', [CalibrationsController::class, 'store']);
});

