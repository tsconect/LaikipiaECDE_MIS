@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
.small-text {
    font-size: 13px;
    color: #6c757d;
}

.label {
    font-weight: 700;
    font-size: 15px;
}

.value {
    font-size: 14px;
}

.profile-card {
    border-radius: 12px;
    border: none;
}

.nav-tabs .nav-link {
    font-size: 13px;
    font-weight: 500;
}

.nav-tabs .nav-link i {
    margin-right: 5px;
}

.table {
    font-size: 13px;
}

.profile-img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #eee;
}
</style>

<div class="card mb-3 shadow-sm border-0" style="border-radius:12px;">
    <div class="card-body d-flex align-items-center justify-content-between flex-wrap">

        <!-- LEFT: PROFILE -->
        <div class="d-flex align-items-center">
            <img src="{{ asset('/assets/images/teacher.png') }}"
                 style="width:60px;height:60px;border-radius:50%;object-fit:cover;margin-right:15px;">

            <div>
                <div style="font-weight:600;font-size:16px;">
                    {{ $teacher->user->first_name ?? '' }} {{ $teacher->user->middle_name ?? '' }} {{ $teacher->user->last_name ?? 'Teacher Name' }}
                </div>
                <div class="text-muted" style="font-size:13px;">
                    <i class="bi bi-envelope"></i> {{ $teacher->user->email }}
                </div>
            </div>
        </div>

        <!-- RIGHT: DETAILS AND ACTIONS -->
        <div class="d-flex flex-wrap gap-4 mt-3 mt-md-0 align-items-center">

            <div>
                <div class="text-muted" style="font-size:12px;">Phone</div>
                <div style="font-size:14px;">
                    <i class="bi bi-telephone"></i> {{ $teacher->user->phone_number  }}
                </div>
            </div>

            <div>
                <div class="text-muted" style="font-size:12px;">ID Number</div>
                <div style="font-size:14px;">
                    <i class="bi bi-credit-card"></i> {{ $teacher->user->id_number }}
                </div>
            </div>

            <div class="ms-auto">
                <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil"></i> Edit Teacher
                </a>
                <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

        </div>

    </div>
</div>

<div class="card profile-card p-3">
    

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3" id="userTabs">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile">
                <i class="bi bi-person"></i> Profile
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nextofkin">
                <i class="bi bi-people"></i> Next of Kin
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#beneficiaries">
                <i class="bi bi-person-hearts"></i> Beneficiaries
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#unions">
                <i class="bi bi-diagram-3"></i> Unions
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#academic">
                <i class="bi bi-mortarboard"></i> Academics
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#documents">
                <i class="bi bi-folder"></i> Documents
            </button>
        </li>
    </ul>

    <div class="tab-content">

        <!-- PROFILE TAB -->
        <div class="tab-pane fade show active" id="profile">
            <div class="row">

               

                <div class="col-md-12">
                    <div class="row g-3">

                        <div class="col-md-4">
                            <div class="label">ID Number</div>
                            <div class="value">{{ $teacher->id_number }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">KRA PIN</div>
                            <div class="value">{{ $teacher->kra_pin }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">Gender</div>
                            <div class="value">{{ $teacher->gender }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">DOB</div>
                            <div class="value">{{ $teacher->dob }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">TSC Number</div>
                            <div class="value">{{ $teacher->tsc_number??'-' }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">School</div>
                            <div class="value">{{ $teacher->ecdeSchool->school_name??'-' }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">IPPD</div>
                            <div class="value">{{ $teacher->ippd_number??'-' }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">First Appointment</div>
                            <div class="value">{{ $teacher->date_of_first_appointment }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">Terms</div>
                            <div class="value">{{ $teacher->terms_of_engagement??'-' }}

                                @if($teacher->terms_of_engagement == 'Contract')
                                - Expires on {{$teacher->contract_expiry}}
                                @endif


                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">PWD Status</div>
                            <div class="value">{{ $teacher->pwd_status??'-' }}</div>
                        </div>

                        {{-- <div class="col-md-4">
                            <div class="label">Disability</div>
                            <div class="value">{{ $teacher->disability_type??'-' }}</div>
                        </div> --}}

                        <div class="col-md-4">
                            <div class="label">PWD Number</div>
                            <div class="value">{{ $teacher->pwd_number??'-' }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">Ethnicity</div>
                            <div class="value">{{ $teacher->ethnicGroup->name??'-' }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">Job Group</div>
                            <div class="value">{{ $teacher->jobGroup->name??'-' }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">County</div>
                            <div class="value">{{ $teacher->county->name??'-' }}</div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- NEXT OF KIN -->
        <div class="tab-pane fade" id="nextofkin">
            <table  class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S/N </th>
                        <th>Name </th>
                        <th>Relationship</th>
                        <th>Gender</th>
                        <th>ID Number</th>
                        <th>Phone Number</th>
                        
            
                        
              

                    </tr>
                </thead>
                <tbody>
                    @foreach ($next_of_kins as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->relationship }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->id_number }}</td>
                            <td>{{ $item->phone_number }}</td>
                            
                            
                        </tr>
                    @endforeach

                    </tfoot>
            </table>
        </div>

        <!-- BENEFICIARIES -->
        <div class="tab-pane fade" id="beneficiaries">
           <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S/N </th>
                        <th>Name </th>
                        <th>Relationship</th>
                        <th>Gender</th>
                        <th>ID Number</th>
                        <th>Phone Number</th>
                        
            
                        
                    
                      

                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiaries as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->relationship }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->id_number }}</td>
                            <td>{{ $item->phone_number }}</td>
                            
                            
                            
                        </tr>
                    @endforeach

                    </tfoot>
            </table>
        </div>

        <!-- UNIONS -->
        <div class="tab-pane fade" id="unions">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Membership</th>
                 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unions as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->union->name }}</td>
                        <td>{{ $item->membership_number }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ACADEMICS -->
        <div class="tab-pane fade" id="academic">
           <table id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N </th>
                                <th>Created On </th>
                                <th>Institution</th>
                                <th>Award</th>
                                <th>Grade</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Cert No</th>
                            
                                
                           
                               

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($academic_histories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->institution_name }}</td>

                                    <td>{{ $item->award }}</td>
                                    <td>{{ $item->grade }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>{{ $item->certificate_no }}</td>


                                </tr>
                            @endforeach

                            </tfoot>
                    </table>
        </div>

        <!-- DOCUMENTS -->
        <div class="tab-pane fade" id="documents">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>File</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->document->name }}</td>
                        <td>
                            @if ($item->file)
                                <a href="{{ asset('storage/'.$item->file) }}" target="_blank">
                                    <i class="fa fa-download"></i>
                                </a>
                            @else
                                N/A
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div> 
@endsection
