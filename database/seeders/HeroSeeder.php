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
        
        $subTitles = [
            'I create amazing web experiences',
            'Passionate about coding',
            '10+ years of experience',
            'Turning ideas into reality',
            'Innovative solutions for modern problems',
            'Expert in Laravel & Vue.js',
            'Let\'s build something great together',
            'Design. Develop. Deploy.',
            'Clean code, beautiful design',
            'Your trusted tech partner'
        ];
        
        $descriptions = [
            'I am a passionate developer with expertise in building modern web applications. I love solving complex problems and creating user-friendly interfaces.',
            'With over 8 years of experience in web development, I specialize in creating scalable and maintainable applications using cutting-edge technologies.',
            'I help businesses transform their ideas into digital reality. From concept to deployment, I provide end-to-end development solutions.',
            'Creative developer focused on delivering high-quality, responsive websites. I believe in writing clean, maintainable code that stands the test of time.',
            'Results-driven developer with a passion for learning and implementing new technologies. I strive to create impactful digital experiences.'
        ];
        
        for ($i = 0; $i < 1000; $i++) {
            Hero::create([
                'title' => $faker->randomElement($titles),
                'sub_title' => $faker->randomElement($subTitles),
                'description' => $faker->randomElement($descriptions) . ' ' . $faker->optional(0.7)->sentence(15),
                'image' => $faker->optional(0.8)->imageUrl(1920, 1080, 'business', true, 'hero'),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
        
        // Create one special hero for main display
        Hero::create([
            'title' => 'Arif Billah Shobuz',
            'sub_title' => 'Full Stack Developer & Tech Enthusiast',
            'description' => 'I craft beautiful, functional, and user-centric web applications. With expertise in Laravel, Vue.js, and modern web technologies, I turn complex problems into elegant digital solutions. Let\'s work together to bring your ideas to life!',
            'image' => 'hero_main.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}