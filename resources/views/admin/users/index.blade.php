@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>SYSTEM USERS</h5>
        </div>
    <div class="card ">
      
        <div class="card-body">
            <h5 class="card-title text-right"> 
                <a href="{{ route('admin.users.create') }}"><button class="btn btn-danger ">
                        <i class="fa fa-plus"></i> New User</button></a>
            </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                             
                           
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name }}
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->role }}</td>
                                    
                                   
                                    <td>
                                        <a class="btn btn-outline-primary" title="View teacher's metadata"
                                            href="{{ route('admin.users.show', $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-outline-primary" title="Edit Teacher"
                                            href="{{ route('admin.users.edit', $item->id) }}">
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
