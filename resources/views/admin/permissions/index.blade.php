@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')
<div class="card-header btn-success">
    <h5>PERMISSIONS</h5>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title text-right">
            <a href="{{ route('admin.permissions.create') }}">
                <button class="btn btn-danger"><i class="fa fa-plus"></i> New Permission</button>
            </a>
        </h5>

        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="80">S/N</th>
                        <th>Name</th>
                        <th>Guard</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ route('admin.permissions.edit', $permission->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Delete this permission?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
</div></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No permissions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $permissions->links() !!}
        </div>
    </div>
</div>
@endsection
