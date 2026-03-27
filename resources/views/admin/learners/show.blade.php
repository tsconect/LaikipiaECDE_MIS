@extends('admin.app')

@section('content')

<style>
/* ══ LEARNER HEADER CARD ══ */
.learner-header-card {
  background: #fff;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 1px 3px rgba(0,0,0,0.07);
  padding: 20px 24px;
  display: flex; align-items: center; gap: 20px;
  margin-bottom: 16px;
}
.learner-avatar {
  width: 64px; height: 64px; border-radius: 50%;
  border: 3px solid #f1f5f9;
  object-fit: cover; flex-shrink: 0;
}
.learner-name { font-size: 18px; font-weight: 700; color: #0f172a; margin-bottom: 4px; }
.learner-meta { display: flex; align-items: center; gap: 12px; }
.learner-meta-item { display: flex; align-items: center; gap: 5px; font-size: 12.5px; color: #94a3b8; }
.learner-meta-item i { font-size: 14px; }
.learner-status { margin-left: auto; display: flex; align-items: center; gap: 6px; }
.status-badge { display: inline-flex; align-items: center; gap: 5px; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #f0fdf4; color: #16a34a; }

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
.tab-btn.active { color: #3b82f6; font-weight: 600; border-bottom-color: #3b82f6; }
.tab-btn svg { width: 15px; height: 15px; flex-shrink: 0; }

/* ══ TAB PANELS ══ */
.tab-panel { display: none; padding: 24px; }
.tab-panel.active { display: block; animation: fadeUp 0.4s ease both; }

/* ══ INFO GRID ══ */
.info-grid { display: grid; grid-template-columns: repeat(3, minmax(0,1fr)); gap: 20px 28px; }
@media (max-width: 800px) { .info-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 500px) { .info-grid { grid-template-columns: 1fr; } }

.info-item { display: flex; flex-direction: column; gap: 4px; }
.info-item.full { grid-column: 1 / -1; }
.info-label { font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; }
.info-value { font-size: 14px; color: #475569; font-weight: 500; }
.info-value.empty { color: #94a3b8; font-style: italic; }

.profile-section-title { font-size: 13px; font-weight: 700; color: #0f172a; margin-bottom: 16px; display: flex; align-items: center; gap: 8px; }
.profile-section-title::before { content: ''; width: 3px; height: 14px; background: #3b82f6; border-radius: 3px; }

/* ══ DATA TABLE ══ */
.data-table { width: 100%; border-collapse: collapse; font-size: 13px; }
.data-table th { text-align: left; padding: 12px 16px; font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid #e2e8f0; background: #f8fafc; }
.data-table td { padding: 12px 16px; color: #475569; border-bottom: 1px solid #f1f5f9; }

@keyframes fadeUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
</style>

<div class="dash-content">

  <!-- Learner Header Card -->
  <div class="learner-header-card">
    <img src="{{ $learner->passport_photo ? asset('storage/' . $learner->passport_photo) : 'https://ui-avatars.com/api/?name='.urlencode($learner->first_name.' '.$learner->last_name).'&background=3b82f6&color=fff' }}" 
         class="learner-avatar" alt="Learner Photo">
    <div>
      <div class="learner-name">{{ $learner->first_name }} {{ $learner->middle_name }} {{ $learner->last_name }}</div>
      <div class="learner-meta">
        <div class="learner-meta-item">
          <i class="bi bi-hash"></i>
          <span>NEMIS: {{ $learner->nemis_number }}</span>
        </div>
        <div class="learner-meta-item">
          <i class="bi bi-book"></i>
          <span>{{ $learner->school->school_name ?? '-' }}</span>
        </div>
      </div>
    </div>
    <div class="learner-status">
      <span class="status-badge"><span style="width:6px;height:6px;border-radius:50%;background:#22c55e;margin-right:6px;"></span>Enrolled</span>
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
      <button class="tab-btn" onclick="switchTab('parent', this)">
        <svg viewBox="0 0 20 20" fill="currentColor"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
        Parent / Guardian
      </button>
    </div>

    <!-- ══ PROFILE TAB ══ -->
    <div class="tab-panel active" id="tab-profile">
      
      <div class="profile-section-title">Personal Information</div>
      <div class="info-grid mb-4">
        <div class="info-item"><div class="info-label">First Name</div><div class="info-value">{{ $learner->first_name }}</div></div>
        <div class="info-item"><div class="info-label">Middle Name</div><div class="info-value">{{ $learner->middle_name ?? '-' }}</div></div>
        <div class="info-item"><div class="info-label">Last Name</div><div class="info-value">{{ $learner->last_name }}</div></div>
        <div class="info-item"><div class="info-label">Gender</div><div class="info-value">{{ ucfirst($learner->gender) }}</div></div>
        <div class="info-item"><div class="info-label">Date of Birth</div><div class="info-value">{{ $learner->dob }} ({{ \Carbon\Carbon::parse($learner->dob)->age }} yrs)</div></div>
        <div class="info-item"><div class="info-label">Nationality</div><div class="info-value">{{ $learner->nationality->name ?? '-' }}</div></div>
        <div class="info-item"><div class="info-label">PWD Status</div><div class="info-value">{{ ucfirst($learner->pwd_status) }}</div></div>
        @if(strtolower($learner->pwd_status) == 'yes')
          <div class="info-item"><div class="info-label">Disability Type</div><div class="info-value">{{ $learner->disability_type }}</div></div>
          <div class="info-item full"><div class="info-label">Impairment Details</div><div class="info-value">{{ $learner->impairment_details }}</div></div>
        @endif
      </div>

      <div class="profile-section-title">Admission & Location</div>
      <div class="info-grid">
        <div class="info-item"><div class="info-label">NEMIS Number</div><div class="info-value">{{ $learner->nemis_number }}</div></div>
        <div class="info-item"><div class="info-label">Admission Number</div><div class="info-value">{{ $learner->admission_number }}</div></div>
        <div class="info-item"><div class="info-label">Class</div><div class="info-value">{{ $learner->class }}</div></div>
        <div class="info-item"><div class="info-label">Date of Admission</div><div class="info-value">{{ $learner->date_of_admission }}</div></div>
        <div class="info-item"><div class="info-label">Mode of Admission</div><div class="info-value">{{ ucfirst($learner->mode_of_admission) }}</div></div>
        <div class="info-item"><div class="info-label">Birth Certificate No</div><div class="info-value">{{ $learner->birth_certificate_number }}</div></div>
        <div class="info-item"><div class="info-label">Ward</div><div class="info-value">{{ $learner->ward->name ?? '-' }}</div></div>
        <div class="info-item"><div class="info-label">Sub Location</div><div class="info-value">{{ $learner->subLocation->name ?? '-' }}</div></div>
        <div class="info-item"><div class="info-label">Village</div><div class="info-value">{{ $learner->village }}</div></div>
      </div>
    </div>

    <!-- ══ PARENT TAB ══ -->
    <div class="tab-panel" id="tab-parent">
      @if($learner->parent)
        <div class="profile-section-title">Guardian Information</div>
        <div class="info-grid">
          <div class="info-item"><div class="info-label">Full Name</div><div class="info-value">{{ $learner->parent->first_name }} {{ $learner->parent->middle_name }} {{ $learner->parent->last_name }}</div></div>
          <div class="info-item"><div class="info-label">Relationship</div><div class="info-value">{{ ucfirst($learner->parent->relationship) }}</div></div>
          <div class="info-item"><div class="info-label">ID Number</div><div class="info-value">{{ $learner->parent->id_number ?? '-' }}</div></div>
          <div class="info-item"><div class="info-label">Phone Number</div><div class="info-value">{{ $learner->parent->phone_number ?? '-' }}</div></div>
          <div class="info-item"><div class="info-label">Email</div><div class="info-value">{{ $learner->parent->email ?? '-' }}</div></div>
          <div class="info-item"><div class="info-label">Village</div><div class="info-value">{{ $learner->parent->village ?? '-' }}</div></div>
        </div>
      @else
        <div class="empty-tab">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
          <div class="empty-tab-title">No parent/guardian information</div>
          <div class="empty-tab-sub">No details have been registered for this learner's guardian.</div>
        </div>
      @endif
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
