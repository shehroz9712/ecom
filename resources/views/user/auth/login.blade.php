@extends('user.layouts.app')

@section('content')
    <div class="login-popup">
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
                <div class="tab-pane active" id="sign-in">
                    <form method="POST" action="{{ route(name: 'login') }}" class="theme-form login-form">
                        @csrf
                        <div class="form-group">
                            <label>Username or email address *</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="form-group mb-0">
                            <label>Password *</label>
                            <input type="text" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-checkbox" id="remember" name="remember" required="">
                            <label for="remember">Remember me</label>
                            <a href="#">Last your password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>
                </div>
                <div class="tab-pane" id="sign-up">
                    <div class="form-group">
                        <label>Your Email address *</label>
                        <input type="text" class="form-control" name="email_1" id="email_1" required>
                    </div>
                    <div class="form-group mb-5">
                        <label>Password *</label>
                        <input type="text" class="form-control" name="password_1" id="password_1" required>
                    </div>
                    <p>Your personal data will be used to support your experience
                        throughout this website, to manage access to your account,
                        and for other purposes described in our <a href="#" class="text-primary">privacy policy</a>.
                    </p>
                    <a href="#" class="d-block mb-5 text-primary">Signup as a vendor?</a>
                    <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                        <input type="checkbox" class="custom-checkbox" id="agree" name="agree" required="">
                        <label for="agree" class="font-size-md">I agree to the <a href="#"
                                class="text-primary font-size-md">privacy policy</a></label>
                    </div>
                    <a href="#" class="btn btn-primary">Sign Up</a>
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
