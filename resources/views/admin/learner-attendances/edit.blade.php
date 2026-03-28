@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="card">
    <div class="card-header btn-success">
        <h5>Edit learner</h5>
    </div>
    <div class="card-body">
        <form class="modern-form-shell" action="{{ route('admin.ecde-students.update', $learner->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $learner->first_name }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Middle Name</label>
                    <input type="text" name="middle_name" class="form-control" value="{{ $learner->middle_name }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $learner->last_name }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Reg Number</label>
                    <input type="text" name="reg_no" class="form-control" value="{{ $learner->reg_number }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="male" {{ $learner->gender === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $learner->gender === 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control" value="{{ $learner->dob }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>PWD Status</label>
                    <select name="pwd_status" class="form-control" required>
                        <option value="no" {{ ($learner->pwd_status ?? '') === 'no' ? 'selected' : '' }}>No</option>
                        <option value="yes" {{ ($learner->pwd_status ?? '') === 'yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Disability Type</label>
                    <input type="text" name="disability_type" class="form-control" value="{{ $learner->disability_type }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Impairment Details</label>
                    <input type="text" name="impairment_details" class="form-control" value="{{ $learner->impairment_details }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Student Type</label>
                    <input type="number" name="student_type_id" class="form-control" value="{{ $learner->student_type_id }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Ward</label>
                    <select name="ward_id" class="form-control" required>
                        @foreach($wards as $ward)
                            <option value="{{ $ward->id }}" {{ (int)$learner->ward_id === (int)$ward->id ? 'selected' : '' }}>{{ $ward->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Sub Location ID</label>
                    <input type="number" name="sub_location_id" class="form-control" value="{{ $learner->sub_location_id }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Village</label>
                    <input type="text" name="village" class="form-control" value="{{ $learner->village }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>School</label>
                    <select name="school_id" class="form-control" required>
                        @foreach($ecde_schools as $school)
                            <option value="{{ $school->id }}" {{ (int)$learner->school_id === (int)$school->id ? 'selected' : '' }}>{{ $school->school_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update learner</button>
            </div>
        </form>
    </div>
</div>
@endsection
