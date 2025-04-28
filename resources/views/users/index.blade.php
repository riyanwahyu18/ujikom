@extends('layouts.admin-layout')
@section('page-title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card shadow-sm">
                    <div class="card-body">

                        {{-- Judul table --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="card-title mb-0 text-center flex-grow-1">{{ $title ?? 'User List' }}</h3>
                            <a class="btn btn-primary" href="{{ route('users.create') }}">+ Add User</a>
                        </div>

                        <form action="{{ route('category.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search by name"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                                @if (request('search'))
                                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Clear</a>
                                @endif
                            </div>
                        </form>

                        {{-- Tabel User --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th>Name</th>
                                        <th>Roles</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $index => $data)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                @foreach ($data->roles as $role)
                                                    @if ($role->name == 'Administrator')
                                                        <span class="badge bg-success">{{ $role->name }}</span>
                                                    @elseif ($role->name == 'Pimpinan')
                                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                                    @elseif ($role->name == 'Kasir')
                                                        <span class="badge bg-warning text-dark">{{ $role->name }}</span>
                                                    @else
                                                        <span class="badge bg-info text-dark">{{ $role->name }}</span>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $data->email }}</td>
                                            <td>••••••••</td> {{-- Password hidden for security --}}
                                            <td class="text-center">
                                                {{-- Edit Button --}}
                                                <a href="{{ route('users.edit', $data->id) }}"
                                                    class="btn btn-outline-primary p-1 me-1"
                                                    style="width: 36px; height: 36px;" title="Edit">
                                                    <i class="bi bi-pencil-square fs-6"></i>
                                                </a>

                                                {{-- Delete Button --}}
                                                <form action="{{ route('users.destroy', $data->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger p-1"
                                                        style="width: 36px; height: 36px;" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                                        <i class="bi bi-trash fs-6"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No users found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
