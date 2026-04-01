@extends('admin.app')

@section('content')

<div class="dash-content">

  <!-- School Header Card -->
  <div class="school-header-card">
    <div class="school-avatar">
      <i class="bi bi-circle"></i>
    </div>
    <div>
      <div class="school-name">{{ $school->school_name }}</div>
      <div class="school-meta">
        <i class="bi bi-geo-alt school-meta-icon"></i>
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
        <i class="bi bi-circle"></i>
        Profile
      </button>
      <button class="tab-btn" onclick="switchTab('learners', this)">
        <i class="bi bi-circle"></i>
        Learners
      </button>
      <button class="tab-btn" onclick="switchTab('teachers', this)">
        <i class="bi bi-circle"></i>
        Teachers
      </button>
      <button class="tab-btn" onclick="switchTab('attendance', this)">
        <i class="bi bi-circle"></i>
        Attendance Sheet
      </button>
      <button class="tab-btn" onclick="switchTab('absenteeism', this)">
        <i class="bi bi-circle"></i>
        Absenteeism Sheet
      </button>
      <button class="tab-btn" onclick="switchTab('classrooms', this)">
        <i class="bi bi-circle"></i>
        Classrooms
      </button>
    </div>

    <!-- ══ PROFILE TAB ══ -->
    <div class="tab-panel active" id="tab-profile">

      <!-- School Specific Stat Cards -->
      <div class="school-stats-grid">
        <div class="sc-card blue">
          <div class="sc-icon"><i class="bi bi-circle"></i></div>
          <div class="sc-label">Total Learners</div>
          <div class="sc-value">{{ number_format($learners->count()) }}</div>
          <div class="sc-sub">Enrolled</div>
        </div>
        <div class="sc-card green">
          <div class="sc-icon"><i class="bi bi-circle"></i></div>
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
          <div class="sc-icon"><i class="bi bi-circle"></i></div>
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
          <div class="sc-icon"><i class="bi bi-circle"></i></div>
          <div class="sc-label">Absenteeism</div>
          @php
            $abs = $attendances->where('date', $today)->where('status', 'absent')->count();
            $a_pct = $total_t > 0 ? round(($abs / $total_t) * 100) : 0;
          @endphp
          <div class="sc-value">{{ $a_pct }}%</div>
          <div class="sc-sub">{{ $abs }} absent today</div>
        </div>
        <div class="sc-card violet">
          <div class="sc-icon"><i class="bi bi-circle"></i></div>
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
        <div class="table-card">
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
              <td class="td-strong">{{ $item->first_name }} {{ $item->last_name }}</td>
              <td>{{ $item->nemis_number }}</td>
              <td>{{ ucfirst($item->gender) }}</td>
              <td>{{ $item->dob ? \Carbon\Carbon::parse($item->dob)->age . ' yrs' : '-' }}</td>
              <td>
                <div class="table-actions">
                  <a class="btn-action btn-view" title="View Student" href="{{ route('admin.learners.show', $item->id) }}">
                    <i class="bi bi-circle"></i>
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
          <i class="bi bi-circle"></i>
          <div class="empty-tab-title">No learners enrolled yet</div>
          <div class="empty-tab-sub">Learners enrolled in this school will appear here.</div>
        </div>
      @endif
    </div>

    <!-- ══ TEACHERS TAB ══ -->
    <div class="tab-panel" id="tab-teachers">
      @if($teachers->count() > 0)
        <div class="table-card">
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
              <td class="td-strong">{{ $item->user->first_name ?? '' }} {{ $item->user->last_name ?? '' }}</td>
              <td>{{ $item->user->phone_number ?? '-' }}</td>
              <td>{{ ucfirst($item->gender) }}</td>
              <td>{{ $item->dob ? \Carbon\Carbon::parse($item->dob)->age . ' yrs' : '-' }}</td>
              <td>
                <div class="table-actions">
                  <a class="btn-action btn-view" title="View Teacher" href="{{ route('admin.teachers.show', $item->id) }}">
                    <i class="bi bi-circle"></i>
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
          <i class="bi bi-circle"></i>
          <div class="empty-tab-title">No teachers assigned yet</div>
          <div class="empty-tab-sub">Teachers assigned to this school will appear here.</div>
        </div>
      @endif
    </div>

    <!-- ══ ATTENDANCE SHEET TAB ══ -->
    <div class="tab-panel" id="tab-attendance">
      @if($attendances->count() > 0)
        <div class="table-card">
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
          <i class="bi bi-circle"></i>
          <div class="empty-tab-title">No attendance records</div>
          <div class="empty-tab-sub">Attendance records for this school will appear here once data is logged.</div>
        </div>
      @endif
    </div>

    <!-- ══ ABSENTEEISM SHEET TAB ══ -->
    <div class="tab-panel" id="tab-absenteeism">
      @if($absents->count() > 0)
        <div class="table-card">
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
          <i class="bi bi-circle"></i>
          <div class="empty-tab-title">No absenteeism records</div>
          <div class="empty-tab-sub">All students are present or no attendance has been marked today.</div>
        </div>
      @endif
    </div>

    <!-- ══ CLASSROOMS TAB ══ -->
    <div class="tab-panel" id="tab-classrooms">
      <div class="empty-tab">
        <i class="bi bi-circle"></i>
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