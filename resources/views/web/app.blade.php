<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ $settings['site_name'] ?? 'Laikipia ECDE Management System' }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWix+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkR4j8lN2R7+P7q6T2A2R4cV2N4s46HoPazg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/v4-shims.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{asset('main.d810cf0ae7f39f28f336.css')}}" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --navy: #0d2235;
      --navy-mid: #163348;
      --navy-light: #1e4060;
      --green: #1a7c3e;
      --green-light: #25a857;
      --green-pale: #e8f5ee;
      --green-glow: #34d399;
      --gold: #f59e0b;
      --gold-light: #fbbf24;
      --cream: #faf9f6;
      --cream-warm: #f5f0e8;
      --white: #ffffff;
      --text: #1a2530;
      --text-muted: #6b7c8d;
      --border: rgba(13,34,53,0.08);
      nav {
        position: fixed; top: 0; left: 0; right: 0; z-index: 100;
        display: flex; align-items: center; justify-content: space-between;
        padding: 0 40px;
        height: 68px;
        background: rgba(13,34,53,0.92);
        backdrop-filter: blur(14px);
        border-bottom: 1px solid rgba(255,255,255,0.07);
      }
      .nav-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
      .nav-brand img { height: 38px; }
      .nav-brand span {
        font-family: 'Manrope', sans-serif;
        font-weight: 600; font-size: 15px;
        color: #fff; letter-spacing: 0.01em;
      }
      .nav-links { display: flex; gap: 6px; }
      .nav-links a {
        color: rgba(255,255,255,0.75);
        text-decoration: none; font-size: 14px; font-weight: 500;
        padding: 7px 14px; border-radius: 8px;
        transition: all .2s;
      }
      .nav-links a:hover { color: #fff; background: rgba(255,255,255,0.08); }
      .nav-links a.active { color: #fff; background: rgba(255,255,255,0.12); }
      .nav-user {
        display: flex; align-items: center; gap: 8px;
        background: rgba(255,255,255,0.10);
        border: 1px solid rgba(255,255,255,0.15);
        color: #fff; font-size: 14px; font-weight: 500;
        padding: 8px 16px; border-radius: 30px; cursor: pointer;
        transition: background .2s;
        text-decoration: none;
      }
      .nav-user:hover { background: rgba(255,255,255,0.18); }
      .nav-user svg { width: 16px; height: 16px; }
      transform: translateY(-3px);
    }

    .pill-btn-dark {
      background: var(--navy); color: #fff;
      box-shadow: 0 8px 24px rgba(13,34,53,0.25);
    }
    .pill-btn-dark:hover {
      background: var(--navy-mid);
      transform: translateY(-3px);
      box-shadow: 0 12px 36px rgba(13,34,53,0.35);
      color: #fff;
    }

    .pill-btn-glass {
      background: rgba(255,255,255,0.12);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.18);
      color: #fff;
    }
    .pill-btn-glass:hover {
      background: rgba(255,255,255,0.22);
      transform: translateY(-2px);
      color: #fff;
    }

    .pill-btn svg { transition: transform 0.3s; }
    .pill-btn:hover svg { transform: translateX(3px); }

    /* Arrow icon for buttons */
    .btn-arrow { width: 16px; height: 16px; }

    /* ─── BADGE / TAG PILLS ───────────────────────────── */
    .tag-pill {
      display: inline-flex; align-items: center; gap: 6px;
      padding: 6px 16px; border-radius: var(--radius-pill);
      font-size: 12px; font-weight: 700;
      letter-spacing: 0.08em; text-transform: uppercase;
    }
    .tag-pill-green {
      background: rgba(26,124,62,0.12); color: var(--green);
    }
    .tag-pill-gold {
      background: rgba(245,158,11,0.12); color: #d97706;
    }
    .tag-pill-navy {
      background: rgba(13,34,53,0.08); color: var(--navy);
    }

    /* ─── GLASSMORPHISM NAV ───────────────────────────── */
    nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      display: flex; align-items: center; justify-content: space-between;
      padding: 0 48px;
      height: 72px;
      background: rgba(13,34,53,0.85);
      backdrop-filter: blur(20px) saturate(180%);
      -webkit-backdrop-filter: blur(20px) saturate(180%);
      border-bottom: 1px solid rgba(255,255,255,0.06);
      transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
    }
    nav.scrolled {
      background: rgba(13,34,53,0.96);
      box-shadow: 0 4px 30px rgba(0,0,0,0.15);
      height: 64px;
    }
    .nav-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
    .nav-brand img { height: 40px; transition: transform 0.3s; }
    .nav-brand:hover img { transform: rotate(-5deg) scale(1.05); }
    .nav-brand span {
      font-family: 'Space Grotesk', 'Manrope', sans-serif;
      font-weight: 700; font-size: 16px;
      color: #fff; letter-spacing: 0.02em;
    }
    .nav-links { display: flex; gap: 4px; }
    .nav-links a {
      color: rgba(255,255,255,0.70);
      text-decoration: none; font-size: 14px; font-weight: 600;
      padding: 8px 16px; border-radius: var(--radius-pill);
      transition: all .25s cubic-bezier(0.4,0,0.2,1);
      position: relative;
    }
    .nav-links a:hover {
      color: #fff;
      background: rgba(255,255,255,0.10);
    }
    .nav-links a.active {
      color: #fff;
      background: rgba(52,211,153,0.18);
    }
    .nav-links a.active::after {
      content: ''; position: absolute; bottom: 4px; left: 50%; transform: translateX(-50%);
      width: 20px; height: 3px; border-radius: 3px;
      background: var(--green-glow);
    }
    .nav-user {
      display: flex; align-items: center; gap: 8px;
      background: rgba(255,255,255,0.08);
      border: 1px solid rgba(255,255,255,0.12);
      color: #fff; font-size: 14px; font-weight: 600;
      padding: 8px 20px; border-radius: var(--radius-pill); cursor: pointer;
      transition: all .3s cubic-bezier(0.4,0,0.2,1);
      text-decoration: none;
      backdrop-filter: blur(8px);
    }
    .nav-user:hover {
      background: var(--green);
      border-color: var(--green);
      transform: translateY(-1px);
      box-shadow: 0 4px 16px rgba(26,124,62,0.3);
    }
    .nav-user svg { width: 16px; height: 16px; }

    /* Mobile menu toggle */
    .nav-mobile-toggle {
      display: none;
      background: none; border: none; color: #fff;
      font-size: 24px; cursor: pointer; padding: 8px;
    }

    /* ─── SECTION SHARED ──────────────────────────────── */
    section { padding: 100px 64px; }

    .section-label {
      display: inline-flex; align-items: center; gap: 10px;
      font-size: 12px; font-weight: 800; letter-spacing: 0.16em; text-transform: uppercase;
      color: var(--green); margin-bottom: 14px;
    }
    .section-label::before {
      content: ''; display: block; width: 32px; height: 3px;
      border-radius: 2px;
      background: var(--gradient-emerald);
    }
    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 3.5vw, 3.2rem);
      font-weight: 700; color: var(--navy);
      line-height: 1.12; margin-bottom: 14px;
    }
    .section-sub {
      font-size: 17px; color: var(--text-muted);
      max-width: 560px; line-height: 1.7; margin-bottom: 52px;
    }

    /* ─── PAGE HEADER (for inner pages) ───────────────── */
    .page-hero {
      background: #F1FDF3;
      padding: 96px 64px 64px;
      position: relative;
      overflow: hidden;
    }
    .page-hero::before {
      content: ''; position: absolute; top: -200px; right: -100px;
      width: 600px; height: 600px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.05) 0%, transparent 70%);
      pointer-events: none;
    }
    .page-hero::after {
      content: ''; position: absolute; bottom: -150px; left: -80px;
      width: 400px; height: 400px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.03) 0%, transparent 70%);
      pointer-events: none;
    }
    .page-hero .page-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.5rem, 5vw, 3.8rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 12px;
      position: relative; z-index: 1;
    }
    .page-hero .page-subtitle {
      color: var(--text-muted);
      font-size: 17px; max-width: 600px;
      line-height: 1.7;
      position: relative; z-index: 1;
    }
    .page-hero .floating-asset {
      position: absolute; z-index: 0;
      pointer-events: none;
      animation: floatBounce 6s ease-in-out infinite;
    }
    .page-hero .floating-asset.asset-right {
      right: 40px; bottom: -30px;
      height: 240px; opacity: 0.9;
    }
    .page-hero .floating-asset.asset-left {
      left: -20px; top: 60px;
      height: 150px; opacity: 0.4;
    }

    @keyframes floatBounce {
      0%, 100% { transform: translateY(0) rotate(0deg); }
      33% { transform: translateY(-15px) rotate(1deg); }
      66% { transform: translateY(-8px) rotate(-1deg); }
    }
    @keyframes floatSlow {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
    }

    /* ─── BENTO GRID ──────────────────────────────────── */
    .bento-grid {
      display: grid;
      gap: 20px;
    }
    .bento-grid-3 {
      grid-template-columns: repeat(3, 1fr);
    }
    .bento-grid-4 {
      grid-template-columns: repeat(4, 1fr);
    }
    .bento-grid-featured {
      grid-template-columns: 1.5fr 1fr 1fr;
      grid-template-rows: auto auto;
    }
    .bento-grid-featured .bento-card:first-child {
      grid-row: span 2;
    }

    .bento-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      position: relative;
    }
    .bento-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
    }
    .bento-card-glass {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.10);
      backdrop-filter: blur(16px);
    }
    .bento-card-glass:hover {
      background: rgba(255,255,255,0.12);
      border-color: rgba(255,255,255,0.18);
    }

    .bento-card-body { padding: 24px; }
    .bento-card-img {
      width: 100%; height: 180px;
      object-fit: cover; display: block;
    }
    .bento-card-img-tall { height: 100%; min-height: 300px; }

    /* ─── CONTENT CARDS ───────────────────────────────── */
    .content-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-sm);
      overflow: hidden;
      transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .content-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-lg);
    }
    .content-card-body { padding: 28px; }

    .page-content-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-md);
      overflow: hidden;
    }
    .page-content-card .card-body { padding: 2rem; }

    .page-meta {
      color: var(--text-muted);
      font-size: .95rem;
    }

    /* Stat cards for pages */
    .stat-card-mini {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.10);
      border-radius: var(--radius-md);
      padding: 20px;
      backdrop-filter: blur(12px);
      transition: all 0.3s;
    }
    .stat-card-mini:hover {
      background: rgba(255,255,255,0.12);
      transform: translateY(-3px);
    }
    .stat-card-mini .stat-value {
      font-family: 'Space Grotesk', sans-serif;
      font-size: 2rem; font-weight: 700;
      color: #fff; line-height: 1;
    }
    .stat-card-mini .stat-label {
      font-size: 13px; color: rgba(255,255,255,0.55);
      margin-top: 4px; font-weight: 600;
    }

    /* Listing cards (blog, announcements) */
    .listing-card-compact {
      height: 380px;
      display: flex;
      flex-direction: column;
    }
    .listing-card-compact .card-img-top {
      height: 160px !important;
      object-fit: cover;
    }
    .listing-card-compact .card-body {
      display: flex;
      flex-direction: column;
      gap: .4rem;
    }
    .listing-card-compact .card-text {
      display: -webkit-box;
      -webkit-line-clamp: 3;
      line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    /* Home cards */
    .home-section-card {
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-md);
      background: #fff;
      overflow: hidden;
    }
    .home-content-card { border-top: 3px solid var(--green); }
    .home-content-card.announcement-card { border-top-color: var(--gold); }
    .home-meta { color: var(--text-muted); font-size: .9rem; }

    .read-more-link {
      color: var(--green);
      font-weight: 700;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.3s;
    }
    .read-more-link:hover {
      color: var(--green-light);
      gap: 10px;
    }

    /* Empty states */
    .empty-state-container {
      max-width: 780px;
      margin: 0 auto;
    }
    .empty-state {
      border: 2px dashed rgba(13,34,53,0.12);
      border-radius: var(--radius-lg);
      padding: 3rem 2rem;
      text-align: center;
      color: var(--text-muted);
      background: linear-gradient(180deg, #fff 0%, #f8fbff 100%);
    }
    .empty-state i {
      font-size: 2.5rem;
      color: var(--navy);
      margin-bottom: 1rem;
    }

    /* ─── PAGE HEADER (inner pages - cream bg variant) ─ */
    .page-header-container { margin-bottom: 2rem; }
    .page-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 4vw, 3rem);
      color: var(--navy);
      margin-bottom: .5rem;
    }
    .page-subtitle {
      color: var(--text-muted);
      font-size: 1rem;
      max-width: 760px;
    }

    /* ─── FOOTER ──────────────────────────────────────── */
    footer {
      background: var(--navy);
      padding: 80px 64px 36px;
      color: rgba(255,255,255,0.65);
      position: relative;
      overflow: hidden;
    }
    footer::before {
      content: ''; position: absolute;
      top: -200px; right: -200px;
      width: 500px; height: 500px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(26,124,62,0.08) 0%, transparent 70%);
      pointer-events: none;
    }
    .footer-grid {
      display: grid;
      grid-template-columns: 1.8fr 1fr 1.2fr;
      gap: 60px; margin-bottom: 56px;
      position: relative; z-index: 1;
    }
    .footer-brand-name {
      font-family: 'Space Grotesk', 'Playfair Display', serif;
      font-size: 1.4rem; color: #fff;
      font-weight: 700; margin: 14px 0 10px;
    }
    .footer-tagline { font-size: 14px; line-height: 1.7; color: rgba(255,255,255,0.45); }
    .footer-social { display: flex; gap: 10px; margin-top: 24px; }
    .social-btn {
      width: 40px; height: 40px; border-radius: var(--radius-sm);
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.10);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.50); text-decoration: none;
      transition: all .3s cubic-bezier(0.4,0,0.2,1); font-size: 14px;
    }
    .social-btn:hover {
      background: var(--green); color: #fff;
      border-color: var(--green);
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 6px 20px rgba(26,124,62,0.35);
    }
    .footer-col h4 {
      font-size: 13px; font-weight: 800;
      letter-spacing: 0.12em; text-transform: uppercase;
      color: rgba(255,255,255,0.35); margin-bottom: 22px;
    }
    .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 10px; padding-left: 0; }
    .footer-col ul a {
      color: rgba(255,255,255,0.55); text-decoration: none;
      font-size: 14px; font-weight: 500;
      transition: all .25s;
      display: inline-flex; align-items: center; gap: 6px;
    }
    .footer-col ul a::before {
      content: ''; width: 0; height: 2px;
      background: var(--green-glow);
      transition: width 0.3s;
    }
    .footer-col ul a:hover { color: #fff; }
    .footer-col ul a:hover::before { width: 12px; }
    .footer-contact-item {
      display: flex; align-items: flex-start; gap: 12px;
      font-size: 14px; color: rgba(255,255,255,0.55); margin-bottom: 16px;
    }
    .footer-contact-item svg {
      width: 16px; height: 16px; flex-shrink: 0;
      margin-top: 3px; color: var(--green-glow);
    }
    .footer-divider {
      border: none; border-top: 1px solid rgba(255,255,255,0.06);
      margin-bottom: 28px;
    }
    .footer-bottom {
      display: flex; justify-content: space-between;
      align-items: center; font-size: 13px;
      color: rgba(255,255,255,0.30);
      position: relative; z-index: 1;
    }

    /* ─── BACK TO TOP ─────────────────────────────────── */
    .back-top {
      position: fixed; bottom: 28px; right: 28px; z-index: 99;
      width: 48px; height: 48px; border-radius: var(--radius-md);
      background: var(--gradient-emerald); color: #fff;
      display: none; align-items: center; justify-content: center;
      cursor: pointer; border: none;
      box-shadow: var(--shadow-green);
      transition: all .3s cubic-bezier(0.4,0,0.2,1);
    }
    .back-top:hover {
      transform: translateY(-4px) scale(1.05);
      box-shadow: 0 12px 32px rgba(26,124,62,0.50);
    }

    /* ─── FLOATING ASSETS / 3D ────────────────────────── */
    .float-asset {
      position: absolute; pointer-events: none;
      z-index: 0;
    }
    .float-asset img {
      height: 100%; width: auto;
      filter: drop-shadow(0 20px 40px rgba(0,0,0,0.15));
    }
    .float-y { animation: floatSlow 6s ease-in-out infinite; }
    .float-y-delay { animation: floatSlow 7s ease-in-out 1s infinite; }

    /* ─── ANIMATED GRADIENT BG ────────────────────────── */
    .bg-animated-gradient {
      background: linear-gradient(-45deg, #064e3b, #065f46, #0d2235, #163348);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
    }
    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* ─── ANIMATIONS ──────────────────────────────────── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(30px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }
    @keyframes scaleIn {
      from { opacity: 0; transform: scale(0.92); }
      to   { opacity: 1; transform: scale(1); }
    }
    @keyframes slideRight {
      from { opacity: 0; transform: translateX(-30px); }
      to   { opacity: 1; transform: translateX(0); }
    }

    .reveal {
      opacity: 0; transform: translateY(24px);
      transition: opacity .65s ease, transform .65s ease;
    }
    .reveal.visible { opacity: 1; transform: none; }
    .reveal-delay-1 { transition-delay: 0.1s; }
    .reveal-delay-2 { transition-delay: 0.2s; }
    .reveal-delay-3 { transition-delay: 0.3s; }

    /* ─── RESPONSIVE ──────────────────────────────────── */
    @media (max-width: 1100px) {
      .bento-grid-3 { grid-template-columns: repeat(2, 1fr); }
      .bento-grid-4 { grid-template-columns: repeat(2, 1fr); }
      .bento-grid-featured { grid-template-columns: 1fr 1fr; }
      .bento-grid-featured .bento-card:first-child { grid-row: auto; }
    }

    @media (max-width: 900px) {
      section { padding: 72px 24px; }
      nav { padding: 0 20px; }
      .nav-links { display: none; }
      .nav-mobile-toggle { display: block; }
      .footer-grid { grid-template-columns: 1fr; gap: 36px; }
      footer { padding: 56px 24px 28px; }
      .bento-grid-3, .bento-grid-4, .bento-grid-featured {
        grid-template-columns: 1fr;
      }
      .page-hero { padding: 84px 24px 52px; }
      .page-hero .floating-asset { display: none; }
    }

    .public-content-wrapper {
      padding-top: 0;
      padding-bottom: 3rem;
    }

    main {
      padding-top: 88px;
    }

    main.main-flush-top {
      padding-top: 0;
    }

    @media (max-width: 900px) {
      main { padding-top: 82px; }
      main.main-flush-top { padding-top: 0; }
    }

  </style>
  @yield('styles')
</head>
<body>

<!-- NAV -->
<nav>
  <a href="{{ url('/') }}" class="nav-brand">
    <img src="{{asset('assets/images/laikipia.png')}}" alt="Logo"> Laikipia ECDE
  </a>
  <div class="nav-links">
    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
    <a href="{{ route('cms.posts') }}" class="{{ request()->routeIs('cms.posts', 'cms.post') ? 'active' : '' }}">Blog</a>
    <a href="{{ route('cms.schools') }}" class="{{ request()->routeIs('cms.schools', 'cms.schools.show') ? 'active' : '' }}">ECDE Schools</a>
    <a href="{{ route('cms.announcements') }}" class="{{ request()->routeIs('cms.announcements', 'cms.announcement.show') ? 'active' : '' }}">Announcements</a>
    <a href="{{ route('cms.galleries') }}" class="{{ request()->routeIs('cms.galleries', 'cms.gallery') ? 'active' : '' }}">Galleries</a>
    <a href="{{ route('cms.faqs') }}" class="{{ request()->routeIs('cms.faqs') ? 'active' : '' }}">FAQs</a>
    <a href="{{ route('cms.contact') }}" class="{{ request()->routeIs('cms.contact') ? 'active' : '' }}">Contact</a>
  </div>

  <div style="display:flex;align-items:center;gap:12px;">
    @guest
      <a href="{{ route('login') }}" class="nav-user">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
        Login
      </a>
    @else
      <a href="{{ route('home') }}" class="nav-user">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
        {{ auth()->user()->first_name ?? 'Dashboard' }}
      </a>
    @endguest
  </div>
</nav>

<main class="@hasSection('flush_topbar') main-flush-top @endif">
    @yield('content')
</main>


<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div>
      <div style="display:flex;align-items:center;gap:10px;">
        <img src="{{ !empty($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Coat_of_arms_of_Kenya.svg/800px-Coat_of_arms_of_Kenya.svg.png' }}" height="40" alt="Logo" onerror="this.style.display='none'">
      </div>
      <div class="footer-brand-name">{{ $settings['site_name'] ?? 'Laikipia ECDE Management System' }}</div>
      <div class="footer-tagline">{{ $settings['site_description'] ?? 'Empowering communities through education and development.' }}</div>
      <div class="footer-social">
        <a href="{{ $settings['facebook_url'] ?? '#' }}" class="social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="{{ $settings['twitter_url'] ?? '#' }}" class="social-btn" title="X / Twitter"><i class="fab fa-twitter"></i></a>
        <a href="{{ $settings['youtube_url'] ?? '#' }}" class="social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="{{ route('cms.posts') }}">Blog</a></li>
        <li><a href="{{ route('cms.schools') }}">ECDE Schools</a></li>
        <li><a href="{{ route('cms.galleries') }}">Galleries</a></li>
        <li><a href="{{ route('cms.faqs') }}">FAQs</a></li>
        <li><a href="{{ route('cms.announcements') }}">Announcements</a></li>
        <li><a href="{{ route('cms.contact') }}">Contact</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Contact</h4>
      <div class="footer-contact-item">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        {{ $settings['contact_email'] ?? 'info@laikipia-ecde.go.ke' }}
      </div>
      <div class="footer-contact-item">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92V19a2 2 0 01-2.18 2A19.86 19.86 0 013 5.18 2 2 0 015 3h2.09a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 10.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 17.92z"/></svg>
        {{ $settings['contact_phone'] ?? '+254 707 782 031' }}
      </div>
      <div class="footer-contact-item">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
        {{ $settings['site_address'] ?? 'Laikipia County, Kenya' }}
      </div>
    </div>
  </div>
  <hr class="footer-divider">
  <div class="footer-bottom">
    <span>&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Laikipia ECDE' }}. All rights reserved.</span>
    <span>Powered by Laikipia County Government</span>
  </div>
</footer>

<!-- BACK TO TOP -->
<button class="back-top" id="backTopBtn" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Back to top">
  <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>

<script>
  // Reveal on scroll
  const reveals = document.querySelectorAll('.reveal');
  const io = new IntersectionObserver(entries => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 80);
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.10 });
  reveals.forEach(el => io.observe(el));

  // Back to top button
  const backTopBtn = document.getElementById('backTopBtn');
  window.addEventListener('scroll', function() {
      if (document.documentElement.scrollTop > 100) {
          backTopBtn.style.display = "flex";
      } else {
          backTopBtn.style.display = "none";
      }
  });

</script>


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
   <!-- jQuery -->
   
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success') || session('error') || session('warning') || session('info'))
<script>
Swal.fire({
    icon: "{{ session('success') ? 'success' : (session('error') ? 'error' : (session('warning') ? 'warning' : 'info')) }}",
    title: "{{ session('success') ?? session('error') ?? session('warning') ?? session('info') }}",
    showConfirmButton: false,
    timer: 1500,
    width: '400px',
    padding: '0.5em'
});
</script>
@endif
<!-- DataTable init handled by guarded script below -->

@yield('scripts')

<script>
// Guard: only init DataTables on tables that haven't been initialized yet
$(document).ready(function() {
    // For #dt-basic2 — skip if already initialized by a page-specific script
    if ($('#dt-basic2').length && !$.fn.DataTable.isDataTable('#dt-basic2')) {
        new DataTable('#dt-basic2', {
            info: true, paging: true, searchable: true, fixedHeight: true,
            lengthMenu: [5, 10, 25, 50, 100, 500, 1000, 10000],
            pageLength: 50, order: [],
            dom: 'lBfrtip',
            buttons: ['copyHtml5','excelHtml5','csvHtml5','pdfHtml5',
                { extend: 'print' }, 'colvis'],
            language: {
                lengthMenu: " _MENU_ records per page",
                zeroRecords: "No records available",
                info: "Showing page _PAGE_ of _PAGES_",
                infoEmpty: "No records available",
                search: "", searchPlaceholder: "Search... ",
                infoFiltered: "(filtered from _MAX_ total records)",
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>'
                },
            },
            columnDefs: [{ targets: [0, 1, 2, 3, 4, -1], visible: true }]
        });
    }
    // For .dt-basic2 class tables — also guard
    $('.dt-basic2').each(function() {
        if (!$.fn.DataTable.isDataTable(this)) {
            $(this).DataTable({
                info: true, paging: true, searchable: true, fixedHeight: true,
                lengthMenu: [5, 10, 25, 50, 100, 500, 1000, 10000],
                pageLength: 50, order: [],
                dom: 'lBfrtip',
                buttons: ['copyHtml5','excelHtml5','csvHtml5','pdfHtml5',
                    { extend: 'print' }, 'colvis'],
                language: {
                    lengthMenu: " _MENU_ records per page",
                    zeroRecords: "No records available",
                    info: "Showing page _PAGE_ of _PAGES_",
                    infoEmpty: "No records available",
                    search: "", searchPlaceholder: "Search... ",
                    infoFiltered: "(filtered from _MAX_ total records)",
                    paginate: {
                        first: '<i class="fas fa-angle-double-left"></i>',
                        last: '<i class="fas fa-angle-double-right"></i>',
                        previous: '<i class="fas fa-angle-left"></i>',
                        next: '<i class="fas fa-angle-right"></i>'
                    },
                },
                columnDefs: [{ targets: [0, 1, 2, 3, 4, -1], visible: true }]
            });
        }
    });
});
</script>

<script type="text/javascript" src="{{asset('assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script>
</body>
</html>
