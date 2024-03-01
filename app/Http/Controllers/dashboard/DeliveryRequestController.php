<?php

namespace App\Http\Controllers\dashboard;

class DeliveryRequestController extends \App\Http\Controllers\Controller{

    public function index(\Illuminate\Http\Request $request){


        $deliveryRequests =  \App\Models\Admin\DeliveryRequest::all();

        return view('admin.delivery-requests.index',['delivery_requests' => $deliveryRequests]);

    }
}
