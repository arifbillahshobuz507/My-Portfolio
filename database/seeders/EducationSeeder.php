<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        $degrees = [
            'Bachelor of Science in Computer Science',
            'Master of Business Administration',
            'Bachelor of Arts in English',
            'Master of Science in Data Science',
            'Bachelor of Engineering in Civil',
            'PhD in Artificial Intelligence',
            'Diploma in Web Development',
            'Bachelor of Law',
            'Master of Education',
            'Bachelor of Commerce'
        ];
        
        $institutes = [
            'Dhaka University',
            'BUET',
            'North South University',
            'BRAC University',
            'University of Dhaka',
            'Jahangirnagar University',
            'Rajshahi University',
            'Chittagong University',
            'Khulna University',
            'MIT', 'Harvard University',
            'Stanford University',
            'Oxford University',
            'Cambridge University'
        ];
        
        for ($i = 0; $i < 1000; $i++) {
            $startLearn = $faker->dateTimeBetween('-15 years', '-5 years');
            $endLearn = $faker->optional(0.7)->dateTimeBetween($startLearn, 'now');
            
            Education::create([
                'title' => $faker->randomElement($degrees) . ' - ' . $faker->randomElement($institutes),
                'start_learn' => $startLearn,
                'end_learn' => $endLearn,
                'location' => $faker->city() . ', ' . $faker->country(),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}