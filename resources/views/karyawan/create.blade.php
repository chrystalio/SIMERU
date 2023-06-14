@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Karyawan</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded p-lg-5">
                <form method="POST" action="{{ route('karyawan.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.net" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-danger">Input email dengan benar.
                        </small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="no_telp">No HP</label>
                            <input type="tel" class="form-control" id="no_telp" name="no_telp" placeholder="0877xxxxxx">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="departemen">Departemen</label>
                            <select name="departemen" id="departemen" class="form-control">
                                <option value="1">IT</option>
                                <option value="2">HRD</option>
                                <option value="3">Keuangan</option>
                                <option value="4">Marketing</option>
                                <option value="5">Operasional</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-100">Tambah Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
