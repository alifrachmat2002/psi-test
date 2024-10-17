@extends('layouts.main')

@section('container')
    <div class="container">
        <h2>Selamat Datang, {{ auth()->user()->name }}</h2>
    </div>
@endsection