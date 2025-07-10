@extends('user.layouts.app')
@section('content')
    <main class="main order py-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <h2 class="text-center mb-4">Track Your Order</h2>
                    <form method="POST" action="{{ route('user.track.order') }}" class="w-50 mx-auto">
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
            </div>
        </div>
    </main>
@endsection