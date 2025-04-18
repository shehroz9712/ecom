<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            $this->command->warn('No users found. Please seed users first.');
            return;
        }

        $educations = [
            [
                'user_id' => $user->id,
                'institution' => 'Oxford University',
                'degree' => 'BSc',
                'field' => 'Computer Science',
                'grade_type' => 'cgpa',
                'grade' => '3.8',
                'start_date' => '2015-08-01',
                'end_date' => '2019-05-31',
                'currently_studying' => false,
                'sort' => 1,
                'status' => 'active',
                'created_by' => $user->id,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => $user->id,
                'institution' => 'MIT',
                'degree' => 'MSc',
                'field' => 'Artificial Intelligence',
                'grade_type' => 'percentage',
                'grade' => '89%',
                'start_date' => '2020-09-01',
                'end_date' => null,
                'currently_studying' => true,
                'sort' => 2,
                'status' => 'active',
                'created_by' => $user->id,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Education::insert($educations);
    }
}
