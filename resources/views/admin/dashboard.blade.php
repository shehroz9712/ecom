@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    {{-- <h3>{{ $pageTitle }}</h3> --}}
                    {{ Breadcrumbs::render('dashboard') }}
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-6 box-col-12 des-xl-100 top-dealer-sec">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="header-top d-sm-flex justify-content-between align-items-center">
                            <h5>Top Agents</h5>
                            <div class="center-content">
                                <p class="d-sm-flex align-items-center"><span class="m-r-10">845
                                        Agents</span><i class="toprightarrow-primary fa fa-arrow-up m-r-10"></i>86% More
                                    Than Last Year</p>
                            </div>
                            <div class="setting-list">
                                <ul class="list-unstyled setting-option">
                                    <li>
                                        <div class="setting-primary"><i class="icon-settings"></i></div>
                                    </li>
                                    <li><i class="view-html fa fa-code font-primary"></i></li>
                                    <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                                    <li><i class="icofont icofont-minus minimize-card font-primary"></i>
                                    </li>
                                    <li><i class="icofont icofont-refresh reload-card font-primary"></i>
                                    </li>
                                    <li><i class="icofont icofont-error close-card font-primary"> </i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme" id="owl-carousel-14-2">
                            <div class="item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/1.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Johnson allon</h6>
                                                        <p>Bangladesh</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/3.png') }}"
                                                            alt="...">
                                                        <h6>williams reed</h6>
                                                        <p>Belgium</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/4.png') }}"
                                                            alt="...">
                                                        <h6> Jones king</h6>
                                                        <p>Canada</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/5.png') }}"
                                                            alt="...">
                                                        <h6>Brown davis</h6>
                                                        <p>China</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/6.png') }}"
                                                            alt="...">
                                                        <h6>Wilson Hill</h6>
                                                        <p>Denmark</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/7.png') }}"
                                                            alt="...">
                                                        <h6>Anderson ban</h6>
                                                        <p>Japan</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/1.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Johnson allon</h6>
                                                        <p>Bangladesh</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/3.png') }}"
                                                            alt="...">
                                                        <h6>williams reed</h6>
                                                        <p>Belgium</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/4.png') }}"
                                                            alt="...">
                                                        <h6> Jones king</h6>
                                                        <p>Canada</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/5.png') }}"
                                                            alt="...">
                                                        <h6>Brown davis</h6>
                                                        <p>China</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/6.png') }}"
                                                            alt="...">
                                                        <h6>Wilson Hill</h6>
                                                        <p>Denmark</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/7.png') }}"
                                                            alt="...">
                                                        <h6>Anderson ban</h6>
                                                        <p>Japan</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/1.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Johnson allon</h6>
                                                        <p>Bangladesh</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/3.png') }}"
                                                            alt="...">
                                                        <h6>williams reed</h6>
                                                        <p>Belgium</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/4.png') }}"
                                                            alt="...">
                                                        <h6> Jones king</h6>
                                                        <p>Canada</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/5.png') }}"
                                                            alt="...">
                                                        <h6>Brown davis</h6>
                                                        <p>China</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/6.png') }}"
                                                            alt="...">
                                                        <h6>Wilson Hill</h6>
                                                        <p>Denmark</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/7.png') }}"
                                                            alt="...">
                                                        <h6>Anderson ban</h6>
                                                        <p>Japan</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/1.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Johnson allon</h6>
                                                        <p>Bangladesh</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/3.png') }}"
                                                            alt="...">
                                                        <h6>williams reed</h6>
                                                        <p>Belgium</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/4.png') }}"
                                                            alt="...">
                                                        <h6> Jones king</h6>
                                                        <p>Canada</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/5.png') }}"
                                                            alt="...">
                                                        <h6>Brown davis</h6>
                                                        <p>China</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/6.png') }}"
                                                            alt="...">
                                                        <h6>Wilson Hill</h6>
                                                        <p>Denmark</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/7.png') }}"
                                                            alt="...">
                                                        <h6>Anderson ban</h6>
                                                        <p>Japan</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#top-dealer"
                                title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 box-col-12 des-xl-100 top-dealer-sec">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="header-top d-sm-flex justify-content-between align-items-center">
                            <h5>Top Tours</h5>
                            <div class="center-content">
                                <p class="d-sm-flex align-items-center"><span class="m-r-10">845
                                        Tours</span><i class="toprightarrow-primary fa fa-arrow-up m-r-10"></i>86% More
                                    Than Last Year</p>
                            </div>
                            <div class="setting-list">
                                <ul class="list-unstyled setting-option">
                                    <li>
                                        <div class="setting-primary"><i class="icon-settings"></i></div>
                                    </li>
                                    <li><i class="view-html fa fa-code font-primary"></i></li>
                                    <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                                    <li><i class="icofont icofont-minus minimize-card font-primary"></i>
                                    </li>
                                    <li><i class="icofont icofont-refresh reload-card font-primary"></i>
                                    </li>
                                    <li><i class="icofont icofont-error close-card font-primary"> </i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme" id="owl-carousel-14">
                            <div class="item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/1.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Johnson allon</h6>
                                                        <p>Bangladesh</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/3.png') }}"
                                                            alt="...">
                                                        <h6>williams reed</h6>
                                                        <p>Belgium</p><a class="btn btn-rounded"
                                                            href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/4.png') }}"
                                                            alt="...">
                                                        <h6> Jones king</h6>
                                                        <p>Canada</p><a class="btn btn-rounded"
                                                            href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/5.png') }}"
                                                            alt="...">
                                                        <h6>Brown davis</h6>
                                                        <p>China</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/6.png') }}"
                                                            alt="...">
                                                        <h6>Wilson Hill</h6>
                                                        <p>Denmark</p><a class="btn btn-rounded"
                                                            href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/7.png') }}"
                                                            alt="...">
                                                        <h6>Anderson ban</h6>
                                                        <p>Japan</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/1.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Johnson allon</h6>
                                                        <p>Bangladesh</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/3.png') }}"
                                                            alt="...">
                                                        <h6>williams reed</h6>
                                                        <p>Belgium</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/4.png') }}"
                                                            alt="...">
                                                        <h6> Jones king</h6>
                                                        <p>Canada</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/5.png') }}"
                                                            alt="...">
                                                        <h6>Brown davis</h6>
                                                        <p>China</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/6.png') }}"
                                                            alt="...">
                                                        <h6>Wilson Hill</h6>
                                                        <p>Denmark</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/7.png') }}"
                                                            alt="...">
                                                        <h6>Anderson ban</h6>
                                                        <p>Japan</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/1.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Johnson allon</h6>
                                                        <p>Bangladesh</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/3.png') }}"
                                                            alt="...">
                                                        <h6>williams reed</h6>
                                                        <p>Belgium</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/4.png') }}"
                                                            alt="...">
                                                        <h6> Jones king</h6>
                                                        <p>Canada</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/5.png') }}"
                                                            alt="...">
                                                        <h6>Brown davis</h6>
                                                        <p>China</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/6.png') }}"
                                                            alt="...">
                                                        <h6>Wilson Hill</h6>
                                                        <p>Denmark</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/7.png') }}"
                                                            alt="...">
                                                        <h6>Anderson ban</h6>
                                                        <p>Japan</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/1.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Johnson allon</h6>
                                                        <p>Bangladesh</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/3.png') }}"
                                                            alt="...">
                                                        <h6>williams reed</h6>
                                                        <p>Belgium</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/4.png') }}"
                                                            alt="...">
                                                        <h6> Jones king</h6>
                                                        <p>Canada</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="owl-carousel-16 owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/5.png') }}"
                                                            alt="...">
                                                        <h6>Brown davis</h6>
                                                        <p>China</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/6.png') }}"
                                                            alt="...">
                                                        <h6>Wilson Hill</h6>
                                                        <p>Denmark</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/7.png') }}"
                                                            alt="...">
                                                        <h6>Anderson ban</h6>
                                                        <p>Japan</p><a class="btn btn-rounded" href="social-app.html">View
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center"><img class="card-img-top"
                                                            src="{{ asset('assets/admin/images/dashboard-2/8.png') }}"
                                                            alt="...">
                                                        <h6>Thompson lee</h6>
                                                        <p>Malasiya</p><a class="btn btn-rounded"
                                                            href="social-app.html">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#top-dealer"
                                title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-md-12 des-xl-100 box-col-12">
                <div class="row">
                    <div class="col-xl-6 box-col-6 top-sell-sec">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="header-top d-sm-flex justify-content-between align-items-center">
                                    <h5>Top Selling Product</h5>
                                    <div class="center-content">
                                        <ul class="week-date">
                                            <li class="font-primary">Today</li>
                                            <li>Month</li>
                                        </ul>
                                    </div>
                                    <div class="setting-list">
                                        <ul class="list-unstyled setting-option">
                                            <li>
                                                <div class="setting-primary"><i class="icon-settings"></i>
                                                </div>
                                            </li>
                                            <li><i class="view-html fa fa-code font-primary"></i></li>
                                            <li><i class="icofont icofont-maximize full-card font-primary"></i>
                                            </li>
                                            <li><i class="icofont icofont-minus minimize-card font-primary"></i>
                                            </li>
                                            <li><i class="icofont icofont-refresh reload-card font-primary"></i>
                                            </li>
                                            <li><i class="icofont icofont-error close-card font-primary"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="media"><img class="img-fluid"
                                        src="{{ asset('assets/admin/images/dashboard-2/9.png') }}" alt="">
                                    <div class="media-body"><a href="product-page.html">
                                            <h6>Trending Nike shoes</h6>
                                        </a>
                                        <p>New Offer Only $126.00</p>
                                        <ul class="rating-star">
                                            <li> <i class="fa fa-star"></i></li>
                                            <li> <i class="fa fa-star"></i></li>
                                            <li> <i class="fa fa-star"></i></li>
                                            <li> <i class="fa fa-star"></i></li>
                                            <li> <i class="fa fa-star"></i></li>
                                        </ul>
                                    </div><a class="btn btn-iconsolid" href="cart.html"><i class="icon-bag"></i></a>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard"
                                        data-clipboard-target="#top-selling-product" title="Copy"><i
                                            class="icofont icofont-copy-alt"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 box-col-3 chart_data_right">
                        <div class="card income-card card-secondary">
                            <div class="card-body align-items-center">
                                <div class="round-progress knob-block text-center">
                                    <div class="progress-circle">
                                        <input class="knob1" data-width="10" data-height="70" data-thickness=".3"
                                            data-angleoffset="0" data-linecap="round" data-fgcolor="#ba895d"
                                            data-bgcolor="#e0e9ea" value="60">
                                    </div>
                                    <h5>$9,84,235</h5>
                                    <p>Our Annual Income</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 box-col-3 chart_data_right second">
                        <div class="card income-card card-primary">
                            <div class="card-body">
                                <div class="round-progress knob-block text-center">
                                    <div class="progress-circle">
                                        <input class="knob1" data-width="50" data-height="70" data-thickness=".3"
                                            data-fgcolor="#24695c" data-linecap="round" data-angleoffset="0"
                                            value="60">
                                    </div>
                                    <h5>$4,55,462</h5>
                                    <p>Our Annual Income</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
    <!-- Container-fluid Ends-->
    </div>
@endsection
