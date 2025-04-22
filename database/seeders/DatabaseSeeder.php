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
        $this->call(CountriesTableSeeder::class,);
        $this->call(SettingSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(PageSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(AttributeSeeder::class);

        $this->call(ProductSeeder::class);
    }
}
