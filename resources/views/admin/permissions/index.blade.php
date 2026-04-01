@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>SYSTEM</span> PERMISSIONS</div>
        <div class="banner-actions">
            <a href="{{ route('admin.permissions.create') }}">
                <button class="btn-new" type="button">
                    <i class="bi bi-plus-lg"></i>
                    New Permission
                </button>
            </a>
        </div>
    </div>

    <table class="data-table dt-admin" id="permissionsTable">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>GUARD</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permissions as $permission)
                <tr>
                    <td class="td-id">{{ ++$i }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>
                        <div class="action-btns">
                            <a class="act-btn edit" title="Edit Permission" href="{{ route('admin.permissions.edit', $permission->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this permission?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="act-btn delete" title="Delete Permission">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>—</td>
                    <td class="text-muted">No permissions found.</td>
                    <td>—</td>
                    <td>—</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection