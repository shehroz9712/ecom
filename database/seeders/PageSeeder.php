<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PageSeeder extends Seeder
{
    public function run(): void
    {

        Page::insert([
            [
                'title'                 => 'About Us',
                'slug'                  => 'about-us',
                'heading'               => 'Turning Job Applications into Opportunities',
                'page_image'            => NULL,
                'short_description'     => 'AI Pro Resume is an all-in-one platform offering everything a job hunter needs. From easy resume format to expert tips, we have all that assist you in landing your dream interview.',
                'long_description'      => NULL,
                'meta_keywords'         => 'Resume,Job, AI, Machine Learning',
                'meta_description'      => 'Ai Pro Resume',
                'status'                => 'active',
                'created_by'            => 1,
                'sort'                  => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
