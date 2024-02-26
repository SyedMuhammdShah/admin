<?php

namespace App\Http\Controllers\Google_Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GoogleMapsController extends Controller
{
    public function getCityName(Request $request)
    {
        $apiKey = 'YOUR_GOOGLE_MAPS_API_KEY';
        $lat = $request->input('lat');
        $lng = $request->input('lng');

        $client = new Client();
        $response = $client->get("https://maps.googleapis.com/maps/api/geocode/json?latlng={$lat},{$lng}&key={$apiKey}");
        $data = json_decode($response->getBody(), true);

        $city = null;
        foreach ($data['results'] as $result) {
            foreach ($result['address_components'] as $component) {
                if (in_array('locality', $component['types'])) {
                    $city = $component['long_name'];
                    break 2;
                }
            }
        }

        return response()->json(['city' => $city]);
    }
}
