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
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                    New Permission
                </button>
            </a>
        </div>
    </div>

    <table class="data-table" id="permissionsTable">
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
                                <svg viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                            </a>
                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this permission?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="act-btn delete" title="Delete Permission">
                                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="empty-state">No permissions found.</div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table-footer">
        <div class="showing-text">{{ $permissions->firstItem() ?? 0 }}-{{ $permissions->lastItem() ?? 0 }} of {{ $permissions->total() }} records</div>
        <div>{{ $permissions->links() }}</div>
    </div>
</div>
@endsection
