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
            </div>
        </div>
    </div>


    <div class="container-fluid py-4">
        <div class="page-header mb-4 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Country Details</h3>
            <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Name</dt>
                    <dd class="col-sm-9">{{ $country->name }}</dd>

                    <dt class="col-sm-3">Code</dt>
                    <dd class="col-sm-9">{{ $country->code }}</dd>

                    <dt class="col-sm-3">Status</dt>
                    <dd class="col-sm-9">
                        <span class="badge bg-{{ $country->status === 'active' ? 'success' : 'secondary' }}">
                            {{ ucfirst($country->status) }}
                        </span>
                    </dd>

                    <dt class="col-sm-3">Created By</dt>
                    <dd class="col-sm-9">{{ optional($country->creator)->name ?? 'N/A' }}</dd>

                    <dt class="col-sm-3">Updated By</dt>
                    <dd class="col-sm-9">{{ optional($country->updater)->name ?? 'N/A' }}</dd>

                    <dt class="col-sm-3">Created At</dt>
                    <dd class="col-sm-9">{{ $country->created_at->format('d M Y h:i A') }}</dd>

                    <dt class="col-sm-3">Updated At</dt>
                    <dd class="col-sm-9">{{ $country->updated_at->format('d M Y h:i A') }}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
