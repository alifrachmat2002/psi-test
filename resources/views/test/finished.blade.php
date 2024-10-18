@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <h2 class="mb-3 text-primary">Tes <span class="text-uppercase">{{ $hasil->last_test }}</span> Selesai</h2>
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
            <a href="" class="text-decoration-none"><button class="btn btn-primary d-block mb-3"><i class="fas fa-download"></i> Klik untuk melanjutkan </button></a>
        @else
            <a href="" class="text-decoration-none"><button class="btn btn-primary d-block mb-3"><i class="fas fa-download"></i> Unduh Hasil Tes</button></a>

        @endif

        <p><strong>Perhatian:</strong> Hasil tes GHQ ini bersifat rahasia dan tidak akan disebarkan ke pihak manapun.</p>
    </div>
@endsection
