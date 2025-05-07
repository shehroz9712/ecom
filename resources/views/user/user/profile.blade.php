@extends('user.layouts.app')
@section('content')
    <!-- Start of Main -->
    <main class="main">
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
                        <div class="tab-pane active in" id="account-dashboard">
                            <p class="greeting">
                                Hello
                                <span class="text-dark font-weight-bold">John Doe</span>
                                (not
                                <span class="text-dark font-weight-bold">John Doe</span>?
                                <a href="#" class="text-primary">Log out</a>)
                            </p>

                            <p class="mb-4">
                                From your account dashboard you can view your <a href="#account-orders"
                                    class="text-primary link-to-tab">recent orders</a>,
                                manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                    and billing
                                    addresses</a>, and
                                <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                    account details.</a>
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
                                    <a href="#account-downloads" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-download">
                                                <i class="w-icon-download"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Downloads</p>
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

                        <div class="tab-pane mb-4" id="account-orders">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-orders">
                                    <i class="w-icon-orders"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                </div>
                            </div>

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
                                    <tr>
                                        <td class="order-id">#2321</td>
                                        <td class="order-date">August 20, 2021</td>
                                        <td class="order-status">Processing</td>
                                        <td class="order-total">
                                            <span class="order-price">$121.00</span> for
                                            <span class="order-quantity"> 1</span> item
                                        </td>
                                        <td class="order-action">
                                            <a href="#"
                                                class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="order-id">#2321</td>
                                        <td class="order-date">August 20, 2021</td>
                                        <td class="order-status">Processing</td>
                                        <td class="order-total">
                                            <span class="order-price">$150.00</span> for
                                            <span class="order-quantity"> 1</span> item
                                        </td>
                                        <td class="order-action">
                                            <a href="#"
                                                class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="order-id">#2319</td>
                                        <td class="order-date">August 20, 2021</td>
                                        <td class="order-status">Processing</td>
                                        <td class="order-total">
                                            <span class="order-price">$201.00</span> for
                                            <span class="order-quantity"> 1</span> item
                                        </td>
                                        <td class="order-action">
                                            <a href="#"
                                                class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="order-id">#2318</td>
                                        <td class="order-date">August 20, 2021</td>
                                        <td class="order-status">Processing</td>
                                        <td class="order-total">
                                            <span class="order-price">$321.00</span> for
                                            <span class="order-quantity"> 1</span> item
                                        </td>
                                        <td class="order-action">
                                            <a href="#"
                                                class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                Shop<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="tab-pane" id="account-downloads">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-downloads mr-2">
                                    <i class="w-icon-download"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title ls-normal">Downloads</h4>
                                </div>
                            </div>
                            <p class="mb-4">No downloads available yet.</p>
                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                Shop<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="tab-pane" id="account-addresses">
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
                            <div class="row">
                                <div class="col-sm-6 mb-6">
                                    <div class="ecommerce-address billing-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                        <address class="mb-4">
                                            <table class="address-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Name:</th>
                                                        <td>John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Company:</th>
                                                        <td>Conia</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td>Wall Street</td>
                                                    </tr>
                                                    <tr>
                                                        <th>City:</th>
                                                        <td>California</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country:</th>
                                                        <td>United States (US)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Postcode:</th>
                                                        <td>92020</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone:</th>
                                                        <td>1112223334</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                        <a href="#"
                                            class="btn btn-link btn-underline btn-icon-right text-primary">Edit
                                            your billing address<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-6">
                                    <div class="ecommerce-address shipping-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                        <address class="mb-4">
                                            <table class="address-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Name:</th>
                                                        <td>John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Company:</th>
                                                        <td>Conia</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td>Wall Street</td>
                                                    </tr>
                                                    <tr>
                                                        <th>City:</th>
                                                        <td>California</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country:</th>
                                                        <td>United States (US)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Postcode:</th>
                                                        <td>92020</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                        <a href="#"
                                            class="btn btn-link btn-underline btn-icon-right text-primary">Edit your
                                            shipping address<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="account-details">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-account mr-2">
                                    <i class="w-icon-user"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                </div>
                            </div>
                            <form class="form account-details-form" action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">First name *</label>
                                            <input type="text" id="firstname" name="firstname" placeholder="John"
                                                class="form-control form-control-md">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Last name *</label>
                                            <input type="text" id="lastname" name="lastname" placeholder="Doe"
                                                class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="display-name">Display name *</label>
                                    <input type="text" id="display-name" name="display_name" placeholder="John Doe"
                                        class="form-control form-control-md mb-0">
                                    <p>This will be how your name will be displayed in the account section and in reviews
                                    </p>
                                </div>

                                <div class="form-group mb-6">
                                    <label for="email_1">Email address *</label>
                                    <input type="email" id="email_1" name="email_1"
                                        class="form-control form-control-md">
                                </div>

                                <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                <div class="form-group">
                                    <label class="text-dark" for="cur-password">Current Password leave blank to leave
                                        unchanged</label>
                                    <input type="password" class="form-control form-control-md" id="cur-password"
                                        name="cur_password">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="new-password">New Password leave blank to leave
                                        unchanged</label>
                                    <input type="password" class="form-control form-control-md" id="new-password"
                                        name="new_password">
                                </div>
                                <div class="form-group mb-10">
                                    <label class="text-dark" for="conf-password">Confirm Password</label>
                                    <input type="password" class="form-control form-control-md" id="conf-password"
                                        name="conf_password">
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection
