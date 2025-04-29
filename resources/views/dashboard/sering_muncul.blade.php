@extends('layouts.admin-layout')

@section('page-title', 'Dashboard')

@section('content')
    <section class="py-4" style="background-color: #f8f9fa; min-height: 100vh;">
        <div class="container">
            <h3 class="mb-5 text-center">Top 10 Produk Paling Sering Dibeli</h3>

            <div class="row g-4">
                {{-- Diagram Jumlah Terjual --}}
                <div class="col-md-6">
                    <div class="card shadow-sm" style="border: none;">
                        <div class="card-body p-4" style="background-color: #ffffff; border-radius: 12px;">
                            <h5 class="text-center mb-3">Jumlah Produk Terjual (pcs)</h5>
                            <canvas id="chartQty" style="height:400px;"></canvas>
                        </div>
                    </div>
                </div>

                {{-- Diagram Total Penjualan --}}
                <div class="col-md-6">
                    <div class="card shadow-sm" style="border: none;">
                        <div class="card-body p-4" style="background-color: #ffffff; border-radius: 12px;">
                            <h5 class="text-center mb-3">Total Penjualan (Rp)</h5>
                            <canvas id="chartSales" style="height:400px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Include Chart.js dan Script --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = {!! json_encode($popularProducts->pluck('product_name')) !!};

        // Diagram Jumlah Terjual
        const chartQty = new Chart(document.getElementById('chartQty').getContext('2d'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Terjual',
                    data: {!! json_encode($popularProducts->pluck('total_qty')) !!},
                    backgroundColor: 'rgba(40, 167, 69, 0.7)',
                    borderColor: 'rgba(40, 167, 69, 1)',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah (pcs)'
                        }
                    }
                }
            }
        });

        // Diagram Total Penjualan
        const chartSales = new Chart(document.getElementById('chartSales').getContext('2d'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Penjualan',
                    data: {!! json_encode($popularProducts->pluck('subtotal')) !!},
                    backgroundColor: 'rgba(0, 123, 255, 0.7)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Rupiah (Rp)'
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
