<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Media::create([
            'name' => 'default.png',
            'alt' => 'images/default.png',
            'for' => 'default',
            'folder' => 'image/png',
            'url'  => url('images/default.png'),
            'status'     => 'active',
            'created_by'     => '1',
            'updated_by'     => '1',
        ]);
    }
}
