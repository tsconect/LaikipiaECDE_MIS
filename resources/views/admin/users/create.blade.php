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
    <form class="modern-form-shell" method="POST" action="{{ route('admin.users.store') }}">
        @csrf


        <!-- ================= PERSONAL INFORMATION ================= -->

        <div class="card shadow-sm mb-4">

            <div class="card-header btn-success">
                <h5 class="mb-0">Register New User</h5>
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
                            value="{{ old('first_name') }}"
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
                            value="{{ old('middle_name') }}"
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
                            value="{{ old('last_name') }}"
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
                            value="{{ old('email') }}"
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
                            value="{{ old('phone') }}"
                        >

                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
<div  class="col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" 
                            name="role" required>
                            <option value="">Select role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}"
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
                        Register
                    </button>
                </div>

            </div>

        </div>

    </form>

</div>
      
@endsection
