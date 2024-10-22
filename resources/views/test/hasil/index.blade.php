@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-3 text-primary">Riwayat Hasil Tes</h2>
        @if ($hasils)
            <div class="">
                <a href="{{ route('test-ghq') }}" class="btn btn-primary d-block mb-3">Mulai Tes <i
                        class="fas fa-arrow-right"></i></a>
            </div>
        @endif
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="width: 12%">Waktu Tes</th>
                    <th style="width: 15%">GHQ</th>
                    <th style="width: 25%">DASS21</th>
                    <th style="width: 25%">HSCL25</th>
                    <th style="width: 18%">HTQ</th>
                    <th style="width: 5%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hasils as $hasil)
                    <tr>
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
                                <br><br>
                                <p>Rekomendasi : </p>
                            @endif
                        </td>
                        <td>
                            @if ($hasil->dass21_depresi != null && $hasil->dass21_kecemasan != null && $hasil->dass21_stress != null)
                                Depresi: {{ $hasil->dass21_depresi }}
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
                                Kecemasan: {{ $hasil->dass21_kecemasan }}
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
                                Stress: {{ $hasil->dass21_stress }}
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
                                <br><br>
                                @if ($hasil->dass21_kecemasan < 8 && $hasil->dass21_depresi < 10 && $hasil->dass21_stress < 19)
                                    <p>Rekomendasi : Psikoedukasi</p>
                                @else
                                    <p>Rekomendasi : </p>
                                @endif
                            @else
                                Tidak Dikerjakan
                            @endif
                        </td>
                        <td>
                            @if ($hasil->hscl25_depresiDSM4 != null && $hasil->hscl25_kecemasan != null && $hasil->hscl25_total != null)
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
                            @if ($hasil->htq_depresiDSM4 != null && $hasil->htq_total != null)
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
                        <td><a href="">Lihat</a></td>
                    </tr>
                @empty
                    {{-- <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr> --}}
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
