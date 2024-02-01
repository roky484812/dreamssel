<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_country extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['id' => 1, 'name' => 'Bangladesh', 'code' => 'BD'],
            ['id' => 2, 'name' => 'India', 'code' => 'IN'],
            ['id' => 3, 'name' => 'China', 'code' => 'CHN'],
        ];

        DB::table('product_countries')->insert($countries);
    }
}
