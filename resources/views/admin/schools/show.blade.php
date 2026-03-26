@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>{{ $school->school_name }} - School Details</h4>
            <a href="{{ route('admin.ecde-schools.edit', $school->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit School
            </a>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ route('admin.ecde-schools.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to Schools
                </a>
            </div>
        </div>

        <div class="card p-4">
            <h5 class="card-title mb-4">School Information</h5>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">School Name</label>
                        <p class="form-control-plaintext">{{ $school->school_name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Number of Classes</label>
                        <p class="form-control-plaintext">{{ $school->number_of_classes }}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Number of Students</label>
                        <p class="form-control-plaintext">{{ $school->number_of_students }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Class Rooms Status</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-info">{{ ucfirst(str_replace('_', ' ', $school->class_rooms_status)) }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">School Location</label>
                        <p class="form-control-plaintext">{{ $school->school_location }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Teacher in Charge</label>
                        <p class="form-control-plaintext">
                            @if($school->teacher_id)
                                @php
                                    $teacher = \App\Models\Teacher::find($school->teacher_id);
                                @endphp
                                {{ $teacher ? $teacher->user->first_name . ' ' . $teacher->user->last_name : 'N/A' }}
                            @else
                                <em>Not assigned</em>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">County</label>
                        <p class="form-control-plaintext">
                            @php
                                $county = \App\Models\County::where('county_id', $school->county_id)->first();
                            @endphp
                            {{ $county ? $county->name : 'N/A' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sub-County</label>
                        <p class="form-control-plaintext">
                            @php
                                $subcounty = \App\Models\Constituency::where('constituency_id', $school->subcounty_id)->first();
                            @endphp
                            {{ $subcounty ? $subcounty->name : 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ward</label>
                        <p class="form-control-plaintext">
                            @php
                                $ward = \App\Models\Ward::find($school->ward_id);
                            @endphp
                            {{ $ward ? $ward->name : 'N/A' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Feeder School</label>
                        <p class="form-control-plaintext">
                            @if($school->feeder_id)
                                @php
                                    $feeder = \App\Models\FeederSchools::find($school->feeder_id);
                                @endphp
                                {{ $feeder ? $feeder->school_name : 'N/A' }}
                            @else
                                <em>Not assigned</em>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Remarks</label>
                        <p class="form-control-plaintext">{{ $school->remarks ?? 'No remarks' }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h5 class="card-title mb-4 mt-4">School Contact Information</h5>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contact First Name</label>
                        <p class="form-control-plaintext">{{ $school->school_contact_first_name ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contact Middle Name</label>
                        <p class="form-control-plaintext">{{ $school->school_contact_middle_name ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contact Last Name</label>
                        <p class="form-control-plaintext">{{ $school->school_contact_last_name ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Designation</label>
                        <p class="form-control-plaintext">{{ ucfirst(str_replace('_', ' ', $school->school_contact_designation)) ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">TSC Number</label>
                        <p class="form-control-plaintext">{{ $school->school_contact_tsc_number ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">ID Number</label>
                        <p class="form-control-plaintext">{{ $school->school_contact_id_number ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Phone Number</label>
                        <p class="form-control-plaintext">{{ $school->school_contact_phone_number ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gender</label>
                        <p class="form-control-plaintext">{{ ucfirst($school->school_contact_gender) ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <a href="{{ route('admin.ecde-schools.edit', $school->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit School
                    </a>
                    <a href="{{ route('admin.ecde-schools.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Schools
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
