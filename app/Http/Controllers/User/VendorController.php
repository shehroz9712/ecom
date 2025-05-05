<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{

    public function index(Request $request)
    {
        $countries = Country::get();

        $states = State::get();
        $cities = City::get();


        $query = Vendor::query()->where('status', 'active');

        // Filters
        if ($request->filled('category')) {
            $query->where('category_id', $request->category); // Assuming vendor has category_id
        }

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        if ($request->filled('state_id')) {
            $query->where('state_id', $request->state_id);
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        if ($request->filled('zip')) {
            $query->where('zip_code', 'LIKE', "%{$request->zip}%");
        }

        if ($request->filled('city')) {
            $query->whereHas('city', function ($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->city}%");
            });
        }

        // Sorting
        switch ($request->get('sort_by')) {
            case 'new-old':
                $query->latest();
                break;
            case 'old-new':
                $query->oldest();
                break;
            case 'a-z':
                $query->orderBy('name', 'asc');
                break;
            case 'z-a':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        // Pagination
        $vendors = $query->paginate(10)->withQueryString();

        return view('user.vendors.index', compact('vendors', 'countries', 'states', 'cities'));
    }

    function detail($slug) {}
}
