<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PageSectionSeeder extends Seeder
{
    public function run(): void
    {

        PageSection::insert([
            [
                'page_id'        => 1,
                'section_layout' => 'image-right',
                'section_name'   => 'our-story',
                'heading'        => 'Our Story',
                'description'    => 'AI Pro Resume started with a single aim: to make global job search easier for everyone. We understand that getting noticed can be tough due to excessive competition. Therefore, we developed a platform that caters to all your requirements and permits you to find your desired jobs easily. As a smart resume builder, our core mission is to combine AI technology with creative features that save time and make your professional profile incredible. Our focus is not just creating an ATS-friendly resume builder platform; we want to empower job seekers with professional resumes and cover letters that truly represent them and help them get the job they deserve. Join us for a successful career journey.',
                'images'         => '1',
                'button_name'    => 'Contact Us',
                'button_url'     => '/contact-us',
                'counter'        => null,
                'status'         => 'active',
                'sort'           => 5,
                'created_by'     => 1,
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'page_id'        => 1,
                'section_layout' => 'image-left',
                'section_name'   => 'what-we-offer',
                'heading'        => 'What we offer',
                'description'    => 'We provide everything you need to stand out in the job market. Our certified resume writers make your application process smooth and stress-free. With our best AI job application tool, you can generate your ideal resumes and cover letters in seconds. If you are not in the mood to create a resume or cover letter manually, let our experts help you. AI Pro Resume is your AI resume assistant that offers captivating templates that easily pass ATS scanners. You can use our resume parser, which accurately fetches your data to reduce your manual efforts. With us, you can customize your resume and cover letter template smoothly.',
                'images'         => '1,1',
                'button_name'    => 'Learn More',
                'button_url'     => '/blogs',
                'counter'        => '638+ Satisfied Clients',
                'status'         => 'active',
                'sort'           => 5,
                'created_by'     => 1,
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ]
        ]);
    }
}
