<?php

namespace App\Http\Controllers\Admin;


use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }


    public function store(Request $request)
    {
        // 1. Validate request
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:sliders,email',
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
            // Create slider
            $slider = Slider::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'status'   => $request->status,
            ]);

            // 3. Create multiple addresses
            if ($request->has('addresses')) {
                foreach ($request->addresses as $address) {
                    $slider->addresses()->create([
                        'type'           => $address['type'],
                        'full_name'      => $address['full_name'] ?? $slider->name,
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
            return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }
    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100|unique:sliders,email,' . $slider->id,
            'password' => 'nullable|min:6',
            'phone_number' => 'nullable|string|max:15',
        ]);

        $slider->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => $request->company,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $slider->password,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
