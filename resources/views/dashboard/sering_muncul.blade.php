@extends('layouts.admin-layout')

@section('page-title', 'Dashboard')
@section('content')
    <section class="py-4" style="background-color: #f8f9fa; min-height: 100vh;">
        <div class="container">
            <h3 class="mb-5 text-center">Top 10 Produk Paling Sering Dibeli</h3>
            <div class="card shadow-sm" style="border: none;">
                <div class="card-body p-4" style="background-color: #ffffff; border-radius: 12px;">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0" style="background-color: #ffffff;">
                            <thead style="background-color: #0056b3; color: #ffffff;" class="text-center">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Produk</th>
                                    <th>Foto</th>
                                    <th>Total Order</th>
                                    <th>Total Qty</th>
                                    <th>Total Penjualan</th>
                                </tr>
                            </thead>
                            <tbody style="color: #343a40;">
                                @forelse($popularProducts as $index => $product)
                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td class="text-center">
                                            @if ($product->product_photo)
                                                @if (Str::startsWith($product->product_photo, ['http://', 'https://']))
                                                    <img src="{{ $product->product_photo }}"
                                                        alt="{{ $product->product_name }}"
                                                        style="width: 80px; height: 80px; object-fit: cover;"
                                                        class="rounded">
                                                @else
                                                    <img src="{{ asset('storage/' . $product->product_photo) }}"
                                                        alt="{{ $product->product_name }}"
                                                        style="width: 80px; height: 80px; object-fit: cover;"
                                                        class="rounded">
                                                @endif
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $product->total_order ?? 0 }}</td>
                                        <td class="text-center">{{ $product->total_qty ?? 0 }}</td>
                                        <td class="text-center">Rp {{ number_format($product->subtotal ?? 0, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data penjualan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tambahkan efek hover row --}}
    @push('styles')
        <style>
            table tbody tr:hover {
                background-color: #e9f5ff;
            }
        </style>
    @endpush

@endsection
