<?php

use App\Models\Employee;
use App\Models\Employer;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;


//test 
function parent_cat_name_find($cat_id){
   $parent_cat_name =  DB::table('categories')
             ->where('id',  $cat_id)
             ->first();
   return $parent_cat_name;
}

// cron job
function notify_user(){
   $expire_stamp = date('Y-m-d H:i:s', strtotime("+5 min"));
   $now_stamp    = date("Y-m-d H:i:s");
    $datas =  DB::table('users')
             ->join('notes','notes.emp_uid','users.id')
             ->where('notes.remind_me' ,'<', $now_stamp)  
             ->where('users.last_seen' ,'<', $expire_stamp)
             ->whereIn('users.type',  [3,2])
             ->get();
   foreach( $datas as $data){
      $matchThese = ['system_id'=>$data->note_id];

      Notification::updateOrCreate($matchThese,['system_id'=>$data->note_id, 'note'=>$data->note, 'reminder'=>$data->remind_me]);
   }

   return ;
}


// emp count
function employer_count(){
   $employer_count = Employer::count();
   return $employer_count;
}

// empee count
function employee_count(){
   $employee_count = Employee::count();
   return $employee_count;
}

// emp dash count
function employer_count_dash($id){
   $mployer_count_dash = Employer::where('employer_uid',$id)->count();
   return $mployer_count_dash;
}

// empee dash count
function employee_count_dash($id){
   $employee_count_dash = Employee::where('employee_uid',$id)->count();
   return $employee_count_dash;
}




// notification 

function notificatio_read(){
   $notification = Notification::where('status',0)->get();
   return $notification;
}

function notificatio_read_emp($id){
   $notification = Notification::where(['emp_uid' => $id,'status' => 0])->get();
   return $notification;
}

function userDetails()
    {
       //$ip = '2402:4000:21c1:62d6:784d:1695:3aa4:1671'; //For static IP address get
        $ip = request()->ip(); //Dynamic IP address get
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
 
 function getUserContact($note_id,$emp_uid){
   $data = DB::table('contacts')
           ->where('unq_id', '=', $note_id)
           ->where('emp_uid', '=', $emp_uid)
           ->orderBy('created_at','desc')
           ->first();
    return $data;       
} 
function getUserNotesAll($note_id,$emp_uid){
   $data = DB::table('notes')
           ->where('note_id', '=', $note_id)
           ->where('emp_uid', '=', $emp_uid)
           ->orderBy('created_at','asc')
           ->get();
    return $data;       
} 

function getUserContactAll($note_id,$emp_uid){
   $data = DB::table('contacts')
           ->where('unq_id', '=', $note_id)
           ->where('emp_uid', '=', $emp_uid)
           ->orderBy('created_at','asc')
           ->get();
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