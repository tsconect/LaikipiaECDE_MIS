@extends('admin.app')

@section('content')

@if(Auth::user()->role == 'Admin')

<div class="dash-content"
  data-teachers-count="{{ $teachersCount ?? 0 }}"
  data-students-count="{{ $studentsCount ?? 0 }}"
  data-learner-male="{{ $learner_male ?? 0 }}"
  data-learner-female="{{ $learner_female ?? 0 }}">

  <!-- ══ ROW 1: Core counts (4 cards) ══ -->
  <div class="stats-grid-4">
    <!-- Total ECDE Centres -->
    <div class="stat-card c-blue">
      <div class="stat-icon"><i class="bi bi-circle"></i></div>
      <div class="stat-label">Total ECDE Centres Registered</div>
      <div class="stat-value">{{ number_format($schoolsCount ?? 0) }}</div>
      <span class="stat-badge up centres">— centres</span>
    </div>

    <!-- Total Learners Enrolled -->
    <div class="stat-card c-green">
      <div class="stat-icon"><i class="bi bi-circle"></i></div>
      <div class="stat-label">Total ECDE Learners Enrolled</div>
      <div class="stat-value">{{ number_format($studentsCount ?? 0) }}</div>
      <span class="stat-badge up enrolled">— enrolled</span>
    </div>

    <!-- Learner-Teacher Ratio -->
    <div class="stat-card c-indigo">
      <div class="stat-icon"><i class="bi bi-circle"></i></div>
      <div class="stat-label">Learner–Teacher Ratio</div>
      <div class="ratio-display">
        @php
            $ratio = ($teachersCount > 0) ? round($studentsCount / $teachersCount) : 0;
        @endphp
        <span class="ratio-main">{{ $ratio }}:1</span>
        <span class="ratio-sub">per teacher</span>
      </div>
      <div class="ratio-bar"><div class="ratio-fill js-width" data-width="{{ min(100, $ratio * 2) }}"></div></div>
    </div>

    <!-- Absenteeism % -->
    <div class="stat-card c-red">
      <div class="stat-icon"><i class="bi bi-circle"></i></div>
      <div class="stat-label">Absenteeism Rate</div>
      <div class="attend-row">
        @php
            $total_attendance = ($present_today ?? 0) + ($absent_today ?? 0);
            $absent_pct = ($total_attendance > 0) ? round(($absent_today / $total_attendance) * 100) : 0;
        @endphp
        <span class="attend-big">{{ $absent_pct }}%</span>
        <span class="attend-pct absent">{{ $absent_today ?? 0 }} absent</span>
      </div>
      <div class="attend-bar"><div class="attend-fill absent-fill js-width" data-width="{{ $absent_pct }}"></div></div>
    </div>
  </div>

  <!-- ══ ROW 2: Gender + Teacher breakdown (3 cards) ══ -->
  <div class="stats-grid-3">
    <!-- Gender Distribution — Learners -->
    <div class="stat-card c-pink">
      <div class="stat-icon"><i class="bi bi-circle"></i></div>
      <div class="stat-label">Gender Distribution — Learners</div>
      <div class="split-stat">
        <div class="split-half">
          <div class="split-label">Female (F)</div>
          <div class="split-value f">{{ number_format($learner_female ?? 0) }}</div>
        </div>
        <div class="split-half">
          <div class="split-label">Male (M)</div>
          <div class="split-value m">{{ number_format($learner_male ?? 0) }}</div>
        </div>
      </div>
    </div>

    <!-- Total Teachers F/M -->
    <div class="stat-card c-sky">
      <div class="stat-icon"><i class="bi bi-circle"></i></div>
      <div class="stat-label">Total Teachers — F / M</div>
      <div class="split-stat">
        <div class="split-half">
          <div class="split-label">Female (F)</div>
          <div class="split-value f">{{ number_format($teacher_female ?? 0) }}</div>
        </div>
        <div class="split-half">
          <div class="split-label">Male (M)</div>
          <div class="split-value m">{{ number_format($teacher_male ?? 0) }}</div>
        </div>
      </div>
    </div>

    <!-- PWD Teachers & Learners -->
    <div class="stat-card c-violet">
      <div class="stat-icon"><i class="bi bi-circle"></i></div>
      <div class="stat-label">PWD — Teachers / Learners</div>
      <div class="split-stat">
        <div class="split-half">
          <div class="split-label">Teachers</div>
          <div class="split-value pwd">{{ number_format($pwd_teachers ?? 0) }}</div>
        </div>
        <div class="split-half">
          <div class="split-label">Learners</div>
          <div class="split-value pwd">{{ number_format($pwd_learners ?? 0) }}</div>
        </div>
      </div>
    </div>
  </div>

  <!-- ══ ROW 3: Attendance today + Infrastructure (2 cards) ══ -->
  <div class="stats-grid-2">
    <!-- Total Learners Present Today -->
    <div class="stat-card c-green">
      <div class="stat-icon"><i class="bi bi-circle"></i></div>
      <div class="stat-label">Total Learners Present — Today</div>
      <div class="attend-row">
        <span class="attend-big">{{ number_format($present_today ?? 0) }}</span>
        @php
            $present_pct = ($total_attendance > 0) ? round(($present_today / $total_attendance) * 100) : 0;
        @endphp
        <span class="attend-pct present">{{ $present_pct }}% present</span>
      </div>
      <div class="attend-bar"><div class="attend-fill present-fill js-width" data-width="{{ $present_pct }}"></div></div>
    </div>

    <!-- Infrastructure Distribution -->
    <div class="stat-card c-amber">
      <div class="stat-icon"><i class="bi bi-circle"></i></div>
      <div class="stat-label">Infrastructure Distribution</div>
      <div class="infra-list">
        <div class="infra-row"><div class="infra-dot permanent"></div><span class="infra-name">Permanent</span><span class="infra-count">{{ number_format($infra_permanent ?? 0) }}</span></div>
        <div class="infra-row"><div class="infra-dot semi-permanent"></div><span class="infra-name">Semi-Permanent</span><span class="infra-count">{{ number_format($infra_semi ?? 0) }}</span></div>
        <div class="infra-row"><div class="infra-dot temporary"></div><span class="infra-name">Temporary</span><span class="infra-count">{{ number_format($infra_temp ?? 0) }}</span></div>
        <div class="infra-row"><div class="infra-dot other"></div><span class="infra-name">Other / Open Air</span><span class="infra-count">{{ number_format($infra_other ?? 0) }}</span></div>
      </div>
    </div>
  </div>

  <div class="chart-grid-2">
    <!-- ── Registration Progress Chart ── -->
    <div class="section-card table-card">
      <div class="section-header">
        <div class="section-title">Learner-Teacher Registration Progress</div>
      </div>
      <div class="section-body">
        <div class="chart-legend">
          <div class="legend-item"><div class="legend-dot teachers"></div>Teachers Registered</div>
          <div class="legend-item"><div class="legend-dot learners"></div>Learners Registered</div>
        </div>
        <div class="chart-wrap chart-wrap-240">
          <canvas id="registrationChart"></canvas>
        </div>
      </div>
    </div>

    <!-- ── Learner Age Distribution Chart ── -->
    <div class="section-card table-card">
      <div class="section-header">
        <div class="section-title">Learner Age Distribution</div>
      </div>
      <div class="section-body">
        <div class="chart-legend">
          <div class="legend-item"><div class="legend-dot male"></div>Male</div>
          <div class="legend-item"><div class="legend-dot female"></div>Female</div>
        </div>
        <div class="chart-wrap chart-wrap-240">
          <canvas id="ageDistChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Retiring Teachers Table ── -->
  <div class="section-card table-card">
    <div class="section-header">
      <div class="section-title">
        <span class="panel-title-dot retiring"></span>
        Retiring Teachers
      </div>
      <span class="panel-badge retiring">In 5 Years</span>
    </div>
    <div class="section-body-flush">
      <table class="data-table dt-admin">
        <thead>
          <tr>
            <th>Name</th>
            <th>School</th>
            <th>Age</th>
            <th class="ta-right">Retires In</th>
          </tr>
        </thead>
        <tbody>
          @forelse($retiring_teachers as $teacher)
          <tr>
            <td class="td-strong">{{ $teacher->user->first_name ?? '' }} {{ $teacher->user->last_name ?? '' }}</td>
            <td>{{ $teacher->school->school_name ?? '-' }}</td>
            <td>{{ \Carbon\Carbon::parse($teacher->dob)->age }} yrs</td>
            <td class="ta-right">{{ $teacher->retirement_date->diffForHumans() }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="4">
              <div class="empty-state">
                <div class="empty-state-icon">
                  <i class="bi bi-inbox retiring-empty-icon"></i>
                </div>
                No retiring teachers at this time
                <p>Teachers nearing retirement age will appear here.</p>
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
  if (!window.Chart) {
    return;
  }

  var dashRoot = document.querySelector('.dash-content');
  if (!dashRoot) {
    return;
  }

  var teachersCount = Number(dashRoot.dataset.teachersCount || 0);
  var studentsCount = Number(dashRoot.dataset.studentsCount || 0);
  var learnerMale = Number(dashRoot.dataset.learnerMale || 0);
  var learnerFemale = Number(dashRoot.dataset.learnerFemale || 0);

  var registrationCanvas = document.getElementById('registrationChart');
  if (registrationCanvas) {
    new Chart(registrationCanvas.getContext('2d'), {
      type: 'bar',
      data: {
        labels: ['Teachers', 'Learners'],
        datasets: [
          {
            label: 'Registered',
            data: [teachersCount, studentsCount],
            backgroundColor: ['#1d4ed8', '#22c55e'],
            borderRadius: 6,
            maxBarThickness: 46
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          xAxes: [{ gridLines: { display: false } }],
          yAxes: [{ ticks: { beginAtZero: true, precision: 0 } }]
        }
      }
    });
  }

  var ageCanvas = document.getElementById('ageDistChart');
  if (ageCanvas) {
    new Chart(ageCanvas.getContext('2d'), {
      type: 'doughnut',
      data: {
        labels: ['Male', 'Female'],
        datasets: [
          {
            data: [learnerMale, learnerFemale],
            backgroundColor: ['#0ea5e9', '#ec4899'],
            borderWidth: 0
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        cutoutPercentage: 70
      }
    });
  }
});
</script>

@endsection