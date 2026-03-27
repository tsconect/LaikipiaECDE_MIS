@extends('admin.app')

@section('content')

<style>
/* ══ STAT CARDS ══ */
.stats-grid-4 { display: grid; grid-template-columns: repeat(4, minmax(0,1fr)); gap: 14px; margin-bottom: 22px; }
.stats-grid-3 { display: grid; grid-template-columns: repeat(3, minmax(0,1fr)); gap: 14px; margin-bottom: 22px; }
.stats-grid-2 { display: grid; grid-template-columns: repeat(2, minmax(0,1fr)); gap: 14px; margin-bottom: 22px; }

@media (max-width: 1200px) {
  .stats-grid-4 { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 800px) {
  .stats-grid-4, .stats-grid-3, .stats-grid-2 { grid-template-columns: 1fr; }
}

.stat-card {
  background: #fff;
  border-radius: 14px;
  padding: 18px 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 1px 3px rgba(0,0,0,0.07);
  position: relative;
  overflow: hidden;
  transition: box-shadow 0.2s, transform 0.2s;
  animation: fadeUp 0.4s ease both;
}
.stat-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.08); transform: translateY(-1px); }

.stat-card::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px; }
.stat-card.c-blue::after { background: #3b82f6; }
.stat-card.c-green::after { background: #22c55e; }
.stat-card.c-pink::after { background: #ec4899; }
.stat-card.c-amber::after { background: #f59e0b; }
.stat-card.c-red::after { background: #ef4444; }
.stat-card.c-teal::after { background: #14b8a6; }
.stat-card.c-violet::after { background: #7c3aed; }
.stat-card.c-indigo::after { background: #4f46e5; }
.stat-card.c-sky::after { background: #0284c7; }

.stat-label { font-size: 11.5px; color: #94a3b8; font-weight: 600; letter-spacing: 0.02em; margin-bottom: 10px; text-transform: uppercase; }
.stat-value { font-size: 32px; font-weight: 700; color: #0f172a; line-height: 1; margin-bottom: 8px; font-family: 'DM Mono', monospace; }
.stat-badge { display: inline-flex; align-items: center; gap: 3px; font-size: 11px; font-weight: 600; padding: 3px 8px; border-radius: 20px; }
.stat-badge.up { background: #f0fdf4; color: #16a34a; }
.stat-badge.down { background: #fef2f2; color: #dc2626; }

.stat-icon {
  position: absolute; top: 16px; right: 16px;
  width: 36px; height: 36px; border-radius: 9px;
  display: flex; align-items: center; justify-content: center;
}
.stat-icon svg { width: 20px; height: 20px; }
.stat-card.c-blue .stat-icon { background: #eff6ff; color: #3b82f6; }
.stat-card.c-green .stat-icon { background: #f0fdf4; color: #22c55e; }
.stat-card.c-pink .stat-icon { background: #fdf2f8; color: #ec4899; }
.stat-card.c-amber .stat-icon { background: #fffbeb; color: #f59e0b; }
.stat-card.c-red .stat-icon { background: #fef2f2; color: #ef4444; }
.stat-card.c-indigo .stat-icon { background: #eef2ff; color: #4f46e5; }
.stat-card.c-violet .stat-icon { background: #f5f3ff; color: #7c3aed; }
.stat-card.c-sky .stat-icon { background: #f0f9ff; color: #0284c7; }

/* ══ SPLIT STAT ══ */
.split-stat { display: flex; gap: 0; margin-top: 6px; }
.split-half { flex: 1; }
.split-half + .split-half { border-left: 1px solid #e2e8f0; padding-left: 14px; margin-left: 2px; }
.split-label { font-size: 10.5px; color: #94a3b8; font-weight: 500; letter-spacing: 0.04em; margin-bottom: 3px; }
.split-value { font-size: 22px; font-weight: 700; color: #0f172a; font-family: 'DM Mono', monospace; line-height: 1; }
.split-value.f { color: #ec4899; }
.split-value.m { color: #3b82f6; }
.split-value.pwd { color: #7c3aed; }

/* ══ RATIO / ATTENDANCE ══ */
.ratio-display { display: flex; align-items: baseline; gap: 6px; margin: 6px 0 8px; }
.ratio-main { font-size: 28px; font-weight: 700; color: #0f172a; font-family: 'DM Mono', monospace; }
.ratio-sub { font-size: 13px; color: #94a3b8; }
.ratio-bar { height: 6px; background: #e2e8f0; border-radius: 6px; overflow: hidden; margin-top: 4px; }
.ratio-fill { height: 100%; background: #22c55e; border-radius: 6px; }

.attend-row { display: flex; align-items: center; justify-content: space-between; margin-top: 4px; }
.attend-big { font-size: 28px; font-weight: 700; color: #0f172a; font-family: 'DM Mono', monospace; }
.attend-pct { font-size: 11px; font-weight: 600; padding: 3px 9px; border-radius: 20px; }
.attend-pct.present { background: #f0fdf4; color: #16a34a; }
.attend-pct.absent { background: #fef2f2; color: #dc2626; }
.attend-bar { height: 5px; background: #e2e8f0; border-radius: 6px; overflow: hidden; margin-top: 10px; }
.attend-fill { height: 100%; border-radius: 6px; }

/* ══ INFRA ══ */
.infra-list { display: flex; flex-direction: column; gap: 7px; margin-top: 6px; }
.infra-row { display: flex; align-items: center; gap: 8px; font-size: 12px; }
.infra-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; }
.infra-name { flex: 1; color: #475569; }
.infra-count { font-weight: 700; color: #0f172a; font-family: 'DM Mono', monospace; font-size: 13px; }

/* ══ PANELS ══ */
.section-card { background: #fff; border-radius: 14px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.07); margin-bottom: 22px; }
.section-header { padding: 18px 22px 14px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; }
.section-title { font-size: 14px; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px; }
.section-title::before { content: ''; width: 3px; height: 16px; background: #22c55e; border-radius: 3px; display: block; }
.section-body { padding: 20px 22px; }

/* ══ TABLES ══ */
.data-table { width: 100%; border-collapse: collapse; font-size: 13px; }
.data-table th { text-align: left; padding: 12px 16px; font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid #e2e8f0; background: #f8fafc; }
.data-table td { padding: 12px 16px; color: #475569; border-bottom: 1px solid #f1f5f9; }
.data-table tbody tr:hover td { background: #f8fafc; }

.empty-state { text-align: center; padding: 32px 20px; color: #94a3b8; font-size: 13px; }
.empty-state svg { width: 36px; height: 36px; opacity: 0.3; margin: 0 auto 10px; display: block; }

@keyframes fadeUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
</style>

@if(Auth::user()->role == 'Admin')

<div class="dash-content">

  <!-- ══ ROW 1: Core counts (4 cards) ══ -->
  <div class="stats-grid-4">
    <!-- Total ECDE Centres -->
    <div class="stat-card c-blue">
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/></svg></div>
      <div class="stat-label">Total ECDE Centres Registered</div>
      <div class="stat-value">{{ number_format($schoolsCount ?? 0) }}</div>
      <span class="stat-badge up" style="background:#eff6ff;color:#1d4ed8;">— centres</span>
    </div>

    <!-- Total Learners Enrolled -->
    <div class="stat-card c-green">
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/></svg></div>
      <div class="stat-label">Total ECDE Learners Enrolled</div>
      <div class="stat-value">{{ number_format($studentsCount ?? 0) }}</div>
      <span class="stat-badge up" style="background:#f0fdf4;color:#16a34a;">— enrolled</span>
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
      <div class="ratio-bar"><div class="ratio-fill" style="width:{{ min(100, $ratio * 2) }}%"></div></div>
    </div>

    <!-- Absenteeism % -->
    <div class="stat-card c-red">
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"/></svg></div>
      <div class="stat-label">Absenteeism Rate</div>
      <div class="attend-row">
        @php
            $total_attendance = $present_today + $absent_today;
            $absent_pct = ($total_attendance > 0) ? round(($absent_today / $total_attendance) * 100) : 0;
        @endphp
        <span class="attend-big">{{ $absent_pct }}%</span>
        <span class="attend-pct absent">{{ $absent_today }} absent</span>
      </div>
      <div class="attend-bar"><div class="attend-fill" style="width:{{ $absent_pct }}%; background:#ef4444;"></div></div>
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
      <div class="attend-bar"><div class="attend-fill" style="width:{{ $present_pct }}%; background:#22c55e;"></div></div>
    </div>

    <!-- Infrastructure Distribution -->
    <div class="stat-card c-amber">
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h4v-4h2v4h4a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg></div>
      <div class="stat-label">Infrastructure Distribution</div>
      <div class="infra-list">
        <div class="infra-row"><div class="infra-dot" style="background:#22c55e"></div><span class="infra-name">Permanent</span><span class="infra-count">{{ number_format($infra_permanent ?? 0) }}</span></div>
        <div class="infra-row"><div class="infra-dot" style="background:#f59e0b"></div><span class="infra-name">Semi-Permanent</span><span class="infra-count">{{ number_format($infra_semi ?? 0) }}</span></div>
        <div class="infra-row"><div class="infra-dot" style="background:#ef4444"></div><span class="infra-name">Temporary</span><span class="infra-count">{{ number_format($infra_temp ?? 0) }}</span></div>
        <div class="infra-row"><div class="infra-dot" style="background:#94a3b8"></div><span class="infra-name">Other / Open Air</span><span class="infra-count">{{ number_format($infra_other ?? 0) }}</span></div>
      </div>
    </div>
  </div>

  <!-- ── Registration Progress Chart ── -->
  <div class="section-card">
    <div class="section-header">
      <div class="section-title">Learner-Teacher Registration Progress</div>
    </div>
    <div class="section-body">
      <div class="chart-legend">
        <div class="legend-item"><div class="legend-dot" style="background:#60a5fa"></div>Teachers Registered</div>
        <div class="legend-item"><div class="legend-dot" style="background:#f472b6"></div>Learners Registered</div>
      </div>
      <div class="chart-wrap" style="height: 240px;">
        <canvas id="registrationChart"></canvas>
      </div>
    </div>
  </div>

  <!-- ── Learner Age Distribution Chart ── -->
  <div class="section-card">
    <div class="section-header">
      <div class="section-title">Learner Age Distribution</div>
    </div>
    <div class="section-body">
      <div class="chart-legend">
        <div class="legend-item"><div class="legend-dot" style="background:#60a5fa"></div>Male</div>
        <div class="legend-item"><div class="legend-dot" style="background:#f472b6"></div>Female</div>
      </div>
      <div class="chart-wrap" style="height: 240px;">
        <canvas id="ageDistChart"></canvas>
      </div>
    </div>
  </div>

  <!-- ── Retiring Teachers Table ── -->
  <div class="section-card">
    <div class="section-header">
      <div class="section-title">Retiring Teachers</div>
    </div>
    <div class="section-body" style="padding:0">
      <table class="data-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>School</th>
            <th>Age</th>
            <th>Retires In</th>
          </tr>
        </thead>
        <tbody>
          @forelse($retiring_teachers as $teacher)
          <tr>
            <td style="font-weight:600;">{{ $teacher->user->first_name ?? '' }} {{ $teacher->user->last_name ?? '' }}</td>
            <td>{{ $teacher->school->school_name ?? '-' }}</td>
            <td>{{ \Carbon\Carbon::parse($teacher->dob)->age }} yrs</td>
            <td>{{ $teacher->retirement_date->diffForHumans() }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="4">
              <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                No retiring teachers at this time
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  </div>{{-- /charts-row --}}


  <!-- ── Distribution Tables ── -->
  <div class="stats-grid-2">
    <!-- Teacher Age Distribution -->
    <div class="section-card">
      <div class="section-header">
        <div class="section-title">Teacher Age Distribution</div>
      </div>
      <div class="section-body" style="padding:0">
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
    <div class="section-card">
      <div class="section-header">
        <div class="section-title">Teachers Ethnic Distribution</div>
      </div>
      <div class="section-body" style="padding:0">
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
  </div>{{-- /tables-row --}}

  <!-- ════════ RETIRING TEACHERS ════════ -->
  <div class="panel" style="animation-delay:0.2s">
    <div class="panel-hd">
      <div class="panel-title">
        <span class="panel-title-dot" style="background:linear-gradient(180deg,#f59e0b,#fbbf24)"></span>
        Retiring Teachers
      </div>
      <span class="panel-badge" style="background:#fffbeb;color:#b45309">In 5 Years</span>
    </div>
    <div class="panel-body-flush">
      <table class="data-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>School</th>
            <th>Age</th>
            <th style="text-align:right">Retires In</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @if($retiring_teachers->count() > 0)
              @foreach($retiring_teachers as $teacher)
              <tr>

              
                <td>{{ $teacher->user->first_name ?? '' }} {{ $teacher->user->middle_name ?? '' }} {{ $teacher->user->last_name ?? 'Teacher Name' }}</td>
                <td>{{ $teacher->school->school_name??'-' }}</td>
                <td>{{Carbon\Carbon::parse($teacher->dob)->age}} years</td>
                <td style="text-align:right">{{ $teacher->retirement_date->diffForHumans() }}</td>
              </tr>
              @endforeach
            @else
            <td colspan="4">
              <div class="empty-state">
                <div class="empty-state-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
                  </svg>
                </div>
                No retiring teachers at this time
                <p>Teachers nearing retirement age will appear here.</p>
              </div>
            </td>
            @endif
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>{{-- /dash-wrap --}}

<!-- ════════ CHART.JS ════════ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
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

<style>
  .welcome-msg { font-size: 22px; font-weight: 700; color: #1e2d40; margin-bottom: 22px; }
  .welcome-msg span { color: #22c55e; }
  .quick-cards { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
  @media (max-width: 860px) { .quick-cards { grid-template-columns: repeat(2, 1fr); } }
  @media (max-width: 480px) { .quick-cards { grid-template-columns: 1fr; } }
  .quick-card { background: #fff; border-radius: 16px; border: 1px solid #e8edf4; padding: 24px; text-align: center; text-decoration: none; color: inherit; transition: transform 0.2s, box-shadow 0.2s; box-shadow: 0 1px 4px rgba(0,0,0,0.06); }
  .quick-card:hover { transform: translateY(-4px); box-shadow: 0 8px 28px rgba(0,0,0,0.1); text-decoration: none; }
  .quick-card-icon { width: 54px; height: 54px; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; font-size: 24px; }
</style>

<div class="welcome-msg">Welcome back, <span>{{ auth()->user()->first_name }}</span> 👋</div>

<div class="quick-cards">
  <a href="#" class="quick-card">
    <div class="quick-card-icon" style="background:#eff6ff;"><i class="bi bi-person" style="color:#3b82f6"></i></div>
    <h6 style="font-weight:700;">My Account</h6>
    <p style="font-size:12px; color:#64748b;">Manage your info.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon" style="background:#f0fdf4;"><i class="bi bi-lock" style="color:#22c55e"></i></div>
    <h6 style="font-weight:700;">Password</h6>
    <p style="font-size:12px; color:#64748b;">Change password.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon" style="background:#fdf4ff;"><i class="bi bi-file-earmark-text" style="color:#a855f7"></i></div>
    <h6 style="font-weight:700;">My Details</h6>
    <p style="font-size:12px; color:#64748b;">Personal profile.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon" style="background:#fff1f2;"><i class="bi bi-box-arrow-right" style="color:#ef4444"></i></div>
    <h6 style="font-weight:700;">Logout</h6>
    <p style="font-size:12px; color:#64748b;">Sign out.</p>
  </a>
</div>

@endif

@endsection
