<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController  extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with('activeSubCategories', 'activeSubCategories.activeItems')->get();
        $sliders = Slider::all();

        $newArrivals = Product::with(['images', 'reviews'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $bestSellers = Product::with(['images', 'reviews'])
            ->orderBy('sales_count', 'desc')
            ->take(10)
            ->get();

        $mostPopular = Product::with(['images', 'reviews'])
            ->orderBy('views_count', 'desc')
            ->take(10)
            ->get();

        $featuredProducts = Product::with(['images', 'reviews'])
            ->where('is_featured', true)
            ->take(10)
            ->get();
        return view('user.index', compact('sliders', 'mostPopular', 'newArrivals', 'featuredProducts', 'bestSellers', 'categories'));
    }
}
