@extends('admin.app')

@section('content')

@if(Auth::user()->role == 'Admin')

<div class="dash-content">

  <!-- ══ ROW 1: Core counts (4 cards) ══ -->
  <div class="stats-grid-4">
    <!-- Total ECDE Centres -->
    <div class="stat-card c-blue">
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/></svg></div>
      <div class="stat-label">Total ECDE Centres Registered</div>
      <div class="stat-value">{{ number_format($schoolsCount ?? 0) }}</div>
      <span class="stat-badge up centres">— centres</span>
    </div>

    <!-- Total Learners Enrolled -->
    <div class="stat-card c-green">
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/></svg></div>
      <div class="stat-label">Total ECDE Learners Enrolled</div>
      <div class="stat-value">{{ number_format($studentsCount ?? 0) }}</div>
      <span class="stat-badge up enrolled">— enrolled</span>
    </div>

    <!-- Learner-Teacher Ratio -->
    <div class="stat-card c-indigo">
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/></svg></div>
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
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"/></svg></div>
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
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.97 5.97 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 14.094A5.97 5.97 0 004 17v1H1v-1a3 3 0 013.75-2.906z"/></svg></div>
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
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.97 5.97 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 14.094A5.97 5.97 0 004 17v1H1v-1a3 3 0 013.75-2.906z"/></svg></div>
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
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg></div>
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
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg></div>
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
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h4v-4h2v4h4a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg></div>
      <div class="stat-label">Infrastructure Distribution</div>
      <div class="infra-list">
        <div class="infra-row"><div class="infra-dot permanent"></div><span class="infra-name">Permanent</span><span class="infra-count">{{ number_format($infra_permanent ?? 0) }}</span></div>
        <div class="infra-row"><div class="infra-dot semi-permanent"></div><span class="infra-name">Semi-Permanent</span><span class="infra-count">{{ number_format($infra_semi ?? 0) }}</span></div>
        <div class="infra-row"><div class="infra-dot temporary"></div><span class="infra-name">Temporary</span><span class="infra-count">{{ number_format($infra_temp ?? 0) }}</span></div>
        <div class="infra-row"><div class="infra-dot other"></div><span class="infra-name">Other / Open Air</span><span class="infra-count">{{ number_format($infra_other ?? 0) }}</span></div>
      </div>
    </div>
  </div>

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
      <table class="data-table">
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
                  <svg class="retiring-empty-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
                  </svg>
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

  <!-- ── Distribution Tables ── -->
  <div class="stats-grid-2">
    <!-- Teacher Age Distribution -->
    <div class="section-card table-card">
      <div class="section-header">
        <div class="section-title">Teacher Age Distribution</div>
      </div>
      <div class="section-body section-body-flush">
        <table class="data-table">
          <thead><tr><th>Age Group</th><th>Count</th></tr></thead>
          <tbody>
            @foreach(['18–20','21–24','25–29','30–34','35–39','40–44','45–49','50–54','55–59','60 and above'] as $group)
            <tr><td>{{ $group }}</td><td>0</td></tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- Ethnic Distribution -->
    <div class="section-card table-card">
      <div class="section-header">
        <div class="section-title">Teachers Ethnic Distribution</div>
      </div>
      <div class="section-body section-body-flush">
        <table class="data-table">
          <thead><tr><th>Ethnicity</th><th>Count</th></tr></thead>
          <tbody>
            @forelse($ethnicities as $group)
            <tr><td>{{ $group->name }}</td><td>0</td></tr>
            @empty
            <tr><td colspan="2"><div class="empty-state">No ethnicity data available</div></td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<!-- ════════ CHART.JS ════════ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.js-width').forEach(function (el) {
      const raw = Number(el.dataset.width || 0);
      const width = Math.max(0, Math.min(100, raw));
      el.style.width = width + '%';
    });

    setTimeout(function () {
      // Registration Progress Chart
      const regCtx = document.getElementById('registrationChart');
      if (regCtx) {
        new Chart(regCtx, {
          type: 'line',
          data: {
            labels: ['Day 1','Day 2','Day 3','Day 4','Day 5','Day 6','Day 7','Day 8','Day 9','Day 10','Day 11','Day 12','Day 13','Day 14'],
            datasets: [
              {
                label: 'Teachers Registered',
                data: [3,9,11,10,14,15,19,20,23,25,28,30,33,40],
                borderColor: '#60a5fa',
                backgroundColor: 'rgba(96,165,250,0.08)',
                borderWidth: 2, fill: true, tension: 0.4,
              },
              {
                label: 'Learners Registered',
                data: [10,13,19,20,25,27,30,40,45,50,54,60,65,70],
                borderColor: '#f472b6',
                backgroundColor: 'rgba(244,114,182,0.08)',
                borderWidth: 2, fill: true, tension: 0.4,
              }
            ]
          },
          options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
              x: { grid: { color: '#f1f5f9' }, ticks: { color: '#94a3b8', font: { size: 11 } } },
              y: { grid: { color: '#f1f5f9' }, ticks: { color: '#94a3b8', font: { size: 11 } }, beginAtZero: true }
            }
          }
        });
      }

      // Age Distribution Chart
      const ageCtx = document.getElementById('ageDistChart');
      if (ageCtx) {
        new Chart(ageCtx, {
          type: 'bar',
          data: {
            labels: ['Under 3','4 Years','5 Years','6 Years','7 Years','8 Years','9 Years','10 Years','10+'],
            datasets: [
              { label: 'Male', data: [5,10,14,20,17,13,11,8,4], backgroundColor: 'rgba(96,165,250,0.75)', borderRadius: 4 },
              { label: 'Female', data: [6,11,17,21,19,15,12,9,4], backgroundColor: 'rgba(244,114,182,0.75)', borderRadius: 4 }
            ]
          },
          options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
              x: { grid: { display: false }, ticks: { color: '#94a3b8', font: { size: 11 } } },
              y: { grid: { color: '#f1f5f9' }, ticks: { color: '#94a3b8', font: { size: 11 } }, beginAtZero: true }
            }
          }
        });
      }
    }, 150);
  });
</script>

@else

<div class="welcome-msg">Welcome back, <span>{{ auth()->user()->first_name }}</span> 👋</div>

<div class="quick-cards">
  <a href="#" class="quick-card">
    <div class="quick-card-icon account"><i class="bi bi-person icon-account"></i></div>
    <h6 class="quick-card-title">My Account</h6>
    <p class="quick-card-desc">Manage your info.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon password"><i class="bi bi-lock icon-password"></i></div>
    <h6 class="quick-card-title">Password</h6>
    <p class="quick-card-desc">Change password.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon details"><i class="bi bi-file-earmark-text icon-details"></i></div>
    <h6 class="quick-card-title">My Details</h6>
    <p class="quick-card-desc">Personal profile.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon logout"><i class="bi bi-box-arrow-right icon-logout"></i></div>
    <h6 class="quick-card-title">Logout</h6>
    <p class="quick-card-desc">Sign out.</p>
  </a>
</div>

@endif

@endsection
