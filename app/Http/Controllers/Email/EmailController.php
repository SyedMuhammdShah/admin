<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\Admin\DeliveryRegion;
use App\Models\Admin\DeliveryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteDetailsEmail;
class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {

        $collection_address = $request->input('location');
        $delivery_address = $request->input('delivery_address');
        $vehicle = $request->input('vehicle');
        $fuel_rate = $request->input('fuel_rate');
        $weight = $request->input('weight');
        $deliveryRegionCost = $request->input('deliveryRegionCost');
        $one_off_fee = $request->input('one_off_fee');
        $distance = $request->get('total_distance');
        $regionName  = $request->get('region_name');
        $fuelName    = $request->get('fuel_name');
        $vehicleName = $request->get('vehicle_name');
        $no_of_items = $request->get('no_of_items');

        $emailMessage = "

            <p><strong>Collection Address:</strong> $collection_address</p>
            <p><strong>Delivery Address:</strong> $delivery_address</p>
            <p><strong>Vehicle:</strong> $vehicle</p>
            <p><strong>Fuel Rate:</strong> $fuel_rate</p>
            <p><strong>Weight:</strong> $weight</p>
            <p><strong>Delivery Region Cost:</strong> $deliveryRegionCost</p>
            <p><strong>One-off Fee:</strong> $one_off_fee</p>
            <br>
            <hr>
            <p><strong>Company Name:</strong> UEFARUK LTD.INTe</p>
            <p><strong>Company Address:</strong> 17 Oakfield Gardens, Edmonton, London, N18 1PR,UK</p>
            <p><strong>Contact Number:</strong> 07459 969255</p>
            <br>
        ";


        try {

            DeliveryRequest::create([
                 "collection_address" => $collection_address,
                 "delivery_address" => $delivery_address,
                 "one_off_fee" => $one_off_fee,
                 "total_miles" => $distance,
                 "delivery_region" => $regionName,
                 "vehicle" => $vehicleName,
                 "fuel" => $fuelName,
                 "delivery_weight" => $weight,
                 "no_of_items" => $no_of_items,
            ]);

            // Send email
//            Mail::to('uefaruk@gmail.com')->send(new QuoteDetailsEmail($emailMessage));

//            return response()->json(['success' => true, "message" => 'Email sent successfully']);

        } catch (\Exception $e) {

//            dd($e->getMessage());
            return response()->json(['error' => true, "message" => "Server error"], 500);
        }

    }
}
