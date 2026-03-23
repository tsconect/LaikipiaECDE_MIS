@extends('admin.app')
<<<<<<< HEAD
@section('nav-bar')
@include('admin.layouts.sidebar')
=======


@section('nav-bar')

@include('admin.layouts.sidebar')

>>>>>>> 9b52476737316583a322bc5e5b0e877cf91d8e7f
@endsection

@section('content')

<div class="card-body">
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
         <form method="POST" action="{{ route('admin.roles.update', $role->id) }}" class="form-horizontal" role="form" enctype="multipart/form-data" data-parsley-validate="" data-parsley-focus="first') }}" id="form">
              <div class="card p-2 shadow-sm mb-4">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Edit Role</h5>
            </div>
<div class="card-body">
      @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $role->name }}"
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>
                </div>
                
                <label for="permissions" class="form-label">Assign Permissions</label>

                <table class="table table-striped">
                    <thead>
                        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="1%">Guard</th> 
                    </thead>

                     @foreach($permissions as $permission)
                    <tr>
                        <td>
                            <input type="checkbox"
                                   name="permission[{{ $permission->name }}]"
                                   value="{{ $permission->name }}"
                                   class="permission"
                                   {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                        </td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                    </tr>
                @endforeach
                </table>

                <div class="mt-4 d-flex justify-content-end">
              

                    <button type="submit"  id="submitBtn"  class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Update Role
                    </button>
                </div>
            </form>
        </div>
     

    </div>
<script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }
                
            });
        });
    </script>

@endsection
