<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserSkill;
use App\Models\SoftSkill;
use App\Models\TechnicalSkill;

class UserSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = [1]; // Users for whom we are adding skills

        foreach ($userIds as $userId) {
            // Get 3 random Soft Skills
            $softSkills = SoftSkill::inRandomOrder()->take(3)->get();
            foreach ($softSkills as $softSkill) {
                UserSkill::create([
                    'user_id'       => $userId,
                    'skillable_id'   => $softSkill->id,
                    'skillable_type' => SoftSkill::class,
                ]);
            }

            // Get 2 random Technical Skills
            $technicalSkills = TechnicalSkill::inRandomOrder()->take(2)->get();
            foreach ($technicalSkills as $technicalSkill) {
                UserSkill::create([
                    'user_id'       => $userId,
                    'skillable_id'   => $technicalSkill->id,
                    'skillable_type' => TechnicalSkill::class,
                ]);
            }
        }
    }
}