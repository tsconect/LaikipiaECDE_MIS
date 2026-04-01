@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>ECDE</span> COORDINATORS</div>
            <div class="banner-actions">
                <a href="{{ route('admin.coordinators.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Coordinator
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="coordinatorsTable">
            <thead>
                <tr>
                    <th>ID <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>EMAIL <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>PHONE <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>SUB COUNTY <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coordinators as $item)
                    <tr>
                        <td class="td-id">{{ $item->id }}</td>
                        <td>{{ $item->user->first_name ?? '' }} {{ $item->user->middle_name ?? '' }} {{ $item->user->last_name ?? '' }}</td>
                        <td>{{ $item->user->email ?? '' }}</td>
                        <td>{{ $item->user->phone_number ?? '' }}</td>
                        <td>{{ $item->constituency->name ?? '—' }}</td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Coordinator" href="{{ route('admin.coordinators.show', $item->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit Coordinator" href="{{ route('admin.coordinators.edit', $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.coordinators.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this coordinator?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete">
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