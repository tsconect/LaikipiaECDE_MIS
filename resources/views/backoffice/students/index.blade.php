@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')
@endsection

@section('content')
<div class="btn-secondary p-2">
    <h5>Registered Students</h5>
</div>
<div class="card">
<div class="card-body">

            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>School</th>
                                <th>Status</th>
                                <th>Location</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                       
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user->first_name}} {{$item->user->last_name}}</td>
                                    <td>{{$item->user->phone_number}}</td>
                                    <td> {{$item->school->school_name ?? 'Blank'}}</td>
                                    <td>
                                        @if($item->profile_status == 'approved')
                                         <span class="badge badge-success">Approved</span>
                                        @elseif($item->profile_status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                        @else
                                        <span class="badge badge-danger">Incomplete Registration</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$item->student_location->name ?? '0'}}

                                    </td>
                                    <td>
                                      
                                        @if($item->profile_status == 'approved')
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('admin.student.view', ['id' => $item->id]) }}"><i class="fa fa-eye mr-1"></i>View Student
                                        @else
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('admin.student.approve', ['id' => $item->id]) }}"><i class="fa fa-eye mr-1"></i>Approve Student   
                                        
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach

                            </tfoot>
                    </table>
                </div>
            </div>
        </div>

</div>




@endsection
