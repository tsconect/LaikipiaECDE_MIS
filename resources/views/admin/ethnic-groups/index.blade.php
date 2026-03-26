@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>ETHNIC GROUPS</h5>
        </div>
    <div class="card ">
      
        <div class="card-body">
            <h5 class="card-title text-right">
                <a href="{{ route('admin.ethnic-groups.create') }}"><button class="btn btn-danger ">
                        <i class="fa fa-plus"></i> New Group</button></a>
            </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N </th>
                       
                                <th>Name</th>
                                <th>Members</th>
                                <th></th>
                   
                                
                           
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ethinic_groups as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                   
                                    <td>{{ $item->name }}
                                    </td>
                                    <td>0</td>
                                    <td></td>
                                    
                                    <td>
                                        <a class="btn btn-outline-primary" title="View ethnic group"
                                            href="{{ route('admin.ethnic-groups.show', $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-outline-primary" title="Edit Ethnic Group"
                                            href="{{ route('admin.ethnic-groups.edit', $item->id) }}">
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
