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
        User::create([
            'name' => 'shehroz123',
            'email' => 'shehroz@example.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
            'verify_code' => Str::random(6),
            'email_verification_token' => Str::uuid(),
            'status' => 'active',
        ]);
    }
}
