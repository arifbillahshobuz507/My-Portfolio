<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        $titles = [
            'Welcome to My Portfolio',
            'Creative Developer & Designer',
            'Building Digital Solutions',
            'Full Stack Developer',
            'UI/UX Expert',
            'Software Engineer',
            'Tech Innovator',
            'Code Craftsman',
            'Digital Creator',
            'Problem Solver'
        ];
        
        for ($i = 0; $i < 1000; $i++) {
            Hero::create([
                'title' => $faker->randomElement($titles),
                'user_id' => rand(1, 100),
                'user_profile_id' => rand(1, 100),
                'experience_id' => rand(1, 100),
                'project_id' => rand(1, 100),
                'testimonial_id' => rand(1, 100),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}