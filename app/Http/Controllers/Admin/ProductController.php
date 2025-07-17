<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $attributes = Attribute::with('values')->get();

        return view('admin.products.create', compact('categories', 'brands', 'attributes'));
    }



    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'sku' => 'required|string|unique:products,sku',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'specifications' => 'nullable|string',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'sub_category_item_id' => 'nullable|exists:sub_category_items,id',
            'status' => 'required|in:active,inactive',
            'is_featured' => 'nullable|boolean',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,jpg,png,webp|max:2048',
            'variants' => 'nullable|array',
            'variants.*.sku' => 'nullable|string',
            'variants.*.price' => 'required|numeric',
            'variants.*.sale_price' => 'nullable|numeric',
            'variants.*.stock' => 'nullable|integer|min:0',
            'variants.*.attributes' => 'nullable|array',
            'variants.*.attributes.*' => 'string' // format: attribute_id_value_id
        ]);

        DB::beginTransaction();

        try {


            // Create product
            $product = Product::create([
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'sku' => $validated['sku'],
                'short_description' => $validated['short_description'],
                'description' => $validated['description'] ?? 'asas',
                'specifications' => $validated['specifications'] ?? 'asas',
                'price' => $validated['price'],
                'sale_price' => $validated['sale_price'],
                'brand_id' => $validated['brand_id'],
                'category_id' => $validated['category_id'],
                'sub_category_id' => $validated['sub_category_id'],
                'sub_category_item_id' => $validated['sub_category_item_id'],
                'user_id' => Auth::user()->id, // or admin user
                'status' => $validated['status'],
                'is_featured' => $validated['is_featured'] ?? false,
                'created_by' => Auth::user()->id,
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $path =  uploadImage($image, 'products'); // Helper function to handle image upload
                    $product->images()->create([
                        'image' => $path,
                        'is_main' => $index === 0, // mark first image as main
                    ]);
                }
            }


            // Save variants if available
            if (!empty($validated['variants'])) {
                foreach ($validated['variants'] as $variantData) {
                    $variant = $product->variants()->create([
                        'sku' => $variantData['sku'] ?? null,
                        'price' => $variantData['price'],
                        'sale_price' => $variantData['sale_price'] ?? null,
                        'stock' => $variantData['stock'] ?? 0,
                        'is_default' => false,
                    ]);

                    if (!empty($variantData['attributes'])) {
                        foreach ($variantData['attributes'] as $attrValue) {
                            [$attributeId, $valueId] = explode('_', $attrValue);
                            ProductVariantAttribute::create([
                                'product_variant_id' => $variant->id,
                                'attribute_id' => $attributeId,
                                'attribute_value_id' => $valueId,
                            ]);
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        } catch (\Throwable $e) {
            DB::rollBack();
            report($e);
            return redirect()->back()->withInput()->withErrors(['error' => $e]);
        }
    }


    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([]);

        $product->update([]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
