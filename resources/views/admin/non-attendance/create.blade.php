@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="card-body">
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form class="modern-form-shell" method="POST" action="{{ route('admin.non-attendance-days.store') }}">
@csrf

<div class="card shadow-sm mb-4">

    <div class="card-header btn-success">
        <h5 class="mb-0">Add Non-Attendance Days</h5>
    </div>

    <div class="row p-3">

        {{-- TITLE --}}
        <div class="col-md-12 mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        {{-- TYPE --}}
        <div class="col-md-6 mb-3">
            <label>Type</label>
            <select name="type" id="typeSelect" class="form-control" required>
                <option value="holiday">Holiday</option>
                <option value="weekend">Weekend</option>
                <option value="closure">Closure</option>
                <option value="other">Other</option>
            </select>
        </div>

        {{-- SINGLE DATE --}}
        <div class="col-md-6 mb-3" id="singleDateBox">
            <label>Date</label>
            <input type="date" name="date" class="form-control">
        </div>

        {{-- RANGE (CLOSURE) --}}
        <div class="col-md-6 mb-3 d-none" id="rangeStartBox">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control">
        </div>

        <div class="col-md-6 mb-3 d-none" id="rangeEndBox">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control">
        </div>

        {{-- WEEKDAY (optional manual override) --}}
        <div class="col-md-6 mb-3" id="weekdayBox">
            <label>Weekday (optional)</label>
            <select name="weekday" class="form-control">
                <option value="">Select</option>
                <option value="0">Sunday</option>
                <option value="1">Monday</option>
                <option value="2">Tuesday</option>
                <option value="3">Wednesday</option>
                <option value="4">Thursday</option>
                <option value="5">Friday</option>
                <option value="6">Saturday</option>
            </select>
        </div>

        {{-- RECURRENCE --}}
        <div class="col-md-6 mb-3">
            <label>Recurring</label>
            <select name="is_recurring" class="form-control">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>

    </div>

    <div class="modern-form-footer px-3 pb-3">
        <button class="btn modern-form-submit" type="submit">
            Submit
        </button>
    </div>

</div>
</form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const type = document.getElementById('typeSelect');

    const singleDateBox = document.getElementById('singleDateBox');
    const rangeStartBox = document.getElementById('rangeStartBox');
    const rangeEndBox = document.getElementById('rangeEndBox');
    const weekdayBox = document.getElementById('weekdayBox');

    function updateForm() {

        let val = type.value;

        // RESET ALL FIRST
        singleDateBox.classList.add('d-none');
        rangeStartBox.classList.add('d-none');
        rangeEndBox.classList.add('d-none');
        weekdayBox.classList.remove('d-none');

        document.querySelector('[name="date"]').required = false;
        document.querySelector('[name="start_date"]').required = false;
        document.querySelector('[name="end_date"]').required = false;

        // =========================
        // HOLIDAY / OTHER
        // =========================
        if (val === 'holiday' || val === 'other') {
            singleDateBox.classList.remove('d-none');
            document.querySelector('[name="date"]').required = true;
        }

        // =========================
        // WEEKEND
        // =========================
        if (val === 'weekend') {
            weekdayBox.classList.add('d-none');
            singleDateBox.classList.add('d-none');
        }

        // =========================
        // CLOSURE (RANGE)
        // =========================
        if (val === 'closure') {
            rangeStartBox.classList.remove('d-none');
            rangeEndBox.classList.remove('d-none');

            document.querySelector('[name="start_date"]').required = true;
            document.querySelector('[name="end_date"]').required = true;

            singleDateBox.classList.add('d-none');
        }
    }

    type.addEventListener('change', updateForm);

    updateForm(); // run on load
});
</script>
@endsection
