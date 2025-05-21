<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        // Get all active categories and brands
        $categories = Category::active()->get();
        $brands = Brand::active()->get();

        // Start product query
        $products = Product::query()
            ->with(['category', 'brand', 'images'])
            ->active()
            ->withCount('reviews')
            ->withAvg('reviews', 'rating');

        // Category filter (only apply if slug is not empty)
        if ($request->filled('category')) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        // 🔍 Search filter
        if ($request->filled('search')) {
            $searchTerm = $request->search;

            $products->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Brand filter
        if ($request->filled('brand')) {
            $products->whereHas('brand', function ($query) use ($request) {
                $query->where('slug', $request->brand);
            });
        }

        // Price filter
        if ($request->has('min_price') || $request->has('max_price')) {
            $minPrice = $request->min_price ?? 0;
            $maxPrice = $request->max_price ?? Product::max('price');

            $products->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Sorting
        $sortOption = $request->get('orderby', 'default');
        switch ($sortOption) {
            case 'popularity':
                $products->orderBy('views', 'desc');
                break;
            case 'rating':
                $products->orderBy('reviews_avg_rating', 'desc');
                break;
            case 'date':
                $products->orderBy('created_at', 'desc');
                break;
            case 'price-low':
                $products->orderBy('price', 'asc');
                break;
            case 'price-high':
                $products->orderBy('price', 'desc');
                break;
            default:
                $products->orderBy('is_featured', 'desc')
                    ->orderBy('created_at', 'desc');
        }

        // Pagination and layout
        $perPage = $request->get('count', 12);
        $layout = $request->get('layout', 'grid');

        $products = $products->paginate($perPage)
            ->appends($request->query());

        return view('user.products.shop', compact(
            'products',
            'categories',
            'brands',
            'layout'
        ));
    }

    public function detail($slug)
    {
        $product = Product::with([
            'brand',
            'category',
            'subCategory',
            'subCategoryItem',
            'images',
            'variants.attributes.attribute',
            'variants.attributes.attributeValue',
            'reviews.user',
            'reviews.images'
        ])->where('slug', $slug)->firstOrFail();
        // Get related products (same category)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with(['images'])
            ->inRandomOrder()
            ->limit(8)
            ->get();

        // Get recently viewed products
        $recentlyViewed = Product::with(['images'])
            ->limit(3)
            ->get();

        // Track recently viewed


        $vendorProducts = Product::where('user_id', $product->user_id)
            ->where('id', '!=', $product->id)
            ->limit(8)
            ->get();

        // Get variant attributes if product has variants
        $variantAttributes = [];
        if ($product->variants->isNotEmpty()) {
            $variantAttributes = $product->variants->first()->attributes->groupBy('attribute.name');
        }
        return view('user.products.detail', compact(
            'product',
            'relatedProducts',
            'recentlyViewed',
            'variantAttributes',
            'vendorProducts'
        ));
    }

    public function getVariantDetails(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'attributes' => 'required|array'
        ]);

        $product = Product::with(['variants.attributes.attributeValue'])
            ->findOrFail($request->product_id);

        $selectedAttributes = $request->attributes;

        // Find matching variant
        $variant = $product->variants->first(function ($variant) use ($selectedAttributes) {
            return $variant->attributes->every(function ($attribute) use ($selectedAttributes) {
                return in_array($attribute->attribute_value_id, $selectedAttributes);
            });
        });

        if (!$variant) {
            return response()->json([
                'success' => false,
                'message' => 'Selected combination is not available'
            ]);
        }

        return response()->json([
            'success' => true,
            'variant' => [
                'id' => $variant->id,
                'price' => number_format($variant->price, 2),
                'sale_price' => $variant->sale_price ? number_format($variant->sale_price, 2) : null,
                'stock' => $variant->stock,
                'sku' => $variant->sku
            ]
        ]);
    }
}
