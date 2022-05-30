<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        //request validation
        $fields =  $request->validate([
            'first_name' => 'required',
            'family_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'living_city' => 'required',
            
        ]);

        // save the request
        $new_User = New User;

        $new_User->first_name = $fields['first_name'];
        $new_User->family_name = $fields['family_name'];
        $new_User->email = $fields['email'];
        $new_User->password = $fields['password'];

        $new_User->save();





        // User::create([
        //     'first_name' => $fields['first_name'],
        //     'family_name' => $fields['family_name'],
        //     'email' => $fields['email'],
        //     'password' => $fields['password'],
        // ]);


        // User::create($request->all());
        // User::create([
        //     'first_name' => "javati",
        //     'family_name' => "nie",
        //     'email' => "kno3@gmail.com",
        //     'password' => "1234",
        // ]);

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
