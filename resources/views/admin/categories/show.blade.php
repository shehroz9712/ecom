@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.categories.show', $category) }}
                </div>
            </div>
        </div>
    </div>

    <!-- Category Details -->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        {{ $category->name }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Basic Info -->
                            <div class="col-md-6">
                                <p><strong>Slug:</strong> {{ $category->slug }}</p>
                                <p><strong>Status:</strong> {!! StatusBadge($category->status) !!}</p>
                                <p><strong>Parent Category:</strong>
                                    {{ $category->parent ? $category->parent->name : 'N/A' }}
                                </p>
                            </div>
                            <!-- Metadata -->
                            <div class="col-md-6">
                                <p><strong>Created At:</strong> {{ $category->created_at->format('d M, Y') }}</p>
                                <p><strong>Updated At:</strong> {{ $category->updated_at->format('d M, Y') }}</p>
                                <p><strong>Created By:</strong> {{ optional($category->creator)->name }}</p>
                                <p><strong>Updated By:</strong> {{ optional($category->updater)->name }}</p>
                            </div>
                        </div>

                        <!-- Related Products -->
                        @if ($category->products && $category->products->count())
                            <div class="mt-4">
                                <h5>Products in this Category</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>SKU</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($category->products as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->sku }}</td>
                                                    <td>{{ productAmount($product->price) }}</td>
                                                    <td>{!! StatusBadge($product->status) !!}</td>
                                                    <td>
                                                        <a href="{{ route('admin.products.show', $product->id) }}"
                                                            class="btn btn-sm btn-info">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        <!-- Footer -->
                        <div class="mt-4">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to List</a>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this category?')">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
