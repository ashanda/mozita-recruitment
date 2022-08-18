<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Roles = ['2', '3',];
         $data['user'] = User::whereIn('type',$Roles )
         ->orderBy('id','desc')
         ->paginate(5);
         return view('partials.admin.user.index',$data);
    }
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('partials.admin.user.create');
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
'name' => 'required',
'email' => 'required',
'password' => 'required',
'type'=>'required',

]);

$user = new User;
$user->name = $request->name;
$user->email = $request->email;
$user->password = Hash::make($request->password);
$user->type = $request->type;
$user->save();

Alert::success('Success', 'user has been created successfully');
return redirect()->route('user.index')
->with('success','Company has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function show(User $company)
{
return view('companies.show',compact('company'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function edit(User $user)
{

return view('partials.admin.user.edit',compact('user'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
'name' => 'required',
'email' => 'required',
'password' => 'required',
'type'=>'required',

]);
$user = User::find($id);
$user->name = $request->name;
$user->email = $request->email;
$user->password = $request->password;
$user->type = $request->type;
$user->save();
return redirect()->route('user.index')
->with('success','user has been updated successfully');
}

public function userOnlineStatus()
    {
        $users = User::all();
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
            else
                echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }
    }

/**
* Remove the specified resource from storage.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function destroy(User $company,$id)
{
    $data = DB::table('users')->where('id', $id)->delete();
    Alert::success('Success', 'User has been deleted successfully');
    return redirect()->route('user.index');
}
}
