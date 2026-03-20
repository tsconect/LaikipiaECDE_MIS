@extends('admin.app')

@section('content')
@php
    $schoolsCount = \App\Models\EcdeSchools::count();
    $teachersCount = \App\Models\Teacher::count();
    $studentsCount = \App\Models\Students::count();
    $unionsCount = \App\Models\Unions::count();
@endphp

<style>
.dashboard-modern {
    --surface: #ffffff;
    --surface-2: #f7f9fc;
    --border: #e4e8ef;
    --border-light: #eef1f6;
    --text-dark: #1a2d4d;
    --text-body: #374151;
    --text-muted: #6b7280;
    --green: #28a745;
    --green-bg: #e8f7ec;
    --red: #dc3545;
    --red-bg: #fdecea;
    --amber: #f59e0b;
    --amber-bg: #fef3cd;
    --blue: #0d6efd;
    --blue-bg: #e8f0fe;
    --navy: #1a2d4d;
    --navy-mid: #1e3558;
}
.dashboard-modern .top-row {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 18px;
}
.dashboard-modern .stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}
.dashboard-modern .stat-card,
.dashboard-modern .kes-card,
.dashboard-modern .panel,
.dashboard-modern .notif-panel {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 12px;
    box-shadow: 0 1px 6px rgba(26, 45, 77, 0.08);
}
.dashboard-modern .stat-card {
    padding: 18px;
}
.dashboard-modern .stat-label {
    font-size: 12px;
    color: var(--text-muted);
}
.dashboard-modern .stat-value {
    font-size: 30px;
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1;
    margin: 10px 0;
}
.dashboard-modern .stat-value.red { color: var(--red); }
.dashboard-modern .stat-change {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 12px;
    font-weight: 600;
    padding: 3px 8px;
    border-radius: 20px;
}
.dashboard-modern .up { background: var(--green-bg); color: var(--green); }
.dashboard-modern .down { background: var(--red-bg); color: var(--red); }
.dashboard-modern .amber { background: var(--amber-bg); color: #b45309; }
.dashboard-modern .kes-card {
    padding: 20px;
}
.dashboard-modern .kes-label {
    font-size: 12px;
    color: var(--text-muted);
}
.dashboard-modern .kes-amount {
    font-size: 28px;
    font-weight: 800;
    color: var(--text-dark);
    line-height: 1;
}
.dashboard-modern .kes-amount span {
    font-size: 14px;
    font-weight: 500;
    color: var(--text-muted);
}
.dashboard-modern .kes-sub {
    font-size: 11px;
    color: var(--text-muted);
    margin: 6px 0 12px;
}
.dashboard-modern .content-row {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 18px;
    margin-top: 18px;
}
.dashboard-modern .panel-header,
.dashboard-modern .notif-header {
    padding: 14px 16px;
    border-bottom: 1px solid var(--border-light);
    background: var(--surface-2);
}
.dashboard-modern .panel-title {
    font-size: 13px;
    letter-spacing: .06em;
    text-transform: uppercase;
    font-weight: 700;
    color: var(--text-dark);
}
.dashboard-modern table {
    width: 100%;
    border-collapse: collapse;
}
.dashboard-modern thead th {
    padding: 10px 14px;
    border-bottom: 1px solid var(--border);
    font-size: 11px;
    text-transform: uppercase;
    color: var(--text-muted);
}
.dashboard-modern tbody td {
    padding: 11px 14px;
    border-bottom: 1px solid var(--border-light);
    font-size: 13px;
    color: var(--text-body);
}
.dashboard-modern .sn-badge {
    width: 22px;
    height: 22px;
    border-radius: 4px;
    background: var(--navy);
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 700;
}
.dashboard-modern .period-tag {
    display: inline-block;
    background: var(--blue-bg);
    color: var(--blue);
    border-radius: 20px;
    padding: 3px 9px;
    font-size: 11px;
    font-weight: 600;
}
.dashboard-modern .amount-cell {
    font-weight: 700;
    color: var(--green);
}
.dashboard-modern .subsection-header {
    padding: 10px 14px;
    background: linear-gradient(to right, var(--navy), var(--navy-mid));
    color: #fff;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .08em;
    font-weight: 700;
}
.dashboard-modern .empty-row td {
    text-align: center;
    color: #9ca3af;
    font-style: italic;
}
.dashboard-modern .notif-title-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    font-weight: 700;
    color: var(--text-dark);
}
.dashboard-modern .notif-badge {
    background: var(--red);
    color: #fff;
    border-radius: 20px;
    padding: 2px 7px;
    font-size: 11px;
}
.dashboard-modern .notif-sub {
    font-size: 11px;
    color: var(--text-muted);
    margin-top: 3px;
}
.dashboard-modern .notif-tabs {
    display: flex;
    gap: 4px;
    padding: 8px 12px;
    border-bottom: 1px solid var(--border-light);
}
.dashboard-modern .n-tab {
    border: 0;
    border-radius: 5px;
    background: transparent;
    padding: 5px 10px;
    font-size: 12px;
    color: var(--text-muted);
}
.dashboard-modern .n-tab.active {
    background: var(--blue);
    color: #fff;
}
.dashboard-modern .notif-tab-pane {
    display: none;
}
.dashboard-modern .notif-tab-pane.active {
    display: block;
}
.dashboard-modern .notif-item {
    padding: 10px 14px;
    border-top: 1px solid var(--border-light);
    display: flex;
    gap: 10px;
}
.dashboard-modern .notif-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin-top: 5px;
    flex-shrink: 0;
}
.dashboard-modern .dot-red { background: var(--red); }
.dashboard-modern .dot-amber { background: var(--amber); }
.dashboard-modern .dot-green { background: var(--green); }
.dashboard-modern .dot-blue { background: var(--blue); }
.dashboard-modern .notif-text {
    font-size: 12.5px;
    color: var(--text-body);
}
.dashboard-modern .notif-time {
    font-size: 11px;
    color: #9ca3af;
}
.dashboard-modern .new-tag {
    background: var(--red);
    color: #fff;
    font-size: 9px;
    border-radius: 3px;
    padding: 1px 5px;
    margin-left: 5px;
}
.dashboard-modern .notif-footer {
    border-top: 1px solid var(--border-light);
    padding: 10px 14px;
}
.dashboard-modern .btn-view-all {
    width: 100%;
    border: 0;
    background: var(--navy);
    color: #fff;
    border-radius: 20px;
    padding: 9px 14px;
    font-size: 12px;
    font-weight: 600;
}
@media (max-width: 1200px) {
    .dashboard-modern .top-row,
    .dashboard-modern .content-row {
        grid-template-columns: 1fr;
    }
    .dashboard-modern .stats-row {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 680px) {
    .dashboard-modern .stats-row {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="dashboard-modern">
    <div class="top-row">
        <div>
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-label">ECDE Schools</div>
                    <div class="stat-value">{{ number_format($schoolsCount) }}</div>
                    <span class="stat-change up">+14%</span>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Teachers</div>
                    <div class="stat-value red">{{ number_format($teachersCount) }}</div>
                    <span class="stat-change up">+8%</span>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Students</div>
                    <div class="stat-value">{{ number_format($studentsCount) }}</div>
                    <span class="stat-change down">-15%</span>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Unions</div>
                    <div class="stat-value">{{ number_format($unionsCount) }}</div>
                    <span class="stat-change amber">+76%</span>
                </div>
            </div>
        </div>

        <div class="kes-card">
            <div class="kes-label">Total Bursary Dispersed</div>
            <div class="kes-amount"><span>KES</span> 628</div>
            <div class="kes-sub">All periods combined</div>
            <svg viewBox="0 0 300 70" preserveAspectRatio="none" style="width:100%;height:70px;">
                <defs>
                    <linearGradient id="goldGradHome" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#f59e0b" stop-opacity="0.4"/>
                        <stop offset="100%" stop-color="#f59e0b" stop-opacity="0.02"/>
                    </linearGradient>
                </defs>
                <path d="M0,55 C15,52 20,42 35,44 C50,46 55,36 70,32 C85,28 90,38 105,33 C120,28 125,18 145,14 C165,10 170,22 190,18 C210,14 215,6 235,9 C255,12 260,20 280,16 L300,12 L300,70 L0,70 Z" fill="url(#goldGradHome)"/>
                <path d="M0,55 C15,52 20,42 35,44 C50,46 55,36 70,32 C85,28 90,38 105,33 C120,28 125,18 145,14 C165,10 170,22 190,18 C210,14 215,6 235,9 C255,12 260,20 280,16 L300,12" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>

    <div class="content-row">
        <div class="panel">
            <div class="panel-header">
                <div class="panel-title">Bursary Breakdowns</div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>SN / No</th>
                        <th>Bursary Opening</th>
                        <th>Total Applicants</th>
                        <th>Allocated</th>
                        <th>Variance</th>
                        <th>Amount Disbursed</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="sn-badge">1</span></td>
                        <td><span class="period-tag">2023 / January</span></td>
                        <td>1,200</td>
                        <td>100</td>
                        <td>1,100</td>
                        <td><span class="amount-cell">24,000</span></td>
                    </tr>
                </tbody>
            </table>

            <div class="subsection-header">ECDE Teachers Breakdown</div>
            <table>
                <thead>
                    <tr>
                        <th>SN / NO</th>
                        <th>Total</th>
                        <th>With TSC</th>
                        <th>Male</th>
                        <th>Female</th>
                        <th>Disabled</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="empty-row">
                        <td colspan="6">No teacher breakdown data available</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="notif-panel">
            <div class="notif-header">
                <div class="notif-title-row">
                    <span>Technical Support</span>
                    <span class="notif-badge">21</span>
                </div>
                <div class="notif-sub">You have <strong>21</strong> unread messages</div>
            </div>

            <div class="notif-tabs">
                <button class="n-tab active" type="button" data-tab="messages">Messages</button>
                <button class="n-tab" type="button" data-tab="events">Events</button>
                <button class="n-tab" type="button" data-tab="errors">System Errors</button>
            </div>

            <div class="notif-tab-pane active" data-pane="messages">
                <div class="notif-item">
                    <div class="notif-dot dot-red"></div>
                    <div>
                        <div class="notif-text">All Hands Meeting</div>
                        <div class="notif-time">Today, 09:00 AM</div>
                    </div>
                </div>

                <div class="notif-item">
                    <div class="notif-dot dot-amber"></div>
                    <div>
                        <div class="notif-text">Yet another one</div>
                        <div class="notif-time">at 15:00 PM</div>
                    </div>
                </div>

                <div class="notif-item">
                    <div class="notif-dot dot-green"></div>
                    <div>
                        <div class="notif-text">Build the production release <span class="new-tag">NEW</span></div>
                        <div class="notif-time">2 hours ago</div>
                    </div>
                </div>

                <div class="notif-item">
                    <div class="notif-dot dot-blue"></div>
                    <div>
                        <div class="notif-text">Something not important</div>
                        <div class="notif-time">Just now</div>
                    </div>
                </div>
            </div>

            <div class="notif-tab-pane" data-pane="events">
                <div class="notif-item">
                    <div class="notif-dot dot-blue"></div>
                    <div>
                        <div class="notif-text">System maintenance briefing</div>
                        <div class="notif-time">Tomorrow, 10:30 AM</div>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-dot dot-amber"></div>
                    <div>
                        <div class="notif-text">SMS service update review</div>
                        <div class="notif-time">Friday, 03:00 PM</div>
                    </div>
                </div>
            </div>

            <div class="notif-tab-pane" data-pane="errors">
                <div class="notif-item">
                    <div class="notif-dot dot-red"></div>
                    <div>
                        <div class="notif-text">Queue worker timeout recovered</div>
                        <div class="notif-time">20 minutes ago</div>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-dot dot-amber"></div>
                    <div>
                        <div class="notif-text">Email service delay warning</div>
                        <div class="notif-time">1 hour ago</div>
                    </div>
                </div>
            </div>

            <div class="notif-footer">
                <a class="btn-view-all text-center d-block text-decoration-none" href="{{ route('admin.sms-logs.index') }}">View All Messages</a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.dashboard-modern .n-tab');
    const panes = document.querySelectorAll('.dashboard-modern .notif-tab-pane');

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            const target = tab.dataset.tab;

            tabs.forEach(function (item) { item.classList.remove('active'); });
            panes.forEach(function (pane) { pane.classList.remove('active'); });

            tab.classList.add('active');
            const activePane = document.querySelector('.dashboard-modern .notif-tab-pane[data-pane="' + target + '"]');
            if (activePane) {
                activePane.classList.add('active');
            }
        });
    });
});
</script>
@endsection
