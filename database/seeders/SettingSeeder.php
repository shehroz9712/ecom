<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' => 'favicon',
                'value' => 1,
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'logo',
                'value' => 2,
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'contact_email',
                'value' => 'contact@example.com',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'contact_number',
                'value' => '+1 (438) 883-8289',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'location_address',
                'value' => '989 Derry Rd E # 403, Mississauga, ON L5T 2J8, Canada',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'facebook_link',
                'value' => 'https://www.facebook.com/AiProResume',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
