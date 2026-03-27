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
            <img src="{{ asset('storage/' . $learner->passport_photo) }}"
                 style="width:60px;height:60px;border-radius:50%;object-fit:cover;margin-right:15px;">

            <div>
                <div style="font-weight:600;font-size:16px;">
                    {{ $learner->first_name ?? '' }} {{ $learner->middle_name ?? '' }} {{ $learner->last_name ?? 'Teacher Name' }}
                </div>
                <div class="text-muted" style="font-size:13px;">
                    <i class="bi bi-envelope"></i> {{ $learner->nemis_number ?? '' }}
                </div>
            </div>
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
                <i class="bi bi-people"></i> Parent/Guardian Details
            </button>
        </li>
       
    </ul>

    <div class="tab-content">

        <!-- PROFILE TAB -->
        <div class="tab-pane fade show active" id="profile">
            <div class="row">

               

                <div class="col-md-12">
                    <div class="row g-3">
                        
                    <!-- RIGHT: DETAILS AND ACTIONS -->
                        <div class="col-md-4">
                            <div class="label">First Name</div>
                            <div class="value">{{ $learner->first_name }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Middle Name</div>
                            <div class="value">{{ $learner->middle_name ?? '' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Last Name</div>
                            <div class="value">{{ $learner->last_name }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">PWD Status</div>
                            <div class="value">{{ $learner->pwd_status === 'yes' ? 'Yes' : 'No' }}</div>
                        </div>
                        @if ($learner->pwd_status === 'yes')
                        <div class="col-md-4">
                            <div class="label">Disability Type</div>
                            <div class="value">{{ $learner->disability_type }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Impairment Details</div>
                            <div class="value">{{ $learner->impairment_details }}</div>
                        </div>
                        @endif
                        <div class="col-md-4">
                            <div class="label">Gender</div>
                            <div class="value">{{ ucfirst($learner->gender) }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Date of Birth</div>
                            <div class="value">{{ $learner->dob }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">NEMIS Number</div>
                            <div class="value">{{ $learner->nemis_number }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Ward ID</div>
                            <div class="value">{{$learner->ward->name ?? '' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Sub Location ID</div>
                            <div class="value">{{$learner->subLocation->name ?? '' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Village</div>
                            <div class="value">{{$learner->village }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">School ID</div>
                            <div class="value">{{$learner->school->school_name }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Nationality ID</div>
                            <div class="value">{{$learner->nationality->name??'-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Passport Photo</div>
                            <div class="value">
                                @if ($learner->passport_photo)
                                    <a href="{{ asset('storage/' . $learner->passport_photo) }}" target="_blank">View Passport Photo</a>
                                @else
                                    <p>No passport photo available</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Admission Number</div>
                            <div class="value">{{$learner->admission_number }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Date of Admission</div>
                            <div class="value">{{ ucfirst($learner->date_of_admission) }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Class</div>
                            <div class="value">{{$learner->class }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Mode of Admission</div>
                            <div class="value">{{ ucfirst($learner->mode_of_admission) }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Birth Certificate Number</div>
                            <div class="value">{{$learner->birth_certificate_number }}</div>
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
                        
                        <th>ID Number</th>
                        <th>Phone Number</th>
                        <th>Village</th>
                        
            
                        
              

                    </tr>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>{{$learner->parent->first_name??'-' }} {{$learner->parent->middle_name??'-' }} {{$learner->parent->last_name??'-' }}</td>
                    <td>{{$learner->parent->relationship??'-' }}</td>

                    <td>{{$learner->parent->id_number??'-' }}</td>
                    <td>{{$learner->parent->phone_number??'-' }}</td>
                    <td>{{$learner->parent->village??'-' }}</td>
                    

                </tfoot>
            </table>
        </div>

       
      

    </div>
</div> 
@endsection
