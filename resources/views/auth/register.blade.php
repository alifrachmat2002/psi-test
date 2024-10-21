@extends('app')

@section('content')
    @if (session('loginError'))
        <div class='alert alert-danger' role='alert'>
            <button aria-label='Close' class='close' data-dismiss='alert' type='button'><span
                    aria-hidden='true'>×</span></button>
            {{ session('loginError') }}
        </div>
    @endif
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-register-image"></div> -->
                            <div class="col-lg-12">
                                <div class="pt-4 pb-4 px-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat User Baru</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-user @error('email')
                                                is-invalid
                                            @enderror"
                                                name="email" id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email" value="{{ old('email') }}">
                                            <small id="emailHelpBlock" class="form-text text-muted ml-3">
                                                Gunakan email UNDIP anda.
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
                                                name="username" id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" value="{{ old('username') }}">
                                            <small id="usernameHelpBlock" class="form-text text-muted ml-3">
                                                Isi dengan NIP anda.
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
                                                name="name" id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nama" value="{{ old('name') }}">
                                            <small id="nameHelpBlock" class="form-text text-muted ml-3">
                                                Isi dengan nama lengkap anda.
                                            </small>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <small id="nameHelpBlock" class="form-text text-muted ml-3 text-center">
                                            Pilih jenis kelamin anda.
                                        </small>
                                        <div class="d-flex justify-content-around mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" id="jenisKelaminLakiLakiInput"
                                                    value="laki-laki" @checked(old('jenis_kelamin') == 'laki-laki')>
                                                <label class="form-check-label" for="jenisKelaminLakiLakiInput">
                                                    Laki-Laki
                                                </label>
                                                @error('jenis_kelamin')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" id="jenisKelaminPerempuanInput"
                                                    value="perempuan" @checked(old('jenis_kelamin') == 'perempuan')>
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
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Daftar</button>
                                        <hr>
                                    </form>
                                    <p class="text-center m-0 p-0">Sudah Memiliki Akun? <a
                                            href="{{ route('login') }}">Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Self Healing :: Psikologi - Elektro Undip @2021</span>
                </div>
            </div>
        </footer>
    </div>
@endsection
