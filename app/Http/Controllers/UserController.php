<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
->with('success','Company Has Been updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function destroy(User $company)
{
$company->delete();
return redirect()->route('user.index')
->with('success','Company has been deleted successfully');
}
}
