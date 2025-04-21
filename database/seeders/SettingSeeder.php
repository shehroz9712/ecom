<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' => 'favicon',
                'value' => 'logo.png',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'logo',
                'value' => 'logo.png',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'dark_logo',
                'value' => 'dark-logo.png',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'headline',
                'value' => 'Welcome to Our Platform',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'title',
                'value' => 'My Awesome Website',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'description',
                'value' => 'This is a modern platform powered by AI',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'keyword',
                'value' => 'AI, Resume, Builder, Laravel',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'header_script',
                'value' => '<script>console.log("Header script loaded");</script>',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'body_script',
                'value' => '<script>console.log("Body script executed");</script>',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'footer_script',
                'value' => '<script>console.log("Footer script running");</script>',
                'deletable' => 0,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'copyright',
                'value' => '© 2025 My Company. All rights reserved.',
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
