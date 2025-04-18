<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    private $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    // Registration
    public function register(RegisterUserRequest $request)
    {
        $user = $this->authRepository->registerUser($request->validated());
        return $this->respondSuccess(['user' => $user], 'User registered successfully!');
    }

    // Login
    public function login(LoginUserRequest $request)
    {
        $data = $this->authRepository->loginUser($request->only('email', 'password'), $request->ip());

        if (!$data) {
            return $this->respondUnauthorized(['email' => ['Invalid credentials']], false, 'Unauthorized!');
        }

        return $this->respondSuccess([
            'user' => $data['user'],
            'token' => $data['token'],
        ], 'Login successful!');
    }


    // Logout
    public function logout(Request $request)
    {
        if ($this->authRepository->logoutUser($request)) {
            return $this->respondSuccess([], 'Logged out successfully!');
        }
        return $this->respondUnauthorized([], false, 'No authenticated user!');
    }

    // Verify Email
    public function verifyEmail($token)
    {
        $user = $this->authRepository->verifyEmail($token);
        if (!$user) {
            return $this->respondNotFound([], false, 'Invalid or expired verification token!');
        }
        return $this->respondSuccess([
            'user' => $user,
            'token' => $token
        ], 'Email verified successfully.');
    }

    // Resend Verification Email
    public function resendVerificationEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = $this->authRepository->resendVerificationEmail($request->email);

        if (!$user) {
            return $this->respondNotFound([], false, 'Email not found or already verified!');
        }
        return $this->respondSuccess([], 'Verification email resent successfully!');
    }

    // Forgot Password
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = $this->authRepository->forgotPassword($request->email);

        if (!$user) {
            return $this->respondNotFound([], false, 'Email not found!');
        }
        return $this->respondSuccess([], 'Password reset code sent to email!');
    }

    // Update Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'verify_code' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = $this->authRepository->updatePassword($request->only(['email', 'verify_code', 'password']));
        if (!$user) {
            return $this->respondNotFound([], false, 'Invalid verification code or email!');
        }
        return $this->respondSuccess([], 'Password updated successfully!');
    }

    // Create Guest User
    public function createGuestUser()
    {
        $guestUser = $this->authRepository->createGuestUser();
        return $this->respondSuccess(['user' => $guestUser], 'Guest user created successfully!');
    }
}
