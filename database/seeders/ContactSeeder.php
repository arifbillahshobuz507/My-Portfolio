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
                'status' => "pending",
                'phone' => $faker->phoneNumber(),
                'description' => $faker->optional(0.7)->paragraph(),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}