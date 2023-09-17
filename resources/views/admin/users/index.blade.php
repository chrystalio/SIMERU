@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
        </div>
        <div class="section-body">
            <div class="card-body bg-white my-2 rounded">
                <div class="table-responsive-md">
                    <table class="table table-md table-hover table-bordered" id="departmentTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-capitalize">{{ $user->role()->first()->name }}</td>
                                <td>
                                    <a href="{{ route('user.reset-password', ['id' => $user->id]) }}" class="btn btn-danger">
                                        <i class="fa fa-key"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
