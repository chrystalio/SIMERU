@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Project</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded p-lg-5">
                <form method="POST" action="{{ route('proyek.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Project Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="description">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Tanggal Mulai" value="{{ old('start_date') }}">
                        @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="end_date">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Tanggal Selesai" value="{{ old('end_date') }}">
                        @error('end_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="karyawan_uuid">Karyawan</label>
                    <select class="form-control" id="karyawan_uuid" name="karyawan_uuid">
                        <option value="" selected disabled>Pilih Karyawan</option>
                        @foreach($karyawanData as $data)
                            <option value="{{ $data->uuid }}" @selected(old('karyawan_uuid') == $data->uuid)>{{ $data->name }}</option>
                        @endforeach
                    </select>
                    @error('karyawan_uuid')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status Project</label>
                        <select class="form-control" id="status" name="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="NOT STARTED" @selected(old('status') == 'NOT STARTED')>NOT STARTED</option>
                            <option value="PENDING" @selected(old('status') == 'PENDING')>PENDING</option>
                            <option value="CANCELLED" @selected(old('status') == 'CANCELLE')>CANCELLED</option>
                            <option value="ON PROGRESS" @selected(old('status') == 'ON PROGRESS')>ON PROGRESS</option>
                            <option value="FINISHED" @selected(old('status') == 'FINISHED')>FINISHED</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            <option selected disabled>Pilih Status</option>
                            <option value="PEMERINTAH" @selected(old('value') == 'PEMERINTAH')>PEMERINTAH</option>
                            <option value="SWASTA" @selected(old('value') == 'SWASTA')>SWASTA</option>
                            <option value="LAINNYA" @selected(old('value') == 'LAINNYA')>LAINNYA</option>
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <a href="{{ route('proyek.index') }}" class="btn btn-secondary mr-lg-2">Kembali</a>
                    <button type="submit" class="btn btn-primary m-100">Tambah Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
