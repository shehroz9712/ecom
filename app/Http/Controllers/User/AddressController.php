<?php

namespace App\Http\Controllers\User;



use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type');
        $addresses = Auth::user()->addresses()
            ->when($type, fn($q) => $q->where('type', $type))
            ->get();

        return view('user.user.addresses.index', compact('addresses', 'type'));
    }

    public function create(Request $request)
    {
        $type = $request->query('type', 'billing');
        return view('user.user.addresses.create', compact('type'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:billing,shipping',
            'full_name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'is_default' => 'sometimes|boolean'
        ]);

        // If setting as default, remove default status from other addresses of same type
        if ($request->is_default) {
            Auth::user()->addresses()
                ->where('type', $validated['type'])
                ->update(['is_default' => false]);
        }

        Auth::user()->addresses()->create($validated);

        return redirect()->route('user.profile')
            ->with('success', 'Address added successfully');
    }

    public function edit(Address $address)
    {
        $this->authorize('update', $address);
        return view('user.user.addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $this->authorize('update', $address);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'is_default' => 'sometimes|boolean'
        ]);

        // If setting as default, remove default status from other addresses of same type
        if ($request->is_default) {
            Auth::user()->addresses()
                ->where('type', $address->type)
                ->where('id', '!=', $address->id)
                ->update(['is_default' => false]);
        }

        $address->update($validated);

        return redirect()->route('account.addresses')
            ->with('success', 'Address updated successfully');
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
