@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="card">
    <div class="card-header btn-success">
        <h5>Edit Coordinator</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.coordinators.update', $coordinator->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $coordinator->user->first_name ?? '' }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Middle Name</label>
                    <input type="text" name="middle_name" class="form-control" value="{{ $coordinator->user->middle_name ?? '' }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $coordinator->user->last_name ?? '' }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $coordinator->user->email ?? '' }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $coordinator->user->phone_number ?? '' }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label>ID Number</label>
                    <input type="text" name="id_number" class="form-control" value="{{ $coordinator->id_number ?? '' }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>KRA PIN</label>
                    <input type="text" name="kra_pin" class="form-control" value="{{ $coordinator->kra_pin ?? '' }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="male" {{ ($coordinator->gender ?? '') === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ ($coordinator->gender ?? '') === 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control" value="{{ $coordinator->dob ?? '' }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>PWD Status</label>
                    <select name="pwd_status" class="form-control" required>
                        <option value="no" {{ ($coordinator->pwd_status ?? '') === 'no' ? 'selected' : '' }}>No</option>
                        <option value="yes" {{ ($coordinator->pwd_status ?? '') === 'yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Disability Type</label>
                    <input type="text" name="disability_type" class="form-control" value="{{ $coordinator->disability_type ?? '' }}">
                </div>
                <div class="form-group col-md-4">
                    <label>PWD Number</label>
                    <input type="text" name="pwd_number" class="form-control" value="{{ $coordinator->pwd_number ?? '' }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Ethnicity</label>
                    <input type="number" name="ethnicity_id" class="form-control" value="{{ $coordinator->ethnicity_id ?? '' }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label>County</label>
                    <select name="county_id" class="form-control" required>
                        @foreach($counties as $county)
                            <option value="{{ $county->id }}" {{ (int)($coordinator->county_id ?? 0) === (int)$county->id ? 'selected' : '' }}>{{ $county->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Sub-County</label>
                    <select name="subcounty_id" class="form-control" required>
                        @foreach($sub_counties as $subCounty)
                            <option value="{{ $subCounty->id }}" {{ (int)($coordinator->subcounty_id ?? 0) === (int)$subCounty->id ? 'selected' : '' }}>{{ $subCounty->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Ward</label>
                    <select name="ward_id" class="form-control" required>
                        @foreach($wards as $ward)
                            <option value="{{ $ward->id }}" {{ (int)($coordinator->ward_id ?? 0) === (int)$ward->id ? 'selected' : '' }}>{{ $ward->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>School</label>
                    <select name="school_id" class="form-control">
                        <option value="">Select School</option>
                        @foreach($ecde_schools as $school)
                            <option value="{{ $school->id }}" {{ (int)($coordinator->school_id ?? 0) === (int)$school->id ? 'selected' : '' }}>{{ $school->school_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Impairment Details</label>
                    <input type="text" name="impairment_details" class="form-control" value="{{ $coordinator->impairment_details ?? '' }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Coordinator</button>
            <a href="{{ route('admin.coordinators.index') }}" class="btn btn-light">Back</a>
        </form>
    </div>
</div>
@endsection
