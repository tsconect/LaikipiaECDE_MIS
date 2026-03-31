@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')

    <div class="table-card">
        <div class="table-banner">
            <div class="table-banner-title"><span>LEARNERS</span> ATTENDANCE</div>
            <div class="banner-actions">
                <a href="{{ route('admin.learner-attendances.create') }}">
                    <button class="btn-new" type="button">
                        <i class="bi bi-plus-lg"></i>
                        Mark Register
                    </button>
                </a>
            </div>
        </div>

        <div class="table-toolbar">
            <div class="toolbar-left">
                <button class="toolbar-btn" onclick="copyTable()" type="button">
                    <i class="bi bi-clipboard"></i>
                    Copy
                </button>
                <button class="toolbar-btn" onclick="exportCSV()" type="button">
                    <i class="bi bi-filetype-csv"></i>
                    CSV
                </button>
                <button class="toolbar-btn" onclick="printTable()" type="button">
                    <i class="bi bi-printer"></i>
                    Print
                </button>
            </div>
            <div class="toolbar-right">
                <div class="search-wrap">
                    <i class="bi bi-search search-icon"></i>
                    <input class="search-input" type="text" placeholder="Search..." id="searchInput">
                </div>
            </div>
        </div>

        <table class="data-table dt-admin" id="learnerAttendanceTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>STUDENT</th>
                    <th>DATE</th>
                    <th>MARKED BY</th>
                    <th>STATUS</th>
                    <th>ABSENTISM REASON</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $item)
                    <tr>
                        <td class="td-id">{{ $item->id }}</td>
                        <td>{{ $item->learner->first_name ?? '' }} {{ $item->learner->middle_name ?? '' }} {{ $item->learner->last_name ?? '' }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->teacher->first_name ?? '-' }} {{ $item->teacher->middle_name ?? '-' }} {{ $item->teacher->last_name ?? '-' }}</td>
                        <td>{{ ucfirst($item->status ?? '-') }}</td>
                        <td>{{ $item->reason ?? '-' }}</td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Learner" href="{{ route('admin.learners.show', $item->learner_id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit Attendance" href="{{ route('admin.learner-attendances.edit', $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">No attendance records found.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

</div>

    
@endsection