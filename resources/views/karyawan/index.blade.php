@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Karyawan</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded">
                <a href="{{ route('karyawan.create') }}" class="btn btn-primary my-3">Tambah Data</a>
                <div class="">
                    <table class="table table-md table-hover table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($karyawanData as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->no_telp }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->department->nama }}</td>
                                <td>
                                    <a href="{{ route('karyawan.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('karyawan.delete', $data->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($karyawanData->isEmpty())
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

@push('scripts')
    <script>
        let karyawanTable = new DataTable('#myTable')
    </script>
@endpush
