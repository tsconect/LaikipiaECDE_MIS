@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="card-body">
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')


        <!-- ================= PERSONAL INFORMATION ================= -->

        <div class="card p-2 shadow-sm mb-4">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">   MY ACCOUNT DETAILS</h5>
            </div>

            <div class="card-body">

               <div class="row g-4">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    
                    <div class="col-md-6 mb-3">
                        <label for="first_name">First Name</label>

                        <input 
                            type="text"
                            name="first_name"
                            id="first_name"
                            class="form-control"
                            placeholder="John"
                            value="{{ $user->first_name }}"
                        >

                        @error('first_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="middle_name">Middle Name</label>

                        <input
                            type="text"
                            name="middle_name"
                            id="middle_name"
                            class="form-control"
                            placeholder="Doe"
                            value="{{ $user->middle_name }}"
                        >

                        @error('middle_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="last_name">Last Name</label>

                        <input
                            type="text"
                            name="last_name"
                            id="last_name"
                            class="form-control"
                            placeholder="Watt"
                            value="{{  $user->last_name }}"
                        >

                        @error('last_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                  

                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            placeholder="example@xyz.com"
                            value="{{  $user->email }}"
                        >

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="phone">Phone Number</label>

                        <input
                            type="text"
                            name="phone_number"
                            id="phone"
                            class="form-control"
                            placeholder="07********"
                            value="{{  $user->phone_number }}"
                        >

                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- id number --}}

                    <div class="col-md-6 mb-3">
                        <label for="id_number">ID Number</label>

                        <input
                            type="number"
                            name="id_number"
                            id="id_number"
                            class="form-control"
                            placeholder="33603456"
                            value="{{  $user->id_number }}"
                        >

                        @error('id_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div  class="col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" 
                            name="role" disabled>
                            <option value="">Select role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" @if($user->role == $role->name) selected @endif
                                   >{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                        @endif
                    </div>


                   

                       

                    </div>

                </div>
                <div class="text-right">
                    <button class="btn btn-success" type="submit">
                        Update
                    </button>
                </div>

            </div>

        </div>

    </form>

</div>
</div>
{{-- update password --}}

<div class="col-md-12">
    <form method="POST" action="{{ route('admin.users.update-password', $user->id) }}">
        @csrf
        
        <div class="card p-2 shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Change Password</h5>
            </div>
            <div class="card-body">
             

                <div class="form-row">
                    {{-- current password --}}

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="current_password" class="">Current Password</label>
                            <input name="current_password" id="current_password" placeholder="Enter Current Password" required type="password"
                                class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="password" class="">New Password</label>
                            <input name="password" id="password" placeholder="Enter Password" required type="password"
                                class="form-control">
                        </div>
                    </div>

                    {{-- confirm password --}}

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="password_confirmation" class="">Confirm Password</label>
                            <input name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required type="password"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-success" type="submit">
                        Update Password
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
      
@endsection
