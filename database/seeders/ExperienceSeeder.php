<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 1000; $i++) {
            $startJob = $faker->dateTimeBetween('-10 years', '-1 year');
            $endJob = $faker->optional(0.7)->dateTimeBetween($startJob, 'now');
            
            Experience::create([
                'title' => $faker->jobTitle(),
                'start_job' => $startJob,
                'end_job' => $endJob,
                'location' => $faker->city() . ', ' . $faker->country(),
                'icone' => $faker->optional(0.8)->imageUrl(100, 100, 'business', true, 'icon'),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}