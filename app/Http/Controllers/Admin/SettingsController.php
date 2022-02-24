<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('backend.settings_managment.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting=setting::where('id',1)->first();
        return view('backend.settings_managment.create',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tax' => 'required',
            // 'facebook' => 'required',
            // 'youtube' => 'required',
            // 'twitter' => 'required',
            'phone' => 'required',
            'description' => 'required'
        ]);
        $setting = Setting::where('id',1)->first();
        if($setting){
            $setting->tax =$request->tax;
            $setting->facebook= $request->facebook;
            $setting->youtube= $request->youtube;
            $setting->twitter= $request->twitter;
            $setting->phone= $request->phone;
            $setting->description= $request->description;
            $setting->save();
            $settings = Setting::all();
            return view('backend.settings_managment.create',compact('setting'));
        }else{
            $setting = new Setting;
            $setting->tax =$request->tax;
            $setting->facebook= $request->facebook;
            $setting->youtube= $request->youtube;
            $setting->twitter= $request->twitter;
            $setting->phone= $request->phone;
            $setting->description= $request->description;
            $setting->save();
            $settings = Setting::all();
            return view('backend.settings_managment.create',compact('setting'));
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
