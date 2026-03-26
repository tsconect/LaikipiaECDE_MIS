@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="card">
    <div class="card-header btn-success">
        <h5>learner Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>First Name:</strong>
                <div>{{ $learner->first_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Middle Name:</strong>
                <div>{{ $learner->middle_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Last Name:</strong>
                <div>{{ $learner->last_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Registration Number:</strong>
                <div>{{ $learner->reg_no ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Gender:</strong>
                <div>{{ $learner->gender ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Date of Birth:</strong>
                <div>{{ $learner->dob ? date('d/m/Y', strtotime($learner->dob)) : '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>PWD Status:</strong>
                <div>{{ $learner->pwd_status ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Disability Type:</strong>
                <div>{{ $learner->disability_type ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Impairment Details:</strong>
                <div>{{ $learner->impairment_details ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Student Type:</strong>
                <div>{{ $learner->studentType->name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>School:</strong>
                <div>{{ $learner->ecdeSchool->school_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Ward:</strong>
                <div>{{ $learner->ward->ward_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Sub-Location:</strong>
                <div>{{ $learner->subLocation->sub_location_name ?? '-' }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Village:</strong>
                <div>{{ $learner->village ?? '-' }}</div>
            </div>
        </div>

        <a href="{{ route('admin.learners.edit', $learner->id) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i> Edit learner
        </a>
    </div>
</div>
@endsection
