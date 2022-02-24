<?php

namespace App\Http\Controllers\Admin;
use App\Models\UserInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserInfoController extends Controller
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $request->validate([
            'city' => 'required',
            'country' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        if(!UserInfo::where('user_id',$request->id)->first()){
            $userinfo = new UserInfo;
            $userinfo->user_id = $request->id;
            $userinfo->city = $request->city;
            $userinfo->country = $request->country;
            $userinfo->address = $request->address;
            $userinfo->phone = $request->phone;
            $userinfo->save();
            return redirect()->route("users.index")->with('success', 'Updated');
        }else{
            $userinfo =  UserInfo::where('user_id',$request->id)->first();
            $userinfo->user_id = $request->id;
            $userinfo->city = $request->city;
            $userinfo->country = $request->country;
            $userinfo->address = $request->address;
            $userinfo->phone = $request->phone;
            $userinfo->save();
            return redirect()->route("users.index")->with('success', 'Updated');
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
