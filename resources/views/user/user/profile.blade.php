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
                            <a href="wishlist.html">Wishlist</a>
                        </li>
                        <li class="link-item">
                            <a href="login.html">Logout</a>
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
                                <a href="{{ route('user.logout') }}" class="text-primary"
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
                                    <a href="wishlist.html" class="link-to-tab">
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
                                                        class="badge badge-{{ $order->status == 'completed' ? 'success' : 'warning' }}">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                                <td class="order-total">
                                                    <span
                                                        class="order-price">{{ formatCurrency($order->total_amount) }}</span>
                                                    for
                                                    <span
                                                        class="order-quantity">{{ $order->items->sum('quantity') }}</span>
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

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-6 mb-6">
                                    <div class="ecommerce-address billing-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>

                                        @php
                                            $billingAddress = auth()
                                                ->user()
                                                ->addresses()
                                                ->where('type', 'billing')
                                                ->where('is_default', true)
                                                ->first();
                                        @endphp

                                        @if ($billingAddress)
                                            <address class="mb-4">
                                                <table class="address-table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name:</th>
                                                            <td>{{ $billingAddress->full_name }}</td>
                                                        </tr>
                                                        @if ($billingAddress->company)
                                                            <tr>
                                                                <th>Company:</th>
                                                                <td>{{ $billingAddress->company }}</td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <th>Address:</th>
                                                            <td>{{ $billingAddress->address_line_1 }}</td>
                                                        </tr>
                                                        @if ($billingAddress->address_line_2)
                                                            <tr>
                                                                <th>&nbsp;</th>
                                                                <td>{{ $billingAddress->address_line_2 }}</td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <th>City:</th>
                                                            <td>{{ $billingAddress->city }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>State:</th>
                                                            <td>{{ $billingAddress->state }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Country:</th>
                                                            <td>{{ $billingAddress->country }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Postcode:</th>
                                                            <td>{{ $billingAddress->postcode }}</td>
                                                        </tr>
                                                        @if ($billingAddress->phone)
                                                            <tr>
                                                                <th>Phone:</th>
                                                                <td>{{ $billingAddress->phone }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </address>
                                        @else
                                            <p>No default billing address set.</p>
                                        @endif

                                        <a href="{{ route('user.addresses.create', ['type' => 'billing']) }}"
                                            class="btn btn-link btn-underline btn-icon-right text-primary">
                                            {{ $billingAddress ? 'Edit your billing address' : 'Add billing address' }}
                                            <i class="w-icon-long-arrow-right"></i>
                                        </a>

                                        @if (auth()->user()->addresses()->where('type', 'billing')->count() > 1)
                                            <a href="{{ route('user.addresses.index', ['type' => 'billing']) }}"
                                                class="btn btn-link btn-underline btn-icon-right text-primary mt-2">
                                                Manage billing addresses
                                                <i class="w-icon-long-arrow-right"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6 mb-6">
                                    <div class="ecommerce-address shipping-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>

                                        @php
                                            $shippingAddress = auth()
                                                ->user()
                                                ->addresses()
                                                ->where('type', 'shipping')
                                                ->where('is_default', true)
                                                ->first();
                                        @endphp

                                        @if ($shippingAddress)
                                            <address class="mb-4">
                                                <table class="address-table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name:</th>
                                                            <td>{{ $shippingAddress->full_name }}</td>
                                                        </tr>
                                                        @if ($shippingAddress->company)
                                                            <tr>
                                                                <th>Company:</th>
                                                                <td>{{ $shippingAddress->company }}</td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <th>Address:</th>
                                                            <td>{{ $shippingAddress->address_line_1 }}</td>
                                                        </tr>
                                                        @if ($shippingAddress->address_line_2)
                                                            <tr>
                                                                <th>&nbsp;</th>
                                                                <td>{{ $shippingAddress->address_line_2 }}</td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <th>City:</th>
                                                            <td>{{ $shippingAddress->city }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>State:</th>
                                                            <td>{{ $shippingAddress->state }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Country:</th>
                                                            <td>{{ $shippingAddress->country }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Postcode:</th>
                                                            <td>{{ $shippingAddress->postcode }}</td>
                                                        </tr>
                                                        @if ($shippingAddress->phone)
                                                            <tr>
                                                                <th>Phone:</th>
                                                                <td>{{ $shippingAddress->phone }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </address>
                                        @else
                                            <p>No default shipping address set.</p>
                                        @endif

                                        <a href="{{ route('user.addresses.create', ['type' => 'shipping']) }}"
                                            class="btn btn-link btn-underline btn-icon-right text-primary">
                                            {{ $shippingAddress ? 'Edit your shipping address' : 'Add shipping address' }}
                                            <i class="w-icon-long-arrow-right"></i>
                                        </a>

                                        @if (auth()->user()->addresses()->where('type', 'shipping')->count() > 1)
                                            <a href="{{ route('user.addresses.index', ['type' => 'shipping']) }}"
                                                class="btn btn-link btn-underline btn-icon-right text-primary mt-2">
                                                Manage shipping addresses
                                                <i class="w-icon-long-arrow-right"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Orders table remains the same -->
                            <table class="shop-table account-orders-table mb-6">
                                <!-- ... existing orders table code ... -->
                            </table>
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
                                <div class="row">
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
                                </div>

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
