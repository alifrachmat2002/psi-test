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
<div class="container-fluid py-4">

    <!-- Charts Row 1 -->
    <div class="row mb-4">
        <!-- Trend Chart -->
        <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="card shadow-sm">
                <div class="card-body">
                    <canvas id="trendChart" style="height: 300px"></canvas>
                </div>
            </div>
        </div>
        <!-- Severity Chart -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <canvas id="severityChart" style="height: 300px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row 2 -->
    <div class="row">
        <!-- DASS21 Chart -->
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="card shadow-sm">
                <div class="card-body">
                    <canvas id="dass21Chart" style="height: 300px"></canvas>
                </div>
            </div>
        </div>
        <!-- HSCL25 Chart -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <canvas id="hscl25Chart" style="height: 300px"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Data structure examples
    const testScores = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
                label: 'GHQ-12',
                data: [12, 15, 13, 14, 16, 12],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            },
            {
                label: 'DASS-21',
                data: [25, 28, 24, 27, 26, 23],
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
            },
            {
                label: 'HSCL-25',
                data: [30, 32, 29, 31, 33, 30],
                borderColor: 'rgb(255, 205, 86)',
                tension: 0.1
            },
            {
                label: 'HTQ',
                data: [18, 20, 17, 19, 21, 18],
                borderColor: 'rgb(54, 162, 235)',
                tension: 0.1
            }
        ]
    };

    // 1. Line Chart - Tren Skor Test
    const trendChart = new Chart(document.getElementById('trendChart'), {
        type: 'line',
        data: testScores,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Tren Skor Test Psikologi',
                    font: {
                        size: 16
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Skor Rata-rata'
                    }
                }
            }
        }
    });

    // 2. Bar Chart - Distribusi Tingkat Keparahan
    const severityData = {
        labels: ['Normal', 'Ringan', 'Sedang', 'Berat'],
        datasets: [{
                label: 'GHQ-12',
                data: [65, 20, 10, 5],
                backgroundColor: 'rgba(75, 192, 192, 0.5)'
            },
            {
                label: 'DASS-21',
                data: [60, 25, 10, 5],
                backgroundColor: 'rgba(255, 99, 132, 0.5)'
            },
            {
                label: 'HSCL-25',
                data: [55, 25, 15, 5],
                backgroundColor: 'rgba(255, 205, 86, 0.5)'
            },
            {
                label: 'HTQ',
                data: [70, 15, 10, 5],
                backgroundColor: 'rgba(54, 162, 235, 0.5)'
            }
        ]
    };

    const severityChart = new Chart(document.getElementById('severityChart'), {
        type: 'bar',
        data: severityData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Distribusi Tingkat Keparahan',
                    font: {
                        size: 16
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Responden'
                    }
                }
            }
        }
    });

    // 3. Doughnut Chart - DASS21 Components
    const dass21Data = {
        labels: ['Depression', 'Anxiety', 'Stress'],
        datasets: [{
            data: [30, 35, 35],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 205, 86, 0.5)'
            ]
        }]
    };

    const dass21Chart = new Chart(document.getElementById('dass21Chart'), {
        type: 'doughnut',
        data: dass21Data,
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
                }
            }
        }
    });

    // 4. Radar Chart - HSCL25 Analysis
    const hscl25Data = {
        labels: ['Anxiety Symptoms', 'Depression Symptoms', 'Somatic Symptoms',
            'Social Functioning', 'Emotional State'
        ],
        datasets: [{
            label: 'Rata-rata Skor',
            data: [3.2, 2.8, 2.5, 3.0, 2.7],
            fill: true,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgb(54, 162, 235)',
            pointBackgroundColor: 'rgb(54, 162, 235)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(54, 162, 235)'
        }]
    };

    const hscl25Chart = new Chart(document.getElementById('hscl25Chart'), {
        type: 'radar',
        data: hscl25Data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Analisis Komponen HSCL-25',
                    font: {
                        size: 16
                    }
                }
            },
            scales: {
                r: {
                    min: 0,
                    max: 4,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endsection