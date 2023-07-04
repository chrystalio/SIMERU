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
                        <label for="name">Project Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $proyek->name }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="description">{{ $proyek->description }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Tanggal Mulai" value="{{ $proyek->start_date }}">
                        @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="end_date">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Tanggal Selesai" value="{{ $proyek->end_date }}">
                        @error('end_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="karyawan_uuid">Karyawan</label>
                        <select class="form-control" id="karyawan_uuid" name="karyawan_uuid">
                            <option value="" selected disabled>Pilih Karyawan</option>
                            @foreach($karyawanData as $data)
                                <option value="{{ $data->uuid }}" @selected($data->uuid == $proyek->karyawan_uuid)>{{ $data->name }}</option>
                            @endforeach
                        </select>
                        @error('karyawan_uuid')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status Project</label>
                        <select class="form-control" id="status" name="status">
                            <option value="" selected disabled>Pilih Status</option>
                            <option value="NOT STARTED" {{ $proyek->status == 'NOT STARTED' ? 'selected' : '' }}>NOT STARTED</option>
                            <option value="PENDING" {{ $proyek->status == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                            <option value="ON PROGRESS" {{ $proyek->status == 'ON PROGRESS' ? 'selected' : '' }}>ON PROGRESS</option>
                            <option value="CANCELLED" {{ $proyek->status == 'CANCELLED' ? 'selected' : '' }}>CANCELLED</option>
                            <option value="FINISHED" {{ $proyek->status == 'FINISHED' ? 'selected' : '' }}>FINISHED</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            <option selected disabled>Pilih Status</option>
                            <option value="PEMERINTAH" {{ $proyek->category == 'PEMERINTAH' ? 'selected' : '' }}>PEMERINTAH</option>
                            <option value="SWASTA" {{ $proyek->category == 'SWASTA' ? 'selected' : '' }}>SWASTA</option>
                            <option value="LAINNYA" {{ $proyek->category == 'LAINNYA' ? 'selected' : '' }}>LAINNYA</option>
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <a href="{{ route('proyek.index') }}" class="btn btn-secondary mr-lg-2">Kembali</a>
                    <button type="submit" class="btn btn-primary m-100">Update Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
