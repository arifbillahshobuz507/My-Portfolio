<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {        
        $fixedUsers = [
            [
                'title' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345678'),
                'phone' => '01953514787',
                'otp' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Arif Billah Shoubz',
                'email' => 'info@arifbillahshobuz.com',
                'password' => Hash::make('12345678'),
                'phone' => '01953514787',
                'otp' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Test User',
                'email' => 'info@user.com',
                'password' => Hash::make('12345678'),
                'phone' => '01700000002',
                'otp' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]

        ];
        
        // Fixed user Insert
        foreach ($fixedUsers as $user) {
            User::updateOrCreate($user);
        }    
        $randomUsers = [];        
        for ($i = 1; $i <= 500; $i++) {
            $randomUsers[] = [
                'title' => $this->getRandomTitle(),
                'email' => 'user' . $i . '_' . rand(100, 999) . '@example.com',
                'password' => Hash::make('12345678'),
                'phone' => $this->generateRandomPhone(),
                'otp' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        
        // Bulk Insert 
        User::insert($randomUsers);
        
        $this->command->info('500 random users created successfully!');
        $this->command->info('Total users: ' . User::count());
    }
    private function getRandomTitle(): string
    {
        $titles = [
            'Mr.', 'Mrs.', 'Ms.', 'Dr.', 'Prof.', 
            'Engineer', 'Architect', 'Developer', 
            'Designer', 'Manager', 'CEO', 'CTO'
        ];
        
        return $titles[array_rand($titles)] . ' ' . $this->generateRandomName();
    }    
   
    private function generateRandomName(): string
    {
        $firstNames = ['John', 'Jane', 'Michael', 'Sarah', 'David', 'Emma', 'James', 'Lisa', 'Robert', 'Maria'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Garcia', 'Miller', 'Davis', 'Rodriguez', 'Martinez'];
        
        return $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
    }
    
    private function generateRandomPhone(): string
    {
        $prefixes = ['017', '018', '019', '015', '016', '013', '014'];
        $prefix = $prefixes[array_rand($prefixes)];
        $number = rand(10000000, 99999999);
        
        return $prefix . $number;
    }
}