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
        $this->call([
            UserSeeder::class,
            RolePermissionSeeder::class,
            MediaSeeder::class,
            CountriesTableSeeder::class,
            SettingSeeder::class,
            StateTableSeeder::class,
            PageSeeder::class,
            CategorySeeder::class,
            SliderSeeder::class,
            BrandSeeder::class,
            // AttributeSeeder::class,
            // ProductSeeder::class,
            // ReviewSeeder::class,
            // ReviewImageSeeder::class,
            VendorTableSeeder::class,
        ]);
    }
}
