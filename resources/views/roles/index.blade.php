@extends('layouts.admin-layout')
@section('page-title', 'Role')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        {{-- Title --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="card-title mb-0">{{ $title ?? 'Role List' }}</h3>
                            <a href="{{ route('roles.create') }}" class="btn btn-primary rounded-pill px-4">
                                + Add Role
                            </a>
                        </div>

                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th>Role Name</th>
                                        <th>Status</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($datas as $index => $data)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $data->is_active == 1 ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $data->is_active == 1 ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('roles.edit', $data->id) }}"
                                                    class="btn btn-outline-primary p-1 me-1"
                                                    style="width: 36px; height: 36px;" title="Edit">
                                                    <i class="bi bi-pencil-square fs-6"></i>
                                                </a>

                                                <form action="{{ route('roles.destroy', $data->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger p-1"
                                                        style="width: 36px; height: 36px;" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this role?')">
                                                        <i class="bi bi-trash fs-6"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
