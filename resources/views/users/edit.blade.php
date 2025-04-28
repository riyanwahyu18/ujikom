@extends('layouts.admin-layout')
@section('page-title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="col-lg-12">
            <div class="card shadow-sm rounded-4 position-relative">

                {{-- Custom Close Button --}}
                <a href="{{ url()->previous() }}"
                    class="btn btn-outline-danger border-2 position-absolute top-0 end-0 m-3 d-flex align-items-center justify-content-center"
                    style="width: 45px; height: 45px; border-radius: 25px;">
                    <span class="fs-4 fw-bold">×</span>
                </a>

                <div class="card-body p-4">
                    <h4 class="card-title mb-4 fw-bold text-primary">Edit User</h4>

                    <form action="{{ route('users.update', $edit->id) }}" method="post">
                        @csrf
                        @method('put')

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" class="form-control rounded-3" id="name" name="name"
                                placeholder="Enter Your Name" required value="{{ $edit->name }}">
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control rounded-3" id="email" name="email"
                                placeholder="Enter Your Email" required value="{{ $edit->email }}">
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control rounded-3" id="password" name="password"
                                placeholder="Enter Your Password">
                        </div>

                        {{-- Roles --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold mb-2">Roles</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($roles as $role)
                                    <input class="btn-check" type="checkbox" id="role-{{ $role->id }}" name="roles[]"
                                        value="{{ $role->id }}"
                                        {{ in_array($role->id, $edit->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
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
