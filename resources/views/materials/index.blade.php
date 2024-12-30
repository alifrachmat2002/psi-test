@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-3 text-primary">Materi dan Panduan Self-Care</h2>
        @can('manage-materials')
            <div class="">
                <a href="{{ route('admin.materials.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah
                    Materi</a>
            </div>
        @endcan
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="">
        <div class="alert alert-primary" role="alert">
            Pada halaman ini, Anda dapat menemukan berbagai materi dan panduan self-care yang dapat membantu Anda dalam
            menjaga kesehatan mental Anda.
        </div>
    </div>
    <div class="row px-2 gap-2">
        @forelse ($materials as $material)
        <div class="col-lg-6 col-12 p-1 d-flex">
            <div class="card flex-grow-1">
                <div class="card-body d-flex flex-column justify-content-between ">
                    <h5 class="card-title text-primary">{{ $material->judul }}</h5>
                    <div class="mt-auto">
                    <p class="card-text mt-auto">{{ Str::limit($material->deskripsi, 150, '...') }}</p>
                        <a href="{{ route('materials.show',['material' => $material->slug]) }}" class="btn btn-primary stretched-link">Lihat</a>
                    </div>
                </div>
            </div>
            </div>
        @empty
            <p class="text-center">Belum ada Materi atau Panduan</p>
        @endforelse
    </div>
@endsection
