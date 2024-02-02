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
        $roles = [
            [
                'id' => '1',
                'role' => 'admin'
            ], [
                'id' => '2',
                'role' => 'editor'
            ], [
                'id' => '3',
                'role' => 'distributor'
            ]
        ];

        DB::table('user_roles')->insert($roles);
    }
}
