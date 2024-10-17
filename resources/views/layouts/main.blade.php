@extends('app')

@section('content')
    <div class="" id="wrapper">
        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="" id="content">
                @include('components.navbar')
                @yield('container')
            </div>
        </div>
        
    </div>
@endsection
