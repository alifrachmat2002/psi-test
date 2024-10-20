@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <h2 class="mb-3 text-primary">Tes <span class="text-uppercase">{{ $hasil->last_test }}</span> Selesai</h2>

    <div class="alert alert-primary d-flex flex-column align-items-center">
        @if ($hasil->last_test == 'ghq12')
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

    </div>
    @endif
    @if ($hasil->last_test == 'dass-21')
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
                Kondisi mental Anda masih dalam batas normal. Penting untuk selalu memperhatikan kesehatan mental secara
                berkelanjutan dan mencari bantuan jika diperlukan.
            </div>
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
        @endif
    @endif
    @if ($hasil->last_test == 'hscl-25')
        <p>Terima kasih telah mengisi tes HSCL25. Hasil tes HSCL25 anda adalah sebagai berikut</p>

        <ul>
            <li>
                Nilai Depresi: <strong>{{ $hasil->hscl25_depresiDSM4 }}</strong>
            </li>
            <li>
                Nilai Kecemasan: <strong>{{ $hasil->hscl25_kecemasan }}</strong>
            </li>
            <li>
                Nilai Total: <strong>{{ $hasil->hscl25_total }}</strong>
            </li>
        </ul>

        @if ($hasil->hscl25_depresiDSM4 <= 1.75 && $hasil->hscl25_kecemasan <= 1.75 && $hasil->hscl25_total <= 1.75)
            <div class="alert alert-success text-center" style="width: fit-content">
                Kondisi mental Anda masih dalam batas normal.
                <br>
                Penting untuk selalu memperhatikan kesehatan mental secara berkelanjutan dan mencari bantuan jika
                diperlukan.
            </div>
        @else
            <div class="alert alert-warning text-center" style="width: fit-content">
                Anda memiliki nilai
                @if ($hasil->hscl25_depresiDSM4 > 1.75)
                    <strong>depresi</strong>
                @endif
                @if ($hasil->hscl25_depresiDSM4 > 1.75)
                    @if ($hasil->hscl25_kecemasan > 1.75)
                        ,
                    @endif
                    <strong>kecemasan</strong>
                    @if ($hasil->hscl25_total > 1.75)
                        ,
                    @endif
                @endif
                @if ($hasil->hscl25_total > 1.75)
                    <strong>total</strong>
                @endif yang cenderung tinggi.
                <br>
                Kondisi mental anda memerlukan perhatian lebih lanjut.
                <br>
                Disarankan untuk berkonsultasi dengan profesional terkait untuk evaluasi lebih mendalam.
            </div>
        @endif

    @endif
    @if ($hasil->last_test == 'htq')
        <p>Terima kasih telah mengisi tes HTQ. Hasil tes HTQ anda adalah sebagai berikut</p>

        <ul>
            <li>
                Nilai Depresi: <strong>{{ $hasil->htq_depresiDSM4 }}</strong>
            </li>

            <li>
                Nilai Total: <strong>{{ $hasil->htq_total }}</strong>
            </li>
        </ul>

        @if ($hasil->htq_depresiDSM4 <= 2.5 && $hasil->htq_total <= 2.5)
            <div class="alert alert-success text-center" style="width: fit-content">
                Kondisi mental Anda masih dalam batas normal.
                <br>
                Penting untuk selalu memperhatikan kesehatan mental secara berkelanjutan dan mencari bantuan jika
                diperlukan.
            </div>
        @else
            <div class="alert alert-warning text-center" style="width: fit-content">
                Anda memiliki nilai
                @if ($hasil->htq_depresiDSM4 > 2.5)
                    <strong>depresi</strong>
                @endif
                @if ($hasil->htq_total > 2.5)
                    @if ($hasil->htq_depresiDSM4 > 2.5)
                        ,
                    @endif
                    <strong>total</strong>
                @endif yang cenderung tinggi.
                <br>
                Anda terindikasi memiliki gejala PTSD.
                <br>
                Mohon untuk berkonsultasi dengan profesional terkait untuk evaluasi lebih mendalam.
            </div>
        @endif
    @endif
    @if ($hasil->status_pengerjaan == 'belum selesai')
        <p>Silahkan mengerjakan tes selanjutnya untuk mengetahui kondisi mental anda lebih lanjut</p>
        <a href="{{ route('resume-test') }}" class="text-decoration-none"><button class="btn btn-primary d-block mb-3">Klik
                untuk
                melanjutkan <i class="fas fa-arrow-right"></i></button></a>
    @else
        <p>Rangkaian tes Anda sudah selesai.</p>
        <div class="d-flex justify-content-between align-items-center">
            <a href="" class="text-decoration-none"><button class="btn btn-primary d-block mb-3"><i
                        class="fas fa-download"></i> Unduh Hasil Tes</button></a>
            <p class="mx-3">Atau</p>
            <a href="{{ route('dashboard') }}" class="text-decoration-none"><button class="btn btn-primary d-block mb-3">Kembali ke
                    Dashboard <i class="fas fa-arrow-right"></i></button></a>
        </div>
    @endif

    <p><strong>Perhatian:</strong> Hasil tes ini bersifat rahasia dan tidak akan disebarkan ke pihak manapun.
    </p>
    </div>

@endsection
