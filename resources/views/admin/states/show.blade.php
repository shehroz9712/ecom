@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">State Detail</h3>
                {{ Breadcrumbs::render('admin.states.show', $state) }}
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('admin.states.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                <a href="{{ route('admin.states.edit', $state->id) }}" class="btn btn-warning btn-sm">Edit</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h5>State Information</h5></div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">ID:</div>
                <div class="col-sm-9">{{ $state->id }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">State Name:</div>
                <div class="col-sm-9">{{ $state->name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">Country:</div>
                <div class="col-sm-9">{{ $state->country->name ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">Status:</div>
                <div class="col-sm-9">{!! StatusBadge($state->status) !!}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">Created By:</div>
                <div class="col-sm-9">{{ $state->creator->name ?? 'N/A' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">Updated By:</div>
                <div class="col-sm-9">{{ $state->updater->name ?? 'N/A' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">Created At:</div>
                <div class="col-sm-9">{{ $state->created_at->format('d M Y, h:i A') }}</div>
            </div>

            <div class="row">
                <div class="col-sm-3 fw-bold">Last Updated:</div>
                <div class="col-sm-9">{{ $state->updated_at->format('d M Y, h:i A') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
