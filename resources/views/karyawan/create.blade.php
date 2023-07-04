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
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{ old('address') }}">
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.net" aria-describedby="emailHelp" value="{{ old('email') }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="role">Role</label>
                            <input type="text" class="form-control" id="role" name="role" value="{{ old('role') }}">
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="0877xxxxxx" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="department_id">Departement</label>
                            <select name="department_id" id="department_id" class="form-control">
                                <option value="">Pilih Departemen</option>
                                @foreach($departmentData as $department)
                                    <option value="{{ $department->id }}" @selected(old('department_id') == $department->id)>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('deparment_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary mr-lg-2">Kembali</a>
                    <button type="submit" class="btn btn-primary m-100">Tambah Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
