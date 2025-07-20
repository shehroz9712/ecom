<?php

namespace App\Http\Controllers\Admin;


use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::latest()->paginate(10);
        return view('admin.vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('admin.vendors.create');
    }


    public function store(Request $request)
    {
        // 1. Validate request
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:vendors,email',
            'password' => 'required|min:6',
            'status'   => 'required|in:active,inactive',

            'addresses.*.type'       => 'required|in:billing,shipping',
            'addresses.*.full_name'  => 'required|string|max:100',
            'addresses.*.address_line_1' => 'nullable|string|max:255',
            'addresses.*.city'       => 'nullable|string|max:100',
            'addresses.*.state'      => 'nullable|string|max:100',
            'addresses.*.postcode'   => 'nullable|string|max:20',
            'addresses.*.country'    => 'nullable|string|max:100',
            'addresses.*.phone'      => 'nullable|string|max:20',
        ]);

        // 2. Use DB transaction
        DB::beginTransaction();

        try {
            // Create vendor
            $vendor = Vendor::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'status'   => $request->status,
            ]);

            // 3. Create multiple addresses
            if ($request->has('addresses')) {
                foreach ($request->addresses as $address) {
                    $vendor->addresses()->create([
                        'type'           => $address['type'],
                        'full_name'      => $address['full_name'] ?? $vendor->name,
                        'company'        => $address['company'] ?? null,
                        'address_line_1' => $address['address_line_1'] ?? null,
                        'address_line_2' => $address['address_line_2'] ?? null,
                        'city'           => $address['city'] ?? null,
                        'state'          => $address['state'] ?? null,
                        'postcode'       => $address['postcode'] ?? null,
                        'country'        => $address['country'] ?? null,
                        'phone'          => $address['phone'] ?? null,
                        'is_default'     => false,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.vendors.index')->with('success', 'Vendor created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

    public function edit(Vendor $vendor)
    {
        return view('admin.vendors.edit', compact('vendor'));
    }
    public function show(Vendor $vendor)
    {
        return view('admin.vendors.show', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100|unique:vendors,email,' . $vendor->id,
            'password' => 'nullable|min:6',
            'phone_number' => 'nullable|string|max:15',
        ]);

        $vendor->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => $request->company,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $vendor->password,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('admin.vendors.index')->with('success', 'Vendor deleted successfully.');
    }
}
