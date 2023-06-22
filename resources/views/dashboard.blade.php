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
                                    <h6 class="font-extrabold mb-0">190</h6>
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
                                    <h6 class="font-extrabold mb-0">40</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6">
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
                <div class="col-md-8">
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proyekData['FINISHED']  as $finished)
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
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div id="projectStatus" style="width:100%; height:280px;"></div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div id="container" style="width:100%; height:280px;"></div>
                </div>
                <div class="col-md-4">
                    <div id="container1" style="width:100%; height:280px;"></div>
                </div>

            </div>

            {{--            <div class="row">--}}
            {{--                <div class="col-md-6 col-sm-12 my-4">--}}
            {{--                    <div class="card">--}}
            {{--                        <div class="card-body px-4 py-4-5">--}}
            {{--                            <div class="row">--}}
            {{--                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">--}}
            {{--                                    <div class="stats-icon green mb-2">--}}
            {{--                                        <i class="iconly-boldSend"></i>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">--}}
            {{--                                    <h6 class="font-bold">Last 5 Finished Proyek</h6>--}}
            {{--                                    @foreach($proyekData['FINISHED']  as $finished)--}}
            {{--                                        Project Name : {{ $finished->nama }} <br>--}}
            {{--                                        Handled By :  {{ $finished->karyawan->nama }} <br>--}}
            {{--                                        Created Date :  {{ $finished->created_at }} <br>--}}
            {{--                                        status : {{ $finished->status }} <br>--}}
            {{--                                        ===================================================--}}
            {{--                                        <br>--}}
            {{--                                        <br>--}}
            {{--                                    @endforeach--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                <div class="col-md-6 col-sm-12 my-4">--}}
            {{--                    <div class="card">--}}
            {{--                        <div class="card-body px-4 py-4-5">--}}
            {{--                            <div class="row">--}}
            {{--                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">--}}
            {{--                                    <div class="stats-icon green mb-2">--}}
            {{--                                        <i class="iconly-boldSend"></i>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">--}}
            {{--                                    <h6 class="font-bold">Last 5 Not started Proyek</h6>--}}
            {{--                                    @foreach($proyekData['NOT STARTED']  as $notstarted)--}}
            {{--                                        Project Name : {{ $notstarted->nama }} <br>--}}
            {{--                                        Handled By :  {{ $notstarted->karyawan->nama }} <br>--}}
            {{--                                        Created Date :  {{ $notstarted->created_at }} <br>--}}
            {{--                                        status : {{ $notstarted->status }} <br>--}}
            {{--                                        ===================================================--}}
            {{--                                        <br>--}}
            {{--                                        <br>--}}
            {{--                                    @endforeach--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                <div class="col-md-6 col-sm-12 my-4">--}}
            {{--                    <div class="card">--}}
            {{--                        <div class="card-body px-4 py-4-5">--}}
            {{--                            <div class="row">--}}
            {{--                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">--}}
            {{--                                    <div class="stats-icon green mb-2">--}}
            {{--                                        <i class="iconly-boldSend"></i>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">--}}
            {{--                                    <h6 class="font-bold">Last 5 Cancelled Proyek</h6>--}}
            {{--                                    @foreach($proyekData['CANCELLED']  as $cancelled)--}}
            {{--                                        Project Name : {{ $cancelled->nama }} <br>--}}
            {{--                                        Handled By :  {{ $cancelled->karyawan->nama }} <br>--}}
            {{--                                        Created Date :  {{ $cancelled->created_at }} <br>--}}
            {{--                                        status : {{ $cancelled->status }} <br>--}}
            {{--                                        ===================================================--}}
            {{--                                        <br>--}}
            {{--                                        <br>--}}
            {{--                                    @endforeach--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                <div class="col-md-6 col-sm-12 my-4">--}}
            {{--                    <div class="card">--}}
            {{--                        <div class="card-body px-4 py-4-5">--}}
            {{--                            <div class="row">--}}
            {{--                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">--}}
            {{--                                    <div class="stats-icon green mb-2">--}}
            {{--                                        <i class="iconly-boldSend"></i>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">--}}
            {{--                                    <h6 class="font-bold">Last 5 Pending Proyek</h6>--}}
            {{--                                    @foreach($proyekData['PENDING']  as $pending)--}}
            {{--                                        Project Name : {{ $pending->nama }} <br>--}}
            {{--                                        Handled By :  {{ $pending->karyawan->nama }} <br>--}}
            {{--                                        Created Date :  {{ $pending->created_at }} <br>--}}
            {{--                                        status : {{ $pending->status }} <br>--}}
            {{--                                        ===================================================--}}
            {{--                                        <br>--}}
            {{--                                        <br>--}}
            {{--                                    @endforeach--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-md-6 col-sm-12 my-4">--}}
            {{--                    <div class="card">--}}
            {{--                        <div class="card-body px-4 py-4-5">--}}
            {{--                            <div class="row">--}}
            {{--                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">--}}
            {{--                                    <div class="stats-icon green mb-2">--}}
            {{--                                        <i class="iconly-boldSend"></i>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">--}}
            {{--                                    <h6 class="font-bold">Last 5 On Progress Proyek</h6>--}}
            {{--                                    @foreach($proyekData['ON PROGRESS']  as $onProgress)--}}
            {{--                                        Project Name : {{ $onProgress->nama }} <br>--}}
            {{--                                        Handled By :  {{ $onProgress->karyawan->nama }} <br>--}}
            {{--                                        Created Date :  {{ $onProgress->created_at }} <br>--}}
            {{--                                        status : {{ $onProgress->status }} <br>--}}
            {{--                                        ===================================================--}}
            {{--                                        <br>--}}
            {{--                                        <br>--}}
            {{--                                    @endforeach--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </section>
@endsection
