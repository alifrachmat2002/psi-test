@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <h2 class="mb-5 text-primary">Selamat Datang, {{ auth()->user()->name }}</h2>
    <div class="d-flex flex-column align-items-center">
        <h5 class="text-primary">Selamat Datang di aplikasi Psi-Test, aplikasi ini dibuat untuk memeriksa kesehatan mental
            anda.</h5>
        @if (auth()->user()->hasUnfinishedHasil())
            <h5 class="mb-3 text-primary">Anda belum menyelesaikan tes terakhir anda, mohon klik tomboh di bawah ini untuk
                melanjutkan tes.</h5>
            <a href="{{ route('resume-test') }}" class="btn btn-primary">Lanjutkan Tes <i class="fas fa-arrow-right"></i></a>
        @else
            <h5 class="mb-3 text-primary">Untuk memulai tes, silahkan klik tombol di bawah ini </h5>
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('test-ghq') }}" class="btn btn-primary d-block mb-3">Mulai Tes <i class="fas fa-arrow-right"></i></a>
                @if (auth()->user()->hasil)
                    <p class="mx-3 text-primary">Atau</p>
                    <a href="" class="btn btn-primary d-block mb-3">Lihat Riwayat Tes <i class="fas fa-file-medical-alt"></i></a>
                @endif
            </div>
        @endif
    </div>
@endsection
