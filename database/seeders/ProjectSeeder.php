<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 1000; $i++) {
            Project::create([
                'title' => $faker->words(4, true),
                'description' => $faker->paragraphs(3, true),
                'image' => 'project_' . rand(1, 10) . '.jpg',
                'icon' => 'project_icon_' . rand(1, 10) . '.png',
                'service_id' => rand(1, 100),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}