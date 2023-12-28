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
        DB::table('users')->insert([
            'username'=> 'admin',
            'email'=> 'admin@gmail.com',
            'password'=> Hash::make('admin'),
            'role'=> '1'
        ]);
        
        DB::table('users')->insert([
            'username'=> 'editor',
            'email'=> 'editor@gmail.com',
            'password'=> Hash::make('admin'),
            'role'=> '2'
        ]);

        DB::table('users')->insert([
            'username'=> 'dist',
            'email'=> 'dist@gmail.com',
            'password'=> Hash::make('admin'),
            'role'=> '3'
        ]);
    }
}
