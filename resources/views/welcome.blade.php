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
      max-width: 640px; padding: 0 64px;
      animation: fadeUp .9s ease both;
    }
    .hero-eyebrow {
      display: inline-flex; align-items: center; gap: 8px;
      background: rgba(26,124,62,0.25);
      border: 1px solid rgba(37,168,87,0.40);
      color: #6ee09a; font-size: 12px; font-weight: 600;
      letter-spacing: 0.12em; text-transform: uppercase;
      padding: 6px 14px; border-radius: 30px;
      margin-bottom: 28px;
    }
    .hero-eyebrow span { width: 6px; height: 6px; border-radius: 50%; background: #6ee09a; display: inline-block; }
    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(3rem, 6vw, 5.2rem);
      font-weight: 900; line-height: 1.05;
      color: #fff; margin-bottom: 20px;
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

    /* ─── LATEST POSTS ────────────────────────────────── */
    .posts-section { background: var(--cream); }
    .posts-header { display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 48px; }
    .posts-header .section-sub { margin-bottom: 0; }
    .view-all {
      color: var(--green); font-weight: 600; font-size: 14px;
      text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
      border-bottom: 1.5px solid transparent; transition: border-color .2s;
      white-space: nowrap; padding-bottom: 2px;
    }
    .view-all:hover { border-color: var(--green); }

    .posts-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 28px; }

    .post-card {
      background: var(--white);
      border-radius: 20px;
      overflow: hidden;
      border: 1px solid var(--border);
      transition: transform .3s, box-shadow .3s;
      display: flex; flex-direction: column;
      position: relative;
      text-decoration: none;
    }
    .post-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
      background: linear-gradient(90deg, var(--green), var(--green-light));
      opacity: 0; transition: opacity .3s;
    }
    .post-card:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(13,34,53,0.10); }
    .post-card:hover::before { opacity: 1; }

    .post-image {
      width: 100%; height: 200px; object-fit: cover;
      background: linear-gradient(135deg, #e0ede6, #c8dbd0);
      display: flex; align-items: center; justify-content: center;
      overflow: hidden;
    }
    .post-image-placeholder {
      width: 100%; height: 200px;
      background: linear-gradient(135deg, var(--green-pale), #d0e8da);
      display: flex; align-items: center; justify-content: center;
    }
    .post-image-placeholder svg { width: 48px; height: 48px; color: var(--green); opacity: .35; }

    .post-body { padding: 28px 28px 32px; flex: 1; display: flex; flex-direction: column; }
    .post-tag {
      display: inline-block;
      background: var(--green-pale); color: var(--green);
      font-size: 11px; font-weight: 700; letter-spacing: 0.10em; text-transform: uppercase;
      padding: 5px 12px; border-radius: 30px;
      margin-bottom: 14px; width: fit-content;
    }
    .post-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.15rem; font-weight: 700; color: var(--navy);
      line-height: 1.35; margin-bottom: 10px;
    }
    .post-date {
      font-size: 13px; color: var(--text-muted);
      display: flex; align-items: center; gap: 6px; margin-bottom: 14px;
    }
    .post-date svg { width: 13px; height: 13px; }
    .post-excerpt { font-size: 14px; line-height: 1.7; color: var(--text-muted); flex: 1; margin-bottom: 20px; }
    .post-link {
      color: var(--green); font-weight: 600; font-size: 14px;
      text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
      margin-top: auto;
    }
    .post-link svg { transition: transform .2s; }
    .post-link:hover svg { transform: translateX(4px); }

    /* ─── ANNOUNCEMENTS ───────────────────────────────── */
    .announcements-section {
      background: var(--navy);
      position: relative; overflow: hidden;
    }
    .announcements-section::before {
      content: ''; position: absolute;
      top: -120px; right: -120px;
      width: 480px; height: 480px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(26,124,62,0.15) 0%, transparent 70%);
      pointer-events: none;
    }
    .announcements-section .section-label { color: #6ee09a; }
    .announcements-section .section-label::before { background: #6ee09a; }
    .announcements-section .section-title { color: #fff; }
    .announcements-section .section-sub { color: rgba(255,255,255,0.55); }

    .ann-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
    .ann-card {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.10);
      border-radius: 18px; padding: 28px 28px 24px;
      transition: background .3s, transform .3s;
      position: relative; overflow: hidden;
      text-decoration: none;
    }
    .ann-card::after {
      content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px;
      background: linear-gradient(to bottom, var(--green-light), var(--gold));
      border-radius: 3px 0 0 3px;
    }
    .ann-card:hover { background: rgba(255,255,255,0.09); transform: translateY(-4px); }
    .ann-tag {
      display: inline-block;
      background: rgba(26,124,62,0.25); color: #6ee09a;
      font-size: 10px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;
      padding: 4px 10px; border-radius: 30px; margin-bottom: 12px;
    }
    .ann-title { font-family: 'Playfair Display', serif; font-size: 1.05rem; font-weight: 700; color: #fff; margin-bottom: 8px; }
    .ann-date { font-size: 12px; color: rgba(255,255,255,0.40); margin-bottom: 12px; display: flex; align-items: center; gap: 5px; }
    .ann-excerpt { font-size: 14px; color: rgba(255,255,255,0.55); line-height: 1.65; margin-bottom: 18px; }
    .ann-link { color: #6ee09a; font-weight: 600; font-size: 13px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; }

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

    /* ─── EXPLORE / QUICK LINKS ───────────────────────── */
    .explore-section {
      background: var(--green);
      padding: 72px 64px;
      position: relative; overflow: hidden;
    }
    .explore-section::before {
      content: ''; position: absolute;
      width: 600px; height: 600px; border-radius: 50%;
      border: 1px solid rgba(255,255,255,0.08);
      right: -200px; top: -200px;
    }
    .explore-section::after {
      content: ''; position: absolute;
      width: 400px; height: 400px; border-radius: 50%;
      border: 1px solid rgba(255,255,255,0.06);
      right: -100px; top: -100px;
    }
    .explore-inner { display: flex; align-items: center; justify-content: space-between; gap: 40px; flex-wrap: wrap; position: relative; z-index: 1; }
    .explore-text .section-title { color: #fff; margin-bottom: 8px; }
    .explore-text p { color: rgba(255,255,255,0.70); font-size: 16px; }
    .explore-text .section-label { color: rgba(255,255,255,0.70); }
    .explore-text .section-label::before { background: rgba(255,255,255,0.70); }
    .explore-links { display: flex; gap: 12px; flex-wrap: wrap; }
    .explore-link {
      background: rgba(255,255,255,0.12); color: #fff;
      padding: 12px 22px; border-radius: 12px;
      text-decoration: none; font-weight: 600; font-size: 14px;
      border: 1px solid rgba(255,255,255,0.20);
      transition: all .25s;
      display: inline-flex; align-items: center; gap: 7px;
    }
    .explore-link:hover { background: rgba(255,255,255,0.25); transform: translateY(-2px); }

    @media (max-width: 900px) {
        .hero-content { padding: 0 28px; }
        .hero-stats { display: none; }
        .posts-header { flex-direction: column; align-items: flex-start; gap: 12px; }
        .explore-section { padding: 56px 28px; }
    }
</style>
@endsection

@section('content')
  @php
    $showHomeHero = (int)($settings['show_home_hero'] ?? 1) === 1;
    $showHomePosts = (int)($settings['show_home_posts'] ?? 1) === 1;
    $showHomeAnnouncements = (int)($settings['show_home_announcements'] ?? 1) === 1;
    $showHomeTestimonials = (int)($settings['show_home_testimonials'] ?? 1) === 1;
    $showHomeExplore = (int)($settings['show_home_explore'] ?? 1) === 1;

    $heroHeadline = $settings['home_hero_headline'] ?? ($settings['site_name'] ?? 'Laikipia CDF Management System');
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
  @endphp

@if($showHomeHero)
<section class="hero">
  <div class="hero-bg" style="background-image: url('{{ $heroImageUrl }}');"></div>
  <div class="hero-overlay"></div>
  <div class="hero-strip"></div>

  <div class="hero-content">
    <div class="hero-eyebrow"><span></span> Laikipia County — Early Childhood Education</div>
    <h1>{!! $heroHeadline !!}</h1>
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
@if($showHomePosts)
<section class="posts-section">
  <div class="posts-header reveal">
    <div>
      <div class="section-label">Latest Posts</div>
      <div class="section-title">News &amp; Updates</div>
    </div>
    <a href="{{ route('cms.posts') }}" class="view-all">View all posts →</a>
  </div>

  <div class="posts-grid">
    @forelse(($recentPosts ?? collect()) as $post)
    <a href="{{ route('cms.post', $post->slug) }}" class="post-card reveal">
      <div class="post-image-placeholder">
        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg>
      </div>
      <div class="post-body">
        <span class="post-tag">Blog</span>
        <div class="post-title">{{ $post->title }}</div>
        <div class="post-date">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') ?? 'N/A' }}
        </div>
        <div class="post-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 110) }}</div>
        <div class="post-link">Read more <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
      </div>
    </a>
    @empty
        <div class="col-12">
            <div class="empty-state">
                <i class="fa fa-newspaper-o"></i>
                <h5 class="mb-2">No posts yet</h5>
                <p class="mb-0">Fresh stories and updates will appear here soon.</p>
            </div>
        </div>
    @endforelse
  </div>
</section>
@endif

@if($showHomeAnnouncements)
<section class="announcements-section">
  <div class="reveal">
    <div class="section-label">Announcements</div>
    <div class="section-title" style="color:#fff;">Important Notices</div>
    <div class="section-sub">Stay informed with the latest official announcements from Laikipia ECDE.</div>
  </div>

  <div class="ann-grid">
    @forelse(($activeAnnouncements ?? collect()) as $announcement)
    <a href="{{ route('cms.announcement.show', $announcement->id) }}" class="ann-card reveal">
      <div class="ann-tag">Announcement</div>
      <div class="ann-title">{{ $announcement->title }}</div>
      <div class="ann-date">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="13" height="13"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
        {{ optional($announcement->created_at)->format('M d, Y') }}
      </div>
      <div class="ann-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($announcement->content), 110) }}</div>
      <div class="ann-link">Read More →</div>
    </a>
    @empty
        <div class="col-12">
            <div class="empty-state" style="background: rgba(255,255,255,0.05); border-color: rgba(255,255,255,0.2); color: rgba(255,255,255,0.7);">
                <i class="fa fa-bullhorn" style="color: #fff;"></i>
                <h5 class="mb-2" style="color: #fff;">No announcements right now</h5>
                <p class="mb-0">Important notices will be posted here.</p>
            </div>
        </div>
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

@if($showHomeExplore)
<section class="explore-section">
  <div class="explore-inner">
    <div class="explore-text reveal">
      <div class="section-label">Explore</div>
      <div class="section-title">Find What You Need</div>
      <p>Quick access to all sections of the platform.</p>
    </div>
    <div class="explore-links reveal">
      <a href="{{ route('cms.posts') }}" class="explore-link">
        <i class="fa fa-newspaper"></i>
        Blog
      </a>
      <a href="{{ route('cms.galleries') }}" class="explore-link">
        <i class="fa fa-images"></i>
        Galleries
      </a>
      <a href="{{ route('cms.faqs') }}" class="explore-link">
        <i class="fa fa-question-circle"></i>
        FAQs
      </a>
      <a href="{{ route('cms.announcements') }}" class="explore-link">
        <i class="fa fa-bullhorn"></i>
        Announcements
      </a>
      <a href="{{ route('cms.contact') }}" class="explore-link">
        <i class="fa fa-phone"></i>
        Contact
      </a>
    </div>
  </div>
</section>
@endif
</div>

@endsection

