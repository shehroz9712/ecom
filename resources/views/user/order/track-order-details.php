

@extends('user.layouts.app')
@section('content')
<main class="main order py-10">
    <div class="container">
        <h2 class="text-center mb-4">Track Your Order</h2>
        <form method="POST" action="{{ route('user.track.order.submit') }}" class="w-50 mx-auto">
            @csrf
            <div class="form-group mb-3">
                <label for="order_number">Order Number</label>
                <input type="text" name="order_number" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-dark w-100">Track Order</button>
        </form>
    </div>
</main>
@endsection
{{-- 
    <!-- Start of Main -->
    <main class="main order">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Track Order</h1>
            </div>
        </div>
        <!-- End of Page Header -->


        <!-- Start of PageContent -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="order-success text-center font-weight-bolder text-dark">
                    <i class="fas fa-check"></i>
                    Thank you. Your order has been received.
                </div>
                <!-- End of Order Success -->

                <ul class="order-view list-style-none">
                    <li>
                        <label>Order number</label>
                        <strong>945</strong>
                    </li>
                    <li>
                        <label>Status</label>
                        <strong>On hold</strong>
                    </li>
                    <li>
                        <label>Date</label>
                        <strong>April 27, 2021</strong>
                    </li>
                    <li>
                        <label>Total</label>
                        <strong>$1,646.36</strong>
                    </li>
                    <li>
                        <label>Payment method</label>
                        <strong>Direct bank transfor</strong>
                    </li>
                </ul>
                <!-- End of Order View -->

                <div class="order-details-wrapper mb-5">
                    <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th class="text-dark">Product</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#">Palm Print Jacket</a>&nbsp;<strong>x 1</strong><br>
                                    Vendor : <a href="#">Vendor 1</a>
                                </td>
                                <td>$40.00</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">Brown Backpack</a>&nbsp;<strong>x 1</strong><br>
                                    Vendor : <a href="#">Vendor 1</a>
                                </td>
                                <td>$60.00</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Subtotal:</th>
                                <td>$100.00</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>Flat rate</td>
                            </tr>
                            <tr>
                                <th>Payment method:</th>
                                <td>Direct bank transfor</td>
                            </tr>
                            <tr class="total">
                                <th class="border-no">Total:</th>
                                <td class="border-no">$100.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- End of Order Details -->

                <div class="sub-orders mb-10">
                    <h4 class="title mb-5 font-weight-bold ls-25">Sub Orders</h4>
                    <div class="alert alert-icon alert-inline mb-5">
                        <i class="w-icon-exclamation-triangle"></i>
                        <strong>Note: </strong>This order has products from multiple vendors. So we divided this
                        order into multiple vendor orders.
                        Each order will be handled by their respective vendor independently.
                    </div>
                    <table class="order-subtable">
                        <thead>
                            <tr>
                                <th class="order">Order</th>
                                <th class="date">Date</th>
                                <th class="status">Status</th>
                                <th class="total">Total</th>
                                <th class="action"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="order">950</td>
                                <td class="date">April 23, 2021</td>
                                <td class="status">On hold</td>
                                <td class="total">$40.00 for 1 items</td>
                                <td class="action"><a href="order-view.html" class="btn btn-rounded">View</a></td>
                            </tr>
                            <tr>
                                <td class="order">951</td>
                                <td class="date">April 25, 2021</td>
                                <td class="status">On hold</td>
                                <td class="total">$60.00 for 1 items</td>
                                <td class="action"><a href="order-view.html" class="btn btn-rounded">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End of Sub Orders-->

                <div id="account-addresses">
                    <div class="row">
                        <div class="col-sm-6 mb-8">
                            <div class="ecommerce-address billing-address">
                                <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                <address class="mb-4">
                                    <table class="address-table">
                                        <tbody>
                                            <tr>
                                                <td>John Doe</td>
                                            </tr>
                                            <tr>
                                                <td>Conia</td>
                                            </tr>
                                            <tr>
                                                <td>Wall Street</td>
                                            </tr>
                                            <tr>
                                                <td>California</td>
                                            </tr>
                                            <tr>
                                                <td>United States (US)</td>
                                            </tr>
                                            <tr>
                                                <td>92020</td>
                                            </tr>
                                            <tr>
                                                <td>1112223334</td>
                                            </tr>
                                            <tr class="email">
                                                <td>nicework125@gmail.com</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </address>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-8">
                            <div class="ecommerce-address shipping-address">
                                <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                <address class="mb-4">
                                    <table class="address-table">
                                        <tbody>
                                            <tr>
                                                <td>John Doe</td>
                                            </tr>
                                            <tr>
                                                <td>Conia</td>
                                            </tr>
                                            <tr>
                                                <td>Wall Street</td>
                                            </tr>
                                            <tr>
                                                <td>California</td>
                                            </tr>
                                            <tr>
                                                <td>United States (US)</td>
                                            </tr>
                                            <tr>
                                                <td>92020</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Account Address -->

                <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i
                        class="w-icon-long-arrow-left"></i>Back To List</a>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection --}}
