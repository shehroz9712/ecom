@extends('user.layouts.app')

@section('content')
    <div class="justify-content-center pb-10 pt-10 row">
        <div class="col-lg-5" style="border-radius: 15px;box-shadow: 0px 1px 20px #cbced1;">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-3">Confirm Password</h4>
                    <p class="text-muted text-center mb-4">
                        Please confirm your password before continuing.
                    </p>

                    <form method="POST" action="{{ route('password.confirm') }}" class="theme-form login-form">
                        @csrf

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Submit + Forgot Password -->
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">
                                Confirm Password
                            </button>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    Forgot Your Password?
                                </a>
                            @endif
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
