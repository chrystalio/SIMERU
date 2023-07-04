@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Client</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded">
                <a href="{{ route('klien.create') }}" class="btn btn-primary my-3">Tambah Data</a>
                <div class="">
                    <table class="table table-md table-hover table-bordered" id="klienTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Proyek</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kliensData as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->proyek->name }}</td>
                                <td>
                                    <a href="{{ route('klien.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('klien.delete', $data->id) }}" method="POST" class="d-inline">
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
