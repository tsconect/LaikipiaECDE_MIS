@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>USER</span> ROLES</div>
            <div class="banner-actions">
                <a href="{{ route('admin.roles.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Role
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="rolesTable">
            <thead>
                <tr>
                    <th>S/N <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ROLE NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>PERMISSIONS COUNT <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>CREATED DATE <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTIONS</th>
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
                        <div class="action-btns">
                            <a class="act-btn view" title="View Role" href="{{ route('admin.roles.show', $item->id) }}">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a class="act-btn edit" title="Edit Role" href="{{ route('admin.roles.edit', $item->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

</div>

    
@endsection