<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 1000; $i++) {
            Service::create([
                'title' => $faker->words(3, true),
                'description' => $faker->paragraphs(2, true),
                'image' => 'service_' . rand(1, 10) . '.jpg',
                'icon' => 'icon_' . rand(1, 10) . '.png',
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}