@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.tours.index') }}
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
                        <a href="{{ route('admin.tours.create') }}" class="btn btn-primary">Add tour</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tour Name</th>
                                        <th>Destination</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Price</th>
                                        <th>Currency</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tours as $tour)
                                        <tr>
                                            <td>{{ $tour->id }}</td>
                                            <td>{{ $tour->tour_name }}</td>
                                            <td>{{ $tour->destination }}</td>
                                            <td>{{ $tour->country }}</td>
                                            <td>{{ $tour->city }}</td>
                                            <td>{{ $tour->price }}</td>
                                            <td>{{ $tour->currency }}</td>
                                            <td>
                                                <img src="{{ asset('assets/uploads/tour/' . $tour->tour_img) }}"
                                                    alt="Tour Image" width="80" height="50">
                                            </td>
                                            <td>
                                                @if ($tour->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.tours.show', $tour->id) }}" class="action-btn"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.tours.edit', $tour->id) }}" class="action-btn"><i
                                                        class="fa fa-pencil-square-o"></i></a>
                                                <form id="delete-form-{{ $tour->id }}"
                                                    action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <a href="#" class="action-btn"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-form-{{ $tour->id }}').submit();"
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
