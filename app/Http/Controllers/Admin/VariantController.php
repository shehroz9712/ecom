<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        $attributes = Attribute::with('values')->latest()->get();
        return view('admin.attributes.index', compact('attributes'))->with('pageTitle', 'All Attributes');
    }

    public function create()
    {
        return view('admin.attributes.create')->with('pageTitle', 'Add Attribute');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:attributes,slug',
            'values.*.value' => 'required|string',
        ]);

        $attribute = Attribute::create($request->only('name', 'slug'));

        if ($request->has('values')) {
            foreach ($request->values as $value) {
                $attribute->values()->create([
                    'value' => $value['value'],
                    'code' => $value['code'] ?? null,
                ]);
            }
        }

        return redirect()->route('admin.attributes.index')->with('success', 'Attribute created successfully.');
    }

    public function show(Attribute $attribute)
    {
        $attribute->load('values');
        return view('admin.attributes.show', compact('attribute'))->with('pageTitle', 'View Attribute');
    }

    public function edit(Attribute $attribute)
    {
        $attribute->load('values');
        return view('admin.attributes.edit', compact('attribute'))->with('pageTitle', 'Edit Attribute');
    }

    public function update(Request $request, Attribute $attribute)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:attributes,slug,' . $attribute->id,
            'values.*.value' => 'required|string',
        ]);

        $attribute->update($request->only('name', 'slug'));

        // Handle deleted values
        $existingValueIds = $attribute->values->pluck('id')->toArray();
        $submittedValueIds = collect($request->values)->pluck('id')->filter()->toArray();
        $valuesToDelete = array_diff($existingValueIds, $submittedValueIds);
        AttributeValue::destroy($valuesToDelete);

        // Update or create new values
        foreach ($request->values as $val) {
            if (!empty($val['id'])) {
                AttributeValue::where('id', $val['id'])->update([
                    'value' => $val['value'],
                    'code' => $val['code'] ?? null,
                ]);
            } else {
                $attribute->values()->create([
                    'value' => $val['value'],
                    'code' => $val['code'] ?? null,
                ]);
            }
        }

        return redirect()->route('admin.attributes.index')->with('success', 'Attribute updated successfully.');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return redirect()->route('admin.attributes.index')->with('success', 'Attribute deleted successfully.');
    }
}
