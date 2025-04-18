<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\State;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StateSeeder extends Seeder
{
    public function run(): void
    {

        State::insert([
            [
                'name'                  => 'Sindh',
                'country_id'            => 1,
                'status'                => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
