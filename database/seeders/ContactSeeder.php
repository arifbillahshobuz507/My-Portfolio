<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 1000; $i++) {
            Contact::create([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->optional(0.8)->lastName(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'description' => $faker->optional(0.7)->paragraph(),
                'service_id' => rand(1, 100),
                'user_profile_id' => rand(1, 100),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}