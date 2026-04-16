@extends('web.app')

@section('title', $school->school_name)
@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── SCHOOL DETAIL HERO ──────────────────────────── */
    .school-detail-hero {
      background: #F1FDF3;
      padding: 140px 64px 70px;
      position: relative; overflow: hidden;
    }
    .school-detail-hero::before {
      content: ''; position: absolute;
      top: -180px; right: -80px;
      width: 500px; height: 500px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.05) 0%, transparent 70%);
      pointer-events: none;
    }
    .school-detail-hero .breadcrumb-nav {
      display: flex; align-items: center; gap: 8px;
      font-size: 13px; font-weight: 600;
      margin-bottom: 16px;
      position: relative; z-index: 1;
    }
    .school-detail-hero .breadcrumb-nav a {
      color: var(--text-muted); text-decoration: none;
      transition: color 0.25s;
    }
    .school-detail-hero .breadcrumb-nav a:hover { color: var(--green); }
    .school-detail-hero .breadcrumb-nav span { color: rgba(13,34,53,0.25); }
    .school-detail-hero .breadcrumb-nav .current { color: rgba(13,34,53,0.70); }

    .school-detail-hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 4vw, 3rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 12px;
      position: relative; z-index: 1;
    }
    .school-detail-hero .hero-sub {
      color: var(--text-muted);
      font-size: 16px; position: relative; z-index: 1;
    }
    .school-detail-hero .back-pill {
      margin-top: 20px;
      position: relative; z-index: 1;
    }

    /* ─── SCHOOL DETAIL CONTENT ───────────────────────── */
    .school-detail-content {
      padding: 48px 64px 80px;
      background: var(--cream);
    }
    .school-detail-bento {
      display: grid;
      grid-template-columns: minmax(0, 1fr) 380px;
      gap: 28px; align-items: start;
    }

    /* Info bento grid */
    .school-info-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-md);
      padding: 32px;
    }
    .school-info-card h3 {
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; color: var(--navy);
      font-size: 1.15rem; margin-bottom: 24px;
      display: flex; align-items: center; gap: 10px;
    }
    .school-info-card h3 i {
      color: var(--green);
    }

    .school-fields-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }
    .school-field {
      background: linear-gradient(135deg, #fafbfc 0%, #f4f8fc 100%);
      border: 1px solid rgba(13,34,53,0.06);
      border-radius: var(--radius-md);
      padding: 16px 18px;
      transition: all 0.3s;
    }
    .school-field:hover {
      border-color: rgba(26,124,62,0.15);
      box-shadow: var(--shadow-sm);
    }
    .school-field.full-width {
      grid-column: span 2;
    }
    .school-field small {
      color: var(--text-muted); font-weight: 700;
      font-size: 11px; text-transform: uppercase;
      letter-spacing: 0.06em;
      display: block; margin-bottom: 4px;
    }
    .school-field strong {
      display: block; color: var(--navy);
      font-size: 15px; line-height: 1.4;
    }

    /* Teacher sidebar card */
    .teacher-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-md);
      overflow: hidden;
    }
    .teacher-card-header {
      background: var(--navy);
      padding: 24px 28px;
      color: #fff;
    }
    .teacher-card-header h3 {
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; font-size: 1.05rem;
      margin: 0; display: flex; align-items: center; gap: 10px;
    }
    .teacher-card-header h3 i { color: var(--green-glow); }
    .teacher-card-body { padding: 28px; }
    .teacher-avatar {
      width: 72px; height: 72px; border-radius: 50%;
      background: var(--gradient-emerald);
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-size: 28px; font-weight: 800;
      margin: 0 auto 18px;
    }
    .teacher-info-row {
      background: #fafbfc;
      border: 1px solid rgba(13,34,53,0.05);
      border-radius: var(--radius-sm);
      padding: 14px 16px; margin-bottom: 12px;
    }
    .teacher-info-row small {
      color: var(--text-muted); font-weight: 700;
      font-size: 11px; text-transform: uppercase;
      letter-spacing: 0.06em; display: block;
      margin-bottom: 2px;
    }
    .teacher-info-row strong { color: var(--navy); font-size: 15px; }

    .teacher-empty-state {
      text-align: center; padding: 28px;
      color: var(--text-muted);
    }
    .teacher-empty-state i {
      font-size: 2.5rem; color: rgba(13,34,53,0.12);
      margin-bottom: 12px;
    }

    /* Quick actions */
    .quick-actions {
      background: var(--navy);
      border-radius: var(--radius-xl);
      padding: 24px; margin-top: 20px;
      box-shadow: var(--shadow-lg);
    }
    .quick-actions h4 {
      font-family: 'Space Grotesk', sans-serif;
      color: #fff; font-weight: 700; font-size: 0.95rem;
      margin-bottom: 16px;
    }
    .quick-actions a {
      display: flex; align-items: center; gap: 10px;
      padding: 10px 14px; border-radius: var(--radius-sm);
      color: rgba(255,255,255,0.60); text-decoration: none;
      font-size: 14px; font-weight: 600;
      transition: all 0.25s; margin-bottom: 4px;
    }
    .quick-actions a:hover {
      color: #fff; background: rgba(255,255,255,0.08);
    }
    .quick-actions a i { width: 16px; text-align: center; }

    @media (max-width: 992px) {
      .school-detail-bento { grid-template-columns: 1fr; }
    }
    @media (max-width: 900px) {
      .school-detail-hero { padding: 120px 24px 50px; }
      .school-detail-content { padding: 32px 24px 60px; }
      .school-info-card { padding: 24px; }
      .school-fields-grid { grid-template-columns: 1fr; }
      .school-field.full-width { grid-column: span 1; }
    }
</style>
@endsection

@section('content')
<!-- School Detail Hero -->
<div class="school-detail-hero">
    <div class="breadcrumb-nav" style="animation: fadeUp 0.6s ease both;">
        <a href="{{ url('/') }}">Home</a>
        <span>/</span>
        <a href="{{ route('cms.schools') }}">ECDE Schools</a>
        <span>/</span>
        <span class="current">{{ $school->school_name }}</span>
    </div>
    <h1 style="animation: fadeUp 0.7s ease 0.1s both;">{{ $school->school_name }}</h1>
    <p class="hero-sub" style="animation: fadeUp 0.7s ease 0.15s both;">School profile and location details.</p>
    <div class="back-pill" style="animation: fadeUp 0.7s ease 0.2s both;">
        <a href="{{ route('cms.schools') }}" class="pill-btn pill-btn-glass">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
            Back to schools
        </a>
    </div>
</div>

<div class="school-detail-content">
    <div class="school-detail-bento">
        <!-- Main Info -->
        <div class="school-info-card reveal">
            <h3><i class="fas fa-school"></i> School Information</h3>
            <div class="school-fields-grid">
                <div class="school-field">
                    <small>School Name</small>
                    <strong>{{ $school->school_name ?? '-' }}</strong>
                </div>
                <div class="school-field">
                    <small>Center Code</small>
                    <strong>{{ $school->center_code ?? '-' }}</strong>
                </div>
                <div class="school-field">
                    <small>County</small>
                    <strong>{{ $school->county->name ?? optional(optional($school->subCounty)->county)->name ?? '-' }}</strong>
                </div>
                <div class="school-field">
                    <small>Sub County</small>
                    <strong>{{ $school->subCounty->name ?? '-' }}</strong>
                </div>
                <div class="school-field">
                    <small>Ward</small>
                    <strong>{{ $school->ward->name ?? '-' }}</strong>
                </div>
                <div class="school-field">
                    <small>Sub Location</small>
                    <strong>{{ $school->subLocation->name ?? '-' }}</strong>
                </div>
                <div class="school-field">
                    <small>Number of Learners</small>
                    <strong>{{ $school->number_of_students ?? '-' }}</strong>
                </div>
                <div class="school-field">
                    <small>Number of Classes</small>
                    <strong>{{ $school->number_of_classes ?? '-' }}</strong>
                </div>
                <div class="school-field full-width">
                    <small>School Location</small>
                    <strong>{{ $school->school_location ?? '-' }}</strong>
                </div>
                <div class="school-field full-width">
                    <small>Remarks</small>
                    <strong>{{ $school->remarks ?? '-' }}</strong>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div>
            <!-- Teacher Card -->
            <div class="teacher-card reveal">
                <div class="teacher-card-header">
                    <h3><i class="fas fa-chalkboard-teacher"></i> Assigned Teacher</h3>
                </div>
                <div class="teacher-card-body">
                    @if($school->teacher)
                        @php
                            $teacherName = trim(($school->teacher->first_name ?? $school->teacher->user->first_name ?? '') . ' ' . ($school->teacher->middle_name ?? $school->teacher->user->middle_name ?? '') . ' ' . ($school->teacher->last_name ?? $school->teacher->user->last_name ?? '')) ?: '-';
                        @endphp
                        <div class="teacher-avatar">
                            {{ strtoupper(substr($teacherName, 0, 1)) }}
                        </div>
                        <div class="teacher-info-row">
                            <small>Name</small>
                            <strong>{{ $teacherName }}</strong>
                        </div>
                        <div class="teacher-info-row">
                            <small>Phone</small>
                            <strong>{{ $school->teacher->phone_number ?? $school->teacher->user->phone_number ?? '-' }}</strong>
                        </div>
                    @else
                        <div class="teacher-empty-state">
                            <i class="fas fa-user-slash"></i>
                            <p class="mb-0">No teacher assigned to this school yet.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions reveal">
                <h4>Explore More</h4>
                <a href="{{ route('cms.schools') }}"><i class="fas fa-school"></i> All Schools</a>
                <a href="{{ route('cms.posts') }}"><i class="fas fa-blog"></i> Blog</a>
                <a href="{{ route('cms.contact') }}"><i class="fas fa-envelope"></i> Contact Us</a>
            </div>
        </div>
    </div>
</div>
@endsection
