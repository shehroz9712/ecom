@extends('user.layouts.app')
@section('content')
    <main class="main my-account">
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        <li class="nav-item">
                            <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-orders" class="nav-link">Orders</a>
                        </li>

                        <li class="nav-item">
                            <a href="#account-addresses" class="nav-link">Addresses</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-details" class="nav-link">Account details</a>
                        </li>
                        <li class="link-item">
                            <a href="{{ route('user.wishlist') }}">Wishlist</a>
                        </li>
                        <li class="link-item">
                            <a href="{{ route('logout') }}" class="text-primary"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log out
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content mb-6">
                        <!-- Dashboard Tab -->
                        <div class="tab-pane active in" id="account-dashboard">
                            <p class="greeting">
                                Hello
                                <span class="text-dark font-weight-bold">{{ Auth::user()->name }}</span>
                                (not
                                <span class="text-dark font-weight-bold">{{ Auth::user()->name }}</span>?
                                <a href="{{ route('logout') }}" class="text-primary"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log out
                                </a>)
                            </p>

                            <p class="mb-4">
                                From your account dashboard you can view your
                                <a href="#account-orders" class="text-primary link-to-tab">recent orders</a>,
                                manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping and
                                    billing addresses</a>, and
                                <a href="#account-details" class="text-primary link-to-tab">edit your password and account
                                    details.</a>
                            </p>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-orders" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-orders">
                                                <i class="w-icon-orders"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Orders</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-addresses" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-address">
                                                <i class="w-icon-map-marker"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Addresses</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-details" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-account">
                                                <i class="w-icon-user"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Account Details</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{ route('user.wishlist') }}" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-wishlist">
                                                <i class="w-icon-heart"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Wishlist</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-logout">
                                                <i class="w-icon-logout"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Logout</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Orders Tab -->
                        <div class="tab-pane mb-4" id="account-orders">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-orders">
                                    <i class="w-icon-orders"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                </div>
                            </div>

                            @if ($orders->count() > 0)
                                <table class="shop-table account-orders-table mb-6">
                                    <thead>
                                        <tr>
                                            <th class="order-id">Order</th>
                                            <th class="order-date">Date</th>
                                            <th class="order-status">Status</th>
                                            <th class="order-total">Total</th>
                                            <th class="order-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="order-id">#{{ $order->order_number }}</td>
                                                <td class="order-date">{{ $order->created_at->format('F j, Y') }}</td>
                                                <td class="order-status">
                                                    <span
                                                        class="badge badge-{{ $order->status == 'completed' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($order->status == 'completed' ? 'success' : 'danger') }}
                                                    </span>
                                                </td>
                                                <td class="order-total">
                                                    <span
                                                        class="order-price">{{ productAmount($order->total_amount) }}</span>
                                                    for
                                                    <span
                                                        class="order-quantity">{{ $order->items->sum('qty') }}</span>
                                                    items
                                                </td>
                                                <td class="order-action">
                                                    <a href="{{ route('user.orders.show', $order->id) }}"
                                                        class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>You haven't placed any orders yet.</p>
                            @endif

                            <a href="{{ route('user.shop') }}" class="btn btn-dark btn-rounded btn-icon-right">
                                Go Shop <i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Addresses Tab -->
                        <!-- Addresses Tab -->
                        <div class="tab-pane" id="account-addresses">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-map-marker">
                                    <i class="w-icon-map-marker"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                                </div>
                            </div>
                            <p>The following addresses will be used on the checkout page by default.</p>

                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Add
                                Address<i class="w-icon-long-arrow-right"></i></a>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row mt-4">
                                <!-- Billing Address Section -->
                                @if ($user->addresses->count())
                                    <table class="shop-table account-orders-table mb-6">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Full Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Default</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->addresses as $address)
                                                <tr>
                                                    <td>{{ ucfirst($address->type) }}</td>
                                                    <td>{{ $address->full_name }}</td>
                                                    <td>
                                                        {{ $address->address_line_1 }}
                                                        @if ($address->address_line_2)
                                                            , {{ $address->address_line_2 }}
                                                        @endif,
                                                        {{ $address->city }}, {{ $address->state }},
                                                        {{ $address->postcode }}, {{ $address->country }}
                                                    </td>
                                                    <td>{{ $address->phone }}</td>
                                                    <td>
                                                        @if ($address->is_default)
                                                            <span class="badge badge-success">Default</span>
                                                        @else
                                                            <form
                                                                action="{{ route('user.addresses.set-default', $address->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-primary">Mark as
                                                                    Default</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('user.addresses.edit', $address->id) }}"
                                                            class="btn btn-sm btn-outline-secondary">Edit</a>
                                                        <form action="{{ route('user.addresses.destroy', $address->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-outline-danger" type="submit"
                                                                onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>You haven't added any addresses yet.</p>
                                @endif


                            </div>
                        </div>

                        <!-- Account Details Tab -->
                        <div class="tab-pane" id="account-details">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-account mr-2">
                                    <i class="w-icon-user"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                </div>
                            </div>
                            <form class="form account-details-form" action="{{ route('user.account.update') }}"
                                method="post">
                                @csrf
                                @method('PUT')
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">First name *</label>
                                            <input type="text" id="firstname" name="firstname"
                                                value="{{ old('firstname', Auth::user()->first_name) }}"
                                                class="form-control form-control-md">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Last name *</label>
                                            <input type="text" id="lastname" name="lastname"
                                                value="{{ old('lastname', Auth::user()->last_name) }}"
                                                class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group mb-3">
                                    <label for="display-name">Display name *</label>
                                    <input type="text" id="display-name" name="display_name"
                                        value="{{ old('display_name', Auth::user()->name) }}"
                                        class="form-control form-control-md mb-0">
                                    <p>This will be how your name will be displayed in the account section and in reviews
                                    </p>
                                </div>

                                <div class="form-group mb-6">
                                    <label for="email">Email address *</label>
                                    <input type="email" id="email" name="email"
                                        value="{{ old('email', Auth::user()->email) }}"
                                        class="form-control form-control-md">
                                </div>

                                <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                <div class="form-group">
                                    <label class="text-dark" for="current_password">Current Password (leave blank to leave
                                        unchanged)</label>
                                    <input type="password" class="form-control form-control-md" id="current_password"
                                        name="current_password">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="new_password">New Password (leave blank to leave
                                        unchanged)</label>
                                    <input type="password" class="form-control form-control-md" id="new_password"
                                        name="new_password">
                                </div>
                                <div class="form-group mb-10">
                                    <label class="text-dark" for="new_password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control form-control-md"
                                        id="new_password_confirmation" name="new_password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // Toggle address forms
            $('.toggle-address-form').click(function() {
                const type = $(this).data('type');
                $(`#${type}-address-display`).hide();
                $(`#${type}-address-form`).show();
            });

            // Cancel button
            $(document).on('click', '.cancel-address-form', function() {
                const type = $(this).data('type');
                $(`#${type}-address-form`).hide();
                $(`#${type}-address-display`).show();
            });

            // Handle form submission
            $('form[id$="-address-form"]').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                const type = form.find('input[name="type"]').val();

                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize(),
                    success: function(response) {
                        // Refresh the address display
                        $(`#${type}-address-display`).load(location.href +
                            ` #${type}-address-display > *`);
                        $(`#${type}-address-form`).hide();
                        $(`#${type}-address-display`).show();

                        // Show success message
                        alert('Address saved successfully');
                    },
                    error: function(xhr) {
                        // Handle errors
                        alert('An error occurred: ' + xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endsection
