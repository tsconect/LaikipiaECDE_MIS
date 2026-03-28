@extends('admin.app')

@section('content')

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
        <div class="table-card">
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
              <td class="td-strong">{{ $item->first_name }} {{ $item->last_name }}</td>
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
        </div>
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
        <div class="table-card">
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
              <td class="td-strong">{{ $item->user->first_name ?? '' }} {{ $item->user->last_name ?? '' }}</td>
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
        </div>
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
        <div class="table-card">
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
              <td class="td-strong">{{ $item->learner->first_name ?? '' }} {{ $item->learner->last_name ?? '' }}</td>
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
        </div>
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
        <div class="table-card">
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
              <td class="td-strong">{{ $item->learner->first_name ?? '' }} {{ $item->learner->last_name ?? '' }}</td>
              <td>{{ $item->date }}</td>
              <td>{{ $item->reason ?? 'Not provided' }}</td>
              <td>{{ $item->teacher->first_name ?? '-' }} {{ $item->teacher->last_name ?? '' }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
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
