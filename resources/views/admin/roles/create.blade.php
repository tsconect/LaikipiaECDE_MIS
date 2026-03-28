@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>CREATE</span> ROLE</div>
    </div>

    <div class="section-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif

        <form class="modern-form-shell" method="POST" action="{{ route('admin.roles.store') }}" id="form">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    value="{{ old('name') }}"
                    type="text"
                    class="form-control"
                    name="name"
                    placeholder="Name"
                    required
                >
            </div>

            <label for="permissions" class="form-label">Assign Permissions</label>
            <table class="data-table" id="rolePermissionsTable">
                <thead>
                    <tr>
                        <th width="1%"><input type="checkbox" name="all_permission"></th>
                        <th width="20%">NAME</th>
                        <th width="1%">GUARD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input
                                    type="checkbox"
                                    name="permission[{{ $permission->name }}]"
                                    value="{{ $permission->name }}"
                                    class="permission"
                                >
                            </td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('[name="all_permission"]').on('click', function() {
        $('.permission').prop('checked', $(this).is(':checked'));
    });
});
</script>
@endsection
