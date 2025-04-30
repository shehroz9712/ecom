<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Get all categories for sidebar
        $categories = Category::all();

        // Start product query
        $products = Product::query()->with(['category', 'images']);

        // Category filter
        if ($request->has('category')) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        // Price filter
        if ($request->has('min_price') || $request->has('max_price')) {
            $minPrice = $request->min_price ?? 0;
            $maxPrice = $request->max_price ?? Product::max('price');

            $products->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Sort by
        $sortOption = $request->get('orderby', 'default');
        switch ($sortOption) {
            case 'popularity':
                $products->orderBy('views', 'desc');
                break;
            case 'rating':
                $products->orderBy('average_rating', 'desc');
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

        // Items per page
        $perPage = $request->get('count', 12);

        // Paginate results
        $products = $products->paginate($perPage)
            ->appends($request->except('page'));

        return view('user.products.shop', compact('products', 'categories'));
    }
    public function detail($slug)
    {
        $product = Product::with(['brand', 'reviews', 'category', 'images', 'attributes.attribute'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Group attributes by type
        $groupedAttributes = $product->attributes->groupBy('attribute_slug');

        $vendorProducts = Product::where('user_id', $product->user_id)
            ->where('id', '!=', $product->id)
            ->limit(8)
            ->get();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(8)
            ->get();

        return view('user.products.detail', compact('product', 'relatedProducts', 'vendorProducts', 'groupedAttributes'));
    }
}
