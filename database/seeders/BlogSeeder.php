<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Education;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BlogSeeder extends Seeder
{
   
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 5; $i++) { 
            $blog = new Blog();

            $blog->title = $faker->realText(50);
            $blog->image = 1;
            $blog->short_description = $faker->paragraph(2);
            $blog->long_description = $faker->paragraphs(3, true);
            $blog->author_name = $faker->name();
            $blog->author_image = 1;
            $blog->meta_keyword = $faker->realText(20);
            $blog->meta_description = $faker->realText(50);
            $blog->status = 'active';

            $blog->save();
        }
    }
}
