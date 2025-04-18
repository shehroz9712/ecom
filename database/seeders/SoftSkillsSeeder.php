<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoftSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skills = [
            [
                'name' => 'Communication',
                'status' => 'active'
            ],
            [
                'name' => 'Teamwork',
                'status' => 'active'
            ],
            [
                'name' => 'Problem Solving',
                'status' => 'active'
            ],
            [
                'name' => 'Adaptability',
                'status' => 'active'
            ],
            [
                'name' => 'Time Management',
                'status' => 'active'
            ],
            [
                'name' => 'Leadership',
                'status' => 'active'
            ],
            [
                'name' => 'Creativity',
                'status' => 'active'
            ],
            [
                'name' => 'Critical Thinking',
                'status' => 'active'
            ],
            [
                'name' => 'Attention to Detail',
                'status' => 'active'
            ]


        ];

        foreach ($skills as $skill) {
            \App\Models\SoftSkill::create($skill);
        }
    }
}