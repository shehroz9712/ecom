<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SubCategoryItemController extends Controller
{
    public function index()
    {
        $sub_category_items = SubCategoryItem::latest()->paginate(10);
        return view('admin.sub_category_items.index', compact('sub_category_items'));
    }

    public function create()
    {
        return view('admin.sub_category_items.create');
    }

    public function store(Request $request)
    {


        return redirect()->route('admin.sub_category_items.index')->with('success', 'SubCategoryItem added successfully.');
    }

    public function edit(SubCategoryItem $sub_category_items)
    {
        return view('admin.sub_category_items.edit', compact('sub_category_items'));
    }
    public function show(SubCategoryItem $sub_category_items)
    {
        return view('admin.sub_category_items.show', compact('sub_category_items'));
    }

    public function update(Request $request, SubCategoryItem $sub_category_items)
    {


        return redirect()->route('admin.sub_category_items.index')->with('success', 'SubCategoryItem updated successfully.');
    }

    public function destroy(SubCategoryItem $sub_category_items)
    {
        $sub_category_items->delete();
        return redirect()->route('admin.sub_category_items.index')->with('success', 'SubCategoryItem deleted successfully.');
    }
    public function getSubCategoryItems($id)
    {
        $items = SubCategoryItem::where('sub_category_id', $id)->where('status', 'active')->get();
        return response()->json($items);
    }
}
