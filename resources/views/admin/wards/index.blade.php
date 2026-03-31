@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>WARDS</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.wards.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Ward
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="wardsTable">
            <thead>
                <tr>
                    <th>S/N <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wards as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Ward" href="{{ route('admin.wards.show', $item->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit Ward" href="{{ route('admin.wards.edit', $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.wards.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this ward?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete Ward">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</div>

    
@endsection