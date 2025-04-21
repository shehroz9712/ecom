<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
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
        return view('user.index', compact('categories'));
    }
}
