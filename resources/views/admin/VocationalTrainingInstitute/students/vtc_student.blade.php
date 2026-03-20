@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

@include('flash-message')

<div class="card container">



    <div class="card-body">
    <h5 class="">ECDE STUDENTS</h5>

    <h5 class="card-title text-right"> <a href="{{route('admin.students.create')}}"><button class="btn btn-warning ">
        <i class="fa fa-plus"></i> VTC STUDENTS</button></a> </h5>
        <div class=" card-body">
            <div class="table-responsive">
                <table  id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Full Names</th>
                            <th>Reg No</th>

                            <th>Gender</th>
                            {{-- <th>School Posted</th> --}}
                            <!-- <th>Age</th>  -->
                            <!-- <th>TSC Number</th>  -->
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->user->first_name . ' '. $item->user->middle_name . ' '. $item->user->last_name}}  </td>
                            <td>{{$item->identity_number}}</td>
                            <td>{{$item->gender}}</td>
                            <td>
                                <a class="btn btn-outline-primary" title="View teacher's metadata"
                                href="{{ route('admin.teacher-view', $item->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-outline-primary" title="Edit Teacher"
                                    href="{{ route('admin.teacher-edit-view', $item->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-outline-primary" title="Delete Teacher"
                                    href="{{ route('admin.teachers.delete', $item->id) }}">
                                    <i class="fa fa-trash"></i>
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
