@extends('backoffice.layouts.app')


@section('nav-bar')
@include('chief.sidebar')
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
                                <th>Location</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            @if($item->location_id  == Auth::user()->chief->location_id)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user->first_name}} {{$item->user->last_name}}</td>
                                    <td>{{$item->user->phone_number}}</td>
                                    <td>Simotwo</td>
                                    <td>Location</td>
                                    <td>

                                        @if($item->profile_status == 'approved')
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('chief.student.view', ['id' => $item->id]) }}"><i class="fa fa-eye mr-1"></i>View Student
                                        @else
                                        <a class="btn btn-outline-primary"
                                            href="#"></i>Not Approved 
                                        
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            @endforeach

                            </tfoot>
                    </table>
                </div>
            </div>
        </div>

</div>




@endsection
