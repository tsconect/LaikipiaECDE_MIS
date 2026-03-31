@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>SUB LOCATIONS</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.sub-locations.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Sublocation
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="sublocationsTable">
            <thead>
                <tr>
                    <th>ID <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sublocations as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Sublocation" href="{{ route('admin.sub-locations.show', $item->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit Sublocation" href="{{ route('admin.sub-locations.edit', $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.sub-locations.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this sublocation?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete Sublocation">
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