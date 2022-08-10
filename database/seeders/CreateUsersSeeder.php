<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Super Admin',
               'email'=>'admin@mozita.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Employer',
               'email'=>'employer@mozita.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Employee',
               'email'=>'employee@mozita.com',
               'type'=>3,
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'None',
                'email'=>'none@mozita.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}