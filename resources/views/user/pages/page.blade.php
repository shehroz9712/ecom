@extends('user.layouts.app')
@section('content')
    <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
        style="background-image: url({{ asset('assets/user/images/shop/banner1.jpg') }}); background-color: #FFC74E;">
        <div class="banner-content">
            <h4 class="banner-subtitle font-weight-bold">{{ $page->title }}</h4>
            <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">{{ $page->heading }}</h3>
            {{-- <a href="#" class="btn btn-dark btn-rounded btn-icon-right">Discover
                            Now<i class="w-icon-long-arrow-right"></i></a> --}}
        </div>
    </div>
    <!-- Start of Page Content -->
    <div class="container">
        <section class="introduce mb-10 pb-10">
            <p>{!! $page->long_description !!}</p>
        </section>
    </div>
@endsection
