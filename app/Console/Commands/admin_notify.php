<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;

class admin_notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'every 1 min update cron job in notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
     
           Notification::updateOrCreate($matchThese,['emp_uid'=>$data->emp_uid,'system_id'=>$data->note_id, 'note'=>$data->note, 'reminder'=>$data->remind_me]);
        }
    }
}
