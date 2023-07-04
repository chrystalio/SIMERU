@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Laporan</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded p-lg-5">
                <form method="POST" action="{{ route('laporan.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ old('title') }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="description" value="{{ old('description') }}">
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" placeholder="date" value="{{ old('date') }}">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="proyek_id">Proyek</label>
                            <select name="proyek_id" id="proyek_id" class="form-control">
                                <option value="">Pilih Proyek</option>
                                @foreach($proyekData as $proyek)
                                    <option value="{{ $proyek->id }}" {{ old('proyek_id') == $proyek->id ? 'selected' : '' }}>
                                        {{ $proyek->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('proyek_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary m-100">Tambah Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
