@extends('admin.app')

@section('content')

<style>
  *,
  *::before,
  *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  .dash-wrap {
    --bg: #f0f4f8;
    --surface: #ffffff;
    --accent: #3b6cf4;
    --accent-2: #6e40f9;
    --text-primary: #1e2d40;
    --text-secondary: #4a5568;
    --text-muted: #94a3b8;
    --border: #e8edf4;
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.04);
    --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08), 0 2px 6px rgba(0, 0, 0, 0.04);
    --shadow-hover: 0 8px 28px rgba(59, 108, 244, 0.15), 0 2px 8px rgba(0, 0, 0, 0.06);
    --radius: 16px;
    --radius-sm: 10px;
  }

  /* ═══════════════════════════════════════════
   PAGE WRAPPER
═══════════════════════════════════════════ */
  .dash-wrap {
    padding: 8px 0 32px;
  }

  /* ═══════════════════════════════════════════
   SECTION HEADING
═══════════════════════════════════════════ */
  .dash-section-title {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--text-muted);
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .dash-section-title::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--border);
  }

  /* ═══════════════════════════════════════════
   STAT CARDS GRID
═══════════════════════════════════════════ */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(6, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 14px;
  }

  @media (max-width: 1400px) {
    .stats-grid {
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }
  }

  @media (max-width: 860px) {
    .stats-grid {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }
  }

  @media (max-width: 540px) {
    .stats-grid {
      grid-template-columns: 1fr;
    }
  }

  /* ── Individual Stat Card ── */
  .stat-card {
    background: var(--surface);
    border-radius: var(--radius);
    padding: 20px 18px 16px;
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    position: relative;
    overflow: hidden;
    transition: box-shadow 0.25s ease, transform 0.25s ease;
    cursor: default;
  }

  .stat-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: inherit;
    border-radius: inherit;
    opacity: 0;
    transition: opacity 0.25s;
  }

  .stat-card:hover {
    box-shadow: var(--shadow-hover);
    transform: translateY(-3px);
  }

  /* Colored top accent bar */
  .stat-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    border-radius: var(--radius) var(--radius) 0 0;
  }

  .stat-card.c-blue::after {
    background: linear-gradient(90deg, #3b82f6, #60a5fa);
  }

  .stat-card.c-green::after {
    background: linear-gradient(90deg, #22c55e, #4ade80);
  }

  .stat-card.c-pink::after {
    background: linear-gradient(90deg, #ec4899, #f472b6);
  }

  .stat-card.c-amber::after {
    background: linear-gradient(90deg, #f59e0b, #fbbf24);
  }

  .stat-card.c-red::after {
    background: linear-gradient(90deg, #ef4444, #f87171);
  }

  .stat-card.c-teal::after {
    background: linear-gradient(90deg, #14b8a6, #2dd4bf);
  }

  /* Gradient icon bubble */
  .stat-icon {
    width: 44px;
    height: 44px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 14px;
    flex-shrink: 0;
  }

  .stat-icon svg {
    width: 22px;
    height: 22px;
  }

  .stat-card.c-blue .stat-icon {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
  }

  .stat-card.c-green .stat-icon {
    background: linear-gradient(135deg, #dcfce7, #bbf7d0);
  }

  .stat-card.c-pink .stat-icon {
    background: linear-gradient(135deg, #fce7f3, #fbcfe8);
  }

  .stat-card.c-amber .stat-icon {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
  }

  .stat-card.c-red .stat-icon {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
  }

  .stat-card.c-teal .stat-icon {
    background: linear-gradient(135deg, #ccfbf1, #99f6e4);
  }

  .stat-label {
    font-size: 11.5px;
    font-weight: 600;
    color: var(--text-muted);
    letter-spacing: 0.03em;
    margin-bottom: 4px;
    text-transform: uppercase;
  }

  .stat-value {
    font-size: 34px;
    font-weight: 700;
    color: var(--text-primary);
    line-height: 1;
    margin-bottom: 10px;
    font-variant-numeric: tabular-nums;
    letter-spacing: -0.02em;
  }

  .stat-badge {
    display: inline-flex;
    align-items: center;
    gap: 3px;
    font-size: 11.5px;
    font-weight: 600;
    padding: 4px 9px;
    border-radius: 20px;
  }

  .stat-badge.up {
    background: #dcfce7;
    color: #15803d;
  }

  .stat-badge.down {
    background: #fee2e2;
    color: #b91c1c;
  }

  .stat-badge.high {
    background: #fef3c7;
    color: #92400e;
  }

  /* Watermark number */
  .stat-watermark {
    position: absolute;
    bottom: -8px;
    right: 10px;
    font-size: 60px;
    font-weight: 900;
    color: rgba(0, 0, 0, 0.03);
    line-height: 1;
    pointer-events: none;
    user-select: none;
  }

  /* Animations */
  @keyframes fadeUp {
    from {
      opacity: 0;
      transform: translateY(16px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .stat-card {
    animation: fadeUp 0.45s ease both;
  }

  .stat-card:nth-child(1) {
    animation-delay: 0.04s;
  }

  .stat-card:nth-child(2) {
    animation-delay: 0.09s;
  }

  .stat-card:nth-child(3) {
    animation-delay: 0.14s;
  }

  .stat-card:nth-child(4) {
    animation-delay: 0.19s;
  }

  .stat-card:nth-child(5) {
    animation-delay: 0.24s;
  }

  .stat-card:nth-child(6) {
    animation-delay: 0.29s;
  }

  /* ═══════════════════════════════════════════
   SECTION / PANEL CARDS
═══════════════════════════════════════════ */
  .panel {
    background: var(--surface);
    border-radius: var(--radius);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
    margin-bottom: 18px;
    animation: fadeUp 0.5s ease both;
  }

  .panel-hd {
    padding: 16px 22px;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(135deg, #fafcff 0%, #ffffff 100%);
  }

  .panel-title {
    font-size: 13.5px;
    font-weight: 700;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .panel-title-dot {
    width: 4px;
    height: 18px;
    border-radius: 4px;
    background: linear-gradient(180deg, var(--accent), var(--accent-2));
    flex-shrink: 0;
  }

  .panel-badge {
    font-size: 11px;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 20px;
    background: #eff6ff;
    color: #3b82f6;
  }

  .panel-body {
    padding: 20px 22px;
  }

  .panel-body-flush {
    padding: 0;
  }

  /* ═══════════════════════════════════════════
   CHART LAYOUT
═══════════════════════════════════════════ */
  .charts-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    margin-bottom: 18px;
  }

  @media (max-width: 900px) {
    .charts-row {
      grid-template-columns: 1fr;
    }
  }

  .chart-wrap {
    position: relative;
    width: 100%;
    height: 240px;
  }

  .chart-wrap canvas {
    display: block !important;
  }

  .chart-legend {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 16px;
  }

  .legend-item {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 12.5px;
    font-weight: 500;
    color: var(--text-secondary);
  }

  .legend-dot {
    width: 10px;
    height: 10px;
    border-radius: 3px;
    flex-shrink: 0;
  }

  /* ═══════════════════════════════════════════
   TABLES
═══════════════════════════════════════════ */
  .tables-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    margin-bottom: 18px;
  }

  @media (max-width: 900px) {
    .tables-row {
      grid-template-columns: 1fr;
    }
  }

  .data-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
  }

  .data-table thead tr {
    background: #f8fafc;
  }

  .data-table th {
    text-align: left;
    padding: 11px 16px;
    font-size: 10.5px;
    font-weight: 700;
    color: var(--text-muted);
    letter-spacing: 0.08em;
    text-transform: uppercase;
    border-bottom: 1px solid var(--border);
  }

  .data-table td {
    padding: 11px 16px;
    color: var(--text-secondary);
    border-bottom: 1px solid #f1f5f9;
    font-size: 13px;
  }

  .data-table td:last-child {
    text-align: right;
    font-weight: 600;
    color: var(--text-primary);
  }

  .data-table th:last-child {
    text-align: right;
  }

  .data-table tbody tr:last-child td {
    border-bottom: none;
  }

  .data-table tbody tr:hover td {
    background: #f8fafc;
    transition: background 0.15s;
  }

  /* Count pill in table */
  .count-pill {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 32px;
    padding: 2px 8px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    background: #f1f5f9;
    color: var(--text-primary);
  }

  /* Row accents by position */
  .data-table tbody tr:nth-child(1) .count-pill {
    background: #eff6ff;
    color: #1d4ed8;
  }

  .data-table tbody tr:nth-child(2) .count-pill {
    background: #f0fdf4;
    color: #166534;
  }

  .data-table tbody tr:nth-child(3) .count-pill {
    background: #fdf4ff;
    color: #7e22ce;
  }

  .data-table tbody tr:nth-child(4) .count-pill {
    background: #fff7ed;
    color: #c2410c;
  }

  .data-table tbody tr:nth-child(5) .count-pill {
    background: #fefce8;
    color: #a16207;
  }

  /* Empty state */
  .empty-state {
    text-align: center;
    padding: 36px 20px;
    color: var(--text-muted);
    font-size: 13px;
  }

  .empty-state-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 12px;
  }

  .empty-state-icon svg {
    width: 24px;
    height: 24px;
    opacity: 0.4;
  }

  .empty-state p {
    margin-top: 4px;
    font-size: 12px;
    color: var(--text-muted);
  }

  /* Retiring teachers table - name + school cols */
  .td-name {
    font-weight: 600;
    color: var(--text-primary) !important;
  }

  .td-school {
    font-size: 12px;
  }

  .retire-badge {
    display: inline-block;
    padding: 3px 8px;
    border-radius: 6px;
    font-size: 11.5px;
    font-weight: 600;
    background: #fef3c7;
    color: #92400e;
  }
</style>

@if(Auth::user()->role == 'Admin')

<div class="dash-wrap">

  <!-- ── Section heading ── -->
  <div class="dash-section-title">Overview</div>

  <!-- ════════ STAT CARDS (6 in one row) ════════ -->
  <div class="stats-grid" style="margin-bottom:22px;">

    <!-- ECDE Schools -->
    <div class="stat-card c-blue">
      <div class="stat-watermark">{{ number_format($schoolsCount) }}</div>
      <div class="stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
          <polyline points="9 22 9 12 15 12 15 22" />
        </svg>
      </div>
      <div class="stat-label">ECDE Schools</div>
      <div class="stat-value">{{ number_format($schoolsCount) }}</div>
      <span class="stat-badge up">↑ +14%</span>
    </div>

    <!-- Male Teachers -->
    <div class="stat-card c-green">
      <div class="stat-watermark">{{ number_format($teachersCount) }}</div>
      <div class="stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
          <circle cx="9" cy="7" r="4" />
          <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
        </svg>
      </div>
      <div class="stat-label">Male Teachers</div>
      <div class="stat-value">{{ number_format($teachersCount) }}</div>
      <span class="stat-badge up">↑ +8%</span>
    </div>

    <!-- Female Teachers -->
    <div class="stat-card c-pink">
      <div class="stat-watermark">{{ number_format($teachersCount) }}</div>
      <div class="stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
          <circle cx="12" cy="7" r="4" />
        </svg>
      </div>
      <div class="stat-label">Female Teachers</div>
      <div class="stat-value">{{ number_format($teachersCount) }}</div>
      <span class="stat-badge up">↑ +8%</span>
    </div>

    <!-- Male Learners -->
    <div class="stat-card c-amber">
      <div class="stat-watermark">{{ number_format($studentsCount) }}</div>
      <div class="stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
          <circle cx="9" cy="7" r="4" />
          <line x1="19" y1="8" x2="19" y2="14" />
          <line x1="22" y1="11" x2="16" y2="11" />
        </svg>
      </div>
      <div class="stat-label">Male Learners</div>
      <div class="stat-value">{{ number_format($studentsCount) }}</div>
      <span class="stat-badge down">↓ -15%</span>
    </div>

    <!-- Female Learners -->
    <div class="stat-card c-red">
      <div class="stat-watermark">{{ number_format($studentsCount) }}</div>
      <div class="stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
          <circle cx="12" cy="7" r="4" />
          <line x1="12" y1="15" x2="12" y2="21" />
          <line x1="9" y1="18" x2="15" y2="18" />
        </svg>
      </div>
      <div class="stat-label">Female Learners</div>
      <div class="stat-value">{{ number_format($studentsCount) }}</div>
      <span class="stat-badge down">↓ -15%</span>
    </div>

    <!-- Abled Differently -->
    <div class="stat-card c-teal">
      <div class="stat-watermark">{{ number_format($unionsCount) }}</div>
      <div class="stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#14b8a6" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <circle cx="12" cy="12" r="10" />
          <path d="M8 14s1.5 2 4 2 4-2 4-2" />
          <line x1="9" y1="9" x2="9.01" y2="9" />
          <line x1="15" y1="9" x2="15.01" y2="9" />
        </svg>
      </div>
      <div class="stat-label">Abled Differently</div>
      <div class="stat-value">{{ number_format($unionsCount) }}</div>
      <span class="stat-badge high">↑ +76%</span>
    </div>

  </div>{{-- /stats-grid --}}

  <!-- ════════ CHARTS ROW ════════ -->
  <div class="dash-section-title">Analytics</div>

  <div class="charts-row">

    <!-- Learner-Teacher Registration Progress -->
    <div class="panel" style="animation-delay:0.1s">
      <div class="panel-hd">
        <div class="panel-title">
          <span class="panel-title-dot"></span>
          Learner-Teacher Registration Progress
        </div>
        <span class="panel-badge">14 Days</span>
      </div>
      <div class="panel-body">
        <div class="chart-legend">
          <div class="legend-item">
            <div class="legend-dot" style="background:linear-gradient(135deg,#3b82f6,#60a5fa)"></div>
            Teachers Registered
          </div>
          <div class="legend-item">
            <div class="legend-dot" style="background:linear-gradient(135deg,#ec4899,#f472b6)"></div>
            Learners Registered
          </div>
        </div>
        <div class="chart-wrap">
          <canvas id="registrationChart"></canvas>
        </div>
      </div>
    </div>

    <!-- Learner Age Distribution -->
    <div class="panel" style="animation-delay:0.15s">
      <div class="panel-hd">
        <div class="panel-title">
          <span class="panel-title-dot" style="background:linear-gradient(180deg,#ec4899,#f472b6)"></span>
          Learner Age Distribution
        </div>
        <span class="panel-badge" style="background:#fdf2f8;color:#db2777">By Gender</span>
      </div>
      <div class="panel-body">
        <div class="chart-legend">
          <div class="legend-item">
            <div class="legend-dot" style="background:linear-gradient(135deg,#3b82f6,#60a5fa)"></div>
            Male
          </div>
          <div class="legend-item">
            <div class="legend-dot" style="background:linear-gradient(135deg,#ec4899,#f472b6)"></div>
            Female
          </div>
        </div>
        <div class="chart-wrap">
          <canvas id="ageDistChart"></canvas>
        </div>
      </div>
    </div>

  </div>{{-- /charts-row --}}

  <!-- ════════ RETIRING TEACHERS ════════ -->
  <div class="panel" style="animation-delay:0.2s">
    <div class="panel-hd">
      <div class="panel-title">
        <span class="panel-title-dot" style="background:linear-gradient(180deg,#f59e0b,#fbbf24)"></span>
        Retiring Teachers
      </div>
      <span class="panel-badge" style="background:#fffbeb;color:#b45309">Soon</span>
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
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- ════════ DISTRIBUTION TABLES ROW ════════ -->
  <div class="dash-section-title">Distribution Reports</div>

  <div class="tables-row">

    <!-- Teacher Distribution per Age Group -->
    <div class="panel" style="animation-delay:0.25s">
      <div class="panel-hd">
        <div class="panel-title">
          <span class="panel-title-dot" style="background:linear-gradient(180deg,#6e40f9,#818cf8)"></span>
          Teacher Age Distribution
        </div>
      </div>
      <div class="panel-body-flush">
        <table class="data-table">
          <thead>
            <tr>
              <th>Age Group</th>
              <th>No. of Teachers</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>18 – 20</td>
              <td><span class="count-pill">0</span></td>
            </tr>
            <tr>
              <td>21 – 24</td>
              <td><span class="count-pill">0</span></td>
            </tr>
            <tr>
              <td>25 – 29</td>
              <td><span class="count-pill">0</span></td>
            </tr>
            <tr>
              <td>30 – 34</td>
              <td><span class="count-pill">0</span></td>
            </tr>
            <tr>
              <td>35 – 39</td>
              <td><span class="count-pill">0</span></td>
            </tr>
            <tr>
              <td>40 – 44</td>
              <td><span class="count-pill">0</span></td>
            </tr>
            <tr>
              <td>45 – 49</td>
              <td><span class="count-pill">0</span></td>
            </tr>
            <tr>
              <td>50 – 54</td>
              <td><span class="count-pill">0</span></td>
            </tr>
            <tr>
              <td>55 – 59</td>
              <td><span class="count-pill">0</span></td>
            </tr>
            <tr>
              <td>60 and above</td>
              <td><span class="count-pill">0</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Teachers Ethnic Distribution -->
    <div class="panel" style="animation-delay:0.3s">
      <div class="panel-hd">
        <div class="panel-title">
          <span class="panel-title-dot" style="background:linear-gradient(180deg,#14b8a6,#2dd4bf)"></span>
          Ethnic Distribution
        </div>
      </div>
      <div class="panel-body-flush">
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
              <td><span class="count-pill">0</span></td>
            </tr>
            @empty
            <tr>
              <td colspan="2">
                <div class="empty-state">
                  <div class="empty-state-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                    </svg>
                  </div>
                  No ethnicity data available
                </div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>{{-- /tables-row --}}

</div>{{-- /dash-wrap --}}

<!-- ════════ CHART.JS ════════ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script>
  (function () {
    const FONT = "'Inter','Segoe UI',system-ui,sans-serif";

    function buildGradient(ctx, color1, color2) {
      const g = ctx.createLinearGradient(0, 0, 0, 240);
      g.addColorStop(0, color1);
      g.addColorStop(1, color2);
      return g;
    }

    const tooltipDefaults = {
      backgroundColor: '#1e2d40',
      titleColor: '#94a3b8',
      bodyColor: '#f1f5f9',
      padding: 12,
      borderColor: '#334155',
      borderWidth: 1,
      cornerRadius: 8,
      titleFont: { family: FONT, size: 11 },
      bodyFont: { family: FONT, size: 12 },
    };

    window.addEventListener('DOMContentLoaded', function () {
      setTimeout(function () {

        /* ── Registration Progress (Line) ── */
        const regEl = document.getElementById('registrationChart');
        if (regEl) {
          const rCtx = regEl.getContext('2d');
          new Chart(rCtx, {
            type: 'line',
            data: {
              labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7',
                'Day 8', 'Day 9', 'Day 10', 'Day 11', 'Day 12', 'Day 13', 'Day 14'],
              datasets: [
                {
                  label: 'Teachers Registered',
                  data: [3, 9, 11, 10, 14, 15, 19, 20, 23, 25, 28, 30, 33, 40],
                  borderColor: '#3b82f6',
                  backgroundColor: buildGradient(rCtx, 'rgba(59,130,246,0.18)', 'rgba(59,130,246,0.01)'),
                  borderWidth: 2.5, fill: true, tension: 0.45,
                  pointRadius: 4, pointBackgroundColor: '#3b82f6',
                  pointBorderColor: '#fff', pointBorderWidth: 2,
                  pointHoverRadius: 6,
                },
                {
                  label: 'Learners Registered',
                  data: [10, 13, 19, 20, 25, 27, 30, 40, 45, 50, 54, 60, 65, 70],
                  borderColor: '#ec4899',
                  backgroundColor: buildGradient(rCtx, 'rgba(236,72,153,0.18)', 'rgba(236,72,153,0.01)'),
                  borderWidth: 2.5, fill: true, tension: 0.45,
                  pointRadius: 4, pointBackgroundColor: '#ec4899',
                  pointBorderColor: '#fff', pointBorderWidth: 2,
                  pointHoverRadius: 6,
                }
              ]
            },
            options: {
              responsive: true, maintainAspectRatio: false,
              plugins: {
                legend: { display: false },
                tooltip: tooltipDefaults,
              },
              scales: {
                x: {
                  grid: { color: '#f1f5f9', drawBorder: false },
                  ticks: { color: '#94a3b8', font: { family: FONT, size: 11 } }
                },
                y: {
                  grid: { color: '#f1f5f9', drawBorder: false },
                  ticks: { color: '#94a3b8', font: { family: FONT, size: 11 } },
                  beginAtZero: true
                }
              }
            }
          });
        }

        /* ── Age Distribution (Bar) ── */
        const ageEl = document.getElementById('ageDistChart');
        if (ageEl) {
          const aCtx = ageEl.getContext('2d');
          new Chart(aCtx, {
            type: 'bar',
            data: {
              labels: ['Under 3', '4 Yrs', '5 Yrs', '6 Yrs', '7 Yrs', '8 Yrs', '9 Yrs', '10 Yrs', '10+'],
              datasets: [
                {
                  label: 'Male',
                  data: [5, 10, 14, 20, 17, 13, 11, 8, 4],
                  backgroundColor: 'rgba(59,130,246,0.78)',
                  hoverBackgroundColor: 'rgba(59,130,246,1)',
                  borderRadius: 6,
                  barPercentage: 0.72,
                  categoryPercentage: 0.75,
                },
                {
                  label: 'Female',
                  data: [6, 11, 17, 21, 19, 15, 12, 9, 4],
                  backgroundColor: 'rgba(236,72,153,0.78)',
                  hoverBackgroundColor: 'rgba(236,72,153,1)',
                  borderRadius: 6,
                  barPercentage: 0.72,
                  categoryPercentage: 0.75,
                }
              ]
            },
            options: {
              responsive: true, maintainAspectRatio: false,
              plugins: {
                legend: { display: false },
                tooltip: tooltipDefaults,
              },
              scales: {
                x: {
                  grid: { display: false },
                  ticks: { color: '#94a3b8', font: { family: FONT, size: 11 } }
                },
                y: {
                  grid: { color: '#f1f5f9', drawBorder: false },
                  ticks: { color: '#94a3b8', font: { family: FONT, size: 11 } },
                  beginAtZero: true
                }
              }
            }
          });
        }

      }, 120);
    });
  })();
</script>

@else

<!-- ════════ NON-ADMIN WELCOME VIEW ════════ -->
<style>
  .welcome-name {
    font-size: 22px;
    font-weight: 700;
    color: var(--text-primary, #1e2d40);
    margin-bottom: 22px;
    letter-spacing: -0.01em;
  }

  .welcome-name span {
    color: #3bf45d;
  }

  .quick-cards {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 16px;
  }

  @media (max-width: 860px) {
    .quick-cards {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 480px) {
    .quick-cards {
      grid-template-columns: 1fr;
    }
  }

  .quick-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e8edf4;
    padding: 28px 20px 24px;
    text-align: center;
    text-decoration: none;
    color: inherit;
    display: block;
    transition: box-shadow 0.25s, transform 0.25s;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
  }

  .quick-card:hover {
    box-shadow: 0 8px 28px rgba(59, 108, 244, 0.14);
    transform: translateY(-4px);
    text-decoration: none;
  }

  .quick-card-icon {
    width: 54px;
    height: 54px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    font-size: 26px;
  }

  .quick-card h5 {
    font-size: 14px;
    font-weight: 700;
    color: #1e2d40;
    margin-bottom: 6px;
  }

  .quick-card p {
    font-size: 12.5px;
    color: #64748b;
    margin: 0;
  }
</style>

<div class="welcome-name">Welcome back, <span>{{ auth()->user()->first_name }}</span> 👋</div>

<div class="quick-cards">
  <a href="#" class="quick-card">
    <div class="quick-card-icon" style="background:#eff6ff;">
      <i class="bi bi-person-circle" style="color:#3b82f6"></i>
    </div>
    <h5>My Account</h5>
    <p>View and manage your account info.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon" style="background:#f0fdf4;">
      <i class="bi bi-shield-lock" style="color:#22c55e"></i>
    </div>
    <h5>Change Password</h5>
    <p>Update your password securely.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon" style="background:#fdf4ff;">
      <i class="bi bi-card-list" style="color:#a855f7"></i>
    </div>
    <h5>My Details</h5>
    <p>Check your personal details.</p>
  </a>
  <a href="#" class="quick-card">
    <div class="quick-card-icon" style="background:#fff1f2;">
      <i class="bi bi-box-arrow-in-right" style="color:#ef4444"></i>
    </div>
    <h5>Logout</h5>
    <p>Sign out of your account.</p>
  </a>
</div>

@endif

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.dashboard-modern .n-tab');
    const panes = document.querySelectorAll('.dashboard-modern .notif-tab-pane');

    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        const target = tab.dataset.tab;
        tabs.forEach(t => t.classList.remove('active'));
        panes.forEach(p => p.classList.remove('active'));
        tab.classList.add('active');
        const activePane = document.querySelector(
          '.dashboard-modern .notif-tab-pane[data-pane="' + target + '"]'
        );
        if (activePane) activePane.classList.add('active');
      });
    });
  });
</script>

@endsection