@extends('user.layouts.app')

@section('content')
    <div class="justify-content-center pb-10 pt-10 row">
        <div class="col-lg-5" style="border-radius: 15px;box-shadow: 0px 1px 20px #cbced1;">
            <div class="card">
                <div class="card-body">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sign-up" class="nav-link">Sign Up</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">`
                                <form method="POST" action="{{ route(name: 'login') }}" class="theme-form login-form">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="username">Username</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!--end form-group-->

                                    <div class="mt-3 form-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-checkbox" id="remember"
                                            {{ old('remember') ? 'checked' : '' }} name="remember">
                                        <label for="remember">Remember me</label>
                                        <a href="{{ route('password.request') }}">Last your password?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="sign-up">
                                <form method="POST" action="{{ route('register.store') }}" class="theme-form login-form">
                                    @csrf
                                    <!-- Personal Information -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="name">User name</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <!-- Contact Information -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <!-- Security -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="password">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required>
                                    </div>

                                    <!-- Terms Agreement -->
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a
                                                href="{{ route('user.page', ['slug' => 'terms-and-conditions']) }}">Terms
                                                and Conditions</a>
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Register</button>

                                    <div class="text-center mt-3">
                                        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- <p class="text-center">Sign in with social account</p>
                        <div class="social-icons social-icon-border-color d-flex justify-content-center">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-google fab fa-google"></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const msg = localStorage.getItem('error');
            if (msg) {
                toastr.error(msg);

                localStorage.removeItem('error');
            }
        });
    </script>
@endsection
