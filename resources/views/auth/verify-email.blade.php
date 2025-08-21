@extends('user.layouts.app')

@section('content')
    <div class="justify-content-center pb-10 pt-10 row">
        <div class="col-lg-6" style="border-radius: 15px;box-shadow: 0px 1px 20px #cbced1;">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="mb-3">Verify Your Email Address</h4>

                    <p class="text-muted">
                        Thanks for signing up! Before getting started, please verify your email address by
                        clicking on the link we just emailed to you. <br>
                        If you didn’t receive the email, we’ll gladly send you another.
                    </p>

                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success mt-3 mb-3">
                            A new verification link has been sent to the email address you provided during registration.
                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <!-- Resend Verification Email -->
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Resend Verification Email
                            </button>
                        </form>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
