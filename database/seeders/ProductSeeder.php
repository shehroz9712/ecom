<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $products = [
            [
                'name' => 'Electronics Black Wrist Watch',
                'slug' => 'electronics-black-wrist-watch',
                'short_description' => 'Ultrices eros in cursus turpis massa cursus mattis. Volutpat ac tincidunt vitae semper quis lectus.',
                'price' => 45.00,
                'sale_price' => 40.00,
                'sku' => 'MS46891340',
                'brand_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 1,
                'sub_category_item_id' => 1,
                'user_id' => 1,
                'rating' => 4,
                'review_count' => 3,
                'description' => '<div class="row mb-4"><div class="col-md-6 mb-5"><h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4><p class="mb-4">Premium black wrist watch with multiple features.</p><ul class="list-type-check"><li>Water resistant</li><li>Stainless steel body</li><li>6 months battery life</li></ul></div></div>',
                'specifications' => '<ul class="list-none"><li><label>Model</label><p>Skysuite 320</p></li><li><label>Color</label><p>Black</p></li></ul>',
                'updated_by' =>  1,
                'images' => [
                    ['image_path' => '1-1.jpg', 'is_main' => true],
                    ['image_path' => '1-2.jpg'],
                    ['image_path' => '1-800x900.jpg'],
                    ['image_path' => '2.jpg']
                ]
            ],
            [
                'name' => 'Wireless Bluetooth Headphones',
                'slug' => 'wireless-bluetooth-headphones',
                'short_description' => 'Crystal clear sound with noise cancellation feature and long battery life.',
                'price' => 89.99,
                'sale_price' => 75.99,
                'sku' => 'HP2023BT',
                'brand_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 2,
                'sub_category_item_id' => 3,
                'user_id' => 1,
                'rating' => 4.5,
                'review_count' => 12,
                'description' => '<div class="row mb-4"><div class="col-md-6 mb-5"><h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4><p class="mb-4">High quality wireless headphones with 30hrs battery life.</p><ul class="list-type-check"><li>Active noise cancellation</li><li>Touch controls</li><li>Built-in microphone</li></ul></div></div>',
                'specifications' => '<ul class="list-none"><li><label>Model</label><p>SoundMax Pro</p></li><li><label>Battery</label><p>30 hours</p></li></ul>',
                'updated_by' =>  1,
                'images' => [
                    ['image_path' => '2-800x900.jpg', 'is_main' => true],
                    ['image_path' => '3.jpg'],
                    ['image_path' => '3-800x900.jpg'],
                    ['image_path' => '4-2.jpg'],
                    ['image_path' => '4-1.jpg']
                ]
            ],
            [
                'name' => 'Smart Fitness Band',
                'slug' => 'smart-fitness-band',
                'short_description' => 'Track your daily activities, heart rate, sleep and more with this smart band.',
                'price' => 59.99,
                'sale_price' => null,
                'sku' => 'FIT2023X',
                'brand_id' => 1,
                'category_id' => 2,
                'sub_category_id' => 4,
                'sub_category_item_id' => 5,
                'user_id' => 1,
                'rating' => 4.2,
                'review_count' => 8,
                'description' => '<div class="row mb-4"><div class="col-md-6 mb-5"><h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4><p class="mb-4">Comprehensive health and fitness tracking.</p><ul class="list-type-check"><li>24/7 heart rate monitoring</li><li>Sleep tracking</li><li>Water resistant</li></ul></div></div>',
                'specifications' => '<ul class="list-none"><li><label>Model</label><p>FitTrack X</p></li><li><label>Battery</label><p>7 days</p></li></ul>',
                'updated_by' =>  1,
                'images' => [
                    ['image_path' => '4-800x900.jpg', 'is_main' => true],
                    ['image_path' => '5.jpg'],
                    ['image_path' => '5-800x900.jpg'],
                ]
            ],
            [
                'name' => '4K Ultra HD Smart TV',
                'slug' => '4k-ultra-hd-smart-tv',
                'short_description' => 'Stunning picture quality with smart features and multiple connectivity options.',
                'price' => 899.99,
                'sale_price' => 799.99,
                'sku' => 'TV55UHD',
                'brand_id' => 1,
                'category_id' => 3,
                'sub_category_id' => 6,
                'sub_category_item_id' => 7,
                'user_id' => 1,
                'rating' => 4.8,
                'review_count' => 25,
                'description' => '<div class="row mb-4"><div class="col-md-6 mb-5"><h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4><p class="mb-4">Immersive viewing experience with vibrant colors.</p><ul class="list-type-check"><li>55" 4K UHD display</li><li>Smart TV with apps</li><li>Multiple HDMI ports</li></ul></div></div>',
                'specifications' => '<ul class="list-none"><li><label>Model</label><p>UltraView 55X</p></li><li><label>Screen</label><p>55 inches</p></li></ul>',
                'updated_by' =>  1,
                'images' => [
                    ['image_path' => '6.jpg', 'is_main' => true],
                    ['image_path' => '6-800x900.jpg'],
                    ['image_path' => '7-1.jpg'],
                    ['image_path' => '7-2.jpg']
                ]
            ]
        ];
        foreach ($products as $productData) {
            // Extract images from product data
            $images = $productData['images'];
            unset($productData['images']);

            // Create product
            $product = Product::create($productData);

            // Create product images
            foreach ($images as $image) {
                ProductImage::create(array_merge($image, [
                    'product_id' => $product->id,
                    'created_at' => $now,
                    'updated_at' => $now
                ]));
            }

            // Add attributes
            $colorValues = AttributeValue::where('attribute_id', 1)->get();
            $sizeValues = AttributeValue::where('attribute_id', 2)->get();

            foreach ($colorValues as $value) {
                $product->attributes()->attach($value->id, ['attribute_id' => 1]);
            }

            foreach ($sizeValues as $value) {
                $product->attributes()->attach($value->id, ['attribute_id' => 2]);
            }
        }
    }
}
