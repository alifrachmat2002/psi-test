@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <h2 class="mb-3 text-primary">Selamat Datang di Tes <span class="text-uppercase">{{ $jenis }}</span>, {{ auth()->user()->name }}</h2>
    <div class="alert alert-secondary p-4">
        @yield('test-description')
    </div>
    {{-- Metode skoring: 0-0-1-1 (dimulai daari setiap pilihan jawaban dari kiri ke kanan). Nilai  GHQ didapatkan dari menjumlahkan skor per aitem. Interpretasi kondisi distress didapatkam dari nilai cut point 5 atau 6, artinya individu dengan skor 5 ke bawah memiliki kondisi mental yang sehat, dan individu dengan skor 6 keatas adalah sebaliknya. --}}

    @yield('test-form')
@endsection
