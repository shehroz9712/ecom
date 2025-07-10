@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.products.index') }}
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add product</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>wallet amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->first_name }} {{ $product->last_name }}</td>
                                            <td>{{ $product->email }}</td>
                                            <td>{{ $product->phone_number }}</td>
                                            <td>{{ $product->wallet?->amount }}</td>

                                            <td>
                                                <a href="{{ route('admin.products.show', $product->id) }}" class="action-btn"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                                    class="action-btn"><i class="fa fa-pencil-square-o"></i></a>
                                                <form id="delete-form-{{ $product->id }}"
                                                    action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <a href="#" class="action-btn"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-form-{{ $product->id }}').submit();"
                                                    class="text-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('js')
@endsection
