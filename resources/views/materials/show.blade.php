@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-3 text-primary">{{ $material->judul }}</h3>

    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="rounded-sm border p-3 mb-3 pb-0">
        <p class="text-primary">Judul</p>
        <h5 class="text-dark">{{ $material->judul }}</h5>
        <hr>
        <p class="text-primary">Deskripsi</p>
        <p class="text-dark">{{ $material->deskripsi }}</p>
        <hr>

        <a href="{{ Storage::url($material->file) }}" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i>
            Baca Materi/Panduan</a>
    </div>
    <div class="mt-auto">
        <a href="{{ route('materials') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
        @can('manage-materials')
            <a href="{{ route('admin.materials.edit',['material' => $material]) }}" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a>
            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-danger"><i
                    class="fas fa-trash"></i> Hapus</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Materi?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Anda yakin ingin menghapus materi ini? Materi yang sudah dihapus tidak bisa dikembalikan.
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <form action="{{ route('admin.materials.destroy', ['material' => $material->slug]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
