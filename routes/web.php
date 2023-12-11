<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeDashboardController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TableViewController;
use App\Http\Controllers\CalibrationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::fallback(function () {
    return redirect('/login');
});

Route::group(['middleware' => ['auth', 'log.failed.login']], function () {
	
	// Checkout Logs
    Route::get('/checkout_dashboard', [TableViewController::class, 'index'])->name('checkout_dashboard');

    Route::get('/checkout_dashboard/search', [TableViewController::class, 'search']);
    Route::get('/checkout_dashboard/filter', [TableViewController::class, 'filter']);

    Route::get('/checkout_export-csv', [TableViewController::class, 'exportCSV']);
    Route::get('/checkout_export-csv-id', [TableViewController::class, 'exportCSVByID']);

	// Calibration Logs
	Route::get('/calibration_dashboard', [CalibrationsController::class, 'index'])->name('calibration_dashboard');

    Route::get('/calibration_dashboard/search', [CalibrationsController::class, 'search']);
    Route::get('/calibration_dashboard/filter', [CalibrationsController::class, 'filter']);

    Route::get('/calibration_export-csv', [CalibrationsController::class, 'exportCSV']);
    Route::get('/calibration_export-csv-id', [CalibrationsController::class, 'exportCSVByID']);

	// User Management
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

	Route::get('/users', [UserController::class, 'index']);

    Route::get('/logout', [SessionsController::class, 'destroy']);
});

Route::post('/session', [SessionsController::class, 'store']);


Route::group(['middleware' => 'guest'], function () {
    // Route::get('/register', [RegisterController::class, 'create']);
    // Route::post('/register', [RegisterController::class, 'store']);
    // Route::get('/login', [SessionsController::class, 'create']);
	// Route::get('/login/forgot-password', [ResetController::class, 'create']);
	// Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	// Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	// Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');

Route::get('/', function () {
	if (Auth::check()) {
		return redirect('dashboard');
	} else {
		return redirect('login');
	}
});
