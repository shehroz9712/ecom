<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;
use Illuminate\Support\Str;

class VendorTableSeeder extends Seeder
{
    public function run()
    {
        $vendors = [
            [
                'name' => 'Vendor 1',
                'email' => 'wolamrtvendor1@email.com',
                'phone' => '123456789',
                'banner_image' => 'assets/user/images/vendor/dokan/1.jpg',
                'brand_logo' => 'assets/user/images/vendor/brand/1.jpg',
                'slug' => Str::slug('Vendor 1'),
                'country_id' => 1,
                'state_id' => 1,
                'city_id' => '1',
                'zip_code' => '10001',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Vendor 2',
                'email' => 'wolamrtvendor2@email.com',
                'phone' => '1234567890',
                'banner_image' => 'assets/user/images/vendor/dokan/2.jpg',
                'brand_logo' => 'assets/user/images/vendor/brand/2.jpg',
                'slug' => Str::slug('Vendor 2'),
                'country_id' => 1,
                'state_id' => 2,
                'city_id' => '1',
                'zip_code' => '90001',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Vendor 3',
                'email' => 'wolamrtvendor3@email.com',
                'phone' => '12312567',
                'banner_image' => 'assets/user/images/vendor/dokan/3.jpg',
                'brand_logo' => 'assets/user/images/vendor/brand/3.jpg',
                'slug' => Str::slug('Vendor 3'),
                'country_id' => 2,
                'state_id' => 3,
                'city_id' => '2',
                'zip_code' => 'SW1A 1AA',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Vendor 4',
                'email' => 'wolamrtvendor4@email.com',
                'phone' => '123325794',
                'banner_image' => 'assets/user/images/vendor/dokan/4.jpg',
                'brand_logo' => 'assets/user/images/vendor/brand/4.jpg',
                'slug' => Str::slug('Vendor 4'),
                'country_id' => 3,
                'state_id' => 4,
                'city_id' => '2',
                'zip_code' => '100-0001',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }
    }
}