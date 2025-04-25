<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $product = Product::create([
            'name' => 'Electronics Black Wrist Watch',
            'slug' => 'electronics-black-wrist-watch',
            'short_description' => 'Ultrices eros in cursus turpis massa cursus mattis. Volutpat ac tincidunt vitae semper quis lectus. Aliquam id diam maecenas ultricies mi eget mauris.',
            'price' => 45.00,
            'sale_price' => 40.00,
            'sku' => 'MS46891340',
            'brand_id' => 1,
            'category_id' => 1,
            'sub_category_id' => 1,
            'sub_category_item_id' => 1,
            'user_id' => 1,
            'rating' => 4,
            'review_count' => 3,
            'updated_by' => 1,
            'created_by' => 1,
            'description' => '
                <div class="row mb-4">
                    <div class="col-md-6 mb-5">
                        <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt arcu cursus vitae congue mauris. Sagittis id consectetur purus ut. Tellus rutrum tellus pelle Vel pretium lectus quam id leo in vitae turpis massa.</p>
                        <ul class="list-type-check">
                            <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit.</li>
                            <li>Vivamus finibus vel mauris ut vehicula.</li>
                            <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                        </ul>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="banner banner-video product-video br-xs">
                            <figure class="banner-media">
                                <a href="#">
                                    <img src="' . asset('assets/user/images/products/video-banner-610x300.jpg') . '"
                                        alt="banner" width="610" height="300"
                                        style="background-color: #bebebe;">
                                </a>
                                <a class="btn-play-video btn-iframe"
                                    href="' . asset('assets/user/video/memory-of-a-woman.mp4') . '"></a>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="row cols-md-3">
                    <div class="mb-3">
                        <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free Shipping &amp; Return</h5>
                        <p class="detail pl-5">We offer free shipping for products on orders above 50$ and offer free delivery for all orders in US.</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy Returns</h5>
                        <p class="detail pl-5">We guarantee our products and you could get back all of your money anytime you want in 30 days.</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing</h5>
                        <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or over 250$ for a year with our special credit card.</p>
                    </div>
                </div>',
            'specifications' => ' <ul class="list-none">
                                        <li>
                                            <label>Model</label>
                                            <p>Skysuite 320</p>
                                        </li>
                                        <li>
                                            <label>Color</label>
                                            <p>Black</p>
                                        </li>
                                        <li>
                                            <label>Size</label>
                                            <p>Large, Small</p>
                                        </li>
                                        <li>
                                            <label>Guarantee Time</label>
                                            <p>3 Months</p>
                                        </li>
                                    </ul>',
        ]);


        // Add product images
        $product->images()->createMany([
            ['image_path' => '1-800x900.jpg', 'is_main' => true],
            ['image_path' => '2-800x900.jpg'],
            ['image_path' => '3-800x900.jpg'],
            ['image_path' => '4-800x900.jpg'],
            ['image_path' => '5-800x900.jpg'],
            ['image_path' => '6-800x900.jpg'],
        ]);

        // Add attributes
        $colorValues = AttributeValue::where('attribute_id', 1)->get();
        $sizeValues = AttributeValue::where('attribute_id', 2)->get();

        foreach ($colorValues as $value) {
            $product->attributes()->attach($value->id, ['attribute_id' => 1]);
        }

        foreach ($sizeValues as $value) {
            $product->attributes()->attach($value->id, ['attribute_id' => 2]);
        }
    }
}
