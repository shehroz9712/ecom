<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // pakistan cities

        $cities = [
            // Sindh (state_id = 1)
            ['id' => 1, 'state_id' => 1, 'name' => 'Karachi', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 2, 'state_id' => 1, 'name' => 'Hyderabad', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 3, 'state_id' => 1, 'name' => 'Sukkur', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 4, 'state_id' => 1, 'name' => 'Larkana', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 5, 'state_id' => 1, 'name' => 'Mirpur Khas', 'created_by' => 1, 'updated_by' => 1],

            // Punjab (state_id = 2)
            ['id' => 6, 'state_id' => 2, 'name' => 'Lahore', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 7, 'state_id' => 2, 'name' => 'Rawalpindi', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 8, 'state_id' => 2, 'name' => 'Faisalabad', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 9, 'state_id' => 2, 'name' => 'Multan', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 10, 'state_id' => 2, 'name' => 'Gujranwala', 'created_by' => 1, 'updated_by' => 1],

            // KPK (state_id = 3)
            ['id' => 11, 'state_id' => 3, 'name' => 'Peshawar', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 12, 'state_id' => 3, 'name' => 'Abbottabad', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 13, 'state_id' => 3, 'name' => 'Mardan', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 14, 'state_id' => 3, 'name' => 'Swat', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 15, 'state_id' => 3, 'name' => 'Kohat', 'created_by' => 1, 'updated_by' => 1],

            // Balochistan (state_id = 4)
            ['id' => 16, 'state_id' => 4, 'name' => 'Quetta', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 17, 'state_id' => 4, 'name' => 'Gwadar', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 18, 'state_id' => 4, 'name' => 'Turbat', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 19, 'state_id' => 4, 'name' => 'Khuzdar', 'created_by' => 1, 'updated_by' => 1],
            ['id' => 20, 'state_id' => 4, 'name' => 'Sibi', 'created_by' => 1, 'updated_by' => 1],
        ];

        City::insert($cities);
    }
}
