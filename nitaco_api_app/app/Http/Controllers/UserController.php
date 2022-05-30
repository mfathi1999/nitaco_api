<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //request validation
        // $fields =  $request->validate([
        //     'first_name' => 'required',
        //     'family_name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'living_city' => 'required',
            
        // ]);

        // //get location cordinate
        // $api_URL = "https://api.mapbox.com/geocoding/v5/mapbox.places/{$fields['living_city']}.json";
        // $access_token = "access_token=pk.eyJ1IjoibWZhdGhpMTk5OSIsImEiOiJjbDNyNnF6dWQwZG5pM2Rua2tmOGFteHIwIn0.YKSiOkax4qqt2DQ3Uz_w9A";


        // $response = Http::get("{$api_URL}?{$access_token}");

        // // try except for unkown places
        // $longitude = $response['features'][0]["center"][0];
        // $latitude = $response['features'][0]["center"][1];

        
        
        // save the request
        $new_User = New User;



        $new_User->first_name = $fields['first_name'];
        $new_User->family_name = $fields['family_name'];
        $new_User->email = $fields['email'];
        $new_User->password = $fields['password'];
        $new_User->longitude_of_living_city = $longitude; 
        $new_User->latitude_of_living_city =  $latitude;

        $new_User->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
