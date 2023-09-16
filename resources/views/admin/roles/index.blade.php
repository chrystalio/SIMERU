@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Roles</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded">
                <div class="p-2">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary my-3">Tambah Data</a>
                    <table class="table table-md table-hover table-bordered" id="roleTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Total Users</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->users()->count() }} Users</td>
                                <td>
                                    <a href="{{ route('laporan.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('laporan.delete', $role->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
