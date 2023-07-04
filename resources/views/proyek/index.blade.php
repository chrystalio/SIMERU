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
                    <table class="table table-md table-hover table-bordered" id="projectTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Deadline</th>
                            <th>Karyawan</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proyekData as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->end_date }}</td>
                                <td>{{ $data->karyawan->name }}</td>
                                <td>{{ $data->category }}</td>
                                <td>
                                    @if ($data->status === 'NOT STARTED')
                                        <span class="badge badge-dark">NOT STARTED</span>
                                    @elseif($data->status === 'PENDING')
                                        <span class="badge badge-warning">PENDING</span>
                                    @elseif ($data->status === 'ON PROGRESS')
                                        <span class="badge badge-primary">ON PROGRESS</span>
                                    @elseif($data->status === 'CANCELLED')
                                        <span class="badge badge-danger">CANCELLED</span>
                                    @elseif ($data->status === 'FINISHED')
                                        <span class="badge badge-success">FINISHED</span>
                                    @endif
                                </td>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
