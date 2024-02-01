<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username'=> 'admin',
                'email'=> 'admin@gmail.com',
                'password'=> Hash::make('admin'),
                'role'=> '1',
                'is_active'=> '1'
            ],[
                'username'=> 'editor',
                'email'=> 'editor@gmail.com',
                'password'=> Hash::make('admin'),
                'role'=> '2'
            ],[
                'username'=> 'dist',
                'email'=> 'dist@gmail.com',
                'password'=> Hash::make('admin'),
                'role'=> '3'
            ]

        ];
        
        DB::table('users')->insert($users);
    }
}
