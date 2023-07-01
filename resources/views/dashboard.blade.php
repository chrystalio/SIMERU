@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body ">
                    <h5>Selamat Datang Di SIMERU BEST SOLUTION</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldFolder"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-bold">
                                        <a href="{{ route('karyawan.index') }}" class="text-decoration-none">
                                            Karyawan
                                        </a>
                                    </h6>
                                    <h6 class="font-extrabold mb-0">{{ $karyawanCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldBuy"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-bold">
                                        <a href="{{ route('proyek.index') }}" class="text-decoration-none">
                                            Projects
                                        </a>
                                    </h6>
                                    <h6 class="font-extrabold mb-0">{{ $proyekCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldTime-Circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-bold">
                                        <a href="{{ route('laporan.index') }}" class="text-decoration-none">
                                            Reports
                                        </a>
                                    </h6>
                                    <h6 class="font-extrabold mb-0">60</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body" style="height: 280px">
                            <h6>Latest Project Status</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Deadline</th>
                                        <th>Handled By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($proyekData as $finished)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $finished->nama }}</td>
                                            <td>{{ $finished->tanggal_selesai }}</td>
                                            <td>{{ $finished->karyawan->nama }}</td>
                                            <td>
                                                @if ($finished->status === 'NOT STARTED')
                                                    <span class="badge badge-dark">NOT STARTED</span>
                                                @elseif($finished->status === 'PENDING')
                                                    <span class="badge badge-warning">PENDING</span>
                                                @elseif ($finished->status === 'ON PROGRESS')
                                                    <span class="badge badge-primary">ON PROGRESS</span>
                                                @elseif($finished->status === 'CANCELLED')
                                                    <span class="badge badge-danger">CANCELLED</span>
                                                @elseif ($finished->status === 'FINISHED')
                                                    <span class="badge badge-success">FINISHED</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('proyek.index', $finished->id) }}"
                                                   class="btn btn-sm btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Data</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-5">
                    <div id="employeePercentage" style="width:100%; height:280px;"></div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div id="projectPercentage" style="width:100%; height:280px;"></div>
                </div>
                <div class="col-md-4">
                    <div id="projectStatus" style="width:100%; height:280px;"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('includes.charts')
