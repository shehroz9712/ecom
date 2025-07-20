<?php

namespace App\Http\Controllers\Admin;


use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::latest()->paginate(10);
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(Request $request)
    {
       

        return redirect()->route('admin.cities.index')->with('success', 'City added successfully.');
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }
    public function show(City $city)
    {
        return view('admin.cities.show', compact('city'));
    }

    public function update(Request $request, City $city)
    {
       
        return redirect()->route('admin.cities.index')->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('admin.cities.index')->with('success', 'City deleted successfully.');
    }
}
