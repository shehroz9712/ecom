<?php

namespace App\Http\Controllers\User;



use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $addresses = Address::where('user_id', Auth::id())
            ->get();

        return view('user.user.addresses.index', compact('addresses'));
    }

    public function create(Request $request)
    {
        $countries = Country::get();
        return view('user.user.addresses.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'postcode' => 'required|string|max:20',
            'is_default' => 'nullable|boolean',
        ]);

        if ($request->is_default) {
            // Reset default flag for this type and user
            Address::where('user_id', Auth::id())
                ->where('type', $request->type)
                ->update(['is_default' => false]);
        }

        Address::create([
            'user_id' => Auth::id(),
            'type' => $request->type ?? 'shipping', // fallback if type is not passed
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'postcode' => $request->postcode,
            'is_default' => $request->has('is_default'),
        ]);

        return redirect()->back()->with('success', 'Address created successfully.');
    }


    public function edit($id)
    {
        $address = Address::where('id', $id)
            ->where('user_id', auth()->id()) // security check: only allow editing own addresses
            ->firstOrFail();

        $countries = Country::where('status', 'active')->get();
        $states = State::where('country_id', $address->country_id)->get();
        $cities = City::where('state_id', $address->state_id)->get();

        return view('user.user.addresses.edit', compact('address', 'countries', 'states', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'postcode' => 'required|string|max:20',
            'is_default' => 'nullable|boolean',
        ]);

        $address = Address::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($request->is_default) {
            // Reset other default addresses for the same user and type
            Address::where('user_id', auth()->id())
                ->where('type', $address->type)
                ->update(['is_default' => false]);
        }

        $address->update([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'postcode' => $request->postcode,
            'is_default' => $request->has('is_default'),
        ]);

        return redirect()->route('user.addresses.index')->with('success', 'Address updated successfully.');
    }


    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);

        // If deleting default address, set another address as default
        if ($address->is_default) {
            $newDefault = Auth::user()->addresses()
                ->where('type', $address->type)
                ->where('id', '!=', $address->id)
                ->first();

            if ($newDefault) {
                $newDefault->update(['is_default' => true]);
            }
        }

        $address->delete();

        return back()->with('success', 'Address deleted successfully');
    }

    public function setDefault(Address $address)
    {
        $this->authorize('update', $address);

        // Remove default status from other addresses of same type
        Auth::user()->addresses()
            ->where('type', $address->type)
            ->update(['is_default' => false]);

        $address->update(['is_default' => true]);

        return back()->with('success', 'Default address updated');
    }
}
