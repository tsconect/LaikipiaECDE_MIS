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
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="school_id">School</label>
                                <select name="school_id" id="school_id" class="form-control" disabled>
                                    @foreach ($schools as $value)
                                        <option value="{{ $value->id ?? null }}" @if($school_id == $value->id) selected @endif>{{ $value->school_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-12 mt-2">
                        <label class="form-label">Select Date</label>
                        <input type="hidden" name="date" id="selectedDate" value="{{ old('date') }}">

                        <div class="calendar-picker-row">
                            <button type="button" class="btn btn-primary calendar-open-btn" id="openCalendarBtn">
                                <i class="fa fa-calendar me-2"></i>Choose Attendance Date
                            </button>
                            <div id="selectedDatePreview" class="selected-date-pill">No date selected</div>
                        </div>

                        <small id="dateWarning" class="text-danger d-none"></small>
                        @error('date')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="section-body-flush mt-2">
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

<div class="calendar-popup-overlay" id="attendanceDateOverlay" aria-hidden="true">
    <div class="calendar-popup-modal" role="dialog" aria-modal="true" aria-labelledby="attendanceDateModalLabel">
        <div class="calendar-modal-header">
            <h5 class="modal-title" id="attendanceDateModalLabel">Pick Attendance Date</h5>
            <button type="button" class="calendar-popup-close" id="closeCalendarBtn" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="calendar-modal-body">
            <div class="calendar-toolbar">
                <button type="button" class="btn btn-light btn-sm" id="prevMonthBtn" aria-label="Previous month">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <div id="calendarMonthLabel" class="calendar-month-label"></div>
                <button type="button" class="btn btn-light btn-sm" id="nextMonthBtn" aria-label="Next month">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>

            <div id="attendanceCalendar"></div>
            <p class="calendar-note">Green days are selectable. Red or grey days are blocked.</p>
        </div>
    </div>
</div>

<style>
.calendar-picker-row {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: 6px;
}

.calendar-open-btn {
    border-radius: 10px;
    font-weight: 700;
    letter-spacing: 0.02em;
    padding: 10px 16px;
    background: linear-gradient(180deg, #2f80ed, #1d4ed8);
    border: none;
    box-shadow: 0 8px 20px rgba(29, 78, 216, 0.24);
}

.calendar-open-btn:hover,
.calendar-open-btn:focus {
    background: linear-gradient(180deg, #2a74d6, #1a45be);
}

.selected-date-pill {
    display: inline-flex;
    align-items: center;
    min-height: 42px;
    padding: 8px 14px;
    border-radius: 999px;
    border: 1px dashed #93a3b8;
    color: #64748b;
    background: #f8fafc;
    font-size: 13px;
    font-weight: 600;
}

.selected-date-pill.has-date {
    border-style: solid;
    border-color: #22c55e;
    color: #166534;
    background: #ecfdf3;
}

.calendar-popup-overlay {
    --calendar-overlay-offset: 96px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: transparent;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: var(--calendar-overlay-offset, 64px) 20px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s ease;
    z-index: 10050;
}

.calendar-popup-overlay.active {
    opacity: 1;
    pointer-events: auto;
}

.calendar-popup-modal {
    width: min(760px, 100%);
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
    max-height: min(78vh, 720px);
    display: flex;
    flex-direction: column;
}

.calendar-modal-body {
    padding: 16px;
    overflow: auto;
}

.calendar-popup-close {
    width: 36px;
    height: 36px;
    position: absolute;
    top: 10px;
    right: 12px;
    border: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.12);
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background 0.2s ease;
}

.calendar-popup-close:hover {
    background: rgba(255, 255, 255, 0.2);
}

.calendar-modal-header {
    position: relative;
    background: #0f1b2d;
    color: #fff;
    border: 0;
    padding: 14px 56px 14px 18px;
}

.calendar-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 10px;
}

.calendar-month-label {
    font-size: 16px;
    font-weight: 700;
    color: #0f172a;
    letter-spacing: 0.01em;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 6px;
}

.calendar-dow {
    text-align: center;
    font-size: 12px;
    font-weight: 700;
    color: #334155;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    padding: 8px 0;
}

.calendar-blank {
    min-height: 44px;
}

.day-box {
    min-height: 44px;
    padding: 8px;
    text-align: center;
    border-radius: 8px;
    cursor: pointer;
    font-size: 13px;
    background: #f5f5f5;
    position: relative;
    border: 1px solid transparent;
    transition: all 0.2s ease;
}

.day-box.disabled {
    background: #f1f5f9;
    color: #999;
    cursor: not-allowed;
    opacity: 0.6;
}

.day-box.presentable {
    background: #e8f5e9;
    border: 1px solid #2e7d32;
}

.day-box.presentable:hover {
    background: #dcfce7;
    transform: translateY(-1px);
}

.day-box.weekend {
    background: #fff3e0;
    border-color: #f59e0b;
}

.day-box.holiday {
    background: #ffebee;
    border-color: #ef4444;
}

.day-box.future {
    background: #e2e8f0;
    border-color: #cbd5e1;
}

.day-box.selected {
    border-color: #2563eb;
    box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
}

.calendar-note {
    margin: 10px 0 0;
    font-size: 12px;
    color: #64748b;
}

@media (max-width: 768px) {
    .calendar-popup-overlay {
        --calendar-overlay-offset: 72px;
        padding: 12px;
        align-items: center;
    }

    .calendar-popup-modal {
        width: min(620px, 100%);
        max-height: 84vh;
    }

    .calendar-grid {
        gap: 4px;
    }

    .day-box,
    .calendar-blank {
        min-height: 36px;
        font-size: 12px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.status-select').forEach(function (select) {
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

    const container = document.getElementById('attendanceCalendar');
    const hiddenInput = document.getElementById('selectedDate');
    const warning = document.getElementById('dateWarning');
    const selectedDatePreview = document.getElementById('selectedDatePreview');
    const openCalendarBtn = document.getElementById('openCalendarBtn');
    const closeCalendarBtn = document.getElementById('closeCalendarBtn');
    const prevMonthBtn = document.getElementById('prevMonthBtn');
    const nextMonthBtn = document.getElementById('nextMonthBtn');
    const monthLabel = document.getElementById('calendarMonthLabel');
    const overlay = document.getElementById('attendanceDateOverlay');
    const form = document.querySelector('form.modern-form-shell');

    if (!container || !hiddenInput || !warning || !selectedDatePreview || !form || !overlay) {
        return;
    }

    const dateFormatter = new Intl.DateTimeFormat('en-US', {
        weekday: 'short',
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });

    const monthFormatter = new Intl.DateTimeFormat('en-US', {
        month: 'long',
        year: 'numeric'
    });

    function clearLegacyBackdropState() {
        document.querySelectorAll('.modal-backdrop').forEach(function (el) {
            el.remove();
        });

        document.body.classList.remove('modal-open');
        document.body.style.removeProperty('overflow');
        document.body.style.removeProperty('padding-right');
    }

    function openCalendarPopup() {
        clearLegacyBackdropState();
        overlay.classList.add('active');
        overlay.setAttribute('aria-hidden', 'false');
    }

    function closeCalendarPopup() {
        overlay.classList.remove('active');
        overlay.setAttribute('aria-hidden', 'true');
        clearLegacyBackdropState();
    }

    let blockedDateMap = {};
    let activeMonth = new Date();

    function ymd(year, month, day) {
        return `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
    }

    function parseYmd(dateString) {
        return new Date(`${dateString}T00:00:00`);
    }

    function isFutureDate(year, month, day) {
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const candidate = new Date(year, month, day);
        return candidate > today;
    }

    function setSelectedDateLabel(dateString) {
        if (!dateString) {
            selectedDatePreview.textContent = 'No date selected';
            selectedDatePreview.classList.remove('has-date');
            return;
        }

        selectedDatePreview.textContent = dateFormatter.format(parseYmd(dateString));
        selectedDatePreview.classList.add('has-date');
    }

    function showWarning(message) {
        warning.textContent = message;
        warning.classList.remove('d-none');
    }

    function clearWarning() {
        warning.textContent = '';
        warning.classList.add('d-none');
    }

    function renderCalendar(date) {
        container.innerHTML = '';

        const year = date.getFullYear();
        const month = date.getMonth();

        if (monthLabel) {
            monthLabel.textContent = monthFormatter.format(new Date(year, month, 1));
        }

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const grid = document.createElement('div');
        grid.className = 'calendar-grid';

        ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'].forEach(function (name) {
            const header = document.createElement('div');
            header.className = 'calendar-dow';
            header.textContent = name;
            grid.appendChild(header);
        });

        for (let i = 0; i < firstDay; i++) {
            const blank = document.createElement('div');
            blank.className = 'calendar-blank';
            grid.appendChild(blank);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const fullDate = ymd(year, month, day);
            const blocked = blockedDateMap[fullDate];
            const box = document.createElement('button');
            box.type = 'button';
            box.className = 'day-box';
            box.textContent = String(day);

            if (hiddenInput.value === fullDate) {
                box.classList.add('selected');
            }

            if (isFutureDate(year, month, day)) {
                box.classList.add('disabled', 'future');
                box.disabled = true;
                box.title = 'Future dates are not allowed';
            } else if (blocked) {
                box.classList.add('disabled');
                box.disabled = true;
                box.title = blocked.title || 'Attendance not allowed';

                if (blocked.type === 'holiday') box.classList.add('holiday');
                if (blocked.type === 'weekend') box.classList.add('weekend');
                if (blocked.type === 'closure') box.classList.add('closure');
            } else {
                box.classList.add('presentable');
                box.addEventListener('click', function () {
                    hiddenInput.value = fullDate;
                    setSelectedDateLabel(fullDate);
                    clearWarning();
                    renderCalendar(activeMonth);

                    closeCalendarPopup();
                });
            }

            grid.appendChild(box);
        }

        container.appendChild(grid);
    }

    if (openCalendarBtn) {
        openCalendarBtn.addEventListener('click', function () {
            openCalendarPopup();
        });
    }

    if (closeCalendarBtn) {
        closeCalendarBtn.addEventListener('click', closeCalendarPopup);
    }

    overlay.addEventListener('click', function (event) {
        if (event.target === overlay) {
            closeCalendarPopup();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && overlay.classList.contains('active')) {
            closeCalendarPopup();
        }
    });

    if (prevMonthBtn) {
        prevMonthBtn.addEventListener('click', function () {
            activeMonth = new Date(activeMonth.getFullYear(), activeMonth.getMonth() - 1, 1);
            renderCalendar(activeMonth);
        });
    }

    if (nextMonthBtn) {
        nextMonthBtn.addEventListener('click', function () {
            activeMonth = new Date(activeMonth.getFullYear(), activeMonth.getMonth() + 1, 1);
            renderCalendar(activeMonth);
        });
    }

    form.addEventListener('submit', function (event) {
        if (!hiddenInput.value) {
            event.preventDefault();
            showWarning('Please choose a date before saving attendance.');

            openCalendarPopup();
        }
    });

    fetch("{{ route('admin.non-attendance-days.json') }}")
        .then(function (res) { return res.json(); })
        .then(function (res) {
            blockedDateMap = res || {};
            renderCalendar(activeMonth);
        })
        .catch(function () {
            blockedDateMap = {};
            renderCalendar(activeMonth);
        });

    clearLegacyBackdropState();
    setSelectedDateLabel(hiddenInput.value);
});
</script>
@endsection
