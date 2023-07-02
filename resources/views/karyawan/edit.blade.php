@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Karyawan</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded p-lg-5">
                <form method="POST" action="{{ route('karyawan.update', $karyawan->uuid) }}">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Name</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $karyawan->nama }}">
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $karyawan->alamat }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.net" value="{{ $karyawan->email }}" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-danger">Input email dengan benar.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="role">Jabatan</label>
                            <input type="text" class="form-control" id="role" name="role" value="{{ $karyawan->role }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="no_telp">No HP</label>
                            <input type="tel" class="form-control" id="no_telp" name="no_telp" placeholder="0877xxxxxx" value="{{ $karyawan->no_telp }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="department_id">Departemen</label>
                            <select name="department_id" id="department_id" class="form-control">
                                <option value="">Pilih Departemen</option>
                                @foreach($departmentData as $department)
                                    <option value="{{ $department->id }}" {{ $department->id == $karyawan->department_id ? 'selected' : '' }}>{{ $department->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary mr-lg-2">Kembali</a>
                    <button type="submit" class="btn btn-primary m-100">Update Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
