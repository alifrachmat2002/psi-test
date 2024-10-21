@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <h2 class="mb-4 text-primary">Buat User</h2>
    <form class="user" method="POST" action="{{ route('admin.users.create') }}">
        @csrf
        <div class="form-group">
            <input
                class="form-control form-control-user @error('email')
                                                is-invalid
                                            @enderror"
                name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email"
                value="{{ old('email') }}">
            <small id="emailHelpBlock" class="form-text text-muted ml-3">
                Gunakan email UNDIP.
            </small>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input
                class="form-control form-control-user @error('username')
                                                is-invalid
                                            @enderror"
                name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username"
                value="{{ old('username') }}">
            <small id="usernameHelpBlock" class="form-text text-muted ml-3">
                Isi dengan NIP user.
            </small>
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input
                class="form-control form-control-user @error('name')
                                                is-invalid
                                            @enderror"
                name="name" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama"
                value="{{ old('name') }}">
            <small id="nameHelpBlock" class="form-text text-muted ml-3">
                Isi dengan nama lengkap.
            </small>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <small id="nameHelpBlock" class="form-text text-muted ml-3">
            Pilih jenis kelamin.
        </small>
        <div class="d-flex justify-content-left mb-3 ml-3">
            <div class="form-check mr-3">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                    name="jenis_kelamin" id="jenisKelaminLakiLakiInput" value="laki-laki" @checked(old('jenis_kelamin') == 'laki-laki')>
                <label class="form-check-label" for="jenisKelaminLakiLakiInput">
                    Laki-Laki
                </label>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                    name="jenis_kelamin" id="jenisKelaminPerempuanInput" value="perempuan" @checked(old('jenis_kelamin') == 'perempuan')>
                <label class="form-check-label" for="jenisKelaminPerempuanInput">
                    Perempuan
                </label>

            </div>
        </div>
        <small id="nameHelpBlock" class="form-text text-muted ml-3">
            Pilih role user.
        </small>
        <div class="d-flex justify-content-left mb-3 ml-3">
            <div class="form-check mr-3">
                <input class="form-check-input @error('role') is-invalid @enderror" type="radio"
                    name="role" id="roleUserInput" value="2" @checked(old('role') == '2')>
                <label class="form-check-label" for="roleUserInput">
                    User
                </label>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input @error('role') is-invalid @enderror" type="radio"
                    name="role" id="roleAdminInput" value="1" @checked(old('role') == '2')>
                <label class="form-check-label" for="roleAdminInput">
                    Admin
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
        <button class="btn btn-primary btn-user btn-block" type="submit">Buat User</button>
        <hr>
    </form>
@endsection
