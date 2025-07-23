<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductVariant;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ShopifyImportController extends Controller
{

    public function import(Request $request)
    {
        try {
            $importer = new \App\Services\ShopifyImporter();
            $filePath = public_path('products_export_1.csv');
            $importer->importFromCsv($filePath);
            return response()->json(['message' => 'CSV imported successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
