<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function states(Request $request)
    {
        $request->validate(['country_id' => 'required|integer|exists:countries,id']);
        $states = State::where('country_id', $request->country_id)->orderBy('name')->get(['id', 'name']);
        return response()->json(['success' => true, 'data' => $states]);
    }

    public function cities(Request $request)
    {
        $request->validate(['state_id' => 'required|integer|exists:states,id']);
        $cities = City::where('state_id', $request->state_id)->orderBy('name')->get(['id', 'name']);
        return response()->json(['success' => true, 'data' => $cities]);
    }
}
