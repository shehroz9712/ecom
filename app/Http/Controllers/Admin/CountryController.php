<?php

namespace App\Http\Controllers\Admin;


use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::latest()->paginate(10);
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
       

        return redirect()->route('admin.countries.index')->with('success', 'Country added successfully.');
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }
    public function show(Country $country)
    {
        return view('admin.countries.show', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
       
        return redirect()->route('admin.countries.index')->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('admin.countries.index')->with('success', 'Country deleted successfully.');
    }
}
