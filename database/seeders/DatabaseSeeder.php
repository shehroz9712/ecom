<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class,);
        $this->call(RolePermissionSeeder::class,);
        $this->call(MediaSeeder::class,);
        $this->call(PackagesTableSeeder::class,);
        $this->call(CountriesTableSeeder::class,);
        $this->call(OauthClientsTableSeeder::class);
        $this->call(OauthPersonalAccessClientsTableSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(TechnicalSkillsSeeder::class);
        $this->call(SoftSkillsSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(ExperienceSeeder::class);
        $this->call(UserSkillSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ResumeSeeder::class);
        $this->call(ResumeHeaderSeeder::class);
        $this->call(ResumeDetailSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(PageSectionSeeder::class);
    }
}
