<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Page;
use App\Models\State;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CitySeeder extends Seeder
{
    public function run(): void
    {

        City::insert([
            [
                'name'                  => 'Karachi',
                'state_id'              => 1,
                'status'                => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
