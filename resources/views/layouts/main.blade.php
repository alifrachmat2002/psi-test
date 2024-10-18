@extends('app')

@section('content')
    <div class="" id="wrapper">
        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="" id="content">
                @include('components.navbar')
                <div class="card shadow-sm p-3 m-3 min-vh-100">
                    @yield('container')
                </div>

            </div>
        </div>

    </div>
@endsection
