<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    public function run()
    {
        $color = Attribute::create([
            'name' => 'Color',
            'slug' => 'color'
        ]);

        $color->values()->createMany([
            ['value' => 'Yellow', 'color_code' => '#ffcc01'],
            ['value' => 'Orange', 'color_code' => '#ca6d00'],
            ['value' => 'Blue', 'color_code' => '#1c93cb'],
            ['value' => 'Gray', 'color_code' => '#ccc'],
            ['value' => 'Black', 'color_code' => '#333'],
        ]);

        $size = Attribute::create([
            'name' => 'Size',
            'slug' => 'size'
        ]);

        $size->values()->createMany([
            ['value' => 'Small'],
            ['value' => 'Medium'],
            ['value' => 'Large'],
            ['value' => 'Extra Large'],
        ]);
    }
}
