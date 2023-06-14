@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Department</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded">
                <a href="{{ route('department.create') }}" class="btn btn-primary my-3">Tambah Department</a>
                <div class="">
                    <table class="table table-md table-hover table-bordered" id="departmentTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departmentsData as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                    <a href="{{ route('department.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('department.delete', $data->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($departmentsData->isEmpty())
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
