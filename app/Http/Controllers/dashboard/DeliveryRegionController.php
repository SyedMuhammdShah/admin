<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Admin\DeliveryRegion;
use Illuminate\Http\Request;

class DeliveryRegionController extends \App\Http\Controllers\Controller{


    public function index(Request $request){

        $regions = DeliveryRegion::all();

        return view('admin.delivery-regions.index',['delivery_regions' => $regions]);
    }

    public function store(Request $request){
        try {

            if(!is_numeric($request->get('one_off_fee'))){

                session()->flash('error', "One off fee must be an integer");
                return redirect()->back();
            }
       
            DeliveryRegion::create([
                'one_off_fee' => $request->get('one_off_fee'),
                'region' => $request->get('region'),
                'region_tax' => $request->get('region_tax'),
            ]);

            session()->flash('success', "Delivery Region added successfully.");

            return redirect()->back();

        } catch (\Exception $e){

            session()->flash('error', $e->getMessage());

            return redirect()->back();

        }
    }

    public function create(){

    }

    public function update(){

    }

    public function destroy(Request $request, $region){

        DeliveryRegion::find($region)->delete();

        session()->flash('success','Region deleted successfully.');

        return redirect()->back();

    }
}
