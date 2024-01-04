<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_role_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insert([
            'id'=> '1',
            'role'=> 'admin'
        ]);
        DB::table('user_roles')->insert([
            'id'=> '2',
            'role'=> 'editor'
        ]);
        DB::table('user_roles')->insert([
            'id'=> '3',
            'role'=> 'distributor'
        ]);
    }
}
