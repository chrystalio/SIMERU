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
            <div class="container-fluid">
                <a href="{{ route('karyawan.create') }}" class="btn btn-primary my-2">Tambah Data</a>

                <div class="card-body bg-white p-4 my-2 rounded">
                    <div class="table-responsive">
                        <table class="table table-md" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Irwansyah Saputra</td>
                                <td>2017-01-09</td>
                                <td><div class="badge badge-success">Active</div></td>
                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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
