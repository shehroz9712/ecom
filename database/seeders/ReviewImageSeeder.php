<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\ReviewImage;

class ReviewImageSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = Review::all();

        foreach ($reviews as $review) {
            $review->images()->createMany([
                ['image' => 'review-img-1-800x900.jpg'],
                ['image' => 'review-img-2-800x900.jpg'],
                ['image' => 'review-img-3-800x900.jpg'],
            ]);
        }
    }
}
