@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="d-flex justify-content-between">
        <h2 class="mb-4 text-primary">Edit Profil Saya</h2>
        <div class="">
            <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <form class="user" method="POST" action="{{ route('profile.update',['user' => $user]) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="email" class="form-label ml-3">Email</label>
            <input
                class="form-control form-control-user @error('email')
                                                is-invalid
                                            @enderror"
                name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email"
                value="{{ old('email') ?? $user->email }}">
            <small id="emailHelpBlock" class="form-text text-muted ml-3 mb-1">
                Gunakan email UNDIP.
            </small>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="username" class="form-label ml-3">Username (NIP)</label>
            <input
                class="form-control form-control-user @error('username')
                                                is-invalid
                                            @enderror"
                name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username"
                value="{{ old('username') ?? $user->username }}">
            <small id="usernameHelpBlock" class="form-text text-muted ml-3 mb-1">
                Isi dengan NIP anda, tanpa titik maupun huruf. Contoh : 199706262023109999.
            </small>
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name" class="form-label ml-3">Nama</label>
            <input
                class="form-control form-control-user @error('name')
                                                is-invalid
                                            @enderror"
                name="name" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama"
                value="{{ old('name') ?? $user->name }}">
            <small id="nameHelpBlock" class="form-text text-muted ml-3 mb-1">
                Isi dengan nama lengkap anda.
            </small>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <small id="nameHelpBlock" class="form-text text-muted ml-3 ">
            Pilih jenis kelamin anda.
        </small>
        <div class="d-flex justify-content-left mb-3 ml-3">
            <div class="form-check mr-3">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                    name="jenis_kelamin" id="jenisKelaminLakiLakiInput" value="laki-laki" @checked( old('jenis_kelamin') ? old('jenis_kelamin') == 'laki-laki' : $user->jenis_kelamin == 'laki-laki' )>
                <label class="form-check-label" for="jenisKelaminLakiLakiInput">
                    Laki-Laki
                </label>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                    name="jenis_kelamin" id="jenisKelaminPerempuanInput" value="perempuan" @checked( old('jenis_kelamin') ? old('jenis_kelamin') == 'perempuan' : $user->jenis_kelamin == 'perempuan')>
                <label class="form-check-label" for="jenisKelaminPerempuanInput">
                    Perempuan
                </label>

            </div>
        </div>
        <div class="form-group">
            <input type="password" name="password"
                class="form-control form-control-user @error('password')
                                                is-invalid
                                            @enderror"
                id="exampleInputPassword" placeholder="Password">
            <small id="usernameHelpBlock" class="form-text text-muted ml-3">
                Password minimal 8 karakter.
            </small>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation"
                class="form-control form-control-user @error('password_confirmation"')
                                                is-invalid
                                            @enderror"
                id="exampleInputPassword" placeholder="Konfirmasi Password">
            <small id="usernameHelpBlock" class="form-text text-muted ml-3">
                Ulangi password yang anda masukkan.
            </small>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">Simpan Perubahan</button>
        <hr>
    </form>
@endsection
