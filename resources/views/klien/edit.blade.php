@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Client</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded p-lg-5">
                <form method="POST" action="{{ route('klien.update', $klien->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $klien->name }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{ $klien->address }}">
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.net" value="{{ $klien->email }}" aria-describedby="emailHelp">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="0877xxxxxx" value="{{ $klien->phone }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="proyek_id">Project</label>
                            <select name="proyek_id" id="proyek_id" class="form-control">
                                <option value="">Pilih Project</option>
                                @foreach($proyekData as $proyek)
                                    <option value="{{ $proyek->id }}" @selected($klien->proyek_id == $proyek->id)>
                                        {{ $proyek->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <a href="{{ route('klien.index') }}" class="btn btn-secondary mr-lg-2">Kembali</a>
                    <button type="submit" class="btn btn-primary m-100">Update Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
