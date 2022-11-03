<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Admin User In Run Project
        User::create(['name'=>'Saeed Azaryan','email'=>'msdosmsdoos1@gmail.com','password'=>bcrypt('admin'),'role'=>0]);
        User::create(['name'=>'Hassan Moradi','email'=>'moradi@gmail.com','password'=>bcrypt('seller'),'role'=>1]);
    }
}
