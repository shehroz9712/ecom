@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.users.show', $user) }}

                </div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $user->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{ $user->last_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $user->phone_number ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Company</th>
                                    <td>{{ $user->company ?? 'N/A' }}</td>
                                </tr>

                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $user->created_at->format('d M, Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $user->updated_at->format('d M, Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends -->
@endsection

@section('js')
@endsection
