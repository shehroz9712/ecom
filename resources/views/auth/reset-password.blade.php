@extends('user.layouts.app')

@section('content')
    <div class="justify-content-center pb-10 pt-10 row">
        <div class="col-lg-5" style="border-radius: 15px;box-shadow: 0px 1px 20px #cbced1;">
            <div class="card">
                <div class="card-body">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#reset-password" class="nav-link active">Reset Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="reset-password">
                                <form method="POST" action="{{ route('password.store') }}" class="theme-form login-form">
                                    @csrf

                                    <!-- Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <!-- Email -->
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email', $request->email) }}" required autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- New Password -->
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="password">New Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        <input id="password_confirmation" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" required autocomplete="new-password">

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Submit -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Reset Password
                                        </button>
                                    </div>

                                    <div class="text-center mt-3">
                                        <p><a href="{{ route('login') }}">Back to Login</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
