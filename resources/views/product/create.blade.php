@extends('layouts.admin-layout')
@section('page-title', 'Create Product')

@section('content')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow rounded-4 border-0">
                    <div class="card-body p-5 position-relative">

                        {{-- Tombol Back (X) --}}
                        <a href="{{ route('product.index') }}"
                            class="btn btn-light border-0 position-absolute top-0 end-0 m-3 p-0 d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px; font-size: 22px; color: #dc3545;" title="Back">
                            &times;
                        </a>

                        {{-- Judul --}}
                        <h2 class="text-center mb-4 fw-bold" style="color: #343a40;">Create Product</h2>

                        {{-- Form --}}
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Select Category --}}
                            <div class="mb-4">
                                <label for="category_id" class="form-label fw-semibold">Category <span
                                        class="text-danger">*</span></label>
                                <select name="category_id" id="category_id"
                                    class="form-select rounded-3 shadow-sm @error('category_id') is-invalid @enderror">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Product Name --}}
                            <div class="mb-4">
                                <label for="product_name" class="form-label fw-semibold">Product Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="product_name" id="product_name"
                                    class="form-control rounded-3 shadow-sm @error('product_name') is-invalid @enderror"
                                    placeholder="Enter product name" value="{{ old('product_name') }}">
                                @error('product_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Product Photo --}}
                            <div class="mb-4">
                                <label for="product_photo" class="form-label fw-semibold">Product Photo</label>
                                <input type="file" name="product_photo" id="product_photo"
                                    class="form-control rounded-3 shadow-sm @error('product_photo') is-invalid @enderror">
                                @error('product_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Product Qty --}}
                            <div class="mb-4">
                                <label for="product_qty" class="form-label fw-semibold">Product Qty <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="product_qty" id="product_qty"
                                    class="form-control rounded-3 shadow-sm @error('product_qty') is-invalid @enderror"
                                    placeholder="Enter product quantity" value="{{ old('product_qty') }}">
                                @error('product_qty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Product Price --}}
                            <div class="mb-4">
                                <label for="product_price" class="form-label fw-semibold">Product Price <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="product_price" id="product_price"
                                    class="form-control rounded-3 shadow-sm @error('product_price') is-invalid @enderror"
                                    placeholder="Enter product price" value="{{ old('product_price') }}">
                                @error('product_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Product Description --}}
                            <div class="mb-4">
                                <label for="product_description" class="form-label fw-semibold">Product Description</label>
                                <textarea name="product_description" id="product_description"
                                    class="form-control rounded-3 shadow-sm @error('product_description') is-invalid @enderror" rows="4"
                                    placeholder="Enter product description">{{ old('product_description') }}</textarea>
                                @error('product_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Active Checkbox --}}
                            <div class="form-check mb-4">
                                <input type="checkbox" name="is_active" id="is_active"
                                    class="form-check-input rounded-circle shadow-sm" value="1" checked>
                                <label for="is_active" class="form-check-label fw-semibold">
                                    Mark this product as active
                                </label>
                            </div>

                            {{-- Buttons --}}
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-success rounded-pill px-4 py-2 fw-semibold"
                                    style="transition: 0.3s;">Save</button>
                                <a href="{{ route('product.index') }}"
                                    class="btn btn-danger rounded-pill px-4 py-2 fw-semibold"
                                    style="transition: 0.3s;">Cancel</a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
