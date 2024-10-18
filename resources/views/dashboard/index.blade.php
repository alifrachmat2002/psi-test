@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <h2 class="mb-5 text-primary">Selamat Datang, {{ auth()->user()->name }}</h2>
    <div class="d-flex flex-column align-items-center">
        <h5 class="text-primary">Selamat Datang di aplikasi Psi-Test, aplikasi ini dibuat untuk memeriksa kesehatan mental
            anda.</h5>
        <h5 class="mb-3 text-primary">Untuk memulai tes, silahkan klik tombol di bawah ini </h5>
        <a href="{{ route('test-ghq') }}" class="btn btn-primary">Mulai Tes <i class="fas fa-arrow-right"></i></a>
    </div>
@endsection
