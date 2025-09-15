<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductImage;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductVariantAttribute;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Create attributes (Color & Size as example)
        $color = Attribute::firstOrCreate(['slug' => 'color'], ['name' => 'Color']);
        $size  = Attribute::firstOrCreate(['slug' => 'size'], ['name' => 'Size']);

        $colors = [
            ['value' => 'Red', 'code' => '#FF0000'],
            ['value' => 'Blue', 'code' => '#0000FF'],
            ['value' => 'Green', 'code' => '#00FF00'],
            ['value' => 'Black', 'code' => '#000000'],
        ];

        $sizes = [
            ['value' => 'S', 'code' => 'S'],
            ['value' => 'M', 'code' => 'M'],
            ['value' => 'L', 'code' => 'L'],
            ['value' => 'XL', 'code' => 'XL'],
        ];

        foreach ($colors as $c) {
            AttributeValue::firstOrCreate(
                ['attribute_id' => $color->id, 'value' => $c['value']],
                ['code' => $c['code']]
            );
        }
        foreach ($sizes as $s) {
            AttributeValue::firstOrCreate(
                ['attribute_id' => $size->id, 'value' => $s['value']],
                ['code' => $s['code']]
            );
        }

        $colorValues = $color->values()->pluck('id', 'value')->toArray();
        $sizeValues  = $size->values()->pluck('id', 'value')->toArray();

        // Create 10 products
        for ($i = 1; $i <= 10; $i++) {
            $product = Product::create([
                'name' => "Test Product $i",
                'slug' => Str::slug("test-product-$i"),
                'short_description' => "Short description of product $i",
                'description' => "Long description of product $i",
                'sku' => "SKU-P$i",
                'price' => rand(100, 200),
                'sale_price' => rand(80, 150),
                'brand_id' => null,
                'category_id' => 1, // adjust based on your seeded categories
                'sub_category_id' => null,
                'sub_category_item_id' => null,
                'user_id' => 1, // adjust based on your users table
                'shipping' => 200,
                'weight' => 1.2,
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            // Add 4 images (1 main, 3 extra)
            for ($img = 1; $img <= 4; $img++) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => "products/product_{$i}_{$img}.jpg", // adjust if you use storage or s3
                    'is_main' => $img === 1,
                ]);
            }

            // Create 4 variants
            $variantCombos = [
                ['color' => 'Red',   'size' => 'S'],
                ['color' => 'Blue',  'size' => 'M'],
                ['color' => 'Green', 'size' => 'L'],
                ['color' => 'Black', 'size' => 'XL'],
            ];

            foreach ($variantCombos as $index => $combo) {
                $variant = ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => "SKU-P{$i}-V{$index}",
                    'price' => $product->price + ($index * 10),
                    'sale_price' => $product->sale_price ? $product->sale_price - ($index * 5) : null,
                    'stock' => rand(5, 20),
                    'is_default' => $index === 0,
                ]);

                // Attach attributes
                ProductVariantAttribute::create([
                    'product_variant_id' => $variant->id,
                    'attribute_id' => $color->id,
                    'attribute_value_id' => $colorValues[$combo['color']],
                ]);
                ProductVariantAttribute::create([
                    'product_variant_id' => $variant->id,
                    'attribute_id' => $size->id,
                    'attribute_value_id' => $sizeValues[$combo['size']],
                ]);
            }
        }        // $filePath = public_path('products_export_1.csv'); // ✅ CORRECT

        // \Log::info('CSV import path: ' . $filePath);

        // $importer = new ShopifyImporter();
        // $importer->importFromCsv($filePath);
    }
}
