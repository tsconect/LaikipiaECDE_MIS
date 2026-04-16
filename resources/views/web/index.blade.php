@extends('web.app')

@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── HERO ────────────────────────────────────────── */
    .hero {
      position: relative;
      min-height: 78vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: visible;
      padding: 110px 64px 120px;
      margin-bottom: 34px;
    }

    /* Full-width background image */
    .hero-bg {
      position: absolute; inset: 0;
      background-position: center top;
      background-size: cover;
      background-repeat: no-repeat;
      z-index: 0;
      transition: transform 12s ease;
    }
    .hero:hover .hero-bg {
      transform: scale(1.03);
    }

    /* Dark overlay gradient */
    .hero-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(
        180deg,
        rgba(13,34,53,0.55) 0%,
        rgba(13,34,53,0.45) 40%,
        rgba(13,34,53,0.65) 100%
      );
      z-index: 1;
    }

    /* Subtle animated vignette */
    .hero-vignette {
      position: absolute; inset: 0;
      background: radial-gradient(ellipse at center, transparent 50%, rgba(13,34,53,0.40) 100%);
      z-index: 2;
      pointer-events: none;
    }

    /* Centered content */
    .hero-content {
      position: relative; z-index: 3;
      text-align: center;
      max-width: 820px;
      margin: 0 auto;
    }

    .hero-badge {
      display: inline-flex; align-items: center; gap: 10px;
      background: rgba(255,255,255,0.10);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.18);
      padding: 10px 24px; border-radius: var(--radius-pill);
      font-size: 13px; font-weight: 700; color: rgba(255,255,255,0.90);
      margin-bottom: 28px;
      letter-spacing: 0.06em;
      animation: fadeUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.15s both;
    }
    .hero-badge-dot {
      width: 8px; height: 8px; border-radius: 50%;
      background: var(--gold);
      box-shadow: 0 0 10px rgba(245,158,11,0.50);
      animation: pulse 2s ease-in-out infinite;
    }
    @keyframes pulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.5; transform: scale(0.8); }
    }

    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.8rem, 5.5vw, 4.5rem);
      font-weight: 900; line-height: 1.08;
      color: #fff; margin-bottom: 20px;
      text-wrap: balance;
      animation: fadeUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.3s both;
      text-shadow: 0 2px 30px rgba(0,0,0,0.20);
    }
    .hero h1 em {
      font-style: normal;
      color: var(--gold-light);
      -webkit-text-fill-color: var(--gold-light);
    }

    .hero-subtitle {
      font-size: 17px; line-height: 1.75;
      color: rgba(255,255,255,0.70);
      margin: 0 auto 36px;
      max-width: 580px;
      animation: fadeUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.45s both;
    }

    .hero-actions {
      display: flex; gap: 14px;
      justify-content: center;
      flex-wrap: wrap;
      animation: fadeUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.6s both;
    }

    /* Gold primary CTA to match reference */
    .hero .pill-btn-hero-primary {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 16px 36px; border-radius: var(--radius-pill);
      font-size: 15px; font-weight: 700;
      background: var(--gold);
      color: var(--navy);
      border: none; cursor: pointer;
      text-decoration: none;
      box-shadow: 0 8px 28px rgba(245,158,11,0.35);
      transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      position: relative; overflow: hidden;
    }
    .hero .pill-btn-hero-primary::before {
      content: ''; position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.20) 0%, transparent 60%);
      opacity: 0; transition: opacity 0.35s;
    }
    .hero .pill-btn-hero-primary:hover::before { opacity: 1; }
    .hero .pill-btn-hero-primary:hover {
      transform: translateY(-3px) scale(1.02);
      box-shadow: 0 14px 40px rgba(245,158,11,0.45);
      color: var(--navy);
    }
    .hero .pill-btn-hero-primary svg { transition: transform 0.3s; }
    .hero .pill-btn-hero-primary:hover svg { transform: translateX(3px); }

    /* Glass outline secondary CTA */
    .hero .pill-btn-hero-outline {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 16px 36px; border-radius: var(--radius-pill);
      font-size: 15px; font-weight: 700;
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(8px);
      border: 2px solid rgba(255,255,255,0.30);
      color: #fff; cursor: pointer;
      text-decoration: none;
      transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .hero .pill-btn-hero-outline:hover {
      background: rgba(255,255,255,0.16);
      border-color: #fff;
      transform: translateY(-3px);
      color: #fff;
    }

    /* ─── HERO FEATURE CARDS (overlapping bottom) ─────── */
    .hero-cards-strip {
      position: absolute;
      bottom: -60px; left: 50%;
      transform: translateX(-50%);
      z-index: 10;
      display: flex; gap: 20px;
      width: 100%;
      max-width: 960px;
      padding: 0 32px;
    }

    .hero-fcard {
      flex: 1;
      padding: 28px 24px;
      border-radius: var(--radius-lg);
      display: flex; align-items: flex-start; gap: 16px;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      animation: cardSlideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) both;
      box-shadow: 0 12px 40px rgba(13,34,53,0.12);
      text-decoration: none;
    }
    .hero-fcard:nth-child(1) { animation-delay: 0.7s; }
    .hero-fcard:nth-child(2) { animation-delay: 0.85s; }
    .hero-fcard:nth-child(3) { animation-delay: 1.0s; }

    .hero-fcard:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 50px rgba(13,34,53,0.18);
    }

    @keyframes cardSlideUp {
      from { opacity: 0; transform: translateY(40px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* Card color variants */
    .hero-fcard-white {
      background: #fff;
      border: 1px solid rgba(13,34,53,0.06);
    }
    .hero-fcard-gold {
      background: var(--gold);
      border: 1px solid rgba(245,158,11,0.20);
    }
    .hero-fcard-navy {
      background: var(--navy);
      border: 1px solid rgba(255,255,255,0.08);
    }

    /* Card icons */
    .hero-fcard-icon {
      width: 48px; height: 48px; flex-shrink: 0;
      border-radius: var(--radius-md);
      display: flex; align-items: center; justify-content: center;
      font-size: 20px;
    }
    .hero-fcard-white .hero-fcard-icon {
      background: rgba(26,124,62,0.10);
      color: var(--green);
    }
    .hero-fcard-gold .hero-fcard-icon {
      background: rgba(255,255,255,0.25);
      color: var(--navy);
    }
    .hero-fcard-navy .hero-fcard-icon {
      background: rgba(255,255,255,0.10);
      color: var(--gold);
    }

    /* Card text */
    .hero-fcard-text h4 {
      font-family: 'Space Grotesk', sans-serif;
      font-size: 15px; font-weight: 700;
      margin-bottom: 4px;
    }
    .hero-fcard-text p {
      font-size: 13px; line-height: 1.5; margin: 0;
    }

    .hero-fcard-white .hero-fcard-text h4 { color: var(--navy); }
    .hero-fcard-white .hero-fcard-text p { color: var(--text-muted); }
    .hero-fcard-gold .hero-fcard-text h4 { color: var(--navy); }
    .hero-fcard-gold .hero-fcard-text p { color: rgba(13,34,53,0.70); }
    .hero-fcard-navy .hero-fcard-text h4 { color: #fff; }
    .hero-fcard-navy .hero-fcard-text p { color: rgba(255,255,255,0.55); }

    /* ─── SECTION WAVE DIVIDERS ──────────────────────── */
    .section-wave {
      position: relative;
      width: 100%;
      line-height: 0;
      overflow: hidden;
    }
    .section-wave svg {
      display: block;
      width: 100%;
      height: 60px;
    }
    .section-wave-cream svg { fill: var(--cream); }
    .section-wave-white svg { fill: #fff; }
    .section-wave-navy svg { fill: var(--navy); }
    .section-wave-light svg { fill: #f4f7f5; }
    .section-wave-mint svg { fill: #f0f7f3; }

    /* ─── "WHAT WE DO" BENTO ──────────────────────────── */
    .features-section {
      background: #fff;
      position: relative; overflow: hidden;
    }
    .features-section::before {
      content: ''; position: absolute;
      top: -100px; left: -100px;
      width: 400px; height: 400px; border-radius: 50%;
      background: radial-gradient(circle, rgba(26,124,62,0.06) 0%, transparent 70%);
      pointer-events: none;
    }
    .features-bento {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: auto auto;
      gap: 20px;
    }

    /* Base card */
    .feature-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      position: relative;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .feature-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-xl);
    }
    .feature-card.span-2 { grid-column: span 2; }

    /* ── Wide card (span-2): side-by-side image + text ── */
    .feature-card.span-2 {
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      min-height: 280px;
    }
    .feature-card-img {
      position: relative; overflow: hidden;
    }
    .feature-card-img img {
      width: 100%; height: 100%;
      object-fit: cover; display: block;
      transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .feature-card:hover .feature-card-img img {
      transform: scale(1.06);
    }
    .feature-card-img-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(6,78,59,0.15) 0%, rgba(13,34,53,0.08) 100%);
      pointer-events: none;
    }
    .feature-card-text {
      padding: 36px 32px;
      display: flex; flex-direction: column;
      justify-content: center;
    }

    /* ── Compact card (single col): image on top ── */
    .feature-card:not(.span-2) .feature-card-img {
      height: 180px;
    }
    .feature-card:not(.span-2) .feature-card-text {
      padding: 28px 26px;
    }

    /* Icon badge */
    .feature-icon {
      width: 52px; height: 52px;
      border-radius: var(--radius-md);
      display: flex; align-items: center; justify-content: center;
      font-size: 22px; margin-bottom: 16px;
      position: relative; z-index: 1;
      box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    }
    .feature-icon-green { background: var(--green); color: #fff; }
    .feature-icon-gold { background: #d97706; color: #fff; }
    .feature-icon-navy { background: var(--navy); color: #fff; }
    .feature-icon-blue { background: #2563eb; color: #fff; }

    .feature-card h3 {
      font-family: 'Space Grotesk', sans-serif;
      font-size: 1.15rem; font-weight: 700;
      color: var(--navy); margin-bottom: 8px;
    }
    .feature-card p {
      font-size: 14px; color: var(--text-muted);
      line-height: 1.65; margin: 0;
    }

    /* ── "Image-only" tall showcase card ── */
    .feature-card-showcase {
      grid-row: span 2;
      display: flex; flex-direction: column;
    }
    .feature-card-showcase .feature-card-img {
      height: 100%; min-height: 360px;
      flex: 1;
    }
    .feature-card-showcase .feature-card-img img {
      height: 100%;
    }
    .feature-card-showcase .showcase-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(to top, rgba(6,78,59,0.90) 0%, rgba(6,78,59,0.40) 40%, transparent 65%);
      display: flex; flex-direction: column;
      justify-content: flex-end;
      padding: 32px;
      color: #fff;
    }
    .feature-card-showcase .showcase-overlay h3 {
      color: #fff; margin-bottom: 6px;
      font-size: 1.3rem;
    }
    .feature-card-showcase .showcase-overlay p {
      color: rgba(255,255,255,0.70); font-size: 14px;
      line-height: 1.6; margin: 0;
    }
    .feature-card-showcase .showcase-overlay .feature-icon {
      margin-bottom: 14px;
      background: rgba(255,255,255,0.15);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255,255,255,0.20);
      color: #fff;
    }

    @media (max-width: 1100px) {
      .features-bento { grid-template-columns: 1fr 1fr; }
      .features-bento .feature-card.span-2 { grid-column: span 1; grid-template-columns: 1fr; }
      .features-bento .feature-card.span-2 .feature-card-img { height: 200px; }
      .feature-card-showcase { grid-row: auto; }
    }
    @media (max-width: 700px) {
      .features-bento { grid-template-columns: 1fr; }
      .features-bento .feature-card.span-2 { grid-template-columns: 1fr; }
      .features-bento .feature-card.span-2 .feature-card-img { height: 200px; }
    }

    /* ─── ECDE SCHOOLS ─────────────────────────────────── */
    .schools-section {
      background: linear-gradient(180deg, #f4f7f5 0%, #eef3ef 100%);
      position: relative; overflow: hidden;
    }
    .schools-section::before {
      content: ''; position: absolute;
      top: -120px; right: -120px;
      width: 480px; height: 480px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(26,124,62,0.08) 0%, transparent 70%);
      pointer-events: none;
    }
    .schools-section::after {
      content: ''; position: absolute;
      bottom: -80px; left: -60px;
      width: 300px; height: 300px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.04) 0%, transparent 70%);
      pointer-events: none;
    }
    .schools-section .section-label { color: var(--green); }
    .schools-section .section-label::before { background: var(--green); }
    .schools-section .section-title { color: var(--navy); }

    .schools-header {
      display: flex; align-items: flex-end; justify-content: space-between;
      margin-bottom: 48px; gap: 24px; flex-wrap: wrap;
      position: relative; z-index: 1;
    }
    .schools-header .section-sub { color: var(--text-muted); margin-bottom: 0; }

    .view-all-pill {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 12px 28px; border-radius: var(--radius-pill);
      background: rgba(26,124,62,0.10);
      border: 1px solid rgba(26,124,62,0.25);
      color: var(--green); font-weight: 700; font-size: 14px;
      text-decoration: none;
      transition: all 0.3s;
    }
    .view-all-pill:hover {
      background: var(--green); color: #fff;
      border-color: var(--green);
      transform: translateY(-2px);
      box-shadow: var(--shadow-green);
    }

    .schools-bento {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin: 0 0 40px;
      position: relative; z-index: 1;
    }

    /* Redesigned stat cards with icons and color accents */
    .schools-overview-card {
      background: #fff;
      border: 1px solid rgba(13,34,53,0.06);
      border-radius: var(--radius-lg);
      padding: 28px 24px;
      display: flex; flex-direction: column; gap: 10px;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      position: relative; overflow: hidden;
      box-shadow: 0 4px 16px rgba(13,34,53,0.04);
    }
    .schools-overview-card::before {
      content: ''; position: absolute;
      top: 0; left: 0; right: 0; height: 4px;
      border-radius: var(--radius-lg) var(--radius-lg) 0 0;
      transition: height 0.35s;
    }
    .schools-overview-card:nth-child(1)::before { background: var(--gradient-emerald); }
    .schools-overview-card:nth-child(2)::before { background: var(--gradient-ocean); }
    .schools-overview-card:nth-child(3)::before { background: var(--gradient-sunset); }
    .schools-overview-card:nth-child(4)::before { background: var(--gradient-navy); }

    .schools-overview-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
    }
    .schools-overview-card:hover::before { height: 6px; }

    .schools-overview-icon {
      width: 52px; height: 52px;
      border-radius: var(--radius-md);
      display: flex; align-items: center; justify-content: center;
      font-size: 22px;
      margin-bottom: 4px;
    }
    .schools-overview-card:nth-child(1) .schools-overview-icon {
      background: rgba(26,124,62,0.10); color: var(--green);
    }
    .schools-overview-card:nth-child(2) .schools-overview-icon {
      background: rgba(2,132,199,0.10); color: #0284c7;
    }
    .schools-overview-card:nth-child(3) .schools-overview-icon {
      background: rgba(245,158,11,0.10); color: #d97706;
    }
    .schools-overview-card:nth-child(4) .schools-overview-icon {
      background: rgba(13,34,53,0.08); color: var(--navy);
    }

    .schools-overview-value {
      font-family: 'Space Grotesk', sans-serif;
      font-size: clamp(2.2rem, 3vw, 2.8rem);
      font-weight: 700; color: var(--navy); line-height: 1;
    }
    .schools-overview-title {
      color: var(--navy); font-weight: 700; font-size: 14px;
      letter-spacing: 0.02em;
    }
    .schools-overview-desc {
      color: var(--text-muted); font-size: 13px;
      line-height: 1.5;
    }

    .schools-grid {
      display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px; position: relative; z-index: 1;
    }
    .school-card {
      background: rgba(255,255,255,0.04);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: var(--radius-lg); overflow: hidden;
      transition: all .35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      position: relative;
    }
    .school-card:hover {
      background: rgba(255,255,255,0.10);
      transform: translateY(-6px);
      box-shadow: 0 24px 48px rgba(0,0,0,0.12);
    }
    .school-card-img {
      width: 100%; height: 180px; object-fit: cover;
      display: block;
      background: linear-gradient(135deg, rgba(26,124,62,0.20), rgba(13,34,53,0.40));
    }
    .school-card-img-placeholder {
      width: 100%; height: 180px;
      background: linear-gradient(135deg, rgba(26,124,62,0.12), rgba(13,34,53,0.35));
      display: flex; align-items: center; justify-content: center;
    }
    .school-card-img-placeholder svg { width: 44px; height: 44px; color: rgba(255,255,255,0.20); }
    .school-card-body { padding: 22px 24px 24px; }
    .school-subcounty {
      display: inline-flex; align-items: center; gap: 6px;
      background: rgba(52,211,153,0.15);
      color: var(--green-glow);
      font-size: 10px; font-weight: 700;
      letter-spacing: .12em; text-transform: uppercase;
      padding: 5px 12px; border-radius: var(--radius-pill); margin-bottom: 12px;
      border: 1px solid rgba(52,211,153,0.20);
    }
    .school-subcounty-dot { width: 5px; height: 5px; border-radius: 50%; background: var(--green-glow); }
    .school-name {
      font-family: 'Space Grotesk', sans-serif;
      font-size: 1.1rem; font-weight: 700; color: #fff;
      line-height: 1.3; margin-bottom: 10px;
    }
    .school-stats { display: flex; gap: 18px; margin-bottom: 16px; }
    .school-stat { display: flex; flex-direction: column; }
    .school-stat-num { font-weight: 700; font-size: 15px; color: #fff; }
    .school-stat-label { font-size: 11px; color: rgba(255,255,255,0.35); margin-top: 1px; }
    .school-divider { border: none; border-top: 1px solid rgba(255,255,255,0.06); margin: 14px 0; }
    .school-footer { display: flex; align-items: center; justify-content: space-between; }
    .school-type {
      font-size: 12px; color: rgba(255,255,255,0.40);
      display: flex; align-items: center; gap: 5px;
    }
    .school-type svg { width: 12px; height: 12px; }
    .school-link {
      color: var(--green-glow); font-weight: 700; font-size: 13px;
      text-decoration: none;
      display: inline-flex; align-items: center; gap: 4px;
      padding: 6px 16px; border-radius: var(--radius-pill);
      background: rgba(52,211,153,0.10);
      border: 1px solid rgba(52,211,153,0.20);
      transition: all 0.3s;
    }
    .school-link:hover {
      background: var(--green); color: #fff;
      border-color: var(--green);
    }
    .school-link svg { transition: transform .2s; }
    .school-link:hover svg { transform: translateX(4px); }

    /* ─── GOVERNOR'S MESSAGE ─────────────────────────── */
    .governor-section {
      background: #fff; overflow: hidden;
      position: relative;
    }
    .governor-section::before {
      content: ''; position: absolute;
      bottom: 0; right: 0;
      width: 500px; height: 500px;
      background: radial-gradient(circle, rgba(26,124,62,0.04) 0%, transparent 70%);
      pointer-events: none;
    }
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
      position: relative; border-radius: var(--radius-xl); overflow: hidden;
      aspect-ratio: 4/5; max-width: 420px;
      box-shadow: var(--shadow-xl);
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
      border-radius: var(--radius-xl);
      border: 2px solid var(--green);
      opacity: .20; z-index: 0;
    }
    .governor-photo-frame { position: relative; z-index: 1; }
    .governor-badge {
      position: absolute; bottom: -20px; right: 0;
      background: var(--navy); color: #fff;
      padding: 16px 22px; border-radius: var(--radius-md);
      box-shadow: var(--shadow-lg);
      z-index: 2; min-width: 170px;
    }
    .governor-badge-name { font-weight: 700; font-size: 14px; }
    .governor-badge-title { font-size: 12px; color: rgba(255,255,255,0.50); margin-top: 2px; }
    .governor-badge-dot {
      width: 8px; height: 8px; border-radius: 50%;
      background: var(--green-glow); display: inline-block; margin-right: 6px;
    }
    .governor-content { padding-top: 8px; }
    .governor-content .section-sub { margin-bottom: 28px; max-width: 100%; }
    .governor-quote {
      background: var(--white);
      border-left: 4px solid var(--green);
      border-radius: 0 var(--radius-md) var(--radius-md) 0;
      padding: 28px 32px;
      margin-bottom: 32px;
      position: relative;
      box-shadow: var(--shadow-sm);
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
      background: var(--gradient-emerald);
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-size: 20px; font-weight: 700; flex-shrink: 0;
      overflow: hidden;
    }
    .governor-avatar img { width: 100%; height: 100%; object-fit: cover; }
    .governor-meta-name { font-weight: 700; font-size: 16px; color: var(--navy); }
    .governor-meta-role { font-size: 13px; color: var(--text-muted); margin-top: 2px; }

    /* ─── TESTIMONIALS ────────────────────────────────── */
    .testimonials-section {
      background: linear-gradient(180deg, #f0f7f3 0%, #e8f5ee 50%, #f4f7f5 100%);
      position: relative;
      overflow: hidden;
    }
    .testimonials-section::before {
      content: ''; position: absolute;
      top: -150px; right: -100px;
      width: 450px; height: 450px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(26,124,62,0.06) 0%, transparent 70%);
      pointer-events: none;
    }
    .testimonials-section .section-sub { margin-bottom: 48px; }
    .testi-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 24px;
    }
    .testi-card {
      background: var(--white);
      border-radius: var(--radius-xl); padding: 36px 32px;
      border: 1px solid var(--border);
      position: relative;
      transition: all .35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .testi-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
    }
    .testi-quote-icon {
      font-family: 'Playfair Display', serif;
      font-size: 5rem; line-height: 0.6;
      color: var(--green-pale); position: absolute; top: 24px; right: 28px;
      user-select: none; pointer-events: none;
    }
    .testi-stars { color: var(--gold); margin-bottom: 16px; font-size: 14px; }
    .testi-text {
      font-size: 16px; line-height: 1.75; color: var(--text);
      font-style: italic; margin-bottom: 24px;
    }
    .testi-author { display: flex; align-items: center; gap: 14px; }
    .testi-avatar {
      width: 48px; height: 48px; border-radius: 50%;
      background: var(--gradient-emerald);
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-size: 18px; font-weight: 700;
      flex-shrink: 0;
    }
    .testi-name { font-weight: 700; font-size: 15px; color: var(--navy); }
    .testi-role { font-size: 13px; color: var(--text-muted); }

    /* ─── RESPONSIVE ──────────────────────────────────── */
    @media (max-width: 1100px) {
      .features-bento { grid-template-columns: 1fr 1fr; }
      .features-bento .feature-card.span-2 { grid-column: span 1; }
      .schools-bento { grid-template-columns: repeat(2, 1fr); }
      .hero-cards-strip { max-width: 100%; padding: 0 24px; gap: 14px; }
    }
    @media (max-width: 900px) {
        .hero { padding: 110px 28px 140px; min-height: 70vh; }
        .hero-cards-strip {
          flex-direction: column;
          bottom: -120px;
          padding: 0 20px;
          gap: 12px;
        }
        .hero { margin-bottom: 140px; }
        .hero-fcard { padding: 22px 20px; }
        .schools-header { flex-direction: column; align-items: flex-start; }
        .schools-bento { grid-template-columns: repeat(2, 1fr); }
        .features-bento { grid-template-columns: 1fr; }
        .features-bento .feature-card.tall { grid-row: auto; }
    }
    @media (max-width: 1024px) {
      .governor-inner { grid-template-columns: 1fr; gap: 48px; }
      .governor-photo-wrap { display: flex; justify-content: center; }
      .governor-photo-frame { max-width: 320px; }
      .schools-bento { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 600px) {
      .hero { padding: 100px 20px 150px; min-height: auto; margin-bottom: 120px; }
      .hero h1 { font-size: clamp(2rem, 7vw, 2.6rem); }
      .hero-subtitle { font-size: 15px; }
      .hero-cards-strip { bottom: -160px; }
      .hero .pill-btn-hero-primary,
      .hero .pill-btn-hero-outline { padding: 14px 28px; font-size: 14px; }
      .schools-bento { grid-template-columns: 1fr; }
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
<section class="hero" id="heroSection">
  <!-- Full-width background image -->
  <div class="hero-bg" style="background-image: url('{{ $heroImageUrl }}');"></div>
  <div class="hero-overlay"></div>
  <div class="hero-vignette"></div>

  <!-- Centered content -->
  <div class="hero-content">
    <div class="hero-badge">
      <span class="hero-badge-dot"></span>
      Laikipia County ECDE Programme
    </div>
    <h1>{!! $heroHeadlineInline !!}</h1>
    <p class="hero-subtitle">{{ $heroSubtext }}</p>
    <div class="hero-actions">
      <a href="{{ $heroPrimaryLink }}" class="pill-btn-hero-primary">
        {{ $heroPrimaryText }}
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
      <a href="{{ $heroSecondaryLink }}" class="pill-btn-hero-outline">{{ $heroSecondaryText }}</a>
    </div>
  </div>

  <!-- Overlapping feature cards -->
  <div class="hero-cards-strip">
    <div class="hero-fcard hero-fcard-white">
      <div class="hero-fcard-icon"><i class="fas fa-graduation-cap"></i></div>
      <div class="hero-fcard-text">
        <h4>{{ number_format($totalEcdeCentres ?? 0) }}+ ECDE Centres</h4>
        <p>Quality early childhood education centres across all sub-counties.</p>
      </div>
    </div>
    <div class="hero-fcard hero-fcard-gold">
      <div class="hero-fcard-icon"><i class="fas fa-chalkboard-teacher"></i></div>
      <div class="hero-fcard-text">
        <h4>{{ number_format($totalTeachers ?? 0) }} Trained Teachers</h4>
        <p>Dedicated ECDE teachers providing expert child-centered learning.</p>
      </div>
    </div>
    <div class="hero-fcard hero-fcard-navy">
      <div class="hero-fcard-icon"><i class="fas fa-users"></i></div>
      <div class="hero-fcard-text">
        <h4>{{ number_format($totalLearners ?? 0) }} Total Learners</h4>
        <p>Enrolled across {{ number_format($totalSubCounties ?? 0) }} sub-counties this term.</p>
      </div>
    </div>
  </div>
</section>
@endif


<div id="home-content-start">

<!-- FEATURES BENTO -->
<section class="features-section">
  <div class="reveal">
    <div class="section-label">What We Do</div>
    <div class="section-title">Building Futures Through<br>Early Education</div>
    <div class="section-sub">Laikipia ECDE programme provides quality early childhood education across all sub-counties.</div>
  </div>

  <div class="features-bento">
    {{-- Card 1: Quality Early Education (wide, image left) --}}
    <div class="feature-card span-2 reveal">
      <div class="feature-card-img">
        <img src="{{ asset('assets/images/_ (11).jpeg') }}" alt="Children learning through play" loading="lazy">
        <div class="feature-card-img-overlay"></div>
      </div>
      <div class="feature-card-text">
        <div class="feature-icon feature-icon-green"><i class="fas fa-graduation-cap"></i></div>
        <h3>Quality Early Education</h3>
        <p>Comprehensive ECDE programmes designed to nurture cognitive, social, and emotional development in children aged 3-6 years across Laikipia County.</p>
      </div>
    </div>

    {{-- Card 2: Showcase — Books/Education (tall, full-image with overlay) --}}
    <div class="feature-card feature-card-showcase reveal">
      <div class="feature-card-img">
        <img src="{{ asset('assets/images/_ (13).jpeg') }}" alt="Education and growth" loading="lazy">
        <div class="showcase-overlay">
          <div class="feature-icon"><i class="fas fa-book-open"></i></div>
          <h3>Holistic Growth</h3>
          <p>Nurturing the whole child — mind, body, and character — through structured ECDE curricula.</p>
        </div>
      </div>
    </div>

    {{-- Card 3: Modern Facilities (image top) --}}
    <div class="feature-card reveal">
      <div class="feature-card-img">
        <img src="{{ asset('assets/images/To The Girls In High School Who _.jpeg') }}" alt="Modern school facility" loading="lazy">
        <div class="feature-card-img-overlay"></div>
      </div>
      <div class="feature-card-text">
        <div class="feature-icon feature-icon-gold"><i class="fas fa-school"></i></div>
        <h3>Modern Facilities</h3>
        <p>Well-equipped ECDE centres built with safe learning environments and age-appropriate resources.</p>
      </div>
    </div>

    {{-- Card 4: Trained Teachers (image top) --}}
    <div class="feature-card reveal">
      <div class="feature-card-img">
        <img src="{{ asset('assets/images/_ (10).jpeg') }}" alt="Child with teacher" loading="lazy">
        <div class="feature-card-img-overlay"></div>
      </div>
      <div class="feature-card-text">
        <div class="feature-icon feature-icon-navy"><i class="fas fa-chalkboard-teacher"></i></div>
        <h3>Trained Teachers</h3>
        <p>Dedicated and trained ECDE teachers providing expert guidance and child-centered learning.</p>
      </div>
    </div>

    {{-- Card 5: Community Engagement (wide, image left) --}}
    <div class="feature-card span-2 reveal">
      <div class="feature-card-img">
        <img src="{{ asset('assets/images/Ways To Drive Community Engagement For Your Business.jpeg') }}" alt="Community engagement" loading="lazy">
        <div class="feature-card-img-overlay"></div>
      </div>
      <div class="feature-card-text">
        <div class="feature-icon feature-icon-blue"><i class="fas fa-users"></i></div>
        <h3>Community Engagement</h3>
        <p>Working closely with parents, communities, and stakeholders to ensure holistic child development and inclusive education for every child in Laikipia.</p>
      </div>
    </div>
  </div>
</section>

@if($showHomeGovernor)
<!-- Wave divider: white → white (subtle) -->
<div class="section-wave" style="background: #fff;">
  <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,40 C360,10 720,50 1080,20 C1260,5 1380,25 1440,15 L1440,60 L0,60 Z" fill="#fff"></path></svg>
</div>
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

      <a href="{{ $governorMessageLink }}" class="pill-btn pill-btn-primary" style="width:fit-content;">
        {{ $governorCtaText }}
        <svg class="btn-arrow" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>
@endif

<!-- Wave divider: white → light green -->
<div class="section-wave" style="background: #fff;">
  <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,20 C240,60 480,0 720,30 C960,60 1200,10 1440,40 L1440,60 L0,60 Z" fill="#f4f7f5"></path></svg>
</div>

<section class="schools-section">
  <div class="schools-header reveal">
    <div>
      <div class="section-label">Our Schools</div>
      <div class="section-title">ECDE Schools<br>Across Laikipia</div>
      <div class="section-sub" style="margin-top:8px;">Explore early childhood centres operating across all sub-counties in Laikipia County.</div>
    </div>
    <a href="{{ route('cms.schools') }}" class="view-all-pill">
      View all schools
      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>

  <div class="schools-bento reveal">
    <div class="schools-overview-card">
      <div class="schools-overview-icon"><i class="fas fa-school"></i></div>
      <div class="schools-overview-value">{{ number_format($totalEcdeCentres ?? 0) }}</div>
      <div class="schools-overview-title">Total ECDE Centres</div>
      <div class="schools-overview-desc">Across all sub-counties in Laikipia</div>
    </div>
    <div class="schools-overview-card">
      <div class="schools-overview-icon"><i class="fas fa-child"></i></div>
      <div class="schools-overview-value">{{ number_format($totalLearners ?? 0) }}</div>
      <div class="schools-overview-title">Total Learners</div>
      <div class="schools-overview-desc">Enrolled in current academic term</div>
    </div>
    <div class="schools-overview-card">
      <div class="schools-overview-icon"><i class="fas fa-chalkboard-teacher"></i></div>
      <div class="schools-overview-value">{{ number_format($totalTeachers ?? 0) }}</div>
      <div class="schools-overview-title">Total Teachers</div>
      <div class="schools-overview-desc">Trained and deployed county-wide</div>
    </div>
    <div class="schools-overview-card">
      <div class="schools-overview-icon"><i class="fas fa-map-marker-alt"></i></div>
      <div class="schools-overview-value">{{ number_format($totalSubCounties ?? 0) }}</div>
      <div class="schools-overview-title">Sub-Counties</div>
      <div class="schools-overview-desc">Covered by the ECDE programme</div>
    </div>
  </div>

  </div>
</section>


@if($showHomeTestimonials)
<!-- Wave divider: light green → mint green -->
<div class="section-wave" style="background: linear-gradient(180deg, #eef3ef, #f0f7f3);">
  <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,30 C180,55 360,10 540,35 C720,60 900,15 1080,40 C1260,65 1380,20 1440,30 L1440,60 L0,60 Z" fill="#f0f7f3"></path></svg>
</div>
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
      <div class="testi-stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <div class="testi-text">"{{ \Illuminate\Support\Str::limit($testimonial->message, 120) }}"</div>
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
