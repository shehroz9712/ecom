@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .variant-item {
            background: #f8f9fa;
            border-radius: 5px;
        }
        .dropzone {
            border: 2px dashed #007bff;a
            background: #f8f9fa;
            border-radius: 5px;
            padding: 20px;
            min-height: 150px;
        }
        .dropzone .dz-message {
            color: #666;
            font-size: 16px;
        }
        .dropzone .dz-preview {
            margin: 10px;
        }
        .dropzone .dz-image img {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.products.index') }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="form theme-form">
                        @csrf
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="name" id="product_name" class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Slug -->
                                <div class="col-md-6">
                                    <label class="form-label">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- SKU -->
                                <div class="col-md-6">
                                    <label class="form-label">SKU</label>
                                    <input type="text" name="sku" class="form-control" value="{{ old('sku') }}">
                                    @error('sku')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Price -->
                                <div class="col-md-6">
                                    <label class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price') }}">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Sale Price -->
                                <div class="col-md-6">
                                    <label class="form-label">Sale Price</label>
                                    <input type="number" name="sale_price" class="form-control" step="0.01" value="{{ old('sale_price') }}">
                                    @error('sale_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="col-md-6">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Sub Category -->
                                <div class="col-md-6">
                                    <label class="form-label">Sub Category</label>
                                    <select name="sub_category_id" id="sub_category" class="form-control">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                    @error('sub_category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Sub Category Item -->
                                <div class="col-md-6">
                                    <label class="form-label">Sub Category Item</label>
                                    <select name="sub_category_item_id" id="sub_category_item" class="form-control">
                                        <option value="">Select Sub Category Item</option>
                                    </select>
                                    @error('sub_category_item_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Brand -->
                                <div class="col-md-6">
                                    <label class="form-label">Brand</label>
                                    <select name="brand_id" class="form-control">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <!-- Short Description -->
                                <div class="col-md-12">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="short_description" class="form-control rich-text">{{ old('short_description') }}</textarea>
                                </div>

                                <!-- Full Description -->
                                <div class="col-md-12">
                                    <label class="form-label">Full Description</label>
                                    <textarea name="description" class="form-control rich-text">{{ old('description') }}</textarea>
                                </div>

                                <!-- Specifications -->
                                <div class="col-md-12">
                                    <label class="form-label">Specifications</label>
                                    <textarea name="specifications" class="form-control rich-text">{{ old('specifications') }}</textarea>
                                </div>

                                <!-- Is Featured -->
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="is_featured" value="1" class="form-check-input" {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label">Featured Product</label>
                                    </div>
                                </div>

                                <!-- Image Upload with Dropzone -->
                                <div class="col-md-12">
                                    <label class="form-label">Product Images (multiple)</label>
                                    <div id="image-dropzone" class="dropzone">
                                        <div class="dz-message">
                                            Drop files here or click to upload<br>
                                            <small>(Accepted formats: PNG, JPG, JPEG)</small>
                                        </div>
                                    </div>
                                    @error('images')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @error('images.*')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Variants -->
                                <div class="col-12 mt-4">
                                    <h5 class="mb-3">Variants</h5>
                                    <div id="variant-wrapper">
                                        <div class="variant-item border p-3 mb-3">
                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label class="form-label">Variant SKU</label>
                                                    <input type="text" name="variants[0][sku]" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" name="variants[0][price]" class="form-control" step="0.01">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Sale Price</label>
                                                    <input type="number" name="variants[0][sale_price]" class="form-control" step="0.01">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Stock</label>
                                                    <input type="number" name="variants[0][stock]" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Attributes</label>
                                                    <select name="variants[0][attributes][]" class="form-control" multiple>
                                                        @foreach ($attributes as $attribute)
                                                            @foreach ($attribute->values as $value)
                                                                <option value="{{ $attribute->id }}_{{ $value->id }}">
                                                                    {{ $attribute->name }} - {{ $value->value }}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-variant">+ Add Variant</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slugify@1.6.6/slugify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/angawkv2xx2vxc4g4fmmz2kga206yrhmrnuu1i2avvbr1n6d/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        // Initialize TinyMCE
        tinymce.init({
            selector: 'textarea.rich-text',
            height: 300,
            menubar: false,
            plugins: 'lists link image code fullscreen table',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code fullscreen',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

        // Slug auto-generate
        document.getElementById('product_name').addEventListener('input', function() {
            document.getElementById('slug').value = slugify(this.value, { lower: true, strict: true });
        });

        // Initialize Dropzone
        Dropzone.autoDiscover = false;
        const imageDropzone = new Dropzone("#image-dropzone", {
            url: "{{ route('admin.products.upload') }}",
            paramName: "images",
            maxFilesize: 2, // MB
            acceptedFiles: 'image/png,image/jpeg,image/jpg',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
            },
            success: function(file, response) {
                console.log('File uploaded:', response);
                file.serverId = response.id; // Store server ID for potential removal
            },
            removedfile: function(file) {
                // Optional: Implement file removal from server
                if (file.serverId) {
                    fetch('/admin/products/remove-image/' + file.serverId, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                        }
                    }).then(() => {
                        file.previewElement.remove();
                    });
                } else {
                    file.previewElement.remove();
                }
            }
        });

        // Variant handling
        let variantIndex = 1;
        document.getElementById('add-variant').addEventListener('click', () => {
            const wrapper = document.getElementById('variant-wrapper');
            const html = `
                <div class="variant-item border p-3 mb-3">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Variant SKU</label>
                            <input type="text" name="variants[${variantIndex}][sku]" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Price</label>
                            <input type="number" name="variants[${variantIndex}][price]" class="form-control" step="0.01">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Sale Price</label>
                            <input type="number" name="variants[${variantIndex}][sale_price]" class="form-control" step="0.01">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Stock</label>
                            <input type="number" name="variants[${variantIndex}][stock]" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Attributes</label>
                            <select name="variants[${variantIndex}][attributes][]" class="form-control" multiple>
                                @foreach ($attributes as $attribute)
                                    @foreach ($attribute->values as $value)
                                        <option value="{{ $attribute->id }}_{{ $value->id }}">
                                            {{ $attribute->name }} - {{ $value->value }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            `;
            wrapper.insertAdjacentHTML('beforeend', html);
            variantIndex++;
        });

        // Category/Subcategory handling
        const routes = {
            getSubCategories: @json(route('admin.getSubCategories', ['id' => '__ID__'])),
            getSubCategoryItems: @json(route('admin.getSubCategoryItems', ['id' => '__ID__']))
        };

        document.getElementById('category_id').addEventListener('change', function() {
            const categoryId = this.value;
            if (!categoryId) return;
            const url = routes.getSubCategories.replace('__ID__', categoryId);
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    let options = '<option value="">Select Sub Category</option>';
                    data.forEach(sc => {
                        options += `<option value="${sc.id}">${sc.name}</option>`;
                    });
                    document.getElementById('sub_category').innerHTML = options;
                    document.getElementById('sub_category_item').innerHTML = '<option value="">Select Sub Category Item</option>';
                })
                .catch(err => console.error('Error fetching subcategories:', err));
        });

        document.getElementById('sub_category').addEventListener('change', function() {
            const subCategoryId = this.value;
            if (!subCategoryId) return;
            const url = routes.getSubCategoryItems.replace('__ID__', subCategoryId);
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    let options = '<option value="">Select Sub Category Item</option>';
                    data.forEach(item => {
                        options += `<option value="${item.id}">${item.name}</option>`;
                    });
                    document.getElementById('sub_category_item').innerHTML = options;
                })
                .catch(err => console.error('Error fetching subcategory items:', err));
        });
    </script>
@endsection