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
                                <form method="POST" action="{{ route(name: 'user.login') }}" class="theme-form login-form">
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
                                        <a href="#">Last your password?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="sign-up">
                                <form method="POST" action="{{ route('user.register.store') }}" class="theme-form login-form">
                                    @csrf
                                    <!-- Personal Information -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="name">Username</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="username"
                                            value="{{ old('name') }}" required autocomplete="username" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label class="form-label" for="first_name">First Name</label>
                                                <input id="first_name" type="text"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    name="first_name" value="{{ old('first_name') }}" required>
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label class="form-label" for="last_name">Last Name</label>
                                                <input id="last_name" type="text"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    name="last_name" value="{{ old('last_name') }}" required>
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
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

                                    <div class="form-group mb-2">
                                        <label class="form-label" for="mobile_number">Mobile Number</label>
                                        <input id="mobile_number" type="tel"
                                            class="form-control @error('mobile_number') is-invalid @enderror"
                                            name="mobile_number" value="{{ old('mobile_number') }}">
                                        @error('mobile_number')
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
                                            I agree to the <a href="#">Terms and Conditions</a>
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Register</button>

                                    <div class="text-center mt-3">
                                        <p>Already have an account? <a href="{{ route('user.login') }}">Login here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <p class="text-center">Sign in with social account</p>
                        <div class="social-icons social-icon-border-color d-flex justify-content-center">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7">
                    <img class="bg-img-cover bg-center"
                        src="https://statics.vinwonders.com/international-travel-0_1684821084.jpg" alt="looginpage">
                </div>
                <div class="col-xl-5 p-0">
                    <div class="login-card">
                        <form method="POST" action="{{ route('admin.login') }}" class="theme-form login-form">

                            <div class="text-center mb-3">
                                <img class="img-fluid" src="{{ asset('assets/admin/images/logo/logobg.png') }}"
                                    alt="">
                            </div>
                            <h4>Login</h4>
                            <h6>Welcome back Bin Sohail Admin Panel! Log in to your account.</h6>
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
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--end form-group-->

                            <div class="form-group row mt-3">
                                <div class="col-sm-6">
                                    <div class="form-check form-switch form-switch-success">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div><!--end col-->

                            </div><!--end form-group-->

                            <div class="form-group mb-0 row">
                                <div class="col-12">
                                    <div class="d-grid mt-3">
                                        <button class="btn btn-primary" type="submit">Log In <i
                                                class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                </div><!--end col-->
                            </div> <!--end form-group-->
                        </form><!--end form-->
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
