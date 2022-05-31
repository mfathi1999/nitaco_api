<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;    
use Illuminate\Support\Facades\Hash;

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
    public function store($fields)
    {
        
        // save the request
        $new_User = New User;



        $new_User->first_name = $fields['first_name'];
        $new_User->family_name = $fields['family_name'];
        $new_User->email = $fields['email'];
        $new_User->password = bcrypt($fields['password']);
        $new_User->longitude_of_living_city = $fields['longitude_of_living_city']; 
        $new_User->latitude_of_living_city =  $fields['latitude_of_living_city'];

        $new_User->save();

        return $new_User;

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
     * show_with_email
     *
     * @param  string $email
     * @return void
     */
    public function show_with_email($email){
        $found_email = User::where('email',$email)->first();

        return $found_email;
        
    }

    public function check_password($id , $password){
        $found_user = User::where('id',$id)->first();
        // return Hash::check($password, $found_user->password);
        if(!$found_user || !Hash::check($password, $found_user->password)){
            return 0;
        }

        return 1;
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
