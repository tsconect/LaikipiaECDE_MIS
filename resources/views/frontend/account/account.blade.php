@extends('frontend.app')
@section('content')

<section class="experience_section layout_padding-top layout_padding2-bottom"  style="background-color: #f5f5f5;">
    
    
    <section class="contact spad mb-4 p-4"  style="background-color: #f5f5f5;">
        <div class="container">
            <div class="row pl-4 align-items-start"> <!-- Remove 'align-items-center' class -->
                <div class="col-md-3 dashboard-menu">
                    <div class="list-group text-center">
                        <a href="{{route ('student.dashboard')}}" class="list-group-item list-group-item-action mb-2">Dashboard</a>
                        <a href="{{ route('student.applications')}} " class="list-group-item list-group-item-action mb-2">My Applications</a>
                        <a href=" {{route('student.profile')}}" class="list-group-item list-group-item-action mb-2">Student Profile</a>
                        <a href=" {{route('student.account')}}" class="list-group-item list-group-item-action  active mb-2">Account Details</a>
                        <a href=" {{route('student.logout')}}" class="list-group-item list-group-item-action mb-2">Log Out</a>
                    </div>
                </div>
                <div class="col-md-9 pl-3">
                    <!-- <p><strong>Hello {{ Auth::user()->first_name ?? 'User'}},</strong>  <br>   </p> -->

                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <form role="form" method="POST" action="{{ route('student.profile.update') }}" enctype="multipart/form-data">
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

                                        <p class="text-uppercase text-sm">Locational Details</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">County</label>
                                                    <input class="form-control" type="text" name="firstname"  value="{{  auth()->user()->studentDetails->county?? NULL}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Sub County</label>
                                                    <input class="form-control" type="text" name="lastname" value="{{  auth()->user()->studentDetails->sub_county?? NULL}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Ward</label>
                                                    <input class="form-control" type="email" name="email" value="{{  auth()->user()->studentDetails->ward?? NULL}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Location</label>
                                                    <input class="form-control" type="text" name="phone" value="{{  auth()->user()->studentDetails->student_location->name?? NULL}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="horizontal dark">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Role</label>
                                                    <select class="form-control" name="role" @if(auth()->user()->role != 1) disabled @endif>
                                                        <option value="1" {{ auth()->user()->role == "student" ? 'selected' : '' }}>Student</option>
                                                    
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
                </div>
            </div>
        </div>
    </section>
           
</section>

@endsection