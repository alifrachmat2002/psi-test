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
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang di Aplikasi Test Psikologi!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('authenticate') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-user @error('username')
                                                is-invalid
                                            @enderror"
                                                name="username" id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" value="{{ old('username') }}">
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user @error('password')
                                                is-invalid
                                            @enderror"
                                                id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                        {{-- <input  type="submit" name="submit"
                                            value="login"> --}}
                                            <hr>
                                        </form>
                                        <p class="text-center m-0 p-0">Belum Memiliki Akun? <a href="{{ route('register') }}">Daftar Disini</a></p>
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
