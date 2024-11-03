@extends('layouts.main')

@section('container')
    <!-- Breadcrumb -->
    <div class="row mb-3">
        <div class="col">
            {{ Breadcrumbs::render() }}
        </div>
    </div>

    <!-- Header -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-primary">Rekap Hasil Tes</h2>
        </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="dashboard-tab" data-toggle="tab" data-target="#dashboard" type="button"
                role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="table-tab" data-toggle="tab" data-target="#table" type="button" role="tab"
                aria-controls="table" aria-selected="false">Tabel </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="container-fluid py-4">
                <div class="d-flex flex-column align-items-center">
                    <p>Filter data menurut tanggal</p>
                    <form class="form-inline mb-3" id="filterForm">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="inputStartDate" class="sr-only">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="inputStartDate" placeholder="Tanggal Mulai">
                        </div>
                        <p>Hingga</p>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="inputEndDate" class="sr-only">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="inputEndDate" placeholder="Tanggal Selesai">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Filter</button>
                    </form>
                </div>
                <!-- Charts Row 2 -->
                <div class="row mb-3">
                    <!-- DASS21 Chart -->
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="card shadow-sm">
                            <div class="card-body">

                                <canvas id="ghqChart" style="height: 300px"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- DASS21 Chart -->
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <canvas id="dass21Chart" style="height: 300px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- DASS21 Chart -->
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <canvas id="hscl25Chart" style="height: 300px"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- DASS21 Chart -->
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <canvas id="htqChart" style="height: 300px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="table-tab">
            <div class="table-responsive mt-3">
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 10%">Nama</th>
                            <th style="width: 10%">Waktu Tes</th>
                            <th style="width: 15%">GHQ</th>
                            <th style="width: 15%">DASS21</th>
                            <th style="width: 15%">HSCL25</th>
                            <th style="width: 15%">HTQ</th>
                            <th style="width: 5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hasils as $hasil)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $hasil->user->name }}</td>
                                <td>{{ $hasil->created_at->format('l, d F Y') }}</td>
                                <td>
                                    Nilai : {{ $hasil->ghq_total }}
                                    <br>
                                    @if ($hasil->ghq_total <= 5)
                                        <span class="badge badge-success">Normal</span>
                                        <br><br>
                                        <p>Rekomendasi : Psikoedukasi</p>
                                    @elseif ($hasil->ghq_total < 10)
                                        <span class="badge badge-warning">Perlu Perhatian</span>
                                        <br><br>
                                        <p>Rekomendasi : Psikoedukasi</p>
                                    @else
                                        <span class="badge badge-danger">Perlu Tindak Lanjut</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($hasil->last_test != 'ghq12')
                                        Skor D: {{ $hasil->dass21_depresi }}
                                        <br>
                                        @if ($hasil->dass21_depresi < 10)
                                            <span class="badge badge-success">Normal</span>
                                        @elseif ($hasil->dass21_depresi < 14)
                                            <span class="badge badge-success">Ringan</span>
                                        @elseif ($hasil->dass21_depresi < 21)
                                            <span class="badge badge-warning">Sedang</span>
                                        @elseif ($hasil->dass21_depresi < 28)
                                            <span class="badge badge-danger">Parah</span>
                                        @else
                                            <span class="badge badge-danger">Sangat Parah</span>
                                        @endif

                                        <br>
                                        Skor A: {{ $hasil->dass21_kecemasan }}
                                        <br>
                                        @if ($hasil->dass21_kecemasan < 8)
                                            <span class="badge badge-success">Normal</span>
                                        @elseif ($hasil->dass21_kecemasan < 10)
                                            <span class="badge badge-success">Ringan</span>
                                        @elseif ($hasil->dass21_kecemasan < 15)
                                            <span class="badge badge-warning">Sedang</span>
                                        @elseif ($hasil->dass21_kecemasan < 20)
                                            <span class="badge badge-danger">Parah</span>
                                        @else
                                            <span class="badge badge-danger">Sangat Parah</span>
                                        @endif
                                        <br>
                                        Skor S: {{ $hasil->dass21_stress }}
                                        <br>
                                        @if ($hasil->dass21_kecemasan < 15)
                                            <span class="badge badge-success">Normal</span>
                                        @elseif ($hasil->dass21_kecemasan < 19)
                                            <span class="badge badge-success">Ringan</span>
                                        @elseif ($hasil->dass21_kecemasan < 26)
                                            <span class="badge badge-warning">Sedang</span>
                                        @elseif ($hasil->dass21_kecemasan < 34)
                                            <span class="badge badge-danger">Parah</span>
                                        @else
                                            <span class="badge badge-danger">Sangat Parah</span>
                                        @endif
                                    @else
                                        Tidak Dikerjakan
                                    @endif
                                </td>
                                <td>
                                    @if ($hasil->last_test != 'ghq12' && $hasil->last_test != 'dass-21')
                                        Depresi: {{ $hasil->hscl25_depresiDSM4 }}
                                        <br>
                                        @if ($hasil->hscl25_depresiDSM4 < 1.75)
                                            <span class="badge badge-success">Normal</span>
                                        @else
                                            <span class="badge badge-danger">Tinggi</span>
                                        @endif

                                        <br>
                                        Kecemasan: {{ $hasil->hscl25_kecemasan }}
                                        <br>
                                        @if ($hasil->hscl25_kecemasan < 1.75)
                                            <span class="badge badge-success">Normal</span>
                                        @else
                                            <span class="badge badge-danger">Tinggi</span>
                                        @endif
                                        <br>
                                        Total: {{ $hasil->hscl25_total }}
                                        <br>
                                        @if ($hasil->hscl25_total < 1.75)
                                            <span class="badge badge-success">Normal</span>
                                        @else
                                            <span class="badge badge-danger">Tinggi</span>
                                        @endif
                                        <br><br>
                                        @if ($hasil->hscl25_depresiDSM4 < 1.75 && $hasil->hscl25_kecemasan < 1.75 && $hasil->hscl25_total < 1.75)
                                            <p>Rekomendasi : Psikoedukasi</p>
                                        @else
                                            <p>Rekomendasi : </p>
                                        @endif
                                    @else
                                        Tidak Dikerjakan
                                    @endif
                                </td>
                                <td>
                                    @if ($hasil->last_test != 'ghq12' && $hasil->last_test != 'dass-21' && $hasil->last_test != 'hscl-25')
                                        Depresi: {{ $hasil->htq_depresiDSM4 }}
                                        <br>
                                        @if ($hasil->htq_depresiDSM4 < 2.5)
                                            <span class="badge badge-success">Normal</span>
                                        @else
                                            <span class="badge badge-danger">Tinggi</span>
                                        @endif

                                        <br>
                                        Total: {{ $hasil->htq_total }}
                                        <br>
                                        @if ($hasil->htq_total < 2.5)
                                            <span class="badge badge-success">Normal</span>
                                        @else
                                            <span class="badge badge-danger">Tinggi</span>
                                        @endif
                                        @if ($hasil->htq_depresiDSM4 < 1.75 && $hasil->hscl25_kecemasan < 1.75 && $hasil->hscl25_total < 1.75)
                                            <p>Rekomendasi : Psikoedukasi</p>
                                        @else
                                            <p>Rekomendasi : </p>
                                        @endif
                                    @else
                                        Tidak Dikerjakan
                                    @endif
                                </td>
                                <td>
                                    <a target="_blank" href="{{ route('hasil.show', ['hasil' => $hasil]) }}">Lihat</a>
                                    <a target="_blank"
                                        href="{{ route('hasil.download', ['hasil' => $hasil]) }}">Unduh</a>
                                </td>
                            </tr>
                        @empty
                            {{-- <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr> --}}
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right:0 ; top: 0;">
        <div id="liveToastBerhasil" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="10000">
            <div class="toast-header">
                <strong class="mr-auto">Berhasil</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Data berhasil diperbarui.
            </div>
        </div>
    </div>
    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right:0 ; top: 0;">
        <div id="liveToastError" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="10000">
            <div class="toast-header">
                <strong class="mr-auto">Gagal</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Maaf, terjadi kesalahan saat memperbarui data. Silahkan refresh halaman.
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let ghqChart, dass21Chart, hscl25Chart, htqChart = null;

            // function to draw ghq chart
            function drawGhqChart(response) {
                if (ghqChart) {
                    ghqChart.destroy();
                }

                const ctx = document.getElementById('ghqChart').getContext('2d');
                ghqChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Sehat (<10)', 'Perlu Perhatian Khusus (≥10)'],
                        datasets: [{
                            data: [
                                response.data.ghq_healthy,
                                response.data.ghq_need_attention
                            ],
                            backgroundColor: [
                                'rgba(34, 197, 94, 0.8)', // Green for healthy
                                'rgba(239, 68, 68, 0.8)' // Red for needs attention
                            ],

                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Distribusi Komponen GHQ-12',
                                font: {
                                    size: 16
                                }
                            },
                            legend: {
                                'position': 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return `${label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // function to draw ghq chart
            function drawDassChart(response) {
                if (dass21Chart) {
                    dass21Chart.destroy();
                }

                const ctx = document.getElementById('dass21Chart').getContext('2d');
                dass21Chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Gejala Depresi (D ≥ 21)', 'Gejala Cemas (A ≥ 20)', 'Gejala Stress (S ≥ 34)'],
                        datasets: [{
                            data: [
                                response.data.dass21_depresi,
                                response.data.dass21_cemas,
                                response.data.dass21_stress,
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                                'rgba(255, 205, 86, 0.8)'
                            ],

                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Distribusi Komponen DASS-21',
                                font: {
                                    size: 16
                                }
                            },
                            legend: {
                                'position': 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return `${label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // function draw hscl chart
            function drawHsclChart(response) {
                if (hscl25Chart) {
                    hscl25Chart.destroy();
                }

                const ctx = document.getElementById('hscl25Chart').getContext('2d');
                hscl25Chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Gangguan Mixed Anxiety and Depression', 'Gangguan Cemas', 'Gangguan Depresi'],
                        datasets: [{
                            data: [
                                response.data.hscl25_mixed_anxiety_depression,
                                response.data.hscl25_depresi,
                                response.data.hscl25_kecemasan,
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                                'rgba(255, 205, 86, 0.8)'
                            ],

                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Distribusi Komponen HSCL-25',
                                font: {
                                    size: 16
                                }
                            },
                            legend: {
                                'position': 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return `${label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // function draw Htq chart
            function drawHtqChart(response) {
                if (htqChart) {
                    htqChart.destroy();
                }

                const ctx = document.getElementById('htqChart').getContext('2d');
                htqChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Gangguan Depresi dengan trauma psikologis', 'Gangguan Cemas dengan trauma psikologis'],
                        datasets: [{
                            data: [
                                response.data.htq_depresi_trauma,
                                response.data.htq_cemas_trauma,
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                            ],

                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Distribusi Komponen HSCL25 + HTQ',
                                font: {
                                    size: 16
                                }
                            },
                            legend: {
                                'position': 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return `${label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // function to fetch data from database
            function fetchData(start_date = null, end_date = null) {
                $.ajax({
                    url: "{{ route('admin.rekap.bar-chart-data') }}",
                    type: 'GET',
                    data: start_date && end_date ? {
                        start_date,
                        end_date
                    } : {},
                    success: function(response) {

                        drawGhqChart(response);
                        drawDassChart(response);
                        drawHsclChart(response);
                        drawHtqChart(response);
                        $('#liveToastBerhasil').toast('show');
                    },
                    error: function(error) {
                        $('#liveToastError').toast('show');
                    }

                });
            }

            fetchData();

            $('#filterForm').submit(function(e) {
                e.preventDefault();
                const startDate = $('#inputStartDate').val();
                const endDate = $('#inputEndDate').val();
                fetchData(startDate, endDate);
            });

        });
    </script>
@endsection
