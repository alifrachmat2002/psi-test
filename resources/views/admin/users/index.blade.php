@extends('layouts.main')

@section('container')
    <div class="">
        {{ Breadcrumbs::render() }}
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-3 text-primary">Manajemen User</h2>
        <div class="">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah User</a>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Objek</th>
                <th>Keterangan</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->level == 1 ? 'Admin' : 'User' }}</td>
                    <td><a href="{{ route('admin.users.edit', ['user' => $user]) }}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
