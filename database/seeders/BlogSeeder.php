<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 1000; $i++) {
            Blog::create([
                'title' => $faker->optional(0.9)->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'),
                'phone' => $faker->optional(0.8)->phoneNumber(),
                'otp' => $faker->optional(0.3)->numerify('######'),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}