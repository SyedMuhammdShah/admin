<?php

namespace App\Http\Controllers\Web_pages;

use App\Http\Controllers\Controller;
use App\Models\Calculate_Delivery_Cost_Model;
use Illuminate\Http\Request;

class Calculate_Delivery_Cost extends Controller
{
    public function DeliveryCalculation(Request $request)
    {
    //dd($request);
        // Validate the incoming request data
    $validatedData = $request->validate([
        'location' => 'required|string|max:255',
        'delivery_address' => 'required|string|max:255',
        //'distance-result' => 'numeric|string|max:255',
        'vehicle' => 'required|string|max:255',
        'fuel_rate' => 'required|numeric',
        'deliveryRegionCost' => 'required|numeric',
        //'totalCal' => 'numeric',
    ]);
        //dump($validatedData);
        // Create a new instance of your model and fill it with validated data
        $deliveryCost = new Calculate_Delivery_Cost_Model();
        $deliveryCost->collection_addr = $validatedData['location'];
        $deliveryCost->delivery_addr = $validatedData['delivery_address'];
        //$deliveryCost->total_distance = $validatedData['distance-result'];
        $deliveryCost->vehicle_name = $validatedData['vehicle'];
        $deliveryCost->fuel_rate = $validatedData['fuel_rate'];
        $deliveryCost->delivery_region_cost = $validatedData['deliveryRegionCost'];
       // $deliveryCost->total_cost = $validatedData['totalCal'];

        // Save the data to the database
        $deliveryCost->save();

        // Return a response indicating success
        return response()->json(['message' => 'Data saved successfully'], 200);
    }
}