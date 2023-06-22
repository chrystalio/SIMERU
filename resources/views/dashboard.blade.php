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
                    <h5>Selamat Datang Di Sistem Informasi Management Perusahaan</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
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
                <div class="col-6 col-lg-3 col-md-6">
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
                <div class="col-6 col-lg-3 col-md-6">
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
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldSend"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-bold">Selesai</h6>
                                    <h6 class="font-extrabold mb-0">10</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-sm-12 my-4">
                    <div id="container" style="width:100%; height:400px;"></div>
                </div>
                <div class="col-md-4 my-4">
                    <div id="container1" style="width:100%; height:400px;"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 my-4">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldSend"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-bold">Last 5 Finished Proyek</h6>
                                    @foreach($proyekData['FINISHED']  as $finished)
                                        Project Name : {{ $finished->nama }} <br>
                                        Handled By :  {{ $finished->karyawan->nama }} <br>
                                        Created Date :  {{ $finished->created_at }} <br>
                                        status : {{ $finished->status }} <br>
                                        ===================================================
                                        <br>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 my-4">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldSend"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-bold">Last 5 Not started Proyek</h6>
                                    @foreach($proyekData['NOT STARTED']  as $notstarted)
                                        Project Name : {{ $notstarted->nama }} <br>
                                        Handled By :  {{ $notstarted->karyawan->nama }} <br>
                                        Created Date :  {{ $notstarted->created_at }} <br>
                                        status : {{ $notstarted->status }} <br>
                                        ===================================================
                                        <br>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 my-4">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldSend"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-bold">Last 5 Cancelled Proyek</h6>
                                    @foreach($proyekData['CANCELLED']  as $cancelled)
                                        Project Name : {{ $cancelled->nama }} <br>
                                        Handled By :  {{ $cancelled->karyawan->nama }} <br>
                                        Created Date :  {{ $cancelled->created_at }} <br>
                                        status : {{ $cancelled->status }} <br>
                                        ===================================================
                                        <br>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 my-4">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldSend"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-bold">Last 5 Pending Proyek</h6>
                                    @foreach($proyekData['PENDING']  as $pending)
                                        Project Name : {{ $pending->nama }} <br>
                                        Handled By :  {{ $pending->karyawan->nama }} <br>
                                        Created Date :  {{ $pending->created_at }} <br>
                                        status : {{ $pending->status }} <br>
                                        ===================================================
                                        <br>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 my-4">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldSend"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-bold">Last 5 On Progress Proyek</h6>
                                    @foreach($proyekData['ON PROGRESS']  as $onProgress)
                                        Project Name : {{ $onProgress->nama }} <br>
                                        Handled By :  {{ $onProgress->karyawan->nama }} <br>
                                        Created Date :  {{ $onProgress->created_at }} <br>
                                        status : {{ $onProgress->status }} <br>
                                        ===================================================
                                        <br>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
