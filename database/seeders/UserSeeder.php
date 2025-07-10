<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([[
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('password1'),
            'email_verified_at' => now(),
            'verify_code' => Str::random(6),
            'email_verification_token' => Str::uuid(),
            'status' => 'active',
        ], [
            'name' => 'vendor',
            'email' => 'vendor@example.com',
            'password' => Hash::make('password1'),
            'email_verified_at' => now(),
            'verify_code' => Str::random(6),
            'email_verification_token' => Str::uuid(),
            'status' => 'active',
        ]]);
    }
}
