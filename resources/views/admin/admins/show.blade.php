@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.admins.show', $admin) }}
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        {{ $agent->agent_name }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Destination:</strong> {{ $agent->destination }}</p>
                                <p><strong>Country:</strong> {{ $agent->country }}</p>
                                <p><strong>City:</strong> {{ $agent->city }}</p>
                                <p><strong>Duration:</strong> {{ $agent->duration ?? 'N/A' }}</p>
                                <p><strong>Price:</strong> {{ $agent->currency }} {{ $agent->price }}</p>
                                <p><strong>Status:</strong>
                                    @if ($agent->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                @if ($agent->agent_img)
                                    <img src="{{ asset('storage/' . $agent->agent_img) }}" alt="agent Image"
                                        class="img-fluid rounded shadow">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('admin.agents.index') }}" class="btn btn-secondary">Back to List</a>
                            <a href="{{ route('admin.agents.edit', $agent->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.agents.destroy', $agent->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this agent?')">Delete</button>
                            </form>
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
