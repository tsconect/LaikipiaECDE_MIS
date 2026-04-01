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
.status-badge { display: inline-flex; align-items: center; gap: 5px; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #f0fdf4; color: #16a34a; }
.status-badge.present { background: #f0fdf4; color: #16a34a; }
.status-badge.absent { background: #fef2f2; color: #ef4444; }
.status-dot { width: 6px; height: 6px; border-radius: 50%; background: #22c55e; }

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
.tab-btn.active { color: #22c55e; font-weight: 600; border-bottom-color: #22c55e; }
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
      <i class="bi bi-building"></i>
    </div>
    <div>
      <div class="school-name">{{ $school->school_name }}</div>
      <div class="school-meta">
        <i class="bi bi-geo-alt school-meta-icon"></i>
        <span class="school-meta-text">
            {{ $school->ward->subCounty->county->name ?? 'County' }} · 
            {{ $school->ward->subCounty->name ?? 'Sub County' }} · 
            {{ $school->ward->name ?? 'Ward' }}
        </span>
      </div>
    </div>
    <div class="school-status">
      <span class="status-badge"><span class="status-dot"></span>Active</span>
    </div>
  </div>

  <!-- Tabs Card -->
  <div class="tabs-card">

    <!-- Tab Navigation -->
    <div class="tab-nav">
      <button class="tab-btn active" onclick="switchTab('profile', this)">
        <i class="bi bi-person-vcard"></i>
        Profile
      </button>
      <button class="tab-btn" onclick="switchTab('learners', this)">
        <i class="bi bi-people"></i>
        Learners
      </button>
      <button class="tab-btn" onclick="switchTab('teachers', this)">
        <i class="bi bi-person-badge"></i>
        Teachers
      </button>
      <button class="tab-btn" onclick="switchTab('attendance', this)">
        <i class="bi bi-clipboard-check"></i>
        Attendance Sheet
      </button>
      <button class="tab-btn" onclick="switchTab('absenteeism', this)">
        <i class="bi bi-person-x"></i>
        Absenteeism Sheet
      </button>
      <button class="tab-btn" onclick="switchTab('classrooms', this)">
        <i class="bi bi-door-open"></i>
        Classrooms
      </button>
    </div>

    <!-- ══ PROFILE TAB ══ -->
    <div class="tab-panel active" id="tab-profile">

      <!-- School Specific Stat Cards -->
      <div class="school-stats-grid">
        <div class="sc-card blue">
          <div class="sc-icon"><i class="bi bi-people-fill"></i></div>
          <div class="sc-label">Total Learners</div>
          <div class="sc-value">{{ number_format($learners->count()) }}</div>
          <div class="sc-sub">Enrolled</div>
        </div>
        <div class="sc-card green">
          <div class="sc-icon"><i class="bi bi-person-badge-fill"></i></div>
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
          <div class="sc-icon"><i class="bi bi-clipboard-check"></i></div>
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
          <div class="sc-icon"><i class="bi bi-person-x-fill"></i></div>
          <div class="sc-label">Absenteeism</div>
          @php
            $abs = $attendances->where('date', $today)->where('status', 'absent')->count();
            $a_pct = $total_t > 0 ? round(($abs / $total_t) * 100) : 0;
          @endphp
          <div class="sc-value">{{ $a_pct }}%</div>
          <div class="sc-sub">{{ $abs }} absent today</div>
        </div>
        <div class="sc-card violet">
          <div class="sc-icon"><i class="bi bi-door-open-fill"></i></div>
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
          <div class="info-label">Center Code</div>
          <div class="info-value">{{ $school->center_code ?? '-' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Teacher In Charge</div>
          <div class="info-value">
            {{ $school->teacher ? ($school->teacher->user->first_name . ' ' . $school->teacher->user->last_name) : '-' }}
          </div>
        </div>
        <div class="info-item">
          <div class="info-label">County</div>
          <div class="info-value">{{ $school->ward->subCounty->county->name ?? '-' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Sub County</div>
          <div class="info-value">{{ $school->ward->subCounty->name ?? '-' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Ward</div>
          <div class="info-value">{{ $school->ward->name ?? '-' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Feeder School</div>
          <div class="info-value">{{ $school->feeder_id ? ucfirst($school->feeder_id) : 'None' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Number of Classrooms</div>
          <div class="info-value">{{ $school->number_of_classes ?? 0 }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Classroom Status</div>
          <div class="info-value">{{ ucfirst(str_replace('_', ' ', $school->class_rooms_status)) }}</div>
        </div>
        <div class="info-item full">
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
        <table class="data-table dt-admin">
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
          <i class="bi bi-inbox"></i>
          <div class="empty-tab-title">No learners enrolled yet</div>
          <div class="empty-tab-sub">Learners enrolled in this school will appear here.</div>
        </div>
      @endif
    </div>

    <!-- ══ TEACHERS TAB ══ -->
    <div class="tab-panel" id="tab-teachers">
      @if($teachers->count() > 0)
        <table class="data-table dt-admin">
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
          <i class="bi bi-inbox"></i>
          <div class="empty-tab-title">No teachers assigned yet</div>
          <div class="empty-tab-sub">Teachers assigned to this school will appear here.</div>
        </div>
      @endif
    </div>

    <!-- ══ ATTENDANCE SHEET TAB ══ -->
    <div class="tab-panel" id="tab-attendance">
      @if($attendances->count() > 0)
        <table class="data-table dt-admin">
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
                <span class="status-badge {{ $item->status == 'present' ? 'present' : 'absent' }}">
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
          <i class="bi bi-inbox"></i>
          <div class="empty-tab-title">No attendance records</div>
          <div class="empty-tab-sub">Attendance records for this school will appear here once data is logged.</div>
        </div>
      @endif
    </div>

    <!-- ══ ABSENTEEISM SHEET TAB ══ -->
    <div class="tab-panel" id="tab-absenteeism">
      @if($absents->count() > 0)
        <table class="data-table dt-admin">
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
          <i class="bi bi-inbox"></i>
          <div class="empty-tab-title">No absenteeism records</div>
          <div class="empty-tab-sub">All students are present or no attendance has been marked today.</div>
        </div>
      @endif
    </div>

    <!-- ══ CLASSROOMS TAB ══ -->
    <div class="tab-panel" id="tab-classrooms">
      <div class="empty-tab">
        <i class="bi bi-house-door"></i>
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