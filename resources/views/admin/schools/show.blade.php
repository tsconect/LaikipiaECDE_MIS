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
         
            <div>
                <div style="font-weight:600;font-size:16px;">
                    {{ $school->school_name ?? '' }} 
                </div>
                <div class="text-muted" style="font-size:13px;">
                    <i class="bi bi-envelope"></i> {{ $school->center_code ?? '' }}
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
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Learners">
                <i class="bi bi-people"></i> Learners
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#teachers">
                <i class="bi bi-people"></i> Teachers
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#attendance">
                <i class="bi bi-people"></i> Attendance Sheet
            </button>
        </li>
         <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#absenteeism">
                <i class="bi bi-people"></i> Absenteeism  Sheet
            </button>
        </li>

          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#absenteeism">
                <i class="bi bi-people"></i> Classrooms
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
                            <div class="label">School Name</div>
                            <div class="value">{{ $school->school_name }}</div>
                        </div>
                         <div class="col-md-4">
                            <div class="label">Teacher In Charge</div>
                            <div class="value">{{ $school->teacher ? $school->teacher->user->first_name . ' ' . $school->teacher->user->last_name : '-' }}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="label">County</div>
                            <div class="value">{{ $school->ward->subCounty->county->name??'-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Sub County</div>
                            <div class="value">{{ $school->ward->subCounty->name??'-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Ward</div>
                            <div class="value">{{ $school->ward->name??'-' }}</div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="label">Feeder School</div>
                            <div class="value">{{ ucfirst($school->feeder_id) }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="label">Remarks</div>
                            <div class="value">{{ $school->remarks }}</div>
                        </div>
                        
                                

                      

                    </div>
                </div>

            </div>
        </div>

        <!-- NEXT OF KIN -->
        <div class="tab-pane fade" id="Learners">
            <table   class="table dt-basic2 table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Full Names</th>
                            <th>NEMIS No</th>

                            <th>Gender</th>
                            <th>School Posted</th>
                           <th>Age</th>  
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($learners as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->first_name . ' '. $item->middle_name . ' '. $item->last_name}}  </td>
                            <td>{{$item->nemis_number}}</td>
                            <td>{{$item->gender}}</td>
                            <td>
                                {{$item->school->school_name??'-'}}
                            </td>
                            <td>
                                @if($item->dob)
                                {{\Carbon\Carbon::parse($item->dob)->age}}
                                @endif
                            </td>


                            <td>
                                <a class="btn btn-outline-primary" title="View Student"
                                href="{{ route('admin.learners.show', $item->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                        </td>
                        </tr>
                        @endforeach

                        </tfoot>
                </table>
        </div>

         <!-- NEXT OF KIN -->
        <div class="tab-pane fade" id="teachers">
           <table  class="table table-hover dt-basic2 table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>ID Number</th>
                                <th>Age</th>
                         
                                <th>Gender</th>
                           
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->first_name . ' ' . $item->user->middle_name . ' ' . $item->user->last_name }}
                                    </td>
                                    <td>{{ $item->user->email }}</td>
                                    <td>{{ $item->user->phone_number }}</td>
                                    <td>{{ $item->id_number }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->dob)->age }} years</td>
                                 
                                    <td>{{ ucfirst($item->gender) }}</td>
                                   
                                    <td class="d-flex">
                                        <a class="btn btn-outline-primary mr-2 " title="View teacher's metadata"
                                            href="{{ route('admin.teachers.show', $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                   

                                    </td>
                                </tr>
                            @endforeach

                           
                    </table>
        </div>

        {{--attendance sheet  --}}
        <div class="tab-pane fade" id="attendance">
            <table   class="table dt-basic2 table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Student</th>
                            <th>Date</th>

                            <th>Marked By</th>
                            <th>Status</th>
                            <th>Abseentism Reason</th>
                          
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->learner->first_name . ' '. $item->learner->middle_name . ' '. $item->learner->last_name}}  </td>
                            <td>{{$item->date}}</td>
                            <td>{{ $item->teacher->first_name ?? '-' }} {{ $item->teacher->middle_name ?? '-' }} {{ $item->teacher->last_name ?? '-' }}</td>
                            <td>
                                {{ ucfirst($item->status) ?? '-' }} 
                            </td>
                            <td>
                                {{ $item->reason ?? '-' }}
                            </td>
                          


                            <td>
                                <a class="btn btn-outline-primary" title="View Student"
                                href="{{ route('admin.learners.show', $item->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-outline-primary" title="Edit Teacher"
                                    href="{{ route('admin.learners.edit', $item->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.learners.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" title="Delete Student">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                                
                            </td>
                        </tr>
                        @endforeach

                        </tfoot>
                </table>

        </div>

        {{--attendance sheet  --}}
        <div class="tab-pane fade" id="absenteeism">
            <table   class="table dt-basic2 table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Student</th>
                            <th>Date</th>

                            <th>Marked By</th>
                            <th>Status</th>
                            <th>Abseentism Reason</th>
                          
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absents as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->learner->first_name . ' '. $item->learner->middle_name . ' '. $item->learner->last_name}}  </td>
                            <td>{{$item->date}}</td>
                            <td>{{ $item->teacher->first_name ?? '-' }} {{ $item->teacher->middle_name ?? '-' }} {{ $item->teacher->last_name ?? '-' }}</td>
                            <td>
                                {{ ucfirst($item->status) ?? '-' }} 
                            </td>
                            <td>
                                {{ $item->reason ?? '-' }}
                            </td>
                          


                            <td>
                                <a class="btn btn-outline-primary" title="View Student"
                                href="{{ route('admin.learners.show', $item->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-outline-primary" title="Edit Teacher"
                                    href="{{ route('admin.learners.edit', $item->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.learners.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" title="Delete Student">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                                
                            </td>
                        </tr>
                        @endforeach

                        </tfoot>
                </table>

        </div>


       
      

    </div>
</div> 
@endsection
