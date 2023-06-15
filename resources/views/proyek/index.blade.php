@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Projects</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded">
                <a href="{{ route('proyek.create') }}" class="btn btn-primary my-3">Tambah Data</a>
                <div class="">
                    <table class="table table-md table-hover table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Deadline</th>
                            <th>Karyawan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proyekData as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>{{ $data->tanggal_mulai }}</td>
                                <td>{{ $data->tanggal_selesai }}</td>
                                <td>{{ $data->karyawan->nama }}</td>
                                <td>
                                    <a href="{{ route('proyek.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('proyek.delete', $data->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($proyekData->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
