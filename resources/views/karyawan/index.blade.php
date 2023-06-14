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
                <div class="card-body bg-white my-2 rounded">
                <a href="{{ route('karyawan.create') }}" class="btn btn-primary my-3">Tambah Data</a>
                    <div class="">
                        <table class="table table-md table-hover table-bordered" id="myTable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>email</th>
                                <th>Department</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Bandung</td>
                                <td>08123456789</td>
                                <td>johndoe@example.net</td>
                                <td>IT</td>
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
