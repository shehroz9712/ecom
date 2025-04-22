<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($slug)
    {
        $product = Product::with(['brand', 'category', 'images', 'attributes.attribute'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Group attributes by type
        $groupedAttributes = $product->attributes->groupBy('attribute_slug');

        return view('user.products.detail', compact('product', 'groupedAttributes'));
    }
}
