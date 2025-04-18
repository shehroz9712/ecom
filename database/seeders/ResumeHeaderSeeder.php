<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResumeHeader;
use Illuminate\Support\Facades\DB;

class ResumeHeaderSeeder extends Seeder
{
    public function run(): void
    {
        $userId1 = DB::table('users')->value('id') ?? 1;
        $userId2 = DB::table('users')->orderByDesc('id')->value('id') ?? 2;
        $resumeId = DB::table('resumes')->value('id') ?? 1;
        $mediaId = DB::table('media')->value('id') ?? 1;
        $countryId = DB::table('countries')->value('id') ?? 1;
        $stateId = DB::table('states')->value('id') ?? NULL;
        $cityId = DB::table('cities')->value('id') ?? NULL;

        ResumeHeader::insert([
            [
                'first_name'     => 'John',
                'last_name'      => 'Doe',
                'email'          => 'john.doe@example.com',
                'job_position'   => 'Full Stack Developer',
                'contact'        => 'LinkedIn: johndoe',
                'phone_number'   => '+1234567890',
                'website'        => 'https://johndoe.dev',
                'address'        => '123 Resume Street',
                'postal_code'    => '12345',
                'status'         => 'active',
                'user_id'        => $userId1,
                'resume_id'      => $resumeId,
                'media_id'       => $mediaId,
                'country_id'     => $countryId,
                'state_id'       => $stateId,
                'city_id'        => $cityId,
                'created_by'     => $userId1,
                'updated_by'     => $userId1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'first_name'     => 'Jane',
                'last_name'      => 'Smith',
                'email'          => 'jane.smith@example.com',
                'job_position'   => 'UX/UI Designer',
                'contact'        => 'Behance: janesmith',
                'phone_number'   => '+1987654321',
                'website'        => 'https://janesmith.design',
                'address'        => '456 Portfolio Avenue',
                'postal_code'    => '67890',
                'status'         => 'active',
                'user_id'        => $userId2,
                'resume_id'      => $resumeId,
                'media_id'       => $mediaId,
                'country_id'     => $countryId,
                'state_id'       => $stateId,
                'city_id'        => $cityId,
                'created_by'     => $userId2,
                'updated_by'     => $userId2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}
