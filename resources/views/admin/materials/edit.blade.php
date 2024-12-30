@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Edit Materi dan Panduan</h2>
        <div class="">
            <a href="{{ route('materials.show',['material' => $material]) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <form class="user" method="POST" action="{{ route('admin.materials.update',['material' => $material]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <input
                class="form-control form-control-user @error('judul')
                                                is-invalid
                                            @enderror"
                name="judul" id="exampleInputJudul" aria-describedby="judulHelp" placeholder="Judul"
                value="{{ old('judul') ?? $material->judul }}">
            @error('judul')
                <div class="invalid-feedback ml-3">{{ $message }}</div>
            @enderror
            <small id="judulHelpBlock" class="form-text text-muted ml-3">
                Isi dengan judul materi atau panduan.
            </small>

        </div>
        <div class="form-group">

            <div class="custom-file">
                <input type="file"
                    class="custom-file-input @error('file')
                    is-invalid
                @enderror"
                    id="customFile" aria-describedby="fileHelp" name="file">
                @error('file')
                    <div class="invalid-feedback ml-3">{{ $message }}</div>
                @enderror
                <label class="custom-file-label" for="customFile">Pilih file Materi atau Panduan</label>
            </div>
            <small id="fileHelpBlock" class="form-text text-muted ml-3">
                Unggah file materi atau panduan dalam format PDF jika ingin mengganti file.
            </small>
        </div>
        <div class="mb-3">
            <textarea name="deskripsi" id="deksripsi" cols="30" rows="10"
                class="form-control @error('deskripsi')
            is-invalid
        @enderror"
                placeholder="Isi dengan Deskripsi dari Materi atau Panduan" aria-describedby="fileHelp">{{ old('deskripsi') ?? $material->deskripsi }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback ml-3">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">Simpan Perubahan</button>
        <hr>
    </form>
@endsection
