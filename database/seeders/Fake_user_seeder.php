<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\profile_meta;
use Faker\Factory as Faker;

class Fake_user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->username = $faker->username;
            $user->name = $faker->name;
            $user->profile_picture = 'images/profile_pictures/default.jpg';
            $user->is_active = $faker->randomElement([1, 0]);
            $user->email = $faker->email;
            $user->password = $faker->password;
            $user->save();
            $profile_meta = new profile_meta();
            $profile_meta->user_id = $user->id;
            $profile_meta->key = 'phone';
            $profile_meta->value = $faker->phoneNumber;
            $profile_meta->save();
        }
        
    }
}
