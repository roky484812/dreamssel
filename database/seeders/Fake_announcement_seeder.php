<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;
use Faker\Factory as Faker;

class Fake_announcement_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $announcement = new Announcement();
            $announcement->title = $faker->sentence;
            $announcement->short_description = $faker->sentence.$faker->sentence;
            $announcement->description = $faker->paragraph.$faker->paragraph;
            $announcement->save();
        }
    }
}
