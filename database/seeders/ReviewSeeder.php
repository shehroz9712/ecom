<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::insert([[
            'product_id' => 1,           // Make sure this product exists
            'user_id' => 1,              // Make sure this user exists
            'rating' => rand(1, 5),
            'comment' => 'one Excellent quality product! Totally worth the price.',
            'status' => 'active',
            'created_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ], [
            'product_id' => 1,           // Make sure this product exists
            'user_id' => 1,              // Make sure this user exists
            'rating' => rand(1, 5),
            'comment' => 'two Excellent quality product! Totally worth the price.',
            'status' => 'active',
            'created_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ], [
            'product_id' => 1,           // Make sure this product exists
            'user_id' => 1,              // Make sure this user exists
            'rating' => rand(1, 5),
            'comment' => 'three Excellent quality product! Totally worth the price.',
            'status' => 'active',
            'created_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]]);
    }
}
