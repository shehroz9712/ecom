@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle ?? 'Attributes' }}</h3>
                    {{ Breadcrumbs::render('admin.attributes.index') }}
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
                        <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary">Add Attribute</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Values Count</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attributes as $attribute)
                                        <tr>
                                            <td>{{ $attribute->id }}</td>
                                            <td>{{ $attribute->name }}</td>
                                            <td>{{ $attribute->slug }}</td>
                                            <td>{{ $attribute->values->count() }}</td>
                                            <td>
                                                <a href="{{ route('admin.attributes.edit', $attribute->id) }}"
                                                    class="action-btn">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>

                                                <form id="delete-form-{{ $attribute->id }}"
                                                    action="{{ route('admin.attributes.destroy', $attribute->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <a href="#" class="action-btn text-danger"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-form-{{ $attribute->id }}').submit();">
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
