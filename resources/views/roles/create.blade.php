@extends('layouts.admin-layout')
@section('page-title', 'Add Role')

@section('content')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm position-relative">
                    <div class="card-body p-4">

                        {{-- Tombol Back (X) --}}
                        <a href="{{ url()->previous() }}" class="btn btn-light border-0 position-absolute top-0 end-0 m-3 p-0"
                            style="width: 32px; height: 32px; font-size: 20px; color: red;" title="Back">
                            &times;
                        </a>

                        {{-- Judul --}}
                        <h3 class="card-title mb-4 text-center">Add New Role</h3>

                        {{-- Form --}}
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf

                            {{-- Role Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Role Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" placeholder="Enter role name" required
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">Mark as active</label>
                            </div>

                            {{-- Buttons --}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success rounded-pill px-4 me-2">Save</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger rounded-pill px-4">Cancel</a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
