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
                        <label for="nama">Nama Project</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Project</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                        @error('deskripsi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai">
                        @error('tanggal_mulai')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="Tanggal Selesai">
                        @error('tanggal_selesai')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="karyawan_id">Karyawan</label>
                    <select class="form-control" id="karyawan_id" name="karyawan_id">
                        <option value="" selected disabled>Pilih Karyawan</option>
                        @foreach($karyawanData as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Project</label>
                        <select class="form-control" id="status" name="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="NOT STARTED">NOT STARTED</option>
                            <option value="PENDING">PENDING</option>
                            <option value="CANCELLED">CANCELLED</option>
                            <option value="ON PROGRESS">ON PROGRESS</option>
                            <option value="FINISHED">FINISHED</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                            <option selected disabled>Pilih Status</option>
                            <option value="PEMERINTAH">PEMERINTAH</option>
                            <option value="SWASTA">SWASTA</option>
                            <option value="LAINNYA">LAINNYA</option>
                        </select>
                    </div>

                    <a href="{{ route('proyek.index') }}" class="btn btn-secondary mr-lg-2">Kembali</a>
                    <button type="submit" class="btn btn-primary m-100">Tambah Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
