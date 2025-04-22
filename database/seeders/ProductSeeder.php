<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $product = Product::create([
            'name' => 'Electronics Black Wrist Watch',
            'slug' => 'electronics-black-wrist-watch',
            'short_description' => 'Ultrices eros in cursus turpis massa cursus mattis. Volutpat ac tincidunt vitae semper quis lectus. Aliquam id diam maecenas ultricies mi eget mauris.',
            'price' => 45.00,
            'sale_price' => 40.00,
            'sku' => 'MS46891340',
            'brand_id' => 1,
            'category_id' => 1,
            'rating' => 4,
            'review_count' => 3,
            'updated_by' => 1,
            'created_by' => 1,
        ]);

        // Add product images
        $product->images()->createMany([
            ['image_path' => 'products/default/1-800x900.jpg', 'is_main' => true],
            ['image_path' => 'products/default/2-800x900.jpg'],
            ['image_path' => 'products/default/3-800x900.jpg'],
            ['image_path' => 'products/default/4-800x900.jpg'],
            ['image_path' => 'products/default/5-800x900.jpg'],
            ['image_path' => 'products/default/6-800x900.jpg'],
        ]);

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
