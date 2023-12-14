<?php

namespace App\Http\Controllers;

use App\profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = profile::all();
        return view("profile.edit-profile",[
            "profiles"=>$profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("profile.edit-profile");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasiData = validator($request->all(),[
            "nama"     =>"string|max:255",  
            "alamat"  => "string",  
            "no_telepon"=>"integer",  
        ])->validate();
        $profile = new profile($validasiData);
        $profile->save();
        return redirect(route("Profile"));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $profile)
    {
        dd($profile);
        return view("profile.edit-profile",[
            "profile"=>$profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profile $profile)
    {
        $validasiData = validator($request->all(),[
            "nama"     =>"string|max:255",  
            "alamat"  => "string",  
            "nomor_telepon"=>"integer",  
            ])->validate();
        dd($validasiData);
        $profile->nama=$validasiData["nama"];
        $profile->alamat=$validasiData["alamat"];
        $profile->nomor_telepon=$validasiData["nomor_telepon"];
        $profile->save();
        return redirect(route("Profile"));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $profile)
    {
        //
    }
}
