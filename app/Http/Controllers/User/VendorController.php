<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::has('products')->get(); // Only categories with products/vendors


        $countries = Country::get();
        $states = State::get();
        $cities = City::get();


        $vendors = Vendor::query()
            ->when(request('search'), fn($q) => $q->where('name', 'like', '%' . request('search') . '%'))
            ->when(request('category'), function ($q) {
                $q->whereHas('products.category', fn($q2) => $q2->where('slug', request('category')));
            })
            ->when(request('country_id'), fn($q) => $q->where('country_id', request('country_id')))
            ->when(request('state_id'), fn($q) => $q->where('state_id', request('state_id')))
            ->when(request('city'), fn($q) => $q->where('city', 'like', '%' . request('city') . '%'))
            ->when(request('zip'), fn($q) => $q->where('zip_code', 'like', '%' . request('zip') . '%'))
            ->when(request('sort_by'), function ($q) {
                match (request('sort_by')) {
                    'new-old' => $q->latest(),
                    'old-new' => $q->oldest(),
                    'a-z'     => $q->orderBy('name'),
                    'z-a'     => $q->orderByDesc('name'),
                    default   => $q->latest(),
                };
            })
            ->paginate(10);

        return view('user.vendors.index', compact('vendors', 'countries', 'states', 'cities'));
    }

    public function detail($slug)
    {
        $vendor = Vendor::with(['user'])
            ->withCount(['products as products_count'])
            ->withAvg('products as avg_rating', 'rating')
            ->withSum('products as reviews_count', 'review_count')
            ->where('slug', $slug)
            ->firstOrFail();

        $products = $vendor->products()
            ->with(['category', 'brand', 'images'])
            ->paginate(12);

        $categories = Category::has('products')->get();

        // Get 3 best selling products from this vendor
        $bestSelling = $vendor->products()
            ->orderBy('sales_count', 'desc')
            ->take(3)
            ->get();

        return view('user.vendors.detail', compact(
            'vendor',
            'products',
            'categories',
            'bestSelling'
        ));
    }
}
