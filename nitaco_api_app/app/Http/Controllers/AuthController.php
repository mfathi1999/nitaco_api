<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\locationController;

class AuthController extends Controller
{
    //

    // protected login_validate_condition = [

    // ];
    protected $register_validate_condition = [
        'first_name' => 'required',
        'family_name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'living_city' => 'required',
    ];

    public function login_with_email(){

    }

    public function register_with_email(Request $request){

        // validation request
        // $fields = $request->validate($register_validate_condition);
        $fields = $request->validate([
            'first_name' => 'required',
            'family_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'living_city' => 'required',]);

        
            
        return $fields;
        return gettype($fields);
        
        // get location
        $location = new locationController;
        $location->get_longitude_latitude($fields['living_city']);
        
        
        
        // try except for unkown places
        $longitude = $location['longitude'];
        $latitude = $location['latitude'];
        
        $fields['longitude_of_living_city'] = $longitude;
        $fields['latitude_of_living_city'] = $latitude;


        // array_push($fields,'longitude_of_living_city'=>$longitude,'latitude_of_living_city'=>$latitude);
        

        // save

        // userController instance
        $user_candidate =  new UserController;
        $user_candidate->store();

        // user instance


        // make response

    }
}
