<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('countries')->delete();

        DB::table('countries')->insert([
            [
                'name' => 'Pakistan',
                'code' => 'PK',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_at' => NULL,
            ],
        ]);
    }
}
