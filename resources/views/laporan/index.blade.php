@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded">
                <a href="{{ route('laporan.create') }}" class="btn btn-primary my-3">Tambah Data</a>
                <div class="">
                    <table class="table table-md table-hover table-bordered" id="laporanTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Proyek</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($laporanData as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->judul }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->project->nama }}</td>
                                <td>
                                    <a href="{{ route('laporan.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('laporan.delete', $data->id) }}" method="POST" class="d-inline">
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
