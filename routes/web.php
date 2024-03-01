<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\dashboard\FuelController;
use App\Http\Controllers\dashboard\vehicleController;
use App\Http\Controllers\Email\EmailController;
use App\Http\Controllers\Google_Api\GoogleMapsController;
use App\Http\Controllers\Web_pages\WebHomeController;
use App\Http\Controllers\Web_pages\Calculate_Delivery_Cost;
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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [HomeController::class, 'home'])->name('dashboard');
	// Route::get('dashboard', function () {
	// 	return view('dashboard');
	// })->name('dashboard');


	/// Fuel Routes
	Route::get('fuel-screen', function () {
		return view('fuel-screen');
	})->name('fuel-screen');

	/// vehicles Routes
	Route::get('vehicles-screen', function () {	
		return view('vehicles-screen');
	})->name('vehicles-screen');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');


	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);

	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);


	Route::post('/add_fuel',[FuelController::class,'Fuel_store']);
	Route::get('/get_fuel',[FuelController::class,'getFuelData']);


	Route::post('/add_vehicles',[vehicleController::class,'Vehicles_store']);
	Route::get('/getVehicleData',[vehicleController::class,'GetVehicleData']);

    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

Route::get('/',[WebHomeController::class,'index']);
//Google API
Route::get('/get-city-name', [GoogleMapsController::class, 'getCityName']);
//Send Email
Route::post('/send-email', [EmailController::class, 'sendEmail']);
//Delete Fuel
Route::delete('/delete_fuel/{id}', [FuelController::class, 'destroy'])->name('fuel.delete');
Route::put('/update_fuel/{id}', [FuelController::class, 'update_fuel'])->name('update_fuel');
//Delete VehicleData
Route::delete('/delete_vehicle/{id}', [vehicleController::class, 'destroy'])->name('fuel.delete');
// Calculate Deliviry cost


Route::post('/calc_deli_cost',[Calculate_Delivery_Cost::class,'DeliveryCalculation']);