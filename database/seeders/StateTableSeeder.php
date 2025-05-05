<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            [
                'id' => 1,
                'country_id' => 1,
                'name' => 'New York',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 2,
                'country_id' => 1,
                'name' => 'California',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 3,
                'country_id' => 2,
                'name' => 'England',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 4,
                'country_id' => 3,
                'name' => 'Tokyo',
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ];
        State::insert($states);
    }
}
