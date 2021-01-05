<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('admins')->delete();
       $adminRecords = [
          
        ['name' => Str::random(10),
        'type' => 'admin',
        'mobile' => '7457356733',
        'email' => Str::random(10).'@gmail.com',
        'password' => Hash::make('password'),
        'image' =>'',
        'status'=>1],
        ['name' => Str::random(10),
        'type' => 'subadmin',
        'mobile' => '5733755493',
        'email' => Str::random(10).'@gmail.com',
        'password' => Hash::make('password'),
        'image' =>'',
        'status'=>1],
        ['name' => Str::random(10),
        'type' => 'subadmin',
        'mobile' => '7956852015',
        'email' => Str::random(10).'@gmail.com',
        'password' => Hash::make('password'),
        'image' =>'',
        'status'=>1],
        ['name' => 'Gagan',
        'type' => 'admin',
        'mobile' => '9800000094',
        'email' => 'gagan@gmail.com',
        'password' => Hash::make('password'),
        'image' =>'',
        'status'=>1],
        ['name' => 'hero',
        'type' => 'admin',
        'mobile' => '9800026094',
        'email' => 'hero@gmail.com',
        'password' =>'bhakkmuji',
        'image' =>'',
        'status'=>1],
       ];
       DB::table('admins')->insert($adminRecords);
    }
}
