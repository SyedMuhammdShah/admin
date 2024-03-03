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

        $collectionAddress = $request->get('collection_address');
        $deliveryAddress   = $request->get('delivery_address');
        $vehicle           = $request->get('vehicle_name');
        $fuel              = $request->get('fuel');
        $weight            = $request->get('weight');
        $deliveryRegion    = $request->get('delivery_region');
        $oneOfFee          = $request->get('one_off_fee');
        $distance          = $request->get('distance');
        $regionName        = $request->get('delivery_region');
        $fuelName          = $request->get('fuel');
        $vehicleName       = $request->get('vehicle_name');
        $noOfItems         = $request->get('number_of_items');
        $customerName      = $request->get('customer_name');
        $customerEmail     = $request->get('customer_phone');
        $customerPhone     = $request->get('customer_email');


        $emailMessage = "
            <p><strong>Collection Address:</strong> $collectionAddress</p>
            <p><strong>Delivery Address:</strong> $deliveryAddress</p>
            <p><strong>Vehicle:</strong> $vehicle</p>
            <p><strong>Fuel Rate:</strong> $fuel</p>
            <p><strong>Weight:</strong> $weight</p>
            <p><strong>Delivery Region:</strong> $deliveryRegion</p>
            <p><strong>One-off Fee:</strong> $oneOfFee</p>
            <br>
            <hr>
            <p><strong>Company Name:</strong> UEFARUK LTD.INTe</p>
            <p><strong>Company Address:</strong> 17 Oakfield Gardens, Edmonton, London, N18 1PR,UK</p>
            <p><strong>Contact Number:</strong> 07459 969255</p>
            <br>
        ";

        try {

            DeliveryRequest::create([
                 "collection_address" => $collectionAddress,
                 "delivery_address"   => $deliveryAddress,
                 "one_off_fee"        => $oneOfFee,
                 "total_miles"        => $distance,
                 "delivery_region"    => $regionName,
                 "vehicle"            => $vehicleName,
                 "fuel"               => $fuelName,
                 "delivery_weight"    => $weight,
                 "no_of_items"        => $noOfItems,
                 "customer_name"      => $customerName,
                 "customer_phone"     => $customerEmail,
                 "customer_email"     => $customerPhone,
            ]);

            // Send email
//            Mail::to('uefaruk@gmail.com')->send(new QuoteDetailsEmail($emailMessage));

            return response()->json(['success' => true, "message" => 'Email sent successfully']);

        } catch (\Exception $e) {

//            dd($e->getMessage());
            return response()->json(['error' => true, "message" => "Server error"], 500);
        }

    }
}
