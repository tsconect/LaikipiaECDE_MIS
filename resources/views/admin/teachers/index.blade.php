
@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>ECDE</span> TEACHERS</div>
            <div class="banner-actions">
                <a href="{{ route('admin.generate_staff_returns') }}">
                    <button class="btn-generate">
                        <i class="bi bi-circle"></i>
                        Generate {{ date('F, Y') }} Staff Returns
                    </button>
                </a>
                <a href="{{ route('admin.teachers.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Teacher
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>EMAIL <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>PHONE <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ID NUMBER <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>AGE <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>RETIREMENT DATE <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>GENDER <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="td-id">{{ $item->id }}</td>
                        <td>
                            <div class="name-cell">
                                <span class="name-text">{{ $item->user->first_name . ' ' . $item->user->middle_name . ' ' . $item->user->last_name }}</span>
                            </div>
                        </td>
                        <td class="td-email">{{ $item->user->email }}</td>
                        <td>{{ $item->user->phone_number }}</td>
                        <td>{{ $item->id_number }}</td>
                        <td><span class="age-badge">{{ \Carbon\Carbon::parse($item->dob)->age }} years</span></td>
                        <td class="td-dash">{{ $item->retirement_date ?? '-' }}</td>
                        <td><span class="gender-badge {{ strtolower($item->gender) }}">{{ ucfirst($item->gender) }}</span></td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View teacher's metadata" href="{{ route('admin.teachers.show', $item->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit Teacher" href="{{ route('admin.teachers.edit', $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.teachers.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this teacher?');">
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