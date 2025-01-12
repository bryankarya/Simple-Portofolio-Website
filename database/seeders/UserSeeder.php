<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  // Add this line


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('about')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'address' => '123 Main Street, Springfield',
            'bio' => 'John is a passionate web developer with over 5 years of experience in creating web-based solutions.',
            'social_links' => json_encode([
                'linkedin' => 'https://linkedin.com/in/johndoe',
                'github' => 'https://github.com/johndoe',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
