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

        <form method="GET" class="row g-2 mb-3 p-4">
    
            <div class="col-md-3">
                <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">
            </div>

            <div class="col-md-3">
                <input type="date" name="end_date" value="{{ $endDate }}" class="form-control">
            </div>

            <div class="col-md-3">
                <button class="btn btn-success">Filter</button>
                <a href="{{ route('admin.learner-attendances.index') }}" class="btn btn-secondary">Reset</a>
            </div>

        </form>

      <div class="p-3">

        <div class="card mb-3">
            <div class="card-header bg-light">
                <strong>Attendance Summary ({{ $startDate }} → {{ $endDate }})</strong>
            </div>

            <div class="card-body p-2">
                  <table class="data-table dt-admin" id="learnerAttendanceTable">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Student</th>
                            <th>School</th>
                            <th>Days Present</th>
                            <th>Days Absent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($summary as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['school'] }}</td>
                                <td class="text-success fw-bold">{{ $item['present'] }}</td>
                                <td class="text-danger fw-bold">{{ $item['absent'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>—</td>
                                <td class="text-muted">No data available</td>
                                <td>—</td>
                                <td>—</td>
                                <td>—</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- <table class="data-table dt-admin" id="learnerAttendanceTable">
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
                        <td>—</td>
                        <td class="text-muted">No attendance records found.</td>
                        <td>—</td>
                        <td>—</td>
                        <td>—</td>
                        <td>—</td>
                        <td>—</td>
                    </tr>
                @endforelse
            </tbody>
        </table> --}}

</div>

    
@endsection