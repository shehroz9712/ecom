<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Page;
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
        $brands = Brand::all();

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

        $categoryGroups = [
            [
                'name' => 'Stove kettles & Pots',
                'slugs' => ['animals-pet-supplies', 'home-garden'],
                'banner' => asset('assets/user/images/demos/demo1/banners/2.jpg'),
            ],
            [
                'name' => 'Chafing and Buffet Dishes',
                'slugs' => ['business-industrial', 'arts-entertainment'],
                'banner' => asset('assets/user/images/demos/demo1/banners/3.jpg'),
            ],
            [
                'name' => 'Mugs',
                'slugs' => ['food-beverages-tobacco', 'health-beauty'],
                'banner' => asset('assets/user/images/demos/demo1/banners/5.jpg'),
            ],
        ];

        $categoryProducts = [];

        foreach ($categoryGroups as $group) {
            $products = Product::with(['images', 'reviews'])
                ->whereHas('category', function ($query) use ($group) {
                    $query->whereIn('slug', $group['slugs']);
                })
                ->latest()
                ->take(10)
                ->get();

            $categoryProducts[] = [
                'name' => $group['name'],
                'slug' => $group['slugs'][0], // for "Shop More" button
                'banner' => $group['banner'],
                'products' => $products,
            ];
        }



        return view('user.index', compact(
            'sliders',
            'brands',
            'mostPopular',
            'newArrivals',
            'featuredProducts',
            'bestSellers',
            'categories',
            'categoryProducts'

        ));
    }


    public function contact()
    {
        return view('user.pages.contact');
    }
    public function about()
    {
        return view('user.pages.about');
    }
    public function page(Request $request, $slug)
    {
        // Fetch the page content based on the slug
        $page = Page::where('slug', $slug)->firstOrFail();
        // Return the view with the page content
        return view('user.pages.page', compact('page'));
    }

    // login

    public function login() {}
}
