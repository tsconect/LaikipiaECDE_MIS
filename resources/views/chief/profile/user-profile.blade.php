@extends('backoffice.layouts.app')


@section('nav-bar')

@include('chief.sidebar')
@endsection

@section('content')
 

    <div class="container-fluid py-4">
        <div class="row">
=
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('chief.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">First name</label>
                                        <input class="form-control" type="text" name="firstname"  value="{{ old('first_name', auth()->user()->first_name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Last name</label>
                                        <input class="form-control" type="text" name="lastname" value="{{ old('last_name', auth()->user()->last_name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Phone</label>
                                        <input class="form-control" type="text" name="phone" value="{{ old('phone_number', auth()->user()->phone_number) }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Role</label>
                                        <select class="form-control" name="role" @if(auth()->user()->role != 1) disabled @endif>
                                            <option value="1" {{ auth()->user()->role == "chief" ? 'selected' : '' }}>Chief</option>
                                        
                                        </select>
                                        <!-- @if(auth()->user()->role != 1)
                                            <small class="text-danger">You are not allowed to change your role.</small>
                                            <input type="hidden" name="role" value="{{ auth()->user()->role }}">
                                        @endif -->
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary ml-2">Update Profile</button>

                            </div>
                            </form>
                        
                        </div>
                  

                    
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Update Password</p>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="{{ route('chief.password.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                    <hr class="horizontal dark">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Password Settings</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Old Password</label>
                                <input class="form-control" type="password" name="old-password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">New Password</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Confirm Password</label>
                                <input class="form-control" type="password" name="confirm-password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Update Password</button>

                </form>
            </div>
        </div>
    </div>
    
@endsection
