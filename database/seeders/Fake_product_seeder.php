<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class Fake_product_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $product = new Product();
            $product->title = $faker->sentence;
            $product->short_description = $faker->sentence.$faker->sentence;
            $product->description = $faker->paragraph.$faker->paragraph;
            $product->price = $faker->randomNumber(3, false);
            $product->distributor_price = $faker->randomNumber(2, false);
            $product->sku = $faker->randomNumber(2, false);
            $product->category_id = $faker->numberBetween(1, 3);
            $product->sub_category_id = $faker->numberBetween(1, 3);
            $product->country_id = $faker->numberBetween(1, 3);
            $product->author_id = $faker->numberBetween(304,403);
            $product->product_code = $faker->unique->randomNumber(5, true);
            $product->status = $faker->randomElement([1, 0]);
            $product->save();
        }
    }
}
