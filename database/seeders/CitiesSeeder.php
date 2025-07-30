<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CitiesSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cities')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $now = Carbon::now();

        $cities = [
            // Sindh (state_id = 1)
            ['id' => 1,  'state_id' => 1, 'name' => 'Karachi',    'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2,  'state_id' => 1, 'name' => 'Hyderabad',  'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3,  'state_id' => 1, 'name' => 'Sukkur',     'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4,  'state_id' => 1, 'name' => 'Larkana',    'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5,  'state_id' => 1, 'name' => 'Mirpur Khas', 'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6,  'state_id' => 1, 'name' => 'Nawabshah',  'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],

            // Punjab (state_id = 2)
            ['id' => 7,  'state_id' => 2, 'name' => 'Lahore',      'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8,  'state_id' => 2, 'name' => 'Faisalabad',  'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9,  'state_id' => 2, 'name' => 'Rawalpindi',  'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 10, 'state_id' => 2, 'name' => 'Multan',      'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 11, 'state_id' => 2, 'name' => 'Gujranwala',  'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 12, 'state_id' => 2, 'name' => 'Sialkot',     'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],

            // KPK (state_id = 3)
            ['id' => 13, 'state_id' => 3, 'name' => 'Peshawar',    'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 14, 'state_id' => 3, 'name' => 'Mardan',      'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 15, 'state_id' => 3, 'name' => 'Abbottabad',  'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 16, 'state_id' => 3, 'name' => 'Swat',        'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],

            // Balochistan (state_id = 4)
            ['id' => 17, 'state_id' => 4, 'name' => 'Quetta',      'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 18, 'state_id' => 4, 'name' => 'Gwadar',      'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 19, 'state_id' => 4, 'name' => 'Khuzdar',     'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 20, 'state_id' => 4, 'name' => 'Turbat',      'created_by' => 1, 'updated_by' => 1, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('cities')->insert($cities);
    }
}
