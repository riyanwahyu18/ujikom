@extends('layouts.admin-layout')
@section('page-title', 'Category')
@section('title', 'Category')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card shadow-sm">
                    <div class="card-body">

                        {{-- Judul dan tombol tambah --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="card-title mb-0 text-center flex-grow-1">{{ $title ?? 'Category List' }}</h3>
                            <a href="{{ route('category.create') }}" class="btn btn-primary rounded-pill">+ Add Category</a>
                        </div>

                        {{-- Form search --}}
                        <form action="{{ route('category.index') }}" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search by name"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                                @if (request('search'))
                                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Clear</a>
                                @endif
                            </div>
                        </form>

                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th>Name</th>
                                        <th>Active</th>
                                        <th style="width: 120px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td class="text-center">{{ $categories->firstItem() + $loop->index }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $category->is_active == 1 ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $category->is_active == 1 ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                {{-- Edit --}}
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-outline-primary p-2 me-1"
                                                    style="border-radius: 8px; width: 42px; height: 42px;" title="Edit">
                                                    <i class="bi bi-pencil-square fs-5"></i>
                                                </a>

                                                {{-- Delete --}}
                                                <form action="{{ route('category.destroy', $category->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger p-2 btn-hapus"
                                                        style="border-radius: 8px; width: 42px; height: 42px;"
                                                        title="Delete" data-name="{{ $category->category_name }}">
                                                        <i class="bi bi-trash fs-5"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No categories found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center mt-4">
                            {{ $categories->appends(request()->query())->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('.btn-hapus').click(function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var categoryName = $(this).data('name');

            Swal.fire({
                title: `Delete "${categoryName}" ?`,
                text: "Are you sure you want to delete this category?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
