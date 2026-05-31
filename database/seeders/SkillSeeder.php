<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        $skills = [
            'PHP', 'Laravel', 'JavaScript', 'React', 'Vue.js', 'Angular',
            'Python', 'Django', 'Flask', 'Java', 'Spring Boot', 'C#', '.NET',
            'Ruby on Rails', 'Go', 'Rust', 'Swift', 'Kotlin', 'Flutter',
            'React Native', 'Node.js', 'Express.js', 'MongoDB', 'MySQL',
            'PostgreSQL', 'Redis', 'Docker', 'Kubernetes', 'AWS', 'Azure',
            'Git', 'Jenkins', 'Figma', 'Adobe XD', 'Photoshop', 'Illustrator'
        ];
        
        for ($i = 0; $i < 1000; $i++) {
            Skill::create([
                'title' => $faker->randomElement($skills),
                'image' => 'skill_' . rand(1, 20) . '.png',
                'description' => $faker->optional(0.8)->sentence(10),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}