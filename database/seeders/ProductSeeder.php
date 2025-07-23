<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\ShopifyImporter;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = public_path('products_export_1.csv'); // ✅ CORRECT

        \Log::info('CSV import path: ' . $filePath);

        $importer = new ShopifyImporter();
        $importer->importFromCsv($filePath);
    }
}
