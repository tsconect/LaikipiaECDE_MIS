@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="card">
    <div class="card-header btn-success">
        <h5>User Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>First Name:</strong>
                <div>{{ $user->first_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Middle Name:</strong>
                <div>{{ $user->middle_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Last Name:</strong>
                <div>{{ $user->last_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Email:</strong>
                <div>{{ $user->email ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Phone Number:</strong>
                <div>{{ $user->phone_number ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Role:</strong>
                <div>{{ $user->role ?? '-' }}</div>
            </div>
        </div>

        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i> Edit User
        </a>
    </div>
</div>
@endsection
