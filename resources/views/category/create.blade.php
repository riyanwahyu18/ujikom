@extends('layouts.admin-layout')
@section('page-title', 'Create Category')

@section('content')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card shadow-sm position-relative">
                    <div class="card-body p-4">

                        {{-- Tombol Back (X) --}}
                        <a href="{{ route('category.index') }}"
                            class="btn btn-light border-0 position-absolute top-0 end-0 m-3 p-0"
                            style="width: 32px; height: 32px; font-size: 20px; color: red;" title="Back">
                            &times;
                        </a>

                        {{-- Judul --}}
                        <h3 class="card-title mb-4 text-center">Create Category</h3>

                        {{-- Form --}}
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf

                            {{-- Input Category Name --}}
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="category_name" id="category_name"
                                    class="form-control @error('category_name') is-invalid @enderror"
                                    placeholder="Enter category name" value="{{ old('category_name') }}" autofocus>
                                @error('category_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Checkbox Active --}}
                            <div class="form-check mb-4">
                                <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                                    value="1" checked>
                                <label for="is_active" class="form-check-label">
                                    Mark this category as active
                                </label>
                            </div>

                            {{-- Buttons --}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success rounded-pill px-4 me-2">Save</button>
                                <a href="{{ route('category.index') }}" class="btn btn-danger rounded-pill px-4">Cancel</a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
