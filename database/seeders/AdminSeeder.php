<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create a sample user
        User::create([
            'name' => 'Bryan Rifqy Tamrin',
            'email' => 'admin@bryanportofolio.com',
            'password' => Hash::make('admin123'), // Use a hashed password
        ]);

        // Create multiple sample users
        // \App\Models\User::factory(10)->create(); // Assuming you have a User factory setup
    }
}
