@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>USER ROLES</h5>
        </div>
    <div class="card ">
      
        <div class="card-body">
            <h5 class="card-title text-right"> 
                <a href="{{ route('admin.roles.create') }}"><button class="btn btn-danger ">
                        <i class="fa fa-plus"></i> New ROLE</button></a>
            </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                            <th width="50">S/N</th>
                            <th>Role Name</th>
                            <th>Permissions Count</th>
                            <th>Created Date</th>
                            <th width="150">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="fw-bold">{{ $item->name }}</span></td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $item->permissions->count() }} </span>
                            </td>
                            <td><small class="text-muted">{{ $item->created_at->format('d M Y') }}</small></td>
                             <td>
                                        <a class="btn btn-outline-primary" title="View teacher's metadata"
                                            href="{{ route('admin.roles.show', $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-outline-primary" title="Edit Teacher"
                                            href="{{ route('admin.roles.edit', $item->id) }}">
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
