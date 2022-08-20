<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::where('id',1)->first();
        return view('partials.admin.setting.create',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partials.admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
           $setting = new Setting;
           $setting->app_name = $request->app_name;
           $setting->app_email = $request->app_email;
           

           if($request->file('app_logo')){
            $file= $request->file('app_logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/upload/setting'), $filename);
            $setting->app_logo = $filename;
          }

          if($request->file('app_logo_mobile')){
            $file= $request->file('app_logo_mobile');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/upload/setting'), $filename);
            $setting->app_logo_mobile = $filename;
          }
          if($request->file('app_favicon')){
            $file= $request->file('app_favicon');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/upload/attachment'), $filename);
            $setting->app_favicon = $filename;
          }
    
           $setting->save();
           Alert::success('Success', 'settings Added Successfully');
           return view('partials.admin.settings.index');
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
    public function update(Request $request)
    {
        $setting = Setting::find(1);
        $setting->app_name = $request->app_name;
        $setting->app_email = $request->app_email;

           if($request->file('app_logo')){
            $file= $request->file('app_logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/upload/setting'), $filename);
            $setting->app_logo = $filename;
          }

          if($request->file('app_logo_mobile')){
            $file= $request->file('app_logo_mobile');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/upload/setting'), $filename);
            $setting->app_logo_mobile = $filename;
          }
          if($request->file('app_favicon')){
            $file= $request->file('app_favicon');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/upload/attachment'), $filename);
            $setting->app_favicon = $filename;
          }
          if ($setting->save() ) {
            Alert::success('Success', 'Settings update successfully');
            return redirect()->route('settings.index');   
        }
           
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
