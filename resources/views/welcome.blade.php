@extends('front.app')

@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── HERO ────────────────────────────────────────── */
    .hero {
      position: relative; min-height: 100vh;
      display: flex; align-items: center;
      overflow: hidden;
    }
    .hero-bg {
      position: absolute; inset: 0;
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
    }
    .hero-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(110deg,
        rgba(10,26,42,0.88) 0%,
        rgba(10,26,42,0.55) 55%,
        rgba(10,26,42,0.20) 100%);
    }
    /* Diagonal accent strip */
    .hero-strip {
      position: absolute; top: 0; left: 0; bottom: 0; width: 6px;
      background: linear-gradient(to bottom, var(--green-light), var(--gold));
    }
    .hero-content {
      position: relative; z-index: 2;
      max-width: 980px; padding: 0 64px;
      animation: fadeUp .9s ease both;
    }
    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(3rem, 6vw, 5.2rem);
      font-weight: 900; line-height: 1.05;
      color: #fff; margin-bottom: 20px;
      max-width: 860px;
      text-wrap: balance;
      overflow-wrap: normal;
      word-break: normal;
    }
    .hero h1 em { font-style: normal; color: #6ee09a; }
    .hero p {
      font-size: 18px; line-height: 1.7;
      color: rgba(255,255,255,0.72);
      margin-bottom: 40px; max-width: 480px;
    }
    .hero-actions { display: flex; gap: 14px; flex-wrap: wrap; }
    .btn-primary {
      background: var(--green); color: #fff;
      padding: 14px 28px; border-radius: 12px;
      font-size: 15px; font-weight: 600;
      text-decoration: none; border: none; cursor: pointer;
      transition: all .25s; display: inline-flex; align-items: center; gap: 8px;
      box-shadow: 0 4px 20px rgba(26,124,62,0.4);
    }
    .btn-primary:hover { background: var(--green-light); transform: translateY(-2px); box-shadow: 0 8px 28px rgba(26,124,62,0.5); }
    .btn-outline {
      background: transparent; color: #fff;
      padding: 14px 28px; border-radius: 12px;
      font-size: 15px; font-weight: 600;
      text-decoration: none; border: 1.5px solid rgba(255,255,255,0.35); cursor: pointer;
      transition: all .25s; display: inline-flex; align-items: center; gap: 8px;
    }
    .btn-outline:hover { background: rgba(255,255,255,0.10); border-color: #fff; transform: translateY(-2px); }

    /* Stats bar */
    .hero-stats {
      position: absolute; bottom: 0; left: 0; right: 0; z-index: 3;
      display: flex; justify-content: center; gap: 0;
    }
    .stat-item {
      flex: 1; max-width: 200px;
      background: rgba(255,255,255,0.06);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.10);
      border-bottom: none;
      padding: 22px 28px;
      text-align: center;
      border-radius: 16px 16px 0 0;
      margin: 0 6px;
      animation: fadeUp .9s ease both;
    }
    .stat-item:nth-child(2) { animation-delay: .1s; }
    .stat-item:nth-child(3) { animation-delay: .2s; }
    .stat-num { font-family: 'Playfair Display', serif; font-size: 2.2rem; font-weight: 700; color: #fff; line-height: 1; }
    .stat-label { font-size: 12px; color: rgba(255,255,255,0.55); margin-top: 4px; letter-spacing: 0.06em; text-transform: uppercase; }

    /* scroll cue */
    .scroll-cue {
      position: absolute; bottom: 130px; right: 60px; z-index: 3;
      display: flex; flex-direction: column; align-items: center; gap: 8px;
      color: rgba(255,255,255,0.4); font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase;
    }
    .scroll-line { width: 1px; height: 48px; background: rgba(255,255,255,0.25); animation: scrollPulse 2s ease-in-out infinite; }
    @keyframes scrollPulse {
      0%,100% { transform: scaleY(1); opacity: .4; }
      50% { transform: scaleY(1.2); opacity: .8; }
    }

    /* ─── ECDE SCHOOLS ─────────────────────────────────── */
    .schools-section {
      background: var(--navy);
      position: relative; overflow: hidden;
    }
    .schools-section::before {
      content: ''; position: absolute;
      top: -120px; right: -120px;
      width: 480px; height: 480px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(26,124,62,0.15) 0%, transparent 70%);
      pointer-events: none;
    }
    .schools-section .section-label { color: #6ee09a; }
    .schools-section .section-label::before { background: #6ee09a; }
    .schools-section .section-title { color: #fff; }

    .schools-header {
      display: flex; align-items: flex-end; justify-content: space-between;
      margin-bottom: 48px; gap: 24px; flex-wrap: wrap;
      position: relative; z-index: 1;
    }
    .schools-header .section-sub { color: rgba(255,255,255,0.55); margin-bottom: 0; }
    .view-all-light {
      color: #6ee09a; font-weight: 600; font-size: 14px;
      text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
      border-bottom: 1.5px solid transparent; transition: border-color .2s; white-space: nowrap;
    }
    .view-all-light:hover { border-bottom-color: #6ee09a; }

    .schools-overview-stats {
      display: grid;
      grid-template-columns: repeat(4, minmax(170px, 1fr));
      gap: 16px;
      margin: 0 0 30px;
      position: relative;
      z-index: 1;
    }
    .schools-overview-card {
      background: rgba(255,255,255,0.04);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 16px;
      padding: 20px 18px;
      min-height: 132px;
      display: flex;
      flex-direction: column;
      gap: 7px;
    }
    .schools-overview-value {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.9rem, 3vw, 2.2rem);
      font-weight: 700;
      color: #fff;
      line-height: 1;
    }
    .schools-overview-title {
      color: #fff;
      font-weight: 700;
      font-size: 13px;
      letter-spacing: 0.02em;
    }
    .schools-overview-desc {
      color: rgba(255,255,255,0.55);
      font-size: 12px;
      line-height: 1.45;
    }

    .schools-grid {
      display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px; position: relative; z-index: 1;
    }
    .school-card {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.10);
      border-radius: 20px; overflow: hidden;
      transition: transform .3s, background .3s;
      position: relative;
    }
    .school-card:hover { background: rgba(255,255,255,0.09); transform: translateY(-5px); }

    .school-card-img {
      width: 100%; height: 180px; object-fit: cover; object-position: center;
      display: block;
      background: linear-gradient(135deg, rgba(26,124,62,0.20), rgba(13,34,53,0.40));
    }
    .school-card-img-placeholder {
      width: 100%; height: 180px;
      background: linear-gradient(135deg, rgba(26,124,62,0.18), rgba(13,34,53,0.50));
      display: flex; align-items: center; justify-content: center;
    }
    .school-card-img-placeholder svg { width: 44px; height: 44px; color: rgba(255,255,255,0.25); }
    .school-card-body { padding: 22px 22px 24px; }
    .school-subcounty {
      display: inline-flex; align-items: center; gap: 6px;
      background: rgba(26,124,62,0.22); color: #6ee09a;
      font-size: 10px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
      padding: 4px 10px; border-radius: 30px; margin-bottom: 12px;
    }
    .school-subcounty-dot { width: 5px; height: 5px; border-radius: 50%; background: #6ee09a; }
    .school-name {
      font-family: 'Playfair Display', serif;
      font-size: 1.05rem; font-weight: 700; color: #fff;
      line-height: 1.3; margin-bottom: 10px;
    }
    .school-stats { display: flex; gap: 18px; margin-bottom: 16px; }
    .school-stat { display: flex; flex-direction: column; }
    .school-stat-num { font-weight: 700; font-size: 15px; color: #fff; }
    .school-stat-label { font-size: 11px; color: rgba(255,255,255,0.40); margin-top: 1px; }
    .school-divider { border: none; border-top: 1px solid rgba(255,255,255,0.08); margin: 14px 0; }
    .school-footer { display: flex; align-items: center; justify-content: space-between; }
    .school-type {
      font-size: 12px; color: rgba(255,255,255,0.45);
      display: flex; align-items: center; gap: 5px;
    }
    .school-type svg { width: 12px; height: 12px; }
    .school-link {
      color: #6ee09a; font-weight: 600; font-size: 13px;
      text-decoration: none; display: inline-flex; align-items: center; gap: 4px;
    }
    .school-link svg { transition: transform .2s; }
    .school-link:hover svg { transform: translateX(4px); }

    /* ─── GOVERNOR'S MESSAGE ─────────────────────────── */
    .governor-section { background: var(--cream); overflow: hidden; }
    .governor-inner {
      display: grid; grid-template-columns: 1fr 1.15fr;
      gap: 72px; align-items: center;
    }
    .governor-inner.no-image {
      grid-template-columns: 1fr;
      max-width: 980px;
      margin: 0 auto;
    }
    .governor-photo-wrap { position: relative; }
    .governor-photo-frame {
      position: relative; border-radius: 24px; overflow: hidden;
      aspect-ratio: 4/5; max-width: 420px;
      box-shadow: 0 32px 64px rgba(13,34,53,0.16);
    }
    .governor-photo-frame img {
      width: 100%; height: 100%; object-fit: cover; object-position: top;
      display: block;
    }
    .governor-photo-wrap::before {
      content: ''; position: absolute;
      top: 24px; left: -24px;
      width: calc(100% - 24px); height: calc(100% - 24px);
      max-width: 420px;
      border-radius: 24px;
      border: 2px solid var(--green);
      opacity: .25; z-index: 0;
    }
    .governor-photo-frame { position: relative; z-index: 1; }
    .governor-badge {
      position: absolute; bottom: -20px; right: 0;
      background: var(--navy); color: #fff;
      padding: 14px 20px; border-radius: 16px;
      box-shadow: 0 12px 32px rgba(13,34,53,0.24);
      z-index: 2; min-width: 160px;
    }
    .governor-badge-name { font-weight: 700; font-size: 14px; }
    .governor-badge-title { font-size: 12px; color: rgba(255,255,255,0.55); margin-top: 2px; }
    .governor-badge-dot {
      width: 8px; height: 8px; border-radius: 50%;
      background: var(--green-light); display: inline-block; margin-right: 6px;
    }
    .governor-content { padding-top: 8px; }
    .governor-content .section-sub { margin-bottom: 28px; max-width: 100%; }
    .governor-quote {
      background: var(--white);
      border-left: 4px solid var(--green);
      border-radius: 0 16px 16px 0;
      padding: 28px 32px;
      margin-bottom: 32px;
      position: relative;
    }
    .governor-quote::before {
      content: '\201C';
      font-family: 'Playfair Display', serif;
      font-size: 5rem; line-height: .5;
      color: var(--green-pale);
      position: absolute; top: 20px; right: 24px;
      user-select: none; pointer-events: none;
    }
    .governor-quote p {
      font-size: 17px; line-height: 1.8; color: var(--text);
      font-style: italic; position: relative; z-index: 1;
    }
    .governor-meta {
      display: flex; align-items: center; gap: 14px; margin-bottom: 32px;
    }
    .governor-avatar {
      width: 52px; height: 52px; border-radius: 50%;
      background: linear-gradient(135deg, var(--green), var(--navy));
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-size: 20px; font-weight: 700; flex-shrink: 0;
      overflow: hidden;
    }
    .governor-avatar img { width: 100%; height: 100%; object-fit: cover; }
    .governor-meta-name { font-weight: 700; font-size: 16px; color: var(--navy); }
    .governor-meta-role { font-size: 13px; color: var(--text-muted); margin-top: 2px; }

    /* ─── TESTIMONIALS ────────────────────────────────── */
    .testimonials-section { background: var(--cream); position: relative; }
    .testimonials-section .section-sub { margin-bottom: 48px; }

    .testi-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 24px; }
    .testi-card {
      background: var(--white);
      border-radius: 20px; padding: 36px 32px;
      border: 1px solid var(--border);
      position: relative;
      transition: transform .3s, box-shadow .3s;
    }
    .testi-card:hover { transform: translateY(-5px); box-shadow: 0 18px 40px rgba(13,34,53,0.09); }
    .testi-quote-icon {
      font-family: 'Playfair Display', serif;
      font-size: 5rem; line-height: 0.6;
      color: var(--green-pale); position: absolute; top: 24px; right: 28px;
      user-select: none; pointer-events: none;
    }
    .testi-text { font-size: 16px; line-height: 1.75; color: var(--text); font-style: italic; margin-bottom: 24px; }
    .testi-author { display: flex; align-items: center; gap: 14px; }
    .testi-avatar {
      width: 44px; height: 44px; border-radius: 50%;
      background: linear-gradient(135deg, var(--green), var(--navy));
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-size: 18px; font-weight: 700;
      flex-shrink: 0;
    }
    .testi-name { font-weight: 700; font-size: 15px; color: var(--navy); }
    .testi-role { font-size: 13px; color: var(--text-muted); }

    @media (max-width: 900px) {
        .hero-content { padding: 0 28px; }
        .hero-stats { display: none; }
        .schools-header { flex-direction: column; align-items: flex-start; }
        .schools-overview-stats { grid-template-columns: repeat(2, minmax(150px, 1fr)); }
    }

    @media (max-width: 1024px) {
      .governor-inner { grid-template-columns: 1fr; gap: 48px; }
      .governor-photo-wrap { display: flex; justify-content: center; }
      .governor-photo-frame { max-width: 320px; }
      .schools-overview-stats { grid-template-columns: repeat(2, minmax(150px, 1fr)); }
    }

    @media (max-width: 560px) {
      .schools-overview-stats { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
  @php
    $showHomeHero = (int)($settings['show_home_hero'] ?? 1) === 1;
    $showHomeGovernor = (int)($settings['show_home_posts'] ?? 1) === 1;
    $showHomeSchools = (int)($settings['show_home_announcements'] ?? 1) === 1;
    $showHomeTestimonials = (int)($settings['show_home_testimonials'] ?? 1) === 1;

    $heroHeadline = $settings['home_hero_headline'] ?? ($settings['site_name'] ?? 'Laikipia CDF Management System');
    $heroHeadlineInline = preg_replace('/\s*<br\s*\/?>\s*/i', ' ', (string) $heroHeadline);
    $heroSubtext = $settings['home_hero_subtext'] ?? ($settings['site_description'] ?? 'Empowering communities through education and development.');
    $heroPrimaryText = $settings['home_hero_primary_cta_text'] ?? 'Read News';
    $heroPrimaryLink = $settings['home_hero_primary_cta_link'] ?? route('cms.posts');
    $heroSecondaryText = $settings['home_hero_secondary_cta_text'] ?? 'Contact Us';
    $heroSecondaryLink = $settings['home_hero_secondary_cta_link'] ?? route('cms.contact');
    $heroImageUrl = !empty($settings['home_hero_image']) ? asset('storage/' . $settings['home_hero_image']) : 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=1600&q=80';

    $heroStatOneValue = count($recentPosts ?? []);
    $heroStatTwoValue = count($activeAnnouncements ?? []);
    $heroStatThreeValue = count($featuredTestimonials ?? []);

    $heroStatOneLabel = $settings['home_hero_stat_one_label'] ?? 'Latest Posts';
    $heroStatTwoLabel = $settings['home_hero_stat_two_label'] ?? 'Announcements';
    $heroStatThreeLabel = $settings['home_hero_stat_three_label'] ?? 'Testimonials';

    $governorName = $settings['home_governor_name'] ?? 'H.E. The Governor';
    $governorTitle = $settings['home_governor_title'] ?? 'Governor, Laikipia County Government';
    $governorBadgeTitle = $settings['home_governor_badge_title'] ?? 'Laikipia County';
    $governorSectionLabel = $settings['home_governor_section_label'] ?? 'Message from the Governor';
    $governorHeadingLineOne = $settings['home_governor_heading_line_one'] ?? 'A Word from';
    $governorHeadingLineTwo = $settings['home_governor_heading_line_two'] ?? 'the Governor';
    $governorSubtitle = $settings['home_governor_subtitle'] ?? ($settings['home_governor_intro'] ?? 'A Word from the Governor');
    $governorQuote = $settings['home_governor_quote'] ?? 'Investing in ECDE is investing in the soul of our county. When we equip our youngest learners with quality education and nurturing environments, we build a generation capable of transforming Laikipia and all of Kenya.';
    $governorCtaText = $settings['home_governor_cta_text'] ?? 'Read Full Message';
    $governorImage = $settings['home_governor_image'] ?? null;
    $governorMessageLink = $settings['home_governor_message_url'] ?? route('cms.page', 'about');

    if (!empty($governorImage)) {
      if (\Illuminate\Support\Str::startsWith($governorImage, ['http://', 'https://'])) {
        $governorImageUrl = $governorImage;
      } else {
        $governorImageUrl = asset('storage/' . ltrim($governorImage, '/'));
      }
    } else {
      $governorImageUrl = null;
    }
  @endphp

@if($showHomeHero)
<section class="hero">
  <div class="hero-bg" style="background-image: url('{{ $heroImageUrl }}');"></div>
  <div class="hero-overlay"></div>
  <div class="hero-strip"></div>

  <div class="hero-content">
    <h1>{!! $heroHeadlineInline !!}</h1>
    <p>{{ $heroSubtext }}</p>
    <div class="hero-actions">
      <a href="{{ $heroPrimaryLink }}" class="btn-primary">
        {{ $heroPrimaryText }}
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
      <a href="{{ $heroSecondaryLink }}" class="btn-outline">{{ $heroSecondaryText }}</a>
    </div>
  </div>

  <div class="hero-stats">
    <div class="stat-item"><div class="stat-num">{{ $heroStatOneValue }}</div><div class="stat-label">{{ $heroStatOneLabel }}</div></div>
    <div class="stat-item"><div class="stat-num">{{ $heroStatTwoValue }}</div><div class="stat-label">{{ $heroStatTwoLabel }}</div></div>
    <div class="stat-item"><div class="stat-num">{{ $heroStatThreeValue }}</div><div class="stat-label">{{ $heroStatThreeLabel }}</div></div>
  </div>

  <a href="#home-content-start" class="scroll-cue text-decoration-none">
    <div class="scroll-line"></div>
    Scroll
  </a>
</section>
@endif


<div id="home-content-start">
@if($showHomeGovernor)
<section class="governor-section">
  <div class="governor-inner {{ $governorImageUrl ? '' : 'no-image' }}">
    @if($governorImageUrl)
    <div class="governor-photo-wrap reveal">
      <div class="governor-photo-frame">
        <img src="{{ $governorImageUrl }}" alt="{{ $governorName }}">
      </div>
      <div class="governor-badge">
        <div><span class="governor-badge-dot"></span><span class="governor-badge-name">{{ $governorName }}</span></div>
        <div class="governor-badge-title">{{ $governorBadgeTitle }}</div>
      </div>
    </div>
    @endif

    <div class="governor-content reveal">
      <div class="section-label">{{ $governorSectionLabel }}</div>
      <div class="section-title">{{ $governorHeadingLineOne }}<br>{{ $governorHeadingLineTwo }}</div>
      <div class="section-sub">{{ $governorSubtitle }}</div>

      <div class="governor-quote">
        <p>{{ $governorQuote }}</p>
      </div>

      <div class="governor-meta">
        <div class="governor-avatar">
          @if($governorImageUrl)
            <img src="{{ $governorImageUrl }}" alt="{{ $governorName }}">
          @else
            {{ strtoupper(substr($governorName, 0, 1)) }}
          @endif
        </div>
        <div>
          <div class="governor-meta-name">{{ $governorName }}</div>
          <div class="governor-meta-role">{{ $governorTitle }}</div>
        </div>
      </div>

      <a href="{{ $governorMessageLink }}" class="btn-primary" style="width:fit-content;">
        {{ $governorCtaText }}
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>
@endif

@if($showHomeSchools)
<section class="schools-section">
  <div class="schools-header reveal">
    <div>
      <div class="section-label" style="color:#6ee09a;">Our Schools</div>
      <div class="section-title" style="color:#fff;">ECDE Schools<br>Across Laikipia</div>
      <div class="section-sub" style="color:rgba(255,255,255,.55); margin-top:8px;">Explore early childhood centres operating across all sub-counties in Laikipia County.</div>
    </div>
    <a href="{{ route('cms.schools') }}" class="view-all-light">View all schools →</a>
  </div>

  <div class="schools-overview-stats reveal">
    <div class="schools-overview-card">
      <div class="schools-overview-value">{{ number_format($totalEcdeCentres ?? 0) }}</div>
      <div class="schools-overview-title">Total ECDE Centres</div>
      <div class="schools-overview-desc">Across all sub-counties in Laikipia</div>
    </div>
    <div class="schools-overview-card">
      <div class="schools-overview-value">{{ number_format($totalLearners ?? 0) }}</div>
      <div class="schools-overview-title">Total Learners</div>
      <div class="schools-overview-desc">Enrolled in current academic term</div>
    </div>
    <div class="schools-overview-card">
      <div class="schools-overview-value">{{ number_format($totalTeachers ?? 0) }}</div>
      <div class="schools-overview-title">Total Teachers</div>
      <div class="schools-overview-desc">Trained and deployed county-wide</div>
    </div>
    <div class="schools-overview-card">
      <div class="schools-overview-value">{{ number_format($totalSubCounties ?? 0) }}</div>
      <div class="schools-overview-title">Sub-Counties</div>
      <div class="schools-overview-desc">Covered by the ECDE programme</div>
    </div>
  </div>

  <div class="schools-grid">
    @forelse(($ecde_schools ?? collect())->take(6) as $school)
    @php
      $schoolImage = $school->image_path ?? null;
      $schoolImageUrl = null;

      if (!empty($schoolImage)) {
          if (\Illuminate\Support\Str::startsWith($schoolImage, ['http://', 'https://'])) {
              $schoolImageUrl = $schoolImage;
          } elseif (\Illuminate\Support\Str::startsWith($schoolImage, ['/storage/', 'storage/'])) {
              $schoolImageUrl = asset(ltrim($schoolImage, '/'));
          } else {
              $schoolImageUrl = asset('storage/' . ltrim($schoolImage, '/'));
          }
      }

      $schoolWard = optional($school->ward)->name ?? 'Laikipia County';
      $schoolStudents = $school->number_of_students ?? 0;
      $schoolClasses = $school->number_of_classes ?? 0;
      $schoolType = $school->class_rooms_status ?? 'Public';
    @endphp

    <div class="school-card reveal">
      @if($schoolImageUrl)
        <img class="school-card-img" src="{{ $schoolImageUrl }}" alt="{{ $school->school_name }}" loading="lazy">
      @else
        <div class="school-card-img-placeholder">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
      @endif

      <div class="school-card-body">
        <div class="school-subcounty"><span class="school-subcounty-dot"></span>{{ $schoolWard }}</div>
        <div class="school-name">{{ $school->school_name }}</div>
        <div class="school-stats">
          <div class="school-stat"><span class="school-stat-num">{{ $schoolStudents }}</span><span class="school-stat-label">Learners</span></div>
          <div class="school-stat"><span class="school-stat-num">{{ $schoolClasses }}</span><span class="school-stat-label">Classes</span></div>
          <div class="school-stat"><span class="school-stat-num">{{ $schoolClasses }}</span><span class="school-stat-label">Streams</span></div>
        </div>

        <div class="school-divider"></div>
        <div class="school-footer">
          <div class="school-type">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            {{ $schoolType }}
          </div>
          <a href="{{ route('cms.schools') }}" class="school-link">View <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        </div>
      </div>
    </div>
    @empty
    @endforelse
  </div>
</section>
@endif

@if($showHomeTestimonials)
<section class="testimonials-section">
  <div class="reveal">
    <div class="section-label">Testimonials</div>
    <div class="section-title">What People Say</div>
    <div class="section-sub">Voices from our community — parents, teachers, and administrators share their experiences.</div>
  </div>

  <div class="testi-grid">
    @forelse(($featuredTestimonials ?? collect()) as $testimonial)
    <div class="testi-card reveal">
      <div class="testi-quote-icon">"</div>
      <div class="testi-text">“{{ \Illuminate\Support\Str::limit($testimonial->message, 120) }}”</div>
      <div class="testi-author">
        <div class="testi-avatar">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</div>
        <div>
          <div class="testi-name">{{ $testimonial->name }}</div>
          <div class="testi-role">{{ $testimonial->role ?? 'Community Member' }}</div>
        </div>
      </div>
    </div>
    @empty
        <div class="col-12"><div class="alert alert-secondary mb-0">No approved testimonials yet.</div></div>
    @endforelse
  </div>
</section>
@endif

</div>

@endsection

