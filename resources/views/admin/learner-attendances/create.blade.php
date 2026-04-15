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
                <div class="row">
                    
                 @if($school_id)

                            
                    <input type="hidden" name="school_id" value="{{ $school_id }}">
                    <div class="col-md-6 ">
                    <div class="position-relative form-group">
                            <label for="school_id" class=""> School </label>
                            <select name="school_id" id="school_id" class="form-control" disabled>
                                {{-- <option value="">Select School</option> --}}
                                @foreach ($schools as $value)
                                    <option value="{{ $value->id ?? null }}" @if($school_id == $value->id) selected @endif>{{ $value->school_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        
                    </div>
                @else
                   
                @endif

                 <div class="col-md-12">
    <label class="form-label">Select Date e</label>

    <input type="hidden" name="date" id="selectedDate">

    <div id="attendanceCalendar"></div>
</div>
                <small id="dateWarning" class="text-danger d-none"></small>
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                </div>


                <div class="section-body-flush">
                    <table class="data-table dt-admin" id="markAttendanceTable">
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
<style>
.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 6px;
}

.day-box {
    padding: 10px;
    text-align: center;
    border-radius: 8px;
    cursor: pointer;
    font-size: 13px;
    background: #f5f5f5;
    position: relative;
}

.day-box.disabled {
    background: #eee;
    color: #999;
    cursor: not-allowed;
    opacity: 0.6;
}

.day-box.presentable {
    background: #e8f5e9;
    border: 1px solid #2e7d32;
}

.day-box.weekend {
    background: #fff3e0;
}

.day-box.holiday {
    background: #ffebee;
}

.day-box.selected {
    border: 2px solid #1976d2;
}
</style>
<script>
    const blockedDates = @json($blockedDays);
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const container = document.getElementById('attendanceCalendar');
    const hiddenInput = document.getElementById('selectedDate');

    let blockedDates = {}; // from backend

    // 🔥 LOAD BLOCKED DATES FROM BACKEND
    fetch("{{ route('admin.non-attendance-days.json') }}")
        .then(res => res.json())
        .then(res => {
            blockedDates = res;
            renderCalendar(new Date());
        });

    function renderCalendar(date) {

        container.innerHTML = "";

        let year = date.getFullYear();
        let month = date.getMonth();

        let firstDay = new Date(year, month, 1).getDay();
        let daysInMonth = new Date(year, month + 1, 0).getDate();

        let grid = document.createElement("div");
        grid.className = "calendar-grid";

        // headers
        ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"].forEach(d => {
            let h = document.createElement("div");
            h.innerHTML = "<b>" + d + "</b>";
            grid.appendChild(h);
        });

        // empty cells
        for (let i = 0; i < firstDay; i++) {
            grid.appendChild(document.createElement("div"));
        }

        for (let d = 1; d <= daysInMonth; d++) {

            let fullDate = `${year}-${String(month+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;

            let box = document.createElement("div");
            box.className = "day-box";
            box.innerText = d;

            let blocked = blockedDates[fullDate];

            if (blocked) {
                box.classList.add("disabled");
                box.title = blocked.title;

                if (blocked.type === "holiday") box.classList.add("holiday");
                if (blocked.type === "weekend") box.classList.add("weekend");
                if (blocked.type === "closure") box.classList.add("disabled");
            } else {

                box.classList.add("presentable");

                box.onclick = function () {

                    document.querySelectorAll(".day-box").forEach(b => b.classList.remove("selected"));
                    box.classList.add("selected");

                    hiddenInput.value = fullDate;
                };
            }

            grid.appendChild(box);
        }

        container.appendChild(grid);
    }
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('attDate');
    const warning = document.getElementById('dateWarning');

    function isBlocked(date) {
        return blockedDates.hasOwnProperty(date);
    }

    function getTitle(date) {
        return blockedDates[date]?.[0]?.title ?? 'Not allowed date';
    }

    input.addEventListener('input', function () {

        let selected = this.value;

        if (isBlocked(selected)) {

            let title = getTitle(selected);

            warning.textContent = `⚠️ ${title} - Attendance not allowed`;
            warning.classList.remove('d-none');

            // clear selection
            this.value = '';
        } else {
            warning.classList.add('d-none');
        }
    });

});
</script>
@endsection