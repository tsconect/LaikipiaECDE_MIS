@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>ECDE <small>STUDENTS</small></h5>
        </div>
<div class="card ">



    <div class="card-body">


        <h5 class="card-title text-right"> <a href="{{route('admin.ecde-students.create')}}"><button class="btn btn-danger ">
                    <i class="fa fa-plus"></i> New ECDE STUDENTS</button></a> </h5>
        <div class=" card-body">
            <div class="table-responsive">
                <table  id="dt-basic2" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Full Names</th>
                            <th>Reg No</th>

                            <th>Gender</th>
                            <th>School Posted</th>
                           <th>Age</th>  
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->first_name . ' '. $item->middle_name . ' '. $item->last_name}}  </td>
                            <td>{{$item->reg_number}}</td>
                            <td>{{$item->gender}}</td>
                            <td>
                                {{$item->school->school_name??'-'}}
                            </td>
                            <td>
                                {{$item->dob}}
                            </td>


                            <td>
                                <a class="btn btn-outline-primary" title="View teacher's metadata"
                                href="">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-outline-primary" title="Edit Teacher"
                                    href="{{ route('admin.ecde-students.edit', $item->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                
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
