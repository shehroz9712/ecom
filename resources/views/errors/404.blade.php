<!-- Start of Main -->
@extends('user.layouts.app')
@section('content')
    <main class="main">
        <!-- Start of Page Content -->
        <div class="page-content error-404">
            <div class="container">
                <div class="banner">
                    <figure>
                        <img src="{{ asset('assets/user/images/pages/404.png') }}" alt="Error 404" width="820"
                            height="460" />
                    </figure>
                    <div class="banner-content text-center">
                        <h2 class="banner-title">
                            <span class="text-secondary">Oops!!!</span> Something Went Wrong Here
                        </h2>
                        <p class="text-light">There may be a misspelling in the URL entered, or the page you are looking for
                            may no longer exist</p>
                        <a href="demo1.html" class="btn btn-dark btn-rounded btn-icon-right">Go Back Home<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection
