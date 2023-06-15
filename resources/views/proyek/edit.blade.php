@extends('layouts.app')

@section('title')
    Edit Project
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Project</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded p-lg-5">
                <form method="POST" action="{{ route('proyek.update', $proyek->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama Project</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $proyek->nama }}">
                        @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Project</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">{{ $proyek->deskripsi }}</textarea>
                        @error('deskripsi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai" value="{{ $proyek->tanggal_mulai }}">
                        @error('tanggal_mulai')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="Tanggal Selesai" value="{{ $proyek->tanggal_selesai }}">
                        @error('tanggal_selesai')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="karyawan_id">Karyawan</label>
                        <select class="form-control" id="karyawan_id" name="karyawan_id">
                            <option value="" selected disabled>Pilih Karyawan</option>
                            @foreach($karyawanData as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $proyek->karyawan_id ? 'selected' : '' }}>{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <a href="{{ route('proyek.index') }}" class="btn btn-secondary mr-lg-2">Kembali</a>
                    <button type="submit" class="btn btn-primary m-100">Update Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
