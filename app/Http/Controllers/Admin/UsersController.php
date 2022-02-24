<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Eloquent\Collection::links;
use App\Models\User;
use App\Models\UserInfo;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::paginate(4);
        // $users = User::all();
        return view('backend.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password == $request->password_confirmation){
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();
            $user_info = UserInfo::findOrFail($user->id);
            $user_info->phone = $request->phone;
            $user_info->country = $request->country;
            $user_info->city = $request->city;
            $user_info->address = $request->address;
            $user_info->save();
            // dd($user);
            $users = User::all();
            // dd($success);
            return redirect('/admin/users')->with('success','user created');
            // return view('backend.users.index',compact('users'));
            // return view('backend.users.index')->with('success','user created')->with('users',$users);
        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = User::findOrFail($id);
        $user_info = UserInfo::where('user_id',$id)->first();
        return view('backend.users.edit',compact('user','user_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);
        $user=User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        // $users = User::all();
        // return view('backend.users.index',compact('users','success','User Information Updated Successfully!'));
        return redirect('/admin/users')->with('success','User '.$user->name .' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        $user = User::findOrFail($id);
        $name = $user->name;
        $user->delete();
        $users = User::all();
        // return view('backend.users.index',compact('success','Item created successfully!','users'));
        return redirect('/admin/users')->with('success','User '.$name.' deleted');
    }
}
