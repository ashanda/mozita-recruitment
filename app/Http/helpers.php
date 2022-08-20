<?php


use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function userDetails()
    {
       $ip = '2402:4000:21c1:62d6:784d:1695:3aa4:1671'; //For static IP address get
        //$ip = request()->ip(); //Dynamic IP address get
        $data = Location::get($ip);
        
        return $data;
    }

 function UniqueRandomNumbersWithinRange($min,$max) {
        $numbers = (time()+ rand($min,$max)); 
        return $numbers;
    }


 function getUserNotes($note_id,$emp_uid){
    $data = DB::table('notes')
            ->where('note_id', '=', $note_id)
            ->where('emp_uid', '=', $emp_uid)
            ->orderBy('created_at','desc')
            ->first();
     return $data;       
 }   

 function getParentcats($parent_catID){
    $data = DB::table('categories')
            ->where('id', '=', $parent_catID)
            ->first();
     return $data;       
 }

 function getSetting(){
    $settings = DB::table('settings')->first();
    return $settings;
 }

?>    