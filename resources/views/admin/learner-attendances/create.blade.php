@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>MARK</span> ATTENDANCE</div>
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

        @if($learners->isEmpty())
            <div class="empty-state">No learners found.</div>
        @else
            <form class="modern-form-shell" action="{{ route('admin.learner-attendances.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Select Date</label>
                    <input
                        type="date"
                        name="date"
                        class="form-control @error('date') is-invalid @enderror"
                        value="{{ old('date', date('Y-m-d')) }}"
                        max="{{ date('Y-m-d') }}"
                    >
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="section-body-flush">
                    <table class="data-table" id="markAttendanceTable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>LEARNER</th>
                                <th>STATUS</th>
                                <th>REASON (IF ABSENT)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($learners as $learner)
                                <tr>
                                    <td class="td-id">{{ $loop->iteration }}</td>
                                    <td>{{ $learner->first_name }} {{ $learner->middle_name }} {{ $learner->last_name }}</td>
                                    <td>
                                        <select name="attendance[{{ $learner->id }}][status]" class="form-control status-select">
                                            <option value="present">Present</option>
                                            <option value="absent">Absent</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            name="attendance[{{ $learner->id }}][reason]"
                                            class="form-control reason-input"
                                            placeholder="Enter reason"
                                            disabled
                                        >
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-success" type="submit">Save Attendance</button>
                </div>
            </form>
        @endif
    </div>
</div>

<script>
document.querySelectorAll('.status-select').forEach((select) => {
    select.addEventListener('change', function () {
        const row = this.closest('tr');
        const reasonInput = row.querySelector('.reason-input');

        if (this.value === 'absent') {
            reasonInput.disabled = false;
            reasonInput.setAttribute('required', 'required');
        } else {
            reasonInput.disabled = true;
            reasonInput.removeAttribute('required');
            reasonInput.value = '';
        }
    });
});
</script>
@endsection
