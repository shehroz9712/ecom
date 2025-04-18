<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            $this->command->warn('No users found. Please seed users first.');
            return;
        }

        $experiences = [
            [
                'user_id' => $user->id,
                'job_position' => 'Junior Software Engineer',
                'company_name' => 'Tech Solutions Inc.',
                'country_id' => 1,
                'state' => 'California',
                'city' => 'Los Angeles',
                'type' => 'Onsite',
                'start_date' => '2019-06-01',
                'end_date' => '2021-08-15',
                'currently_working' => 0,
                'company_description' => 'A mid-sized software consulting company specializing in cloud apps.',
                'job_description' => 'Worked on full-stack development using Laravel and Vue.js.',
                'sort' => 1,
                'status' => 'active',
                'created_by' => $user->id,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => $user->id,
                'job_position' => 'Senior Backend Developer',
                'company_name' => 'Cloud AI Labs',
                'country_id' => 2,
                'state' => 'Ontario',
                'city' => 'Toronto',
                'type' => 'Remote',
                'start_date' => '2021-09-01',
                'end_date' => now()->toDateString(),
                'currently_working' => 1,
                'company_description' => 'A research-based company focused on AI-driven solutions.',
                'job_description' => 'Leading the backend team working with Laravel, Redis, and GraphQL.',
                'sort' => 2,
                'status' => 'active',
                'created_by' => $user->id,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Experience::insert($experiences);
    }
}
