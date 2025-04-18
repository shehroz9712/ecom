<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface AuthRepositoryInterface
{
    public function registerUser(array $data);
    public function loginUser(array $credentials);
    public function logoutUser(Request $request);
    public function verifyEmail(string $token);
    public function resendVerificationEmail(string $email);
    public function forgotPassword(string $email);
    public function updatePassword(array $data);
    public function createGuestUser();
}
