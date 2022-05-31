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
        'first_name' => 'required|string',
        'family_name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string',
        'living_city' => 'required|string',
    ];

    public function login_with_email(){

    }

    public function register_with_email(Request $request){

        // validation request
        $fields = $request->validate($this->register_validate_condition);
        
            
        
        // get location
        $location = new locationController;
        $cordinate = $location->get_longitude_latitude($fields['living_city']);
        
        
        
        // try except for unkown places
        $longitude = $cordinate['longitude'];
        $latitude =  $cordinate['latitude'];
        
        // return gettype($longitude);
        $fields['longitude_of_living_city'] = $longitude;
        $fields['latitude_of_living_city'] = $latitude;
        

        // save

        // userController instance
        $user_candidate =  new UserController;
        $user_created = $user_candidate->store($fields);

        // user instance
        $token = $user_created->createToken('myapptoken')->plainTextToken;

        $response =[
            'user' => $user_created,
            'token' => $token
        ];
        // make response
        return $response;
    }
}
