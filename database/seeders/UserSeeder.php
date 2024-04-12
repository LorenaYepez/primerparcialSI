<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([ 
            [
                'name'=> 'lorena',
                "apellido"=> "ponce",
                "email"=> "lorena1@gmail.com",
                'role'=> "admin",  
                "password"=> bcrypt("12345678"),
                'status'=> "active",  
            ],
            [
                "name"=> "luzia",
                "apellido"=> "ponce",
                "email"=> "luziaponce@gmail.com",
                'role'=> "vendor",  
                "password"=> bcrypt("12345678"),
                'status'=> "active",  
            ],
            [
                "name"=> "rafael",
                "apellido"=> "Alvarez",
                "email"=> "rafael@gmail.com",
                'role'=> "user",  
                "password"=> bcrypt("12345678"),
                'status'=> "active",  
            ]
        ]);
    }
}
