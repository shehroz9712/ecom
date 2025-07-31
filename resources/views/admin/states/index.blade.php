@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">States</h3>
                {{ Breadcrumbs::render('admin.states.index') }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">All States</h5>
                    <a href="{{ route('admin.states.create') }}" class="btn btn-primary btn-sm">Add New</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>State Name</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($states as $state)
                                    <tr>
                                        <td>{{ $state->id }}</td>
                                        <td>{{ $state->name }}</td>
                                        <td>{{ $state->country->name ?? '-' }}</td>
                                        <td>{!! StatusBadge($state->status) !!}</td>
                                        <td>{{ $state->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.states.edit', $state->id) }}" class="action-btn text-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>

                                            <form action="{{ route('admin.states.destroy', $state->id) }}" method="POST" class="d-inline" id="delete-form-{{ $state->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="#" class="action-btn text-danger"
                                               onclick="event.preventDefault(); if(confirm('Are you sure to delete this?')) document.getElementById('delete-form-{{ $state->id }}').submit();">
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

@endsection

@section('js')
@endsection
