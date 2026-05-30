<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 1000; $i++) {
            Testimonial::create([
                'title' => $faker->words(3, true),
                'company_name' => $faker->company(),
                'image' => 'testimonial_' . rand(1, 20) . '.jpg',
                'description' => $faker->paragraphs(3, true),
                'short_description' => $faker->sentence(10),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}