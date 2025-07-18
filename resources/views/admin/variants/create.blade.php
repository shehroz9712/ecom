@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">{{ $pageTitle ?? 'Add Attribute' }}</h3>
                    {{ Breadcrumbs::render('admin.attributes.create') }}
                </div>
            </div>
        </div>

        <form action="{{ route('admin.attributes.store') }}" method="POST" class="form theme-form">
            @csrf
            <div class="card">
                <div class="card-body">
                    {{-- Attribute Name --}}
                    <div class="mb-3">
                        <label class="form-label">Attribute Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Color, Size"
                            value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="e.g. color, size"
                            value="{{ old('slug') }}">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <hr>
                    <h5 class="mb-3">Attribute Values</h5>

                    <div id="value-wrapper">
                        {{-- Value Group Template --}}
                        <div class="value-group row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="values[0][value]" class="form-control"
                                    placeholder="Value (e.g. Red)">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="values[0][code]" class="form-control"
                                    placeholder="Code (e.g. #FF0000)">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-sm remove-value">Remove</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="add-value" class="btn btn-outline-primary btn-sm mb-3">+ Add Value</button>
                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Save Attribute</button>
                    <a href="{{ route('admin.attributes.index') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        let valueIndex = 1;
        document.getElementById('add-value').addEventListener('click', function() {
            const wrapper = document.getElementById('value-wrapper');
            const newRow = document.createElement('div');
            newRow.classList.add('row', 'mb-3', 'value-group');
            newRow.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="values[${valueIndex}][value]" class="form-control" placeholder="Value (e.g. Blue)">
            </div>
            <div class="col-md-4">
                <input type="text" name="values[${valueIndex}][code]" class="form-control" placeholder="Code (e.g. #0000FF)">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-value">Remove</button>
            </div>
        `;
            wrapper.appendChild(newRow);
            valueIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-value')) {
                e.target.closest('.value-group').remove();
            }
        });
    </script>
@endsection
