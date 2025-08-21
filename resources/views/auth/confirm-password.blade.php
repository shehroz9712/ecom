@extends('user.layouts.app')

@section('content')
    <div class="justify-content-center pb-10 pt-10 row">
        <div class="col-lg-5" style="border-radius: 15px;box-shadow: 0px 1px 20px #cbced1;">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-3">Confirm Password</h4>
                    <p class="text-muted text-center mb-4">
                        This is a secure area of the application.<br>
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

                        <!-- Submit -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">
                                Confirm
                            </button>
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
