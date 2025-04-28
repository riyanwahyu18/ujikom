@extends('layouts.admin-layout')
@section('page-title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="col-lg-12">
            <div class="card shadow-sm rounded-4 position-relative">

                {{-- Custom Close Button --}}
                <a href="{{ url()->previous() }}"
                    class="btn btn-outline-danger rounded-circle border-2 position-absolute top-0 end-0 m-3 d-flex align-items-center justify-content-center"
                    style="width: 40px; height: 40px;">
                    <span class="fs-5 fw-bold">×</span>
                </a>

                <div class="card-body p-4">
                    <h4 class="card-title mb-4 fw-bold text-primary">Add New User</h4>

                    <form action="{{ route('users.store') }}" method="post">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" class="form-control rounded-3" id="name" name="name"
                                placeholder="Enter Your Name" required>
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control rounded-3" id="email" name="email"
                                placeholder="Enter Your Email" required>
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control rounded-3" id="password" name="password"
                                placeholder="Enter Your Password" required>
                        </div>

                        {{-- Role --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold mb-2">Role</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($roles as $role)
                                    <input type="checkbox" class="btn-check" id="role-{{ $role->id }}" name="roles[]"
                                        value="{{ $role->id }}" autocomplete="off">
                                    <label class="btn btn-outline-primary rounded-pill" for="role-{{ $role->id }}">
                                        {{ $role->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Buttons Save & Cancel --}}
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <button class="btn btn-success rounded-pill px-4" type="submit">
                                <i class="bi bi-save me-1"></i> Save
                            </button>
                            <button class="btn btn-danger rounded-pill px-4" type="reset">
                                <i class="bi bi-x-circle me-1"></i> Cancel
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
