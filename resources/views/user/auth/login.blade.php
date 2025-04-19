@extends('admin.layouts.auth')

@section('content')
    <section>
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
    </section>
@endsection
