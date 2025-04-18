<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnicalSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            [
                'name' => 'HTML',
                'status' => 'active'
            ],
            [
                'name' => 'CSS',
                'status' => 'active'
            ],
            [
                'name' => 'JavaScript',
                'status' => 'active'
            ],
            [
                'name' => 'PHP',
                'status' => 'active'
            ],
            [
                'name' => 'Laravel',
                'status' => 'active'

            ],
            [
                'name' => 'MySQL',
                'status' => 'active'
            ],
            [
                'name' => 'Git',
                'status' => 'active'
            ],
            [
                'name' => 'Bootstrap',
                'status' => 'active'
            ],
            [
                'name' => 'Tailwind',
                'status' => 'active'
            ],
            [
                'name' => 'React',
                'status' => 'active'
            ],
            [
                'name' => 'Vue',
                'status' => 'active'
            ]
        ];

        foreach ($skills as $skill) {
            \App\Models\TechnicalSkill::create($skill);
        }
    }
}