@extends('admin.app')

@section('content')

@if(Auth::user()->role == 'Admin')

@php
  $total_attendance = (($present_today ?? 0) + ($absent_today ?? 0));
  $present_pct = ($total_attendance > 0) ? round((($present_today ?? 0) / $total_attendance) * 100) : 0;
@endphp

<div class="dash-content"
  data-male-series='@json($maleData)'
  data-female-series='@json($femaleData)'
  data-teachers-series='@json($teachers)'
  data-learners-series='@json($learners)'
  data-learner-female="{{ (int)($learner_female ?? 0) }}"
  data-learner-male="{{ (int)($learner_male ?? 0) }}"
  data-teacher-female="{{ (int)($teacher_female ?? 0) }}"
  data-teacher-male="{{ (int)($teacher_male ?? 0) }}"
  data-pwd-teachers="{{ (int)($pwd_teachers ?? 0) }}"
  data-pwd-learners="{{ (int)($pwd_learners ?? 0) }}"
  data-present-today="{{ (int)($present_today ?? 0) }}"
  data-absent-today="{{ (int)($absent_today ?? 0) }}"
  data-present-pct="{{ (int)($present_pct ?? 0) }}"
  data-infra-permanent="{{ (int)($infra_permanent ?? 0) }}"
  data-infra-semi="{{ (int)($infra_semi ?? 0) }}"
  data-infra-temp="{{ (int)($infra_temp ?? 0) }}"
  data-infra-other="{{ (int)($infra_other ?? 0) }}"
  data-teacher-age-labels='@json(array_keys($teacherAgeCounts ?? []))'
  data-teacher-age-series='@json(array_values($teacherAgeCounts ?? []))'>

  <!-- ══ ROW 1: Core counts (4 cards) ══ -->
  <div class="stats-grid-4 bento-row grid-cols-1 md-grid-cols-12 gap-6">
    <!-- Total ECDE Centres -->
    <div class="stat-card c-blue bento-col-3">
      <div class="stat-icon"><i class="bi bi-building"></i></div>
      <div class="stat-label">Total ECDE Centres Registered</div>
      <div class="stat-value">{{ number_format($schoolsCount ?? 0) }}</div>
      <span class="stat-badge up centres">— centres</span>
    </div>

    <!-- Total Learners Enrolled -->
    <div class="stat-card c-green bento-col-3">
      <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
      <div class="stat-label">Total ECDE Learners Enrolled</div>
      <div class="stat-value">{{ number_format($studentsCount ?? 0) }}</div>
      <span class="stat-badge up enrolled">— enrolled</span>
    </div>

    <!-- Learner-Teacher Ratio -->
    <div class="stat-card c-indigo bento-col-3">
      <div class="stat-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/></svg></div>
      <div class="stat-label">Teacher-Learner Ratio</div>
      <div class="ratio-display">
       @php
    $ratio = ($teachersCount > 0) ? number_format($studentsCount / $teachersCount, 1) : '0.0';
@endphp
<span class="ratio-main">1:{{ $ratio }}</span>
        <span class="ratio-sub">per teacher</span>
      </div>
      <div class="ratio-bar"><div class="ratio-fill js-width" data-width="{{ min(100, $ratio * 2) }}"></div></div>
    </div>

    <!-- Absenteeism % -->
    <div class="stat-card c-red bento-col-3">
      <div class="stat-icon"><i class="bi bi-person-x-fill"></i></div>
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
  <div class="stats-grid-3 bento-row grid-cols-1 md-grid-cols-12 gap-6">
    <!-- Gender Distribution — Learners -->
    <div class="section-card table-card bento-col-4">
      <div class="section-header">
        <div class="section-title">Gender Distribution — Learners</div>
      </div>
      <div class="section-body">
        <div class="chart-wrap chart-wrap-200">
          <canvas id="learnerGenderChart"></canvas>
        </div>
      </div>
    </div>

    <!-- Total Teachers F/M -->
    <div class="section-card table-card bento-col-4">
      <div class="section-header">
        <div class="section-title">Total Teachers — F / M</div>
      </div>
      <div class="section-body">
        <div class="chart-wrap chart-wrap-200">
          <canvas id="teacherGenderChart"></canvas>
        </div>
      </div>
    </div>

    <!-- PWD Teachers & Learners -->
    <div class="section-card table-card bento-col-4">
      <div class="section-header">
        <div class="section-title">PWD — Teachers / Learners</div>
      </div>
      <div class="section-body">
        <div class="chart-wrap chart-wrap-200">
          <canvas id="pwdChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- ══ ROW 3: Attendance today + Infrastructure (2 cards) ══ -->
  <div class="stats-grid-2 bento-row grid-cols-1 md-grid-cols-12 gap-6">
    <!-- Total Learners Present Today -->
    <div class="section-card table-card bento-col-6">
      <div class="section-header">
        <div class="section-title">Total Learners Present — Today</div>
        <span class="panel-badge retiring">{{ $present_pct ?? 0 }}% present</span>
      </div>
      <div class="section-body">
        <div class="chart-wrap chart-wrap-200">
          <canvas id="presentGaugeChart"></canvas>
        </div>
      </div>
    </div>

    <!-- Infrastructure Distribution -->
    <div class="section-card table-card bento-col-6">
      <div class="section-header">
        <div class="section-title">Infrastructure Distribution</div>
      </div>
      <div class="section-body">
        <div class="chart-wrap chart-wrap-240">
          <canvas id="infraChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="chart-grid-2 bento-row grid-cols-1 md-grid-cols-12 gap-6">
    <!-- ── Registration Progress Chart ── -->
    <div class="section-card table-card bento-col-6">
      <div class="section-header">
        <div class="section-title">Learner-Teacher Registration Trend (Last 14 Days)</div>
      </div>
      <div class="section-body">
        <div class="chart-legend">
          <div class="legend-item"><div class="legend-dot teachers"></div>Teachers Registered (Daily)</div>
          <div class="legend-item"><div class="legend-dot learners"></div>Learners Registered (Daily)</div>
        </div>
        <div class="chart-wrap chart-wrap-240">
          <canvas id="registrationChart"></canvas>
        </div>
      </div>
    </div>

    <!-- ── Learner Age Distribution Chart ── -->
    <div class="section-card table-card bento-col-6">
      <div class="section-header">
        <div class="section-title">Learner Age Distribution by Gender</div>
      </div>
      <div class="section-body">
        <div class="chart-legend">
          <div class="legend-item"><div class="legend-dot male"></div>Male Learners</div>
          <div class="legend-item"><div class="legend-dot female"></div>Female Learners</div>
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

  <!-- ── Distribution Tables ── -->
  <div class="stats-grid-2 bento-row grid-cols-1 md-grid-cols-12 gap-6">
    <!-- Teacher Age Distribution -->
    <div class="section-card table-card compact-age-card bento-col-6">
      <div class="section-header">
        <div class="section-title">Teacher Age Distribution</div>
      </div>
      <div class="section-body">
        <div class="chart-wrap chart-wrap-280">
          <canvas id="teacherAgeChart"></canvas>
        </div>
      </div>
    </div>
    <!-- Ethnic Distribution -->
  <div class="section-card table-card compact-ethnic-card bento-col-6">
  <div class="section-header">
    <div class="section-title">Teachers Ethnic Distribution</div>
  </div>
  <div class="section-body section-body-flush p-3">
    <div class="table-scroll-compact">
    <table class="data-table">
      <thead>
        <tr>
          <th>Ethnicity</th>
          <th>Count</th>
        </tr>
      </thead>
      <tbody>
        @forelse($ethnicities as $group)
        <tr>
          <td>{{ $group->name }}</td>
          <td>{{ $teacherEthnicityCounts[$group->id] ?? 0 }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="2">
            <div class="empty-state">No ethnicity data available</div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
    </div>
  </div>
</div>
  </div>

</div>

<!-- ════════ CHART.JS ════════ -->
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
      const dashData = document.querySelector('.dash-content');
      const maleData = JSON.parse((dashData && dashData.dataset.maleSeries) || '[]');
      const femaleData = JSON.parse((dashData && dashData.dataset.femaleSeries) || '[]');

      const rootStyles = getComputedStyle(document.documentElement);
      const getCssVar = function (name, fallback) {
        const value = rootStyles.getPropertyValue(name).trim();
        return value || fallback;
      };

      const chartTheme = {
        borderColor: getCssVar('--bs-border-color', '#dbdade'),
        paperBg: getCssVar('--bs-paper-bg', '#ffffff'),
        headingColor: getCssVar('--bs-heading-color', '#43474e'),
        mutedColor: getCssVar('--bs-muted-color', '#a1acb8'),
        softGrid: getCssVar('--bs-soft-grid', '#eceef1'),
        fontFamily: getCssVar('--bs-body-font-family', 'Public Sans, sans-serif')
      };

      const sharedTooltip = {
        backgroundColor: chartTheme.paperBg,
        titleColor: chartTheme.headingColor,
        bodyColor: chartTheme.headingColor,
        borderColor: chartTheme.borderColor,
        borderWidth: 1,
        titleFont: { family: chartTheme.fontFamily, size: 12, weight: '600' },
        bodyFont: { family: chartTheme.fontFamily, size: 12, weight: '500' },
        padding: 10,
        displayColors: true
      };

      const sharedTickFont = { family: chartTheme.fontFamily, size: 11, weight: '500' };

      const learnerFemale = Number((dashData && dashData.dataset.learnerFemale) || 0);
      const learnerMale = Number((dashData && dashData.dataset.learnerMale) || 0);
      const teacherFemale = Number((dashData && dashData.dataset.teacherFemale) || 0);
      const teacherMale = Number((dashData && dashData.dataset.teacherMale) || 0);
      const pwdTeachers = Number((dashData && dashData.dataset.pwdTeachers) || 0);
      const pwdLearners = Number((dashData && dashData.dataset.pwdLearners) || 0);
      const presentToday = Number((dashData && dashData.dataset.presentToday) || 0);
      const absentToday = Number((dashData && dashData.dataset.absentToday) || 0);
      const presentPct = Number((dashData && dashData.dataset.presentPct) || 0);
      const infraPermanent = Number((dashData && dashData.dataset.infraPermanent) || 0);
      const infraSemi = Number((dashData && dashData.dataset.infraSemi) || 0);
      const infraTemp = Number((dashData && dashData.dataset.infraTemp) || 0);
      const infraOther = Number((dashData && dashData.dataset.infraOther) || 0);
      const teacherAgeLabels = JSON.parse((dashData && dashData.dataset.teacherAgeLabels) || '[]');
      const teacherAgeSeries = JSON.parse((dashData && dashData.dataset.teacherAgeSeries) || '[]');

      function createDoughnutChart(canvasId, labels, values, colors) {
        const chartEl = document.getElementById(canvasId);
        if (!chartEl) return;

        new Chart(chartEl, {
          type: 'doughnut',
          data: {
            labels: labels,
            datasets: [{
              data: values,
              backgroundColor: colors,
              borderColor: chartTheme.paperBg,
              borderWidth: 2,
              hoverOffset: 6
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '62%',
            plugins: {
              tooltip: sharedTooltip,
              legend: {
                position: 'bottom',
                labels: {
                  color: chartTheme.headingColor,
                  font: { family: chartTheme.fontFamily, size: 11, weight: '500' },
                  boxWidth: 12,
                  boxHeight: 12,
                  usePointStyle: true,
                  pointStyle: 'circle'
                }
              }
            }
          }
        });
      }

      createDoughnutChart(
        'learnerGenderChart',
        ['Female (F)', 'Male (M)'],
        [learnerFemale, learnerMale],
        ['#f472b6', '#60a5fa']
      );

      createDoughnutChart(
        'teacherGenderChart',
        ['Female (F)', 'Male (M)'],
        [teacherFemale, teacherMale],
        ['#ec4899', '#0284c7']
      );

      createDoughnutChart(
        'pwdChart',
        ['Teachers', 'Learners'],
        [pwdTeachers, pwdLearners],
        ['#7c3aed', '#22c55e']
      );

      const presentGaugeCtx = document.getElementById('presentGaugeChart');
      if (presentGaugeCtx) {
        new Chart(presentGaugeCtx, {
          type: 'doughnut',
          data: {
            labels: ['Present', 'Absent'],
            datasets: [{
              data: [presentToday, absentToday],
              backgroundColor: ['#22c55e', '#e2e8f0'],
              borderColor: chartTheme.paperBg,
              borderWidth: 2,
              hoverOffset: 4
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            // Chart.js expects radians for doughnut geometry.
            rotation: -Math.PI,
            circumference: Math.PI,
            cutout: '78%',
            layout: {
              padding: { top: 8, right: 16, bottom: 0, left: 16 }
            },
            plugins: {
              legend: {
                display: false
              },
              tooltip: sharedTooltip
            }
          },
          plugins: [{
            id: 'centerText',
            afterDraw(chart) {
              const { ctx, chartArea } = chart;
              if (!chartArea) return;
              const value = presentPct;
              ctx.save();
              ctx.textAlign = 'center';
              ctx.textBaseline = 'middle';
              ctx.fillStyle = chartTheme.headingColor;
              ctx.font = `700 28px ${chartTheme.fontFamily}`;
              ctx.fillText(`${value}%`, (chartArea.left + chartArea.right) / 2, chartArea.top + (chartArea.height * 0.64));
              ctx.fillStyle = chartTheme.mutedColor;
              ctx.font = `500 12px ${chartTheme.fontFamily}`;
              ctx.fillText('present today', (chartArea.left + chartArea.right) / 2, chartArea.top + (chartArea.height * 0.78));
              ctx.restore();
            }
          }]
        });
      }

      const infraCtx = document.getElementById('infraChart');
      if (infraCtx) {
        const infraLabels = ['Permanent', 'Semi-Permanent', 'Temporary', 'Other / Open Air'];
        const infraValues = [infraPermanent, infraSemi, infraTemp, infraOther];
        const infraColors = ['#22c55e', '#f59e0b', '#ef4444', '#94a3b8'];
        const infraTotal = infraValues.reduce((sum, item) => sum + Number(item || 0), 0);
        const infraDisplayValues = infraTotal === 0 ? [1, 1, 1, 1] : infraValues;

        new Chart(infraCtx, {
          type: 'polarArea',
          data: {
            labels: infraLabels,
            datasets: [{
              label: 'Infrastructure Distribution',
              data: infraDisplayValues,
              backgroundColor: infraColors,
              borderColor: chartTheme.paperBg,
              borderWidth: 2
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              r: {
                grid: { color: chartTheme.softGrid },
                angleLines: { color: chartTheme.softGrid },
                ticks: { display: false }
              }
            },
            plugins: {
              legend: {
                display: true,
                position: 'bottom',
                labels: {
                  color: chartTheme.headingColor,
                  font: { family: chartTheme.fontFamily, size: 11, weight: '500' },
                  usePointStyle: true,
                  pointStyle: 'circle'
                }
              },
              tooltip: {
                ...sharedTooltip,
                callbacks: {
                  label(context) {
                    const idx = context.dataIndex;
                    const label = infraLabels[idx] || 'Category';
                    const value = infraValues[idx] ?? 0;
                    return `${label}: ${value}`;
                  }
                }
              }
            }
          }
        });
      }

      const teacherAgeCtx = document.getElementById('teacherAgeChart');
      if (teacherAgeCtx) {
        new Chart(teacherAgeCtx, {
          type: 'bar',
          data: {
            labels: teacherAgeLabels,
            datasets: [{
              label: 'Teachers',
              data: teacherAgeSeries,
              backgroundColor: 'rgba(99, 102, 241, 0.78)',
              borderRadius: 4,
              maxBarThickness: 24
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: { display: false },
              tooltip: sharedTooltip
            },
            scales: {
              x: {
                grid: { display: false },
                ticks: {
                  color: chartTheme.mutedColor,
                  font: { family: chartTheme.fontFamily, size: 10, weight: '500' },
                  maxRotation: 45,
                  minRotation: 45
                }
              },
              y: {
                grid: { color: chartTheme.softGrid },
                ticks: { color: chartTheme.mutedColor, font: sharedTickFont },
                beginAtZero: true
              }
            }
          }
        });
      }

    if (regCtx) {
        const teachersData = JSON.parse((dashData && dashData.dataset.teachersSeries) || '[]');
        const learnersData = JSON.parse((dashData && dashData.dataset.learnersSeries) || '[]');

        new Chart(regCtx, {
            type: 'line',
            data: {
                labels: [
                    'Day 1','Day 2','Day 3','Day 4','Day 5','Day 6','Day 7',
                    'Day 8','Day 9','Day 10','Day 11','Day 12','Day 13','Day 14'
                ],
                datasets: [
                    {
                        label: 'Teachers Registered',
                        data: teachersData,
                        borderColor: '#60a5fa',
                        backgroundColor: 'rgba(96,165,250,0.08)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                    },
                    {
                        label: 'Learners Registered',
                        data: learnersData,
                        borderColor: '#f472b6',
                        backgroundColor: 'rgba(244,114,182,0.08)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
              plugins: {
                legend: { display: false },
                tooltip: sharedTooltip
              },
                scales: {
                    x: {
                  grid: { color: chartTheme.softGrid },
                  ticks: { color: chartTheme.mutedColor, font: sharedTickFont }
                    },
                    y: {
                  grid: { color: chartTheme.softGrid },
                  ticks: { color: chartTheme.mutedColor, font: sharedTickFont },
                        beginAtZero: true
                    }
                }
            }
        });
    }
    const ageCtx = document.getElementById('ageDistChart');

if (ageCtx) {
    new Chart(ageCtx, {
        type: 'bar',
        data: {
            labels: ['Under 3','4 Years','5 Years','6 Years','7 Years','8 Years','9 Years','10 Years','10+'],
            datasets: [
                {
                    label: 'Male',
                    data: maleData,
                    backgroundColor: 'rgba(96,165,250,0.75)',
                    borderRadius: 4
                },
                {
                    label: 'Female',
                    data: femaleData,
                    backgroundColor: 'rgba(244,114,182,0.75)',
                    borderRadius: 4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
          plugins: {
            legend: { display: false },
            tooltip: sharedTooltip
          },
            scales: {
                x: {
                    grid: { display: false },
              ticks: { color: chartTheme.mutedColor, font: sharedTickFont }
                },
                y: {
              grid: { color: chartTheme.softGrid },
              ticks: { color: chartTheme.mutedColor, font: sharedTickFont },
                    beginAtZero: true
                }
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
    <div class="quick-card-icon account"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20v-2a8 8 0 0116 0v2"/></svg></div>
    <h6 class="quick-card-title">My Account</h6>
    <p class="quick-card-desc">Manage your info.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon password"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><rect x="6" y="10" width="12" height="10" rx="2"/><path d="M9 10V7a3 3 0 016 0v3"/></svg></div>
    <h6 class="quick-card-title">Password</h6>
    <p class="quick-card-desc">Change password.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon details"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 8h8M8 12h8M8 16h8"/></svg></div>
    <h6 class="quick-card-title">My Details</h6>
    <p class="quick-card-desc">Personal profile.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M16 17l5-5-5-5M21 12H9"/><rect x="3" y="5" width="6" height="14" rx="2"/></svg></div>
    <h6 class="quick-card-title">Logout</h6>
    <p class="quick-card-desc">Sign out.</p>
  </a>
</div>

@endif

@endsection