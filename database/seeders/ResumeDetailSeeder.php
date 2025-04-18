<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Resume;
use App\Models\ResumeDetail;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Certification;
use App\Models\Award;
use App\Models\Language;
use App\Models\Reference;
use App\Models\CustomSection;
use Illuminate\Support\Facades\DB;

class ResumeDetailSeeder extends Seeder
{
    public function run()
    {
        $resumes = Resume::all();

        // Create dummy data for each shareable model
        foreach ($resumes as $resume) {
            // Creating multiple records for Experience
            $experiences = [
                [
                    'job_position' => 'Software Developer',
                    'company_name' => 'Tech Corp',
                    'start_date' => '2020-01-01',
                    'end_date' => '2022-12-31',
                    'user_id' => 1,
                    'country_id' => 1,
                    'state' => 'sindh',
                    'city' => 'karachi',
                    'company_description' => 'Tech Corp Description',
                    'job_description' => 'Software Developer Description',
                ],
                [
                    'job_position' => 'Junior Developer',
                    'company_name' => 'Web Solutions Inc.',
                    'start_date' => '2022-01-01',
                    'end_date' => '2024-12-31',
                    'user_id' => 1,
                    'country_id' => 1,
                    'state' => 'sindh',
                    'city' => 'karachi',
                    'company_description' => 'Tech Corp Description',
                    'job_description' => 'Junior Developer Description',
                ]
            ];

            // Loop through and create each experience
            foreach ($experiences as $experienceData) {
                $experience = Experience::create($experienceData);

                ResumeDetail::create([
                    'resume_id' => $resume->id,
                    'shareable_type' => Experience::class,
                    'shareable_id' => $experience->id,
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }

            // Creating multiple records for Education
            $educations = [
                [
                    'institution' => 'University X',
                    'degree' => 'Bachelor of Science in Computer Science',
                    'start_date' => '2020-01-01',
                    'end_date' => '2022-12-31',
                    'user_id' => 1,
                    'field' => 'Computer Science',
                    'grade' => 'A+',
                    'grade_type' => 'cgpa',
                ],
                [
                    'institution' => 'University Y',
                    'degree' => 'Master of Science in Computer Science',
                    'start_date' => '2023-01-01',
                    'end_date' => '2025-12-31',
                    'user_id' => 1,
                    'field' => 'Computer Science',
                    'grade' => 'A+',
                    'grade_type' => 'cgpa',
                ]
            ];

            // Loop through and create each education
            foreach ($educations as $educationData) {
                $education = Education::create($educationData);

                ResumeDetail::create([
                    'resume_id' => $resume->id,
                    'shareable_type' => Education::class,
                    'shareable_id' => $education->id,
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }

            // Creating a single record for Certification
            $certification = Certification::create([
                'title' => 'Certified Laravel Developer',
                'description' => 'Laravel Certification Institute',
                'institute' => 'Abc Institution',
                'date' => '2023-01-01',
                'user_id' => 1,
            ]);

            ResumeDetail::create([
                'resume_id' => $resume->id,
                'shareable_type' => Certification::class,
                'shareable_id' => $certification->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            // Creating a single record for Award
            $award = Award::create([
                'name' => 'Best Developer of the Year',
                'description' => 'Best Developer Description',
                'date' => '2023-01-01',
                'user_id' => 1,
            ]);

            ResumeDetail::create([
                'resume_id' => $resume->id,
                'shareable_type' => Award::class,
                'shareable_id' => $award->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            // Creating multiple records for Language
            $languages = [
                [
                    'name' => 'Urdu',
                    'code' => 'ur',
                    'level' => 5,
                    'user_id' => 1,
                ],
                [
                    'name' => 'Sindhi',
                    'code' => 'sd',
                    'level' => 4,
                    'user_id' => 1,
                ]
            ];

            // Loop through and create each language
            foreach ($languages as $languageData) {
                $language = Language::create($languageData);

                ResumeDetail::create([
                    'resume_id' => $resume->id,
                    'shareable_type' => Language::class,
                    'shareable_id' => $language->id,
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }

            // Creating a single record for Reference
            $reference = Reference::create([
                'name' => 'John Doe',
                'contact_no' => '1234567890',
                'email' => 'testdev@gmail.com',
                'designation' => 'Manager',
                'user_id' => 1,
                'company' => 'Tech Corp',
            ]);

            ResumeDetail::create([
                'resume_id' => $resume->id,
                'shareable_type' => Reference::class,
                'shareable_id' => $reference->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            // Creating a single record for Custom Section
            $customSection = CustomSection::create([
                'title' => 'Volunteer Experience',
                'description' => 'Volunteered for a non-profit organization for 2 years.',
                'user_id' => 1,
            ]);

            ResumeDetail::create([
                'resume_id' => $resume->id,
                'shareable_type' => CustomSection::class,
                'shareable_id' => $customSection->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }

}
