<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductVariant;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ShopifyImportController extends Controller
{
    public function import(Request $request)
    {
        try {
            DB::beginTransaction();
            $filePath = asset('products_export_1.csv'); // Fixed file path
            $file = fopen($filePath, 'r');
            if (!$file) {
                throw new \Exception('Could not open CSV file at ' . $filePath);
            }

            $headers = fgetcsv($file);
            if (!$headers) {
                fclose($file);
                throw new \Exception('Invalid CSV format or empty file.');
            }

            $requiredHeaders = ['Handle', 'Title', 'Variant SKU', 'Variant Price', 'Option1 Name', 'Option1 Value'];
            if (array_diff($requiredHeaders, $headers)) {
                fclose($file);
                throw new \Exception('Missing required CSV headers.');
            }

            $currentHandle = null;
            $productId = null;

            while (($row = fgetcsv($file)) !== false) {
                $data = array_combine($headers, $row);
                if (empty($data['Handle']) && empty($data['Title'])) {
                    continue;
                }

                $handle = $data['Handle'];
                if ($currentHandle !== $handle) {
                    $productId = $this->createProduct($data);
                    $currentHandle = $handle;
                }

                if (!empty($data['Option1 Value'])) {
                    $this->handleVariant($data, $productId);
                }
            }

            fclose($file);
            DB::commit();
            return response()->json(['message' => 'CSV imported successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Import error: ' . $e->getMessage(), ['row' => $data ?? []]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function createProduct(array $data)
    {
        Log::info('Processing product', ['handle' => $data['Handle'], 'variant_sku' => $data['Variant SKU'] ?? 'null']);
        $brand_id = $this->resolveBrand($data['Vendor'] ?? 'Default');
        $category_id = $this->resolveCategory($data['Product Category'] ?? 'Default');
        $sub_category_id = !empty($data['Product Category']) ? $this->resolveSubCategory($data['Product Category'], $category_id) : null;
        $sub_category_item_id = !empty($data['Product Category']) ? $this->resolveSubCategoryItem($data['Product Category'], $sub_category_id) : null;

        $sku = !empty($data['Variant SKU']) ? $data['Variant SKU'] : Str::slug($data['Handle']) . '-' . Str::random(5);
        $sku = $this->ensureUniqueProductSku($sku); // Ensure unique SKU

        $price = !empty($data['Variant Price']) ? (float) $data['Variant Price'] : 0;
        $sale_price = !empty($data['Variant Compare At Price']) ? (float) $data['Variant Compare At Price'] : null;

        $product = Product::updateOrCreate(
            ['slug' => Str::slug($data['Handle'])],
            [
                'name' => $data['Title'] ?? 'Untitled Product',
                'description' => $data['Body (HTML)'] ?? null,
                'sku' => $sku,
                'price' => $price,
                'sale_price' => $sale_price,
                'brand_id' => $brand_id,
                'category_id' => $category_id,
                'sub_category_id' => $sub_category_id,
                'sub_category_item_id' => $sub_category_item_id,
                'user_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'status' => ($data['Status'] === 'active') ? 'active' : 'inactive',
            ]
        );

        if (!empty($data['Image Src'])) {
            ProductImage::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'url' => $data['Image Src'],
                ],
                [
                    'is_main' => ($data['Image Position'] == 1),
                ]
            );
        }

        return $product->id;
    }

    private function handleVariant(array $data, $productId)
    {
        $variantSku = !empty($data['Variant SKU']) ? $data['Variant SKU'] : Str::random(10);
        $variantSku = $this->ensureUniqueVariantSku($variantSku); // Ensure unique SKU for variant

        $price = !empty($data['Variant Price']) ? (float) $data['Variant Price'] : 0;
        $sale_price = !empty($data['Variant Compare At Price']) ? (float) $data['Variant Compare At Price'] : null;

        $variant = ProductVariant::updateOrCreate(
            [
                'product_id' => $productId,
                'sku' => $variantSku,
            ],
            [
                'price' => $price,
                'sale_price' => $sale_price,
                'stock' => $data['Variant Inventory Qty'] ?? 0,
                'is_default' => empty($data['Option1 Value']) || $data['Option1 Value'] === $data['Variant SKU'], // Set as default if no option or matches SKU
            ]
        );

        $options = [
            ['name' => $data['Option1 Name'] ?? 'Size', 'value' => $data['Option1 Value']],
            ['name' => $data['Option2 Name'] ?? null, 'value' => $data['Option2 Value'] ?? null],
            ['name' => $data['Option3 Name'] ?? null, 'value' => $data['Option3 Value'] ?? null],
        ];

        foreach ($options as $option) {
            if (empty($option['name']) || empty($option['value'])) {
                continue;
            }

            $attribute = Attribute::firstOrCreate(
                [
                    'name' => $option['name'],
                    'slug' => Str::slug($option['name']),
                ]
            );

            $attributeValue = AttributeValue::firstOrCreate(
                [
                    'attribute_id' => $attribute->id,
                    'value' => $option['value'],
                ]
            );

            \App\Models\ProductVariantAttribute::updateOrCreate(
                [
                    'product_variant_id' => $variant->id,
                    'attribute_id' => $attribute->id,
                    'attribute_value_id' => $attributeValue->id,
                ]
            );
        }

        if (!empty($data['Image Src']) && $data['Image Position'] != 1) {
            ProductImage::updateOrCreate(
                [
                    'product_id' => $productId,
                    'url' => $data['Image Src'], // Use url for external images
                ],
                [
                    'is_main' => false,
                ]
            );
        }
    }

    private function ensureUniqueProductSku($sku)
    {
        $originalSku = $sku;
        $counter = 1;
        while (Product::where('sku', $sku)->exists()) {
            $sku = $originalSku . '-' . $counter;
            $counter++;
        }
        return $sku;
    }

    private function ensureUniqueVariantSku($sku)
    {
        $originalSku = $sku;
        $counter = 1;
        while (ProductVariant::where('sku', $sku)->exists()) {
            $sku = $originalSku . '-' . $counter;
            $counter++;
        }
        return $sku;
    }

    private function resolveBrand($vendor)
    {
        return Brand::firstOrCreate(
            ['name' => $vendor ?: 'Default'],
            ['logo' => 'default.png', 'created_by' => 1, 'updated_by' => 1]
        )->id;
    }

    private function resolveCategory($product_category)
    {
        $category_name = !empty($product_category) ? explode(' > ', $product_category)[0] : 'Default';
        return Category::firstOrCreate(
            ['name' => $category_name],
            ['slug' => Str::slug($category_name), 'created_by' => 1, 'updated_by' => 1]
        )->id;
    }

    private function resolveSubCategory($product_category, $category_id)
    {
        $categories = explode(' > ', $product_category);
        $sub_category_name = $categories[1] ?? null;
        if (!$sub_category_name) {
            return null;
        }
        return SubCategory::firstOrCreate(
            ['name' => $sub_category_name, 'category_id' => $category_id],
            ['slug' => Str::slug($sub_category_name), 'created_by' => 1, 'updated_by' => 1]
        )->id;
    }

    private function resolveSubCategoryItem($product_category, $sub_category_id)
    {
        if (!$sub_category_id) {
            return null;
        }
        $categories = explode(' > ', $product_category);
        $sub_category_item_name = $categories[2] ?? null;
        if (!$sub_category_item_name) {
            return null;
        }
        return SubCategoryItem::firstOrCreate(
            ['name' => $sub_category_item_name, 'sub_category_id' => $sub_category_id],
            ['slug' => Str::slug($sub_category_item_name), 'created_by' => 1, 'updated_by' => 1]
        )->id;
    }
}
