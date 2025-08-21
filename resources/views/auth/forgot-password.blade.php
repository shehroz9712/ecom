@extends('user.layouts.app')

@section('content')
    <div class="justify-content-center pb-10 pt-10 row">
        <div class="col-lg-5" style="border-radius: 15px;box-shadow: 0px 1px 20px #cbced1;">
            <div class="card">
                <div class="card-body">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#forgot-password" class="nav-link active">Forgot Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="forgot-password">
                                @if (session('status'))
                                    <div class="alert alert-success mb-3" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}" class="theme-form login-form">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Send Password Reset Link
                                        </button>
                                    </div>

                                    <div class="text-center mt-3">
                                        <p>
                                            <a href="{{ route('login') }}">Back to Login</a>
                                        </p>
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
