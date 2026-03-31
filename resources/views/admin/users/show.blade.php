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
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M16.862 3.487a2.5 2.5 0 013.535 3.535l-10.61 10.61a2 2 0 01-.707.464l-4.243 1.414a.5.5 0 01-.632-.632l1.414-4.243a2 2 0 01.464-.707l10.61-10.61zm2.121 2.121a.5.5 0 00-.707 0l-1.414 1.414 2.121 2.121 1.414-1.414a.5.5 0 000-.707l-1.414-1.414zm-2.828 2.828L6.293 17.298l-1.06 3.182 3.182-1.06 9.862-9.862-2.121-2.121z"></path></svg> Edit User
        </a>
    </div>
</div>
@endsection
