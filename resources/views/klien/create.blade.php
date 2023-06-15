@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Client</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded p-lg-5">
                <form method="POST" action="{{ route('klien.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="nama" placeholder="Nama">
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
                            <label for="proyek_id">Project</label>
                            <select name="proyek_id" id="proyek_id" class="form-control">
                                <option value="">Pilih Project</option>
                                @foreach($proyekData as $proyek)
                                    <option value="{{ $proyek->id }}" @selected(old('proyek_id') == $proyek->id)>
                                        {{ $proyek->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <a href="{{ route('klien.index') }}" class="btn btn-secondary mr-lg-2">Kembali</a>
                    <button type="submit" class="btn btn-primary m-100">Tambah Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
