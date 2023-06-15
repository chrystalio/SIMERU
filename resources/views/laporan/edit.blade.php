@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Laporan</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded p-lg-5">
                <form method="POST" action="{{ route('laporan.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="{{ $laporan->judul }}">
                            @error('judul')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" value="{{ $laporan->deskripsi }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal" value="{{ $laporan->tanggal }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="proyek_id">Proyek</label>
                            <select name="proyek_id" id="proyek_id" class="form-control">
                                <option value="">Pilih Proyek</option>
                                @foreach($proyekData as $proyek)
                                    <option value="{{ $proyek->id }}" @selected($laporan->proyek_id == $proyek->id)>
                                        {{ $proyek->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary m-100">Update Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
