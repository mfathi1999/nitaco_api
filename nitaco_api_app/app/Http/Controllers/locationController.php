<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class locationController extends Controller
{
    //

    protected $api_URL="https://api.mapbox.com/geocoding/v5/mapbox.places/";
    protected $access_token="access_token=pk.eyJ1IjoibWZhdGhpMTk5OSIsImEiOiJjbDNyNnF6dWQwZG5pM2Rua2tmOGFteHIwIn0.YKSiOkax4qqt2DQ3Uz_w9A";


    public function forward_geocoding($search_text){

        $response = Http::get("{$api_URL}{$search_text}?{$access_token}");

        return $response;

    }

    public function reverse_geocoding(){

    }

    public function get_longitude_latitude($search_text){
        $response = $this->forward_geocoding($search_text);

        $longitude = $response['features'][0]["center"][0];
        $latitude = $response['features'][0]["center"][1];

        return [
            'longitude' => $longitude ,
            'latitude' => $latitude
        ];

    }
}
