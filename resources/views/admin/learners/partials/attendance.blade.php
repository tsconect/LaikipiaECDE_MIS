<div class="row" id="attendanceWrapper">

    {{-- ================= LEFT: CALENDAR ================= --}}
    <div class="col-md-8">

        <div class="att-card">

            <div id="attCalendarTitle" class="att-calendar-title"></div>

            <div id="attCalendarGrid" class="att-cal-grid"></div>

            <div class="att-legend">
                <div class="att-legend-item">
                    <div class="att-legend-dot att-dot-present"></div> Present
                </div>
                <div class="att-legend-item">
                    <div class="att-legend-dot att-dot-absent"></div> Absent
                </div>
                <div class="att-legend-item">
                    <div class="att-legend-dot att-dot-nr"></div> Not Recorded
                </div>
            </div>

        </div>

    </div>

    {{-- ================= RIGHT: STATS ================= --}}
    <div class="col-md-4">

        {{-- Stats --}}
        <div class="att-card">
            <div class="att-stats-label">Attendance in Days</div>

            <div class="att-stats-row">
                <div>
                    <div id="attYear" class="att-stat-year"></div>
                    <div id="attMonthName" class="att-stat-month"></div>
                </div>

                <div class="text-center">
                    <div id="attPresent" class="att-stat-num att-present"></div>
                    <div class="att-stat-sublabel">Present</div>
                </div>

                <div class="text-center">
                    <div id="attAbsent" class="att-stat-num att-absent"></div>
                    <div class="att-stat-sublabel">Absent</div>
                </div>
            </div>
        </div>

        {{-- Progress --}}
        <div class="att-card">
            <div class="att-progress-label">Attendance Percent for Days Recorded</div>

            <div class="att-progress-bg">
                <div id="attProgress" class="att-progress-fill">0%</div>
            </div>
        </div>

        {{-- Result --}}
        <div class="att-card">
            <div class="att-result-title">Attendance Result</div>

            <div id="attResultPeriod" class="att-result-period"></div>

            <div class="att-result-row">
                <span>Days Recorded</span>
                <span id="attTotal"></span>
            </div>

            <div class="att-result-row">
                <span>Days Not Recorded</span>
                <span id="attNotRecorded"></span>
            </div>

            <div class="att-result-row">
                <span>Last Marked Date</span>
                <span id="attLastMarked"></span>
            </div>
        </div>

    </div>

</div>