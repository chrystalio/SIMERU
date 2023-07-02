@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Department</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded p-lg-5">
                <form method="POST" action="{{ route('department.store') }}">
                    @csrf
                        <div class="form-group">
                            <label for="name">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Department Name" oninput="this.value = this.value.toUpperCase()">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    <a href="{{ route('department.index') }}" class="btn btn-secondary mr-lg-2">Back</a>
                    <button type="submit" class="btn btn-primary m-100">Add Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
