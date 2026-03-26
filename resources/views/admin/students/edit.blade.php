@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="card">
    <div class="card-header btn-success">
        <h5>Edit Student</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.ecde-students.update', $ecde_student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $ecde_student->first_name }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Middle Name</label>
                    <input type="text" name="middle_name" class="form-control" value="{{ $ecde_student->middle_name }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $ecde_student->last_name }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Reg Number</label>
                    <input type="text" name="reg_no" class="form-control" value="{{ $ecde_student->reg_number }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="male" {{ $ecde_student->gender === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $ecde_student->gender === 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control" value="{{ $ecde_student->dob }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>PWD Status</label>
                    <select name="pwd_status" class="form-control" required>
                        <option value="no" {{ ($ecde_student->pwd_status ?? '') === 'no' ? 'selected' : '' }}>No</option>
                        <option value="yes" {{ ($ecde_student->pwd_status ?? '') === 'yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Disability Type</label>
                    <input type="text" name="disability_type" class="form-control" value="{{ $ecde_student->disability_type }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Impairment Details</label>
                    <input type="text" name="impairment_details" class="form-control" value="{{ $ecde_student->impairment_details }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Student Type</label>
                    <input type="number" name="student_type_id" class="form-control" value="{{ $ecde_student->student_type_id }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Ward</label>
                    <select name="ward_id" class="form-control" required>
                        @foreach($wards as $ward)
                            <option value="{{ $ward->id }}" {{ (int)$ecde_student->ward_id === (int)$ward->id ? 'selected' : '' }}>{{ $ward->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Sub Location ID</label>
                    <input type="number" name="sub_location_id" class="form-control" value="{{ $ecde_student->sub_location_id }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Village</label>
                    <input type="text" name="village" class="form-control" value="{{ $ecde_student->village }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>School</label>
                    <select name="school_id" class="form-control" required>
                        @foreach($ecde_schools as $school)
                            <option value="{{ $school->id }}" {{ (int)$ecde_student->school_id === (int)$school->id ? 'selected' : '' }}>{{ $school->school_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
</div>
@endsection
