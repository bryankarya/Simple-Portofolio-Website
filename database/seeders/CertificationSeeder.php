<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certification;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certification::create([
            'title' => 'Certified Web Developer',
            'issuer' => 'Coursera',
            'description' => 'Certification in advanced web development practices.',
            'issue_date' => '2023-01-15',
            'expiry_date' => null,
        ]);

        Certification::create([
            'title' => 'AWS Certified Solutions Architect',
            'issuer' => 'Amazon Web Services',
            'description' => 'Validated expertise in designing cloud architectures.',
            'issue_date' => '2022-06-01',
            'expiry_date' => '2025-06-01',
        ]);

        Certification::create([
            'title' => 'Google UX Design Professional Certificate',
            'issuer' => 'Google',
            'description' => 'Comprehensive training in user experience design.',
            'issue_date' => '2021-11-20',
            'expiry_date' => null,
        ]);
    }
}
