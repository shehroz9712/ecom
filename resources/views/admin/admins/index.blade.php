@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.admins.index') }}
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
                        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">Add admin</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->id }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                @if ($admin->id != 1)
                                                    <a href="{{ route('admin.admins.edit', $admin->id) }}"
                                                        class="action-btn"><i class="fa fa-pencil-square-o"></i></a>
                                                    <form id="delete-form-{{ $admin->id }}"
                                                        action="{{ route('admin.admins.destroy', $admin->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <a href="#" class="action-btn"
                                                        onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-form-{{ $admin->id }}').submit();"
                                                        class="text-danger">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                @else
                                                    <span class="text-danger">Can't edit or delete</span>
                                                @endif

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
