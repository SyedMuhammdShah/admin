<?php

namespace App\Http\Controllers;

use App\Models\Admin\Fuel;
use Illuminate\Http\Request;
use App\Models\Admin\Vehicle;

class HomeController extends Controller
{
    public function home()
    {

        $vehicleCount = Vehicle::count();
        $fuelCount = Fuel::count();
        return view('dashboard', compact('vehicleCount'), compact('fuelCount'));
    }
}
