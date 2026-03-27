@extends('admin.app')

@section('content')

<style>
/* ══ SCHOOL HEADER CARD ══ */
.school-header-card {
  background: #fff;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 1px 3px rgba(0,0,0,0.07);
  padding: 20px 24px;
  display: flex; align-items: center; gap: 16px;
  margin-bottom: 16px;
}
.school-avatar {
  width: 52px; height: 52px; border-radius: 12px;
  background: linear-gradient(135deg, #0f1b2d, #1e3a5f);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.school-avatar svg { width: 26px; height: 26px; color: #7eb8f7; }
.school-name { font-size: 18px; font-weight: 700; color: #0f172a; margin-bottom: 4px; }
.school-meta { display: flex; align-items: center; gap: 6px; }
.school-meta-icon { width: 14px; height: 14px; color: #94a3b8; }
.school-meta-text { font-size: 12.5px; color: #94a3b8; }
.school-status { margin-left: auto; display: flex; align-items: center; gap: 6px; }
.status-badge { display: inline-flex; align-items: center; gap: 5px; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #fefce8; color: #92400e; }
.status-dot { width: 6px; height: 6px; border-radius: 50%; background: #f59e0b; }

/* ══ TABS CARD ══ */
.tabs-card { background: #fff; border-radius: 14px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.07); overflow: hidden; }

.tab-nav { display: flex; border-bottom: 1px solid #e2e8f0; padding: 0 20px; overflow-x: auto; scrollbar-width: none; gap: 0; }
.tab-nav::-webkit-scrollbar { display: none; }

.tab-btn {
  display: flex; align-items: center; gap: 7px;
  padding: 14px 18px; font-size: 13px; font-weight: 500;
  color: #94a3b8; background: none; border: none;
  cursor: pointer; font-family: 'DM Sans', sans-serif;
  border-bottom: 2px solid transparent;
  margin-bottom: -1px; white-space: nowrap;
  transition: color 0.15s, border-color 0.15s;
}
.tab-btn:hover { color: #475569; }
.tab-btn.active { color: #f59e0b; font-weight: 600; border-bottom-color: #f59e0b; }
.tab-btn svg { width: 15px; height: 15px; flex-shrink: 0; }

/* ══ TAB PANELS ══ */
.tab-panel { display: none; padding: 24px; }
.tab-panel.active { display: block; animation: fadeUp 0.4s ease both; }

/* ══ SCHOOL STAT CARDS ══ */
.school-stats-grid { display: grid; grid-template-columns: repeat(5, minmax(0,1fr)); gap: 12px; margin-bottom: 24px; }
@media (max-width: 1100px) { .school-stats-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 700px) { .school-stats-grid { grid-template-columns: 1fr; } }

.sc-card {
  border-radius: 10px;
  padding: 14px 16px;
  border: 1px solid #e2e8f0;
  position: relative; overflow: hidden;
  transition: box-shadow 0.2s, transform 0.2s;
}
.sc-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.08); transform: translateY(-1px); }
.sc-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; }
.sc-card.blue { background: #fafcff; } .sc-card.blue::before { background: #3b82f6; }
.sc-card.green { background: #fafffe; } .sc-card.green::before { background: #22c55e; }
.sc-card.amber { background: #fffdf5; } .sc-card.amber::before { background: #f59e0b; }
.sc-card.red { background: #fffafa; } .sc-card.red::before { background: #ef4444; }
.sc-card.violet { background: #fdfbff; } .sc-card.violet::before { background: #7c3aed; }

.sc-icon { width: 30px; height: 30px; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; }
.sc-icon svg { width: 15px; height: 15px; }
.sc-card.blue .sc-icon { background: #eff6ff; color: #3b82f6; }
.sc-card.green .sc-icon { background: #f0fdf4; color: #22c55e; }
.sc-card.amber .sc-icon { background: #fffbeb; color: #f59e0b; }
.sc-card.red .sc-icon { background: #fef2f2; color: #ef4444; }
.sc-card.violet .sc-icon { background: #f5f3ff; color: #7c3aed; }

.sc-label { font-size: 11px; color: #94a3b8; font-weight: 600; letter-spacing: 0.03em; margin-bottom: 4px; text-transform: uppercase; }
.sc-value { font-size: 26px; font-weight: 700; color: #0f172a; line-height: 1; font-family: 'DM Mono', monospace; }
.sc-sub { font-size: 11px; color: #94a3b8; margin-top: 4px; }

/* ══ PROFILE INFO GRID ══ */
.profile-divider { height: 1px; background: #e2e8f0; margin: 20px 0; }
.profile-section-title { font-size: 11px; font-weight: 700; color: #94a3b8; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 14px; }

.info-grid { display: grid; grid-template-columns: repeat(3, minmax(0,1fr)); gap: 20px 28px; }
@media (max-width: 800px) { .info-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 500px) { .info-grid { grid-template-columns: 1fr; } }

.info-item { display: flex; flex-direction: column; gap: 4px; }
.info-item.full { grid-column: 1 / -1; }
.info-label { font-size: 12px; font-weight: 700; color: #0f172a; }
.info-value { font-size: 13.5px; color: #475569; }
.info-value.empty { color: #94a3b8; font-style: italic; }

/* ══ DATA TABLE ══ */
.data-table { width: 100%; border-collapse: collapse; font-size: 13px; }
.data-table th { text-align: left; padding: 12px 16px; font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid #e2e8f0; background: #f8fafc; }
.data-table td { padding: 12px 16px; color: #475569; border-bottom: 1px solid #f1f5f9; }
.data-table tbody tr:hover td { background: #f8fafc; }

/* ══ EMPTY STATE ══ */
.empty-tab {
  display: flex; flex-direction: column; align-items: center;
  padding: 48px 20px; text-align: center;
}
.empty-tab svg { width: 40px; height: 40px; color: #94a3b8; opacity: 0.3; margin-bottom: 12px; }
.empty-tab-title { font-size: 14px; font-weight: 600; color: #475569; margin-bottom: 4px; }
.empty-tab-sub { font-size: 12.5px; color: #94a3b8; }

@keyframes fadeUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
</style>

<div class="dash-content">

  <!-- School Header Card -->
  <div class="school-header-card">
    <div class="school-avatar">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"/></svg>
    </div>
    <div>
      <div class="school-name">{{ $school->school_name }}</div>
      <div class="school-meta">
        <svg class="school-meta-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
        <span class="school-meta-text">
            @php
                $county = \App\Models\County::where('county_id', $school->county_id)->first();
                $subcounty = \App\Models\Constituency::where('constituency_id', $school->subcounty_id)->first();
                $ward = \App\Models\Ward::find($school->ward_id);
            @endphp
            {{ $county->name ?? 'County' }} · 
            {{ $subcounty->name ?? 'Sub County' }} · 
            {{ $ward->name ?? 'Ward' }}
        </span>
      </div>
    </div>
    <div class="school-status">
      <span class="status-badge" style="background:#fffbeb; color:#92400e;"><span class="status-dot" style="background:#f59e0b;"></span>Feeder School</span>
    </div>
  </div>

  <!-- Tabs Card -->
  <div class="tabs-card">

    <!-- Tab Navigation -->
    <div class="tab-nav">
      <button class="tab-btn active" onclick="switchTab('profile', this)">
        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
        Profile
      </button>
      <button class="tab-btn" onclick="switchTab('learners', this)">
        <svg viewBox="0 0 20 20" fill="currentColor"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/></svg>
        Learners
      </button>
      <button class="tab-btn" onclick="switchTab('teachers', this)">
        <svg viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.97 5.97 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 14.094A5.97 5.97 0 004 17v1H1v-1a3 3 0 013.75-2.906z"/></svg>
        Teachers
      </button>
      <button class="tab-btn" onclick="switchTab('attendance', this)">
        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
        Attendance Sheet
      </button>
      <button class="tab-btn" onclick="switchTab('absenteeism', this)">
        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"/></svg>
        Absenteeism Sheet
      </button>
      <button class="tab-btn" onclick="switchTab('classrooms', this)">
        <svg viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h4v-4h2v4h4a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
        Classrooms
      </button>
    </div>

    <!-- ══ PROFILE TAB ══ -->
    <div class="tab-panel active" id="tab-profile">

      <!-- School Specific Stat Cards -->
      <div class="school-stats-grid">
        <div class="sc-card blue">
          <div class="sc-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/></svg></div>
          <div class="sc-label">Total Learners</div>
          <div class="sc-value">{{ number_format($learners->count()) }}</div>
          <div class="sc-sub">Enrolled</div>
        </div>
        <div class="sc-card green">
          <div class="sc-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.97 5.97 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 14.094A5.97 5.97 0 004 17v1H1v-1a3 3 0 013.75-2.906z"/></svg></div>
          <div class="sc-label">Total Teachers</div>
          <div class="sc-value">{{ number_format($teachers->count()) }}</div>
          <div class="sc-sub">
            @php
                $t_f = $teachers->filter(fn($t) => optional($t->user)->gender == 'female')->count();
                $t_m = $teachers->filter(fn($t) => optional($t->user)->gender == 'male')->count();
            @endphp
            F: {{ $t_f }} · M: {{ $t_m }}
          </div>
        </div>
        <div class="sc-card amber">
          <div class="sc-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg></div>
          <div class="sc-label">Attendance Today</div>
          @php
            $today = date('Y-m-d');
            $pres = $attendances->where('date', $today)->where('status', 'present')->count();
            $total_t = $attendances->where('date', $today)->count();
            $pct = $total_t > 0 ? round(($pres / $total_t) * 100) : 0;
          @endphp
          <div class="sc-value">{{ $pres }}</div>
          <div class="sc-sub">{{ $pct }}% present</div>
        </div>
        <div class="sc-card red">
          <div class="sc-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"/></svg></div>
          <div class="sc-label">Absenteeism</div>
          @php
            $abs = $attendances->where('date', $today)->where('status', 'absent')->count();
            $a_pct = $total_t > 0 ? round(($abs / $total_t) * 100) : 0;
          @endphp
          <div class="sc-value">{{ $a_pct }}%</div>
          <div class="sc-sub">{{ $abs }} absent today</div>
        </div>
        <div class="sc-card violet">
          <div class="sc-icon"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h4v-4h2v4h4a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg></div>
          <div class="sc-label">Classrooms</div>
          <div class="sc-value">{{ $school->number_of_classes ?? 0 }}</div>
          <div class="sc-sub">{{ ucfirst($school->class_rooms_status) ?? '-' }}</div>
        </div>
      </div>

      <div class="profile-divider"></div>
      <div class="profile-section-title">School Information</div>

      <!-- Info Grid -->
      <div class="info-grid">
        <div class="info-item">
          <div class="info-label">School Name</div>
          <div class="info-value">{{ $school->school_name }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Number of Students (Est.)</div>
          <div class="info-value">{{ $school->number_of_students ?? '-' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Teacher In Charge</div>
          <div class="info-value">
            @if($school->teacher_id)
                @php $tic = \App\Models\Teacher::find($school->teacher_id); @endphp
                {{ $tic ? ($tic->user->first_name . ' ' . $tic->user->last_name) : '-' }}
            @else
                -
            @endif
          </div>
        </div>
        <div class="info-item">
          <div class="info-label">County</div>
          <div class="info-value">{{ $county->name ?? '-' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Sub County</div>
          <div class="info-value">{{ $subcounty->name ?? '-' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Ward</div>
          <div class="info-value">{{ $ward->name ?? '-' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Number of Classrooms</div>
          <div class="info-value">{{ $school->number_of_classes ?? 0 }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Classroom Status</div>
          <div class="info-value">{{ ucfirst(str_replace('_', ' ', $school->class_rooms_status)) }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">School Location (Lat, Long)</div>
          <div class="info-value">{{ $school->school_location ?? 'Not set' }}</div>
        </div>
        <div class="info-item full">
          <div class="info-label">Remarks</div>
          <div class="info-value">{{ $school->remarks ?? 'No remarks provided.' }}</div>
        </div>
      </div>
    </div>

    <!-- ══ LEARNERS TAB ══ -->
    <div class="tab-panel" id="tab-learners">
      @if($learners->count() > 0)
        <table class="data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Full Names</th>
              <th>NEMIS No</th>
              <th>Gender</th>
              <th>Age</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($learners as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td style="font-weight:600;">{{ $item->first_name }} {{ $item->last_name }}</td>
              <td>{{ $item->nemis_number }}</td>
              <td>{{ ucfirst($item->gender) }}</td>
              <td>{{ $item->dob ? \Carbon\Carbon::parse($item->dob)->age . ' yrs' : '-' }}</td>
              <td>
                <div class="table-actions">
                    <a class="btn-action btn-view" title="View Student" href="{{ route('admin.learners.show', $item->id) }}">
                        <i class="fa fa-eye"></i>
                    </a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div class="empty-tab">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/></svg>
          <div class="empty-tab-title">No learners enrolled yet</div>
          <div class="empty-tab-sub">Learners enrolled in this school will appear here.</div>
        </div>
      @endif
    </div>

    <!-- ══ TEACHERS TAB ══ -->
    <div class="tab-panel" id="tab-teachers">
      @if($teachers->count() > 0)
        <table class="data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Gender</th>
              <th>Age</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($teachers as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td style="font-weight:600;">{{ $item->user->first_name ?? '' }} {{ $item->user->last_name ?? '' }}</td>
              <td>{{ $item->user->phone_number ?? '-' }}</td>
              <td>{{ ucfirst($item->gender) }}</td>
              <td>{{ $item->dob ? \Carbon\Carbon::parse($item->dob)->age . ' yrs' : '-' }}</td>
              <td>
                <div class="table-actions">
                    <a class="btn-action btn-view" title="View Teacher" href="{{ route('admin.teachers.show', $item->id) }}">
                        <i class="fa fa-eye"></i>
                    </a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div class="empty-tab">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
          <div class="empty-tab-title">No teachers assigned yet</div>
          <div class="empty-tab-sub">Teachers assigned to this school will appear here.</div>
        </div>
      @endif
    </div>

    <!-- ══ ATTENDANCE SHEET TAB ══ -->
    <div class="tab-panel" id="tab-attendance">
      @if($attendances->count() > 0)
        <table class="data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Student</th>
              <th>Date</th>
              <th>Marked By</th>
              <th>Status</th>
              <th>Reason</th>
            </tr>
          </thead>
          <tbody>
            @foreach($attendances as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td style="font-weight:600;">{{ $item->learner->first_name ?? '' }} {{ $item->learner->last_name ?? '' }}</td>
              <td>{{ $item->date }}</td>
              <td>{{ $item->teacher->first_name ?? '-' }} {{ $item->teacher->last_name ?? '' }}</td>
              <td>
                <span class="status-badge" style="background: {{ $item->status == 'present' ? '#f0fdf4' : '#fef2f2' }}; color: {{ $item->status == 'present' ? '#16a34a' : '#ef4444' }};">
                    {{ ucfirst($item->status) }}
                </span>
              </td>
              <td>{{ $item->reason ?? '-' }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div class="empty-tab">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          <div class="empty-tab-title">No attendance records</div>
          <div class="empty-tab-sub">Attendance records for this school will appear here once data is logged.</div>
        </div>
      @endif
    </div>

    <!-- ══ ABSENTEEISM SHEET TAB ══ -->
    <div class="tab-panel" id="tab-absenteeism">
      @if($absents->count() > 0)
        <table class="data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Student</th>
              <th>Date</th>
              <th>Reason</th>
              <th>Marked By</th>
            </tr>
          </thead>
          <tbody>
            @foreach($absents as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td style="font-weight:600;">{{ $item->learner->first_name ?? '' }} {{ $item->learner->last_name ?? '' }}</td>
              <td>{{ $item->date }}</td>
              <td>{{ $item->reason ?? 'Not provided' }}</td>
              <td>{{ $item->teacher->first_name ?? '-' }} {{ $item->teacher->last_name ?? '' }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div class="empty-tab">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
          <div class="empty-tab-title">No absenteeism records</div>
          <div class="empty-tab-sub">All students are present or no attendance has been marked today.</div>
        </div>
      @endif
    </div>

    <!-- ══ CLASSROOMS TAB ══ -->
    <div class="tab-panel" id="tab-classrooms">
      <div class="empty-tab">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
        <div class="empty-tab-title">Classroom Infrastructure</div>
        <div class="empty-tab-sub">Status: {{ ucfirst(str_replace('_', ' ', $school->class_rooms_status)) }} · Total: {{ $school->number_of_classes ?? 0 }} rooms</div>
      </div>
    </div>

  </div><!-- /tabs-card -->
</div>

<script>
  function switchTab(name, btn) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('tab-' + name).classList.add('active');
  }
</script>

@endsection
