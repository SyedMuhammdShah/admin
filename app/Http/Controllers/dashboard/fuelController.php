<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dashboard\fuelmodel;
use App\Models\dashboard\vehiclesmodel;

class FuelController extends Controller
{
      public function Fuel_store(Request $request)
      {
        //dd($request);
          $validatedData = $request->validate([
              'fuel_name' => 'required|string|max:255',
              'fuel_price' => 'required|numeric',
              'fuel_unit' => 'required|string|in:Gallon,Liter',
          ]);
      
         
              $fuel = new fuelmodel();
              
              $fuel->fuel_name = $validatedData['fuel_name'];
              $fuel->fuel_price = $validatedData['fuel_price'];
              $fuel->fuel_unit = $validatedData['fuel_unit'];
             
              $fuel->save();
              return redirect('fuel-screen');
         
      }

      public function getFuelData()
      {
       
          $fuelData = fuelmodel::all();
  
          
          return response()->json(['fuelData' => $fuelData]);
      }
      public function destroy($id)
      {
          $fuel = fuelmodel::findOrFail($id);
          $fuel->delete();
  
          return response()->json(['message' => 'Fuel record deleted successfully']);
      }
      public function update_fuel(Request $request){
        $fuel = fuelmodel::findOrFail($request->edit_fuel_id);
        $fuel->update([
            'fuel_name' => $request->edit_fuel_name,
            'fuel_price' => $request->edit_fuel_price,
            'fuel_unit' => $request->edit_fuel_unit,
        ]);
    
        return redirect()->back()->with('success', 'Fuel updated successfully');
      }
}
