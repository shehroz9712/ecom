@extends('user.layouts.app')
@section('content')
    <!-- Start of Main -->
    <main class="main wishlist-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Wishlist</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('user.home') }}">Home</a></li>
                    <li>Wishlist</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb  -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <h3 class="wishlist-title">My wishlist</h3>
                <table class="shop-table wishlist-table">
                    <thead>
                        <tr>
                            <th class="product-name"><span>Product</span></th>
                            <th></th>
                            <th class="product-price"><span>Price</span></th>
                            <th class="product-stock-status"><span>Stock Status</span></th>
                            <th class="wishlist-action">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wishlists as $wishlist)
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="{{ route('user.product.detail', $wishlist->product->slug) }}">
                                            <figure>
                                                <img src="{{ productImage($wishlist->product->main_image->image ?? 'assets/user/images/placeholder.png') }}"
                                                    alt="{{ $wishlist->product->name }}" width="300" height="338">
                                            </figure>
                                        </a>
                                        <form action="{{ route('user.wishlist.toggle', $wishlist->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                                            <button type="submit" class="btn btn-close"><i
                                                    class="fas fa-times"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="{{ route('user.product.detail', $wishlist->product->slug) }}">
                                        {{ $wishlist->product->name }}
                                    </a>
                                </td>
                                <td class="product-price">
                                    <ins
                                        class="new-price">{{ productAmount($wishlist->product->sale_price ?? $wishlist->product->price) }}</ins>
                                </td>
                                <td class="product-stock-status">
                                    <span class="wishlist-in-stock">In Stock</span>
                                </td>
                                <td class="wishlist-action">
                                    <div class="d-lg-flex">
                                        <a href="{{ route('user.product.detail', $wishlist->product->slug) }}"
                                            class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">Quick
                                            View</a>
                                        <form action="{{ route('user.cart.add', $wishlist->product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">Add to
                                                cart</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Your wishlist is empty.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection
