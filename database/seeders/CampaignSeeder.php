<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\Product;
use Illuminate\Support\Carbon;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        // Demo campaigns
        $campaigns = [
            [
                'title' => 'Winter Sale',
                'description' => 'Up to 30% off on winter products.',
                'discount_type' => 'percentage',
                'discount_value' => 30,
                'start_date' => Carbon::now()->subDays(1),
                'end_date' => Carbon::now()->addDays(15),
                'status' => 'active',
            ],
            [
                'title' => 'Clearance Sale',
                'description' => 'Flat 500 off on selected items.',
                'discount_type' => 'fixed',
                'discount_value' => 500,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(7),
                'status' => 'active',
            ],
        ];

        foreach ($campaigns as $data) {
            $campaign = Campaign::create($data);

            // Attach some random products (agar products table me data hai)
            $products = Product::inRandomOrder()->take(5)->pluck('id');
            $campaign->products()->sync($products);
        }
    }
}
