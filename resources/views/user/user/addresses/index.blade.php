@extends('user.layouts.app')
@section('content')
    <main class="main my-account">
        <div class="page-content pt-2">
            <div class="container">
                <div class=" tab-vertical row gutter-lg">
                    @include('user.user.sidebar')

                    <div class="tab-content mb-6">
                        <!-- Dashboard Tab -->
                        <div class="tab-pane active in" id="account-addresses">
                            <div class="align-items-center d-flex justify-content-between">
                                <div>

                                    <div class="icon-box icon-box-side icon-box-light">
                                        <span class="icon-box-icon icon-map-marker">
                                            <i class="w-icon-map-marker"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                                        </div>
                                    </div>
                                    <p>The following addresses will be used on the checkout page
                                        by default.</p>
                                </div>
                                <div>

                                    <a href="{{ route('user.addresses.create') }}"
                                        class="btn btn-dark btn-rounded btn-icon-right">Add
                                        Address<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row mt-4">
                                <!-- Billing Address Section -->
                                @if ($addresses->count())
                                    @foreach ($addresses as $address)
                                        <div class="col-sm-6 mb-6">
                                            <div class="ecommerce-address billing-address pr-lg-8">
                                                <h4 class="title title-underline ls-25 font-weight-bold">Billing Address
                                                </h4>
                                                <address class="mb-4">
                                                    <table class="address-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Name:</th>
                                                                <td>{{ $address->full_name ?? 'N/A' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Company:</th>
                                                                <td>{{ $address->company ?? 'N/A' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Address:</th>
                                                                <td>
                                                                    {{ $address->address_line_1 ?? '' }}
                                                                    @if ($address->address_line_2)
                                                                        <br>{{ $address->address_line_2 }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>City:</th>
                                                                <td>{{ $address->city->name ?? 'N/A' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Country:</th>
                                                                <td>{{ $address->country->name ?? 'N/A' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Postcode:</th>
                                                                <td>{{ $address->postcode ?? 'N/A' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Phone:</th>
                                                                <td>{{ $address->phone ?? 'N/A' }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </address>
                                                <a href="{{ route('user.addresses.edit', $address->id) }}"
                                                    class="btn btn-link btn-underline btn-icon-right text-primary">
                                                    Edit your billing address<i class="w-icon-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>You haven't added any addresses yet.</p>
                                @endif


                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
@endsection
