<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_category = SubCategory::latest()->paginate(10);
        return view('admin.sub_category.index', compact('sub_category'));
    }

    public function create()
    {
        return view('admin.sub_category.create');
    }

    public function store(Request $request)
    {
      

        return redirect()->route('admin.sub_category.index')->with('success', 'SubCategory added successfully.');
    }

    public function edit(SubCategory $sub_category)
    {
        return view('admin.sub_category.edit', compact('sub_category'));
    }
    public function show(SubCategory $sub_category)
    {
        return view('admin.sub_category.show', compact('sub_category'));
    }

    public function update(Request $request, SubCategory $sub_category)
    {
        

        return redirect()->route('admin.sub_category.index')->with('success', 'SubCategory updated successfully.');
    }

    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete();
        return redirect()->route('admin.sub_category.index')->with('success', 'SubCategory deleted successfully.');
    }


    public function getSubCategories($id)
    {
        $subCategories = SubCategory::where('category_id', $id)->where('status', 'active')->get();
        return response()->json($subCategories);
    }
}
