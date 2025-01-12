<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert example experience records
        Experience::create([
            'role' => 'Software Developer',
            'company_name' => 'Tech Company A',
            'description' => 'Developed web applications and backend services.',
            'start_date' => '2020-01-01',
            'end_date' => '2022-12-31',
        ]);

        Experience::create([
            'role' => 'Junior Web Developer',
            'company_name' => 'Startup X',
            'description' => 'Assisted in developing front-end and back-end components.',
            'start_date' => '2018-06-01',
            'end_date' => '2020-01-01',
        ]);

        // Add more entries as needed
    }
}
