@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <h2 class="mb-3 text-primary">Tes <span class="text-uppercase">{{ $hasil->last_test }}</span> Selesai</h2>

    @if ($hasil->last_test == 'ghq')
        <div class="alert alert-primary d-flex flex-column align-items-center">
            <p>Terima kasih telah mengisi tes GHQ. Skor tes GHQ anda adalah <strong>{{ $hasil->ghq_total }}</strong></p>

            @if ($hasil->ghq_total <= 5)
                <div class="alert alert-success" style="width: fit-content">
                    Anda memiliki kondisi mental yang sehat.
                </div>
            @endif
            @if ($hasil->ghq_total > 5)
                <div class="alert alert-warning" style="width: fit-content">
                    Kondisi mental anda memerlukan perhatian lebih lanjut.
                </div>
            @endif
            @if ($hasil->ghq_total > 10)
                <p>Silahkan mengerjakan tes selanjutnya untuk mengetahui kondisi mental anda lebih lanjut</p>
                <a href="" class="text-decoration-none"><button class="btn btn-primary d-block mb-3">Klik untuk
                        melanjutkan <i class="fas fa-arrow-right"></i></button></a>
            @else
                <a href="" class="text-decoration-none"><button class="btn btn-primary d-block mb-3"><i
                            class="fas fa-download"></i> Unduh Hasil Tes</button></a>
            @endif

            <p><strong>Perhatian:</strong> Hasil tes GHQ ini bersifat rahasia dan tidak akan disebarkan ke pihak manapun.
            </p>
        </div>
    @endif
    @if ($hasil->last_test == 'dass-21')
        <div class="alert alert-primary d-flex flex-column align-items-center">
            <p>Terima kasih telah mengisi tes DASS21. Hasil tes DASS21 anda adalah sebagai berikut</p>

            <ul>
                <li>
                    Nilai Depresi: <strong>{{ $hasil->dass21_depresi }}</strong>
                    <span>({{ $hasil->dass21Answers->keterangan_depresi }})</span>
                </li>
                <li>
                    Nilai kecemasan: <strong>{{ $hasil->dass21_kecemasan }}</strong>
                    <span>({{ $hasil->dass21Answers->keterangan_kecemasan }})</span>
                </li>
                <li>
                    Nilai Stress: <strong>{{ $hasil->dass21_stress }}</strong>
                    <span>({{ $hasil->dass21Answers->keterangan_stress }})</span>
                </li>
            </ul>

            @if ($hasil->dass21_kecemasan <= 13 && $hasil->dass21_depresi <= 9 && $hasil->dass21_stress <= 18)
                <div class="alert alert-success" style="width: fit-content">
                    Anda memiliki kondisi mental yang sehat.
                </div>
                <a href="" class="text-decoration-none"><button class="btn btn-primary d-block mb-3"><i
                            class="fas fa-download"></i> Unduh Hasil Tes</button></a>
            @else
                <div class="alert alert-warning text-center" style="width: fit-content">
                    Anda memiliki nilai
                    @if ($hasil->dass21_kecemasan > 13)
                        <strong>kecemasan</strong>
                    @endif
                    @if ($hasil->dass21_depresi > 9)
                        @if ($hasil->dass21_kecemasan > 13)
                            ,
                        @endif
                        <strong>depresi</strong>
                        @if ($hasil->dass21_stress > 18)
                            ,
                        @endif
                    @endif
                    @if ($hasil->dass21_stress > 18)
                        <strong>stress</strong>
                    @endif yang cenderung tinggi.
                    <br>
                    Kondisi mental anda memerlukan perhatian lebih lanjut.
                </div>
                <p>Silahkan mengerjakan tes selanjutnya untuk mengetahui kondisi mental anda lebih lanjut</p>
                <a href="" class="text-decoration-none"><button class="btn btn-primary d-block mb-3">Klik untuk
                        melanjutkan <i class="fas fa-arrow-right"></i></button></a>
            @endif

            @if ($hasil->ghq_total > 10)
                
            @else
                
            @endif

            <p><strong>Perhatian:</strong> Hasil tes GHQ ini bersifat rahasia dan tidak akan disebarkan ke pihak manapun.
            </p>
        </div>
    @endif

@endsection
