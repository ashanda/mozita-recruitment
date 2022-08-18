<?php


use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

function userDetails()
    {
       $ip = '2402:4000:21c1:62d6:784d:1695:3aa4:1671'; //For static IP address get
        //$ip = request()->ip(); //Dynamic IP address get
        $data = Location::get($ip);
        
        return $data;
    }

?>    