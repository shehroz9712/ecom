<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryItem;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        // SubCategoryItem::truncate();
        // SubCategory::truncate();
        // Category::truncate();

        // Fashion Category
        $fashion = Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'icon' => 'w-icon-tshirt2',
            'order' => 1,
        ]);

        // Women Subcategory
        $women = SubCategory::create([
            'category_id' => $fashion->id,
            'name' => 'Women',
            'slug' => 'women',
            'order' => 1,
        ]);

        $womenItems = [
            'New Arrivals',
            'Best Sellers',
            'Trending',
            'Clothing',
            'Shoes',
            'Bags',
            'Accessories',
            'Jewelry & Watches',
            'Sale'
        ];

        foreach ($womenItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $women->id,
                'name' => $item,
                'slug' => strtolower(str_replace(' ', '-', $item)),
                'order' => $index + 1,
            ]);
        }

        // Men Subcategory
        $men = SubCategory::create([
            'category_id' => $fashion->id,
            'name' => 'Men',
            'slug' => 'men',
            'order' => 2,
        ]);

        $menItems = [
            'New Arrivals',
            'Best Sellers',
            'Trending',
            'Clothing',
            'Shoes',
            'Bags',
            'Accessories',
            'Jewelry & Watches'
        ];

        foreach ($menItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $men->id,
                'name' => $item,
                'slug' => strtolower(str_replace(' ', '-', $item)),
                'order' => $index + 1,
            ]);
        }

        // Home & Garden Category
        $home = Category::create([
            'name' => 'Home & Garden',
            'slug' => 'home-garden',
            'icon' => 'w-icon-home',
            'order' => 2,
        ]);

        // Bedroom Subcategory
        $bedroom = SubCategory::create([
            'category_id' => $home->id,
            'name' => 'Bedroom',
            'slug' => 'bedroom',
            'order' => 1,
        ]);

        $bedroomItems = [
            'Beds, Frames & Bases',
            'Dressers',
            'Nightstands',
            'Kid\'s Beds & Headboards',
            'Armoires'
        ];

        foreach ($bedroomItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $bedroom->id,
                'name' => $item,
                'slug' => strtolower(str_replace([' ', ',', '&'], ['-', '', 'and'], $item)),
                'order' => $index + 1,
            ]);
        }

        // Living Room Subcategory
        $livingRoom = SubCategory::create([
            'category_id' => $home->id,
            'name' => 'Living Room',
            'slug' => 'living-room',
            'order' => 2,
        ]);

        $livingRoomItems = [
            'Coffee Tables',
            'Chairs',
            'Tables',
            'Futons & Sofa Beds',
            'Cabinets & Chests'
        ];

        foreach ($livingRoomItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $livingRoom->id,
                'name' => $item,
                'slug' => strtolower(str_replace([' ', ',', '&'], ['-', '', 'and'], $item)),
                'order' => $index + 1,
            ]);
        }

        // Office Subcategory
        $office = SubCategory::create([
            'category_id' => $home->id,
            'name' => 'Office',
            'slug' => 'office',
            'order' => 3,
        ]);

        $officeItems = [
            'Office Chairs',
            'Desks',
            'Bookcases',
            'File Cabinets',
            'Breakroom Tables'
        ];

        foreach ($officeItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $office->id,
                'name' => $item,
                'slug' => strtolower(str_replace(' ', '-', $item)),
                'order' => $index + 1,
            ]);
        }

        // Kitchen & Dining Subcategory
        $kitchen = SubCategory::create([
            'category_id' => $home->id,
            'name' => 'Kitchen & Dining',
            'slug' => 'kitchen-dining',
            'order' => 4,
        ]);

        $kitchenItems = [
            'Dining Sets',
            'Kitchen Storage Cabinets',
            'Bashers Racks',
            'Dining Chairs',
            'Dining Room Tables',
            'Bar Stools'
        ];

        foreach ($kitchenItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $kitchen->id,
                'name' => $item,
                'slug' => strtolower(str_replace([' ', ',', '&'], ['-', '', 'and'], $item)),
                'order' => $index + 1,
            ]);
        }

        // Electronics Category
        $electronics = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'icon' => 'w-icon-electronics',
            'order' => 3,
        ]);

        // Laptops & Computers Subcategory
        $laptops = SubCategory::create([
            'category_id' => $electronics->id,
            'name' => 'Laptops & Computers',
            'slug' => 'laptops-computers',
            'order' => 1,
        ]);

        $laptopsItems = [
            'Desktop Computers',
            'Monitors',
            'Laptops',
            'Hard Drives & Storage',
            'Computer Accessories'
        ];

        foreach ($laptopsItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $laptops->id,
                'name' => $item,
                'slug' => strtolower(str_replace([' ', ',', '&'], ['-', '', 'and'], $item)),
                'order' => $index + 1,
            ]);
        }

        // TV & Video Subcategory
        $tv = SubCategory::create([
            'category_id' => $electronics->id,
            'name' => 'TV & Video',
            'slug' => 'tv-video',
            'order' => 2,
        ]);

        $tvItems = [
            'TVs',
            'Home Audio Speakers',
            'Projectors',
            'Media Streaming Devices'
        ];

        foreach ($tvItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $tv->id,
                'name' => $item,
                'slug' => strtolower(str_replace([' ', ',', '&'], ['-', '', 'and'], $item)),
                'order' => $index + 1,
            ]);
        }

        // Digital Cameras Subcategory
        $cameras = SubCategory::create([
            'category_id' => $electronics->id,
            'name' => 'Digital Cameras',
            'slug' => 'digital-cameras',
            'order' => 3,
        ]);

        $camerasItems = [
            'Digital SLR Cameras',
            'Sports & Action Cameras',
            'Camera Lenses',
            'Photo Printer',
            'Digital Memory Cards'
        ];

        foreach ($camerasItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $cameras->id,
                'name' => $item,
                'slug' => strtolower(str_replace([' ', ',', '&'], ['-', '', 'and'], $item)),
                'order' => $index + 1,
            ]);
        }

        // Cell Phones Subcategory
        $phones = SubCategory::create([
            'category_id' => $electronics->id,
            'name' => 'Cell Phones',
            'slug' => 'cell-phones',
            'order' => 4,
        ]);

        $phonesItems = [
            'Carrier Phones',
            'Unlocked Phones',
            'Phone & Cellphone Cases',
            'Cellphone Chargers'
        ];

        foreach ($phonesItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $phones->id,
                'name' => $item,
                'slug' => strtolower(str_replace([' ', ',', '&'], ['-', '', 'and'], $item)),
                'order' => $index + 1,
            ]);
        }

        // Furniture Category
        $furniture = Category::create([
            'name' => 'Furniture',
            'slug' => 'furniture',
            'icon' => 'w-icon-furniture',
            'order' => 4,
        ]);

        // Furniture Subcategory
        $furnitureSub = SubCategory::create([
            'category_id' => $furniture->id,
            'name' => 'Furniture',
            'slug' => 'furniture-items',
            'order' => 1,
        ]);

        $furnitureItems = [
            'Sofas & Couches',
            'Armchairs',
            'Bed Frames',
            'Beside Tables',
            'Dressing Tables'
        ];

        foreach ($furnitureItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $furnitureSub->id,
                'name' => $item,
                'slug' => strtolower(str_replace([' ', ',', '&'], ['-', '', 'and'], $item)),
                'order' => $index + 1,
            ]);
        }

        // Lighting Subcategory
        $lighting = SubCategory::create([
            'category_id' => $furniture->id,
            'name' => 'Lighting',
            'slug' => 'lighting',
            'order' => 2,
        ]);

        $lightingItems = [
            'Light Bulbs',
            'Lamps',
            'Celling Lights',
            'Wall Lights',
            'Bathroom Lighting'
        ];

        foreach ($lightingItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $lighting->id,
                'name' => $item,
                'slug' => strtolower(str_replace(' ', '-', $item)),
                'order' => $index + 1,
            ]);
        }

        // Home Accessories Subcategory
        $accessories = SubCategory::create([
            'category_id' => $furniture->id,
            'name' => 'Home Accessories',
            'slug' => 'home-accessories',
            'order' => 3,
        ]);

        $accessoriesItems = [
            'Decorative Accessories',
            'Candals & Holders',
            'Home Fragrance',
            'Mirrors',
            'Clocks'
        ];

        foreach ($accessoriesItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $accessories->id,
                'name' => $item,
                'slug' => strtolower(str_replace([' ', ',', '&'], ['-', '', 'and'], $item)),
                'order' => $index + 1,
            ]);
        }

        // Garden & Outdoors Subcategory
        $garden = SubCategory::create([
            'category_id' => $furniture->id,
            'name' => 'Garden & Outdoors',
            'slug' => 'garden-outdoors',
            'order' => 4,
        ]);

        $gardenItems = [
            'Garden Furniture',
            'Lawn Mowers',
            'Pressure Washers',
            'All Garden Tools',
            'Outdoor Dining'
        ];

        foreach ($gardenItems as $index => $item) {
            SubCategoryItem::create([
                'sub_category_id' => $garden->id,
                'name' => $item,
                'slug' => strtolower(str_replace([' ', ',', '&'], ['-', '', 'and'], $item)),
                'order' => $index + 1,
            ]);
        }

        // Other Categories
        $otherCategories = [
            ['name' => 'Healthy & Beauty', 'icon' => 'w-icon-heartbeat', 'order' => 5],
            ['name' => 'Gift Ideas', 'icon' => 'w-icon-gift', 'order' => 6],
            ['name' => 'Toy & Games', 'icon' => 'w-icon-gamepad', 'order' => 7],
            ['name' => 'Cooking', 'icon' => 'w-icon-ice-cream', 'order' => 8],
            ['name' => 'Smart Phones', 'icon' => 'w-icon-ios', 'order' => 9],
            ['name' => 'Cameras & Photo', 'icon' => 'w-icon-camera', 'order' => 10],
            ['name' => 'Accessories', 'icon' => 'w-icon-ruby', 'order' => 11],
        ];

        foreach ($otherCategories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => strtolower(str_replace(' ', '-', $category['name'])),
                'icon' => $category['icon'],
                'order' => $category['order'],
            ]);
        }
    }
}
