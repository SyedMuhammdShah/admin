<?php

namespace App\Http\Controllers;

use App\Models\Admin\fuelmodel;
use Illuminate\Http\Request;
use App\Models\Admin\vehiclemodel;

class HomeController extends Controller
{
    public function home()
    {

        $vehicleCount = vehiclemodel::count();
        $fuelCount = fuelmodel::count();
        return view('dashboard', compact('vehicleCount'), compact('fuelCount'));
    }
}
