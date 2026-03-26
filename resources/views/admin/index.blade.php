@extends('admin.app')

@section('content')


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
@if(Auth::user()->role == 'Admin')
<div class="container-fluid">
    <div class="row g-3">

        <!-- ECDE Schools -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">ECDE Schools</div>
                    <h4 class="fw-bold mb-1">{{ number_format($schoolsCount) }}</h4>
                    <span class="text-success small">+14%</span>
                </div>
            </div>
        </div>

        <!-- Teachers -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Male Teachers</div>
                    <h4 class="fw-bold text-danger mb-1">{{ number_format($teachersCount) }}</h4>
                    <span class="text-success small">+8%</span>
                </div>
            </div>
        </div>

         <div class="col-12 col-sm-6 col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Female Teachers</div>
                    <h4 class="fw-bold text-danger mb-1">{{ number_format($teachersCount) }}</h4>
                    <span class="text-success small">+8%</span>
                </div>
            </div>
        </div>

        <!-- Students -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Male Learners</div>
                    <h4 class="fw-bold mb-1">{{ number_format($studentsCount) }}</h4>
                    <span class="text-danger small">-15%</span>
                </div>
            </div>
        </div>

         <!-- Students -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Female Learners</div>
                    <h4 class="fw-bold mb-1">{{ number_format($studentsCount) }}</h4>
                    <span class="text-danger small">-15%</span>
                </div>
            </div>
        </div>

        <!-- Unions -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Abled Differently</div>
                    <h4 class="fw-bold mb-1">{{ number_format($unionsCount) }}</h4>
                    <span class="text-warning small">+76%</span>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container p-2 mt-3">
    <div class="card">
        <div class="card-hearder p-3">
            <h5>Learner-Teacher Registration Progress</h5>
            <hr>
        </div>
        <div class="card-body">
               <canvas id="registrationChart" height="70"></canvas>
        </div>
    </div>
</div>

<div class="container p-2 mt-3">
    <div class="card">
        <div class="card-header p-3">
            <h5>Learner Age Distribution</h5>
            <hr>
        </div>
        <div class="card-body">
            <canvas id="ageChart" height="150"></canvas>
        </div>
    </div>
</div>
<div class="container p-2 mt-3">
    <div class="card">
        <div class="card-hearder p-3">
            <h5>Retiring Teachers</h5>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School</th>
                        <th>Age</th>
                        <th>Retires In</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($retiringTeachers as $teacher)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->school->school_name }}</td>
                            <td>{{ $teacher->age }}</td>
                            <td>{{ $teacher->retires_in }}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container p-2 mt-3">
    <div class="card">
        <div class="card-hearder p-3">
            <h5>Teacher Distribution per Age Group</h5>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Age Group</th>
                        <th>Number of Teachers</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>18-20</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>21-24</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>25-29</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>30-34</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>35-39</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>40-44</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>45-49</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>50-54</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>55-59</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>60 and above</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<div class="container p-2 mt-3">
    <div class="card">
        <div class="card-header p-3">
            <h5>Teachers Ethnic Distribution</h5>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ethinicity</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ethnicities as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>0</td>
                    </tr>
                    @endforeach
                    {{-- @foreach($ageDistribution as $key => $value)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $value }}</td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ageCtx = document.getElementById('ageChart').getContext('2d');

const labels_age = [
    "Under 3",
    "4 Years",
    "5 Years",
    "6 Years",
    "7 Years",
    "8 Years",
    "9 Years",
    "10 Years",
    "10+ Years"
];


const maleData = [5, 10, 15, 20, 18, 14, 12, 8, 4];
const femaleData = [6, 12, 18, 22, 20, 16, 14, 9, 5];

new Chart(ageCtx, {
    type: 'bar',
    data: {
        labels: labels_age,
        datasets: [
            {
                label: 'Male',
                data: maleData,
                borderWidth: 1
            },
            {
                label: 'Female',
                data: femaleData,
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false, 
        plugins: {
            legend: {
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
const ctx = document.getElementById('registrationChart').getContext('2d');


const labels = [
    "Day 1","Day 2","Day 3","Day 4","Day 5","Day 6","Day 7",
    "Day 8","Day 9","Day 10","Day 11","Day 12","Day 13","Day 14"
];

// Dummy data
const teacherData = [5, 8, 12, 10, 15, 18, 20, 22, 25, 28, 30, 32, 35, 40];
const studentData = [10, 15, 18, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70];

new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Teachers Registered',
                data: teacherData,
                borderWidth: 2,
                tension: 0.4
            },
            {
                label: 'Learners Registered',
                data: studentData,
                borderWidth: 2,
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@else
<h4>WELCOME, {{ auth()->user()->first_name }}</h4>
<style>
.card-link {
    text-decoration: none;
    color: inherit;
}

.custom-card {
    border: none;
    border-radius: 15px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.custom-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.card-icon {
    font-size: 40px;
    color: #0d6efd;
}

.card-title {
    font-weight: 600;
}

.card-text {
    font-size: 14px;
    color: #6c757d;
}
</style>

<div class="row g-4">

    <!-- My Account -->
    <div class="col-md-3">
        <a href="#" class="card-link">
            <div class="card custom-card text-center p-4">
                <div class="card-body">
                    <div class="card-icon mb-3">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h5 class="card-title">My Account</h5>
                    <p class="card-text">View and manage your account info.</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Change Password -->
    <div class="col-md-3">
        <a href="#" class="card-link">
            <div class="card custom-card text-center p-4">
                <div class="card-body">
                    <div class="card-icon mb-3">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h5 class="card-title">Change Password</h5>
                    <p class="card-text">Update your password securely.</p>
                </div>
            </div>
        </a>
    </div>



    <!-- My Details -->
    <div class="col-md-3">
        <a href="#" class="card-link">
            <div class="card custom-card text-center p-4">
                <div class="card-body">
                    <div class="card-icon mb-3">
                        <i class="bi bi-card-list"></i>
                    </div>
                    <h5 class="card-title">My Details</h5>
                    <p class="card-text">Check your personal details.</p>
                </div>
            </div>
        </a>
    </div>

        <!-- Login -->
    <div class="col-md-3">
        <a href="#" class="card-link">
            <div class="card custom-card text-center p-4">
                <div class="card-body">
                    <div class="card-icon mb-3">
                        <i class="bi bi-box-arrow-in-right"></i>
                    </div>
                    <h5 class="card-title">Logout</h5>
                    <p class="card-text">Access your account quickly.</p>
                </div>
            </div>
        </a>
    </div>

</div>
@endif

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
