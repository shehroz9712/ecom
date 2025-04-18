<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resume;
use Carbon\Carbon;

class ResumeSeeder extends Seeder
{
    public function run(): void
    {
        $templateId = 1;
        $userId1 = 1;
        $userId2 = 1;

        Resume::insert([
            [
                'resume_title'         => 'John Doe Resume',
                'resume_first_name'    => 'John',
                'resume_last_name'     => 'Doe',
                'resume_job_title'     => 'Backend Developer',
                'resume_phone_no'      => '+1234567890',
                'resume_email'         => 'john.doe@example.com',
                'resume_website_link'  => 'https://johndoe.dev',
                'resume_summary'       => 'Experienced backend developer with 5+ years in Laravel and Node.js.',

                'heading_fontsize'     => '16px',
                'paragraph_fontsize'   => '14px',
                'heading_font_style'   => 'Arial Bold',
                'paragraph_font_style' => 'Arial',
                'top_bottom_margins'   => '30px',
                'side_margins'         => '20px',
                'paragraph_spacing'    => '10px',
                'section_spacing'      => '20px',
                'color'                => '#333333',

                'show_experience'       => true,
                'show_certificates'     => true,
                'show_awards'           => true,
                'show_references'       => true,
                'show_languages'        => true,
                'show_technical_skills' => true,
                'show_soft_skills'      => true,
                'status'                => 'active',

                'template_id' => $templateId,
                'user_id'     => $userId1,
                'created_by'  => $userId1,
                'updated_by'  => $userId1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'resume_title'         => 'Jane Smith CV',
                'resume_first_name'    => 'Jane',
                'resume_last_name'     => 'Smith',
                'resume_job_title'     => 'UI/UX Designer',
                'resume_phone_no'      => '+1987654321',
                'resume_email'         => 'jane.smith@example.com',
                'resume_website_link'  => 'https://janesmith.design',
                'resume_summary'       => 'Creative designer with a passion for user experience and visual storytelling.',

                'heading_fontsize'     => '18px',
                'paragraph_fontsize'   => '15px',
                'heading_font_style'   => 'Helvetica Bold',
                'paragraph_font_style' => 'Helvetica',
                'top_bottom_margins'   => '25px',
                'side_margins'         => '15px',
                'paragraph_spacing'    => '12px',
                'section_spacing'      => '25px',
                'color'                => '#000000',

                'show_experience'       => true,
                'show_certificates'     => false,
                'show_awards'           => true,
                'show_references'       => false,
                'show_languages'        => true,
                'show_technical_skills' => false,
                'show_soft_skills'      => true,
                'status'                => 'active',

                'template_id' => $templateId,
                'user_id'     => $userId2,
                'created_by'  => $userId2,
                'updated_by'  => $userId2,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
