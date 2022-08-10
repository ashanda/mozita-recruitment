<?php


use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

function userDetails()
    {
       $ip = '49.35.41.195'; //For static IP address get
        //$ip = request()->ip(); //Dynamic IP address get
        $data = Location::get($ip);
        
        return $data;
    }

?>    