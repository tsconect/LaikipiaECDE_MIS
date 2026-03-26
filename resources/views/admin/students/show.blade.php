@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="card">
    <div class="card-header btn-success">
        <h5>Student Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>First Name:</strong>
                <div>{{ $ecde_student->first_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Middle Name:</strong>
                <div>{{ $ecde_student->middle_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Last Name:</strong>
                <div>{{ $ecde_student->last_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Registration Number:</strong>
                <div>{{ $ecde_student->reg_no ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Gender:</strong>
                <div>{{ $ecde_student->gender ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Date of Birth:</strong>
                <div>{{ $ecde_student->dob ? date('d/m/Y', strtotime($ecde_student->dob)) : '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>PWD Status:</strong>
                <div>{{ $ecde_student->pwd_status ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Disability Type:</strong>
                <div>{{ $ecde_student->disability_type ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Impairment Details:</strong>
                <div>{{ $ecde_student->impairment_details ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Student Type:</strong>
                <div>{{ $ecde_student->studentType->name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>School:</strong>
                <div>{{ $ecde_student->ecdeSchool->school_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Ward:</strong>
                <div>{{ $ecde_student->ward->ward_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Sub-Location:</strong>
                <div>{{ $ecde_student->subLocation->sub_location_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Village:</strong>
                <div>{{ $ecde_student->village ?? '-' }}</div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.ecde-students.edit', $ecde_student->id) }}" class="btn btn-primary">
                <i class="fa fa-edit"></i> Edit Student
            </a>
        </div>
    </div>
</div>
@endsection
