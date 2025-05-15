<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use App\Models\ProductVariant;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopifyImportController extends Controller
{
    public function import(Request $request)
    {
        try {
            // Define CSV file path
            $filePath = asset('products_export_1.csv');


            // Open CSV file
            $file = fopen($filePath, 'r');
            if (!$file) {
                throw new \Exception('Could not open CSV file.');
            }

            // Read headers
            $headers = fgetcsv($file);
            if (!$headers) {
                fclose($file);
                throw new \Exception('Invalid CSV format or empty file.');
            }

            $currentHandle = null;
            $productId = null;

            // Process each row
            while (($row = fgetcsv($file)) !== false) {
                // Combine headers with row data
                $data = array_combine($headers, $row);

                $handle = $data['Handle'];

                // Create new product if handle changes
                if ($currentHandle !== $handle) {
                    $productId = $this->createProduct($data);
                    $currentHandle = $handle;
                }

                // Handle variant
                $this->handleVariant($data, $productId);
            }

            fclose($file);

            return response()->json(['message' => 'CSV imported successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function createProduct(array $data)
    {
        // Resolve Brand, Category, SubCategory, SubCategoryItem
        $brand_id = $this->resolveBrand($data['Vendor'] ?? 'Default');
        $category_id = $this->resolveCategory($data['Product Category'] ?? 'Default');
        $sub_category_id = $this->resolveSubCategory($data['Product Category'] ?? 'Default', $category_id);
        $sub_category_item_id = $this->resolveSubCategoryItem($data['Product Category'] ?? 'Default', $sub_category_id);

        // Create or Update Product
        $product = Product::updateOrCreate(
            ['slug' => $data['Handle']],
            [
                'name' => $data['Title'],
                'description' => $data['Body (HTML)'],
                'price' => $data['Variant Price'] ?? 0,
                'sale_price' => $data['Variant Compare At Price'] ?: null,
                'sku' => $data['Variant SKU'] ?? Str::random(10),
                'brand_id' => $brand_id,
                'category_id' => $category_id,
                'sub_category_id' => $sub_category_id,
                'sub_category_item_id' => $sub_category_item_id,
                'user_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'status' => $data['Status'] === 'active' ? 'active' : 'inactive',
            ]
        );

        // Store main product image
        if (!empty($data['Image Src'])) {
            ProductImage::create([
                'product_id' => $product->id,
                'url' => $data['Image Src'],
                'is_main' => $data['Image Position'] == 1,
            ]);
        }

        return $product->id;
    }

    private function handleVariant(array $data, $productId)
    {
        if (empty($data['Option1 Value'])) {
            return;
        }

        // Store Size as Attribute
        $attribute = Attribute::firstOrCreate([
            'name' => $data['Option1 Name'] ?? 'Size',
            'slug' => Str::slug($data['Option1 Name'] ?? 'size'),
        ]);

        $attributeValue = AttributeValue::firstOrCreate([
            'attribute_id' => $attribute->id,
            'value' => $data['Option1 Value'],
        ]);

        // Create Product Variant
        $variant = ProductVariant::create([
            'product_id' => $productId,
            'sku' => $data['Variant SKU'] ?? Str::random(10),
            'price' => $data['Variant Price'] ?? 0,
            'sale_price' => $data['Variant Compare At Price'] ?: null,
            'stock' => $data['Variant Inventory Qty'] ?? 0,
        ]);

        // Link variant to product attribute
        ProductAttribute::create([
            'product_id' => $productId,
            'attribute_id' => $attribute->id,
            'attribute_value_id' => $attributeValue->id,
        ]);

        // Store variant-specific image
        if (!empty($data['Image Src']) && $data['Image Position'] != 1) {
            ProductImage::create([
                'product_id' => $productId,
                'url' => $data['Image Src'],
                'is_main' => false,
            ]);
        }
    }

    private function resolveBrand($vendor)
    {
        return Brand::firstOrCreate(
            ['name' => $vendor ?: 'Default'],
            values: ['logo' => 'default.png', 'updated_by'   => 1, 'created_by' => 1]
        )->id;
    }

    private function resolveCategory($product_category)
    {
        $categories = explode(' > ', $product_category);
        $category_name = $categories[0] ?: 'Default';
        return Category::firstOrCreate(
            ['name' => $category_name],
            ['slug' => Str::slug($category_name)]
        )->id;
    }

    private function resolveSubCategory($product_category, $category_id)
    {
        $categories = explode(' > ', $product_category);
        $sub_category_name = $categories[1] ?? 'Default';
        return SubCategory::firstOrCreate(
            ['name' => $sub_category_name, 'category_id' => $category_id],
            ['slug' => Str::slug($sub_category_name)]
        )->id;
    }

    private function resolveSubCategoryItem($product_category, $sub_category_id)
    {
        $categories = explode(' > ', $product_category);
        $sub_category_item_name = $categories[2] ?? 'Default';
        return SubCategoryItem::firstOrCreate(
            ['name' => $sub_category_item_name, 'sub_category_id' => $sub_category_id],
            ['slug' => Str::slug($sub_category_item_name)]
        )->id;
    }
}
