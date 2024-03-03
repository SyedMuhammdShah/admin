<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Vehicle;


class VehicleController extends Controller
{
    public function ViewPage(){
        return view('dashboard.vehicles_page');
      }


      public function Vehicles_store(Request $request)  {
       // Validate incoming request
       $validatedData = $request->validate([
        'vehicle_name' => 'required|string|max:255',
        'vehicle_mileage' => 'required|string|max:255',
    ]);

    try {

        $fuel = new Vehicle();


        $fuel->vehicle_name = $validatedData['vehicle_name'];
        $fuel->vehicle_mileage = $validatedData['vehicle_mileage'];

        $fuel->save();

        session()->flash('success','Vehicle added successfully.');

        return redirect('vehicles-screen');

    } catch (\Exception $e) {

        return response()->json(['error' => 'Failed to add fuel'], 500);
    }

      }
      public function GetVehicleData()
      {

          $VehicleData = Vehicle::all();


          return response()->json(['VehicleData' => $VehicleData]);
      }

      public function destroy($id)
      {
          $fuel = Vehicle::findOrFail($id);
          $fuel->delete();

          return response()->json(['message' => 'Fuel record deleted successfully']);
      }

}
