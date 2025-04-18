<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Models\Package;
use App\Traits\EmailSenderTrait;

class AuthRepository implements AuthRepositoryInterface
{
    use EmailSenderTrait;

    public function registerUser(array $data)
    {
        $verificationToken = Str::random(64);

        // Find referred user
        $referralBy = User::where('referral_link', $data['referred_by'] ?? '')->value('id') ?? 1;

        // Get free package
        $freePackage = Package::firstOrFail();

        // Create user
        $user = User::create([
            'name'        => $data['name'],
            'email'       => $data['email'],
            'contact'     => $data['contact'],
            'country_id'  => $data['country_id'],
            'password'    => Hash::make($data['password']),
            'email_verification_token' => $verificationToken,
            'referral_by' => $referralBy,
        ]);

        // Generate referral link
        $firstWord = explode(' ', $user->name)[0] ?? '';
        $user->update([
            'referral_link'   => $firstWord . $user->id,
            'last_login_at' => now(),
        ]);

        // Assign default role
        $userRole = Role::firstOrCreate(['name' => 'User', 'guard_name' => 'api']);
        $user->assignRole($userRole);

        // Assign package
        if ($userRole->name == 'User') {
            $user->details()->create([
                'package_id'  => $freePackage->id,
                'start_date'  => now(),
                'coins'       => 2,
                'coin_start_date' => now(),
                'coin_end_date'   => now()->addDays(30),
            ]);
        }

        // Send verification email
        $this->sendEmail($user->email, $user->name, 'AIPro Resume - Email Verification', 'account_verify', [
            'email'       => $user->email,
            'verification_url'  => config('app.frontend_url') . '/verify-user/token=' . $verificationToken,
            'to_name' => $user->name,
        ]);

        return $user;
    }

    // Login
    public function loginUser(array $credentials, $ip = null)
    {
        if (!Auth::attempt($credentials)) {
            return null;
        }

        $user = Auth::user();

        $user->update([
            'last_login_at' => now(),
            'last_login_ip' => $ip,
        ]);

        $token = $this->createUserToken($user, 'login');

        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    protected function createUserToken($user, $name = 'default')
    {
        return $user->createToken($name)->accessToken;
    }

    public function logoutUser(Request $request)
    {
        if ($request->user()) {
            $request->user()->token()->revoke();
            return true;
        }
        return false;
    }

    // Get Authenticated User
    public function verifyEmail(string $token)
    {
        $user = User::where('email_verification_token', $token)->first();
        if (!$user) {
            return null;
        }
        // Update user verification status
        $user->update([
            'email_verified_at' => now(),
            'email_verification_token' => null,
        ]);

        $tokenResult = $user->createToken('authToken');
        $token = $tokenResult->accessToken;

        return $user;
    }

    public function resendVerificationEmail(string $email)
    {
        $user = User::where('email', $email)->first();
        if (!$user || $user->email_verified_at) {
            return null;
        }
        // Generate a new verification token
        $verificationToken = Str::random(64);
        $user->update(['email_verification_token' => $verificationToken]);

        $this->sendEmail($user->email, $user->name, 'Resent Email Verification', 'account_verify', [
            'email'       => $user->email,
            'verification_url'  => config('app.frontend_url') . '/verify-user/token=' . $verificationToken,
            'to_name' => $user->name,
        ]);

        return $user;
    }

    public function forgotPassword(string $email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return null;
        }

        $code = random_int(10000, 99999);
        $user->update(['verify_code' => $code]);

        $this->sendEmail($user->email, $user->name, 'Forgot Password', 'forgot_password', [
            'email' => $user->email,
            'verify_code' => $code,
            'to_name' => $user->name,
        ]);

        return $user;
    }

    public function updatePassword(array $data)
    {
        $user = User::where(['email' => $data['email'], 'verify_code' => $data['verify_code']])->first();
        if (!$user) {
            return null;
        }

        $user->update([
            'password' => Hash::make($data['password']),
            'verify_code' => null,
        ]);

        return $user;
    }

    public function createGuestUser()
    {
        $timestamp = now()->timestamp;
        return User::create([
            'name' => "guest_{$timestamp}",
            'email' => "guest_{$timestamp}@guest.com",
            'password' => Hash::make('12345678'),
        ]);
    }
}
