<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $sliders = [
            [
                'title' => 'RUNNING SHOES',
                'subtitle' => 'Custom <span class="p-relative d-inline-block">Men’s</span>',
                'bg_image' => 'assets/user/images/demos/demo1/sliders/slide-1.jpg',
                'main_image' => 'assets/user/images/demos/demo1/sliders/shoes.png',
                'bg_color' => '#ebeef2',
                'description' => '<p class="font-weight-normal text-default slide-animate" data-animation-options=\'{"name":"fadeInRightShorter","duration":"1s","delay":".6s"}\'>Sale up to <span class="font-weight-bolder text-secondary">30% OFF</span></p>',
                'button_text' => 'SHOP NOW',
                'button_link' => route('user.shop'),
                'updated_by' => 1,
            ],
            [
                'title' => 'Hot & Packback',
                'subtitle' => 'Mountain-<span class="text-secondary">Climbing</span>',
                'bg_image' => 'assets/user/images/demos/demo1/sliders/slide-2.jpg',
                'main_image' => 'assets/user/images/demos/demo1/sliders/men.png',
                'bg_color' => '#ebeef2',
                'description' => '<p class="font-weight-normal text-default slide-animate" data-animation-options=\'{"name":"fadeInUpShorter","duration":"1s","delay":".8s"}\'>Only until the end of this week.</p>',
                'button_text' => 'SHOP NOW',
                'button_link' => route('user.shop'),
                'updated_by' => 1,
            ],
            [
                'title' => '<span class="text-white mr-4">Roller</span>-skate',
                'subtitle' => 'Trending Collection',
                'bg_image' => 'assets/user/images/demos/demo1/sliders/slide-3.jpg',
                'main_image' => 'assets/user/images/demos/demo1/sliders/skate.png',
                'bg_color' => '#f0f1f2',
                'description' => '
                    <p class="font-weight-normal text-default text-uppercase mb-0 slide-animate"
                        data-animation-options=\'{"name":"fadeInLeftShorter","duration":"1s","delay":".6s"}\'>
                        Top weekly Seller
                    </p>
                    <h5 class="banner-subtitle font-weight-normal text-default ls-25 slide-animate"
                        data-animation-options=\'{"name":"fadeInLeftShorter","duration":"1s","delay":".4s"}\'>
                        Trending Collection
                    </h5>
                    <h3 class="banner-title p-relative font-weight-bolder ls-50 slide-animate"
                        data-animation-options=\'{"name":"fadeInLeftShorter","duration":"1s","delay":".2s"}\'>
                        <span class="text-white mr-4">Roller</span>-skate
                    </h3>',
                'button_text' => 'SHOP NOW',
                'button_link' => route('user.shop'),
                'updated_by' => 1,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
