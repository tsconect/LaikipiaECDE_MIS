@extends('web.app')
@section('title', 'Contact Us')
@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── CONTACT HERO ────────────────────────────────── */
    .contact-hero {
      background: #F1FDF3;
      padding: 72px 64px 32px;
      position: relative; overflow: hidden;
    }
    .contact-hero::before {
      content: ''; position: absolute;
      top: -180px; right: -80px;
      width: 500px; height: 500px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.04) 0%, transparent 70%);
      pointer-events: none;
    }
    .contact-hero .page-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.2rem, 4vw, 3.1rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 10px;
      position: relative; z-index: 1;
    }
    .contact-hero .page-subtitle {
      color: var(--text-muted);
      font-size: 15px; max-width: 520px; line-height: 1.55;
      position: relative; z-index: 1;
    }
    .contact-hero .hero-icon {
      position: absolute; right: 80px; top: 50%;
      transform: translateY(-50%);
      font-size: 180px; color: rgba(13,34,53,0.06);
      pointer-events: none; z-index: 0;
    }
    .contact-hero .floating-asset {
      position: absolute; right: 50px; bottom: -20px;
      height: 160px; z-index: 0;
      animation: floatBounce 6s ease-in-out infinite;
      filter: drop-shadow(0 20px 40px rgba(0,0,0,0.20));
      pointer-events: none;
    }

    /* ─── CONTACT BENTO ───────────────────────────────── */
    .contact-content {
      padding: 48px 64px 80px;
      background: var(--cream);
    }

    .contact-bento {
      display: grid;
      grid-template-columns: 3fr 2fr;
      gap: 32px;
      align-items: start;
    }

    /* Form card */
    .contact-form-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-md);
      padding: 40px;
    }
    .contact-form-card h3 {
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; color: var(--navy);
      margin-bottom: 6px; font-size: 1.3rem;
    }
    .contact-form-card .form-subtitle {
      color: var(--text-muted); font-size: 14px;
      margin-bottom: 28px;
    }
    .contact-form-card .form-label {
      font-weight: 700; font-size: 13px; color: var(--navy);
      letter-spacing: 0.02em;
    }
    .contact-form-card .form-control {
      border-radius: var(--radius-md);
      border: 1.5px solid rgba(13,34,53,0.10);
      padding: 12px 18px; font-size: 14px;
      transition: all 0.3s;
      background: #fafbfc;
    }
    .contact-form-card .form-control:focus {
      border-color: var(--green);
      box-shadow: 0 0 0 4px rgba(26,124,62,0.08);
      background: #fff;
    }
    .contact-form-card .form-control.is-invalid {
      border-color: #ef4444;
    }
    .contact-form-card textarea.form-control {
      min-height: 140px;
      resize: vertical;
    }

    /* Info side */
    .contact-info-stack {
      display: flex; flex-direction: column; gap: 20px;
    }

    .contact-info-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-sm);
      padding: 28px;
      display: flex; align-items: flex-start; gap: 18px;
      transition: all 0.35s;
    }
    .contact-info-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-md);
    }
    .contact-info-icon {
      width: 52px; height: 52px;
      border-radius: var(--radius-md);
      display: flex; align-items: center; justify-content: center;
      font-size: 20px; flex-shrink: 0;
    }
    .contact-info-icon.icon-green {
      background: rgba(26,124,62,0.08); color: var(--green);
    }
    .contact-info-icon.icon-navy {
      background: rgba(13,34,53,0.06); color: var(--navy);
    }
    .contact-info-icon.icon-gold {
      background: rgba(245,158,11,0.08); color: #d97706;
    }
    .contact-info-card h5 {
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; color: var(--navy);
      font-size: 0.95rem; margin-bottom: 4px;
    }
    .contact-info-card p,
    .contact-info-card a {
      font-size: 14px; color: var(--text-muted);
      margin-bottom: 0; text-decoration: none;
      transition: color 0.25s;
    }
    .contact-info-card a:hover { color: var(--green); }

    /* CTA card */
    .contact-cta-card {
      background: var(--navy);
      border-radius: var(--radius-xl);
      padding: 32px;
      color: #fff;
      position: relative; overflow: hidden;
    }
    .contact-cta-card::before {
      content: ''; position: absolute;
      top: -60px; right: -60px;
      width: 180px; height: 180px; border-radius: 50%;
      background: rgba(52,211,153,0.10);
      pointer-events: none;
    }
    .contact-cta-card h4 {
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; margin-bottom: 10px;
      position: relative; z-index: 1;
    }
    .contact-cta-card p {
      font-size: 14px; color: rgba(255,255,255,0.55);
      line-height: 1.65; margin-bottom: 20px;
      position: relative; z-index: 1;
    }
    .contact-cta-card .social-row {
      display: flex; gap: 10px;
      position: relative; z-index: 1;
    }
    .contact-cta-card .social-row a {
      width: 42px; height: 42px; border-radius: var(--radius-sm);
      background: rgba(255,255,255,0.08);
      border: 1px solid rgba(255,255,255,0.10);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.6); text-decoration: none;
      transition: all 0.3s; font-size: 16px;
    }
    .contact-cta-card .social-row a:hover {
      background: var(--green); color: #fff;
      border-color: var(--green);
      transform: translateY(-2px);
    }

    @media (max-width: 992px) {
      .contact-bento { grid-template-columns: 1fr; }
    }
    @media (max-width: 900px) {
      .contact-hero { padding: 62px 16px 28px; }
      .contact-hero .hero-icon, .contact-hero .floating-asset { display: none; }
      .contact-content { padding: 32px 24px 60px; }
      .contact-form-card { padding: 28px; }
    }
</style>
@endsection

@section('content')
<!-- Contact Hero -->
<div class="contact-hero">
    <i class="fas fa-paper-plane hero-icon"></i>
    <h1 class="page-title" style="animation: fadeUp 0.7s ease both;">Get In Touch</h1>
    <p class="page-subtitle" style="animation: fadeUp 0.7s ease 0.1s both;">Have a question? Send us a message and we'll respond as soon as possible.</p>
    <img src="{{ asset('assets/images/___11_-removebg-preview.png') }}"
         alt="" class="floating-asset" loading="lazy">
</div>

<div class="contact-content">
    <div class="contact-bento">
        <!-- Form Card -->
        <div class="contact-form-card reveal">
            <h3>Send us a message</h3>
            <p class="form-subtitle">Fill out the form below and our team will get back to you shortly.</p>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: var(--radius-md);">
                    <i class="fas fa-check-circle me-2"></i> <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: var(--radius-md);">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('cms.contact.submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Full Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" placeholder="Your full name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address *</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject *</label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                           id="subject" name="subject" value="{{ old('subject') }}" placeholder="What is this about?" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="form-label">Message *</label>
                    <textarea class="form-control @error('message') is-invalid @enderror"
                              id="message" name="message" rows="6" placeholder="Tell us more about your inquiry..." required>{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="pill-btn pill-btn-primary" style="width:100%; justify-content:center;">
                    <i class="fas fa-paper-plane"></i> Send Message
                  </button>
                  <style>
                  /* Reinforce button style for Send Message */
                  .pill-btn.pill-btn-primary {
                    background: var(--gold) !important;
                    color: var(--navy) !important;
                    border: none !important;
                    border-radius: 10px !important;
                    font-weight: 700;
                    font-size: 15px;
                    box-shadow: 0 8px 28px rgba(245,158,11,0.35);
                    transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                  }
                  .pill-btn.pill-btn-primary:hover {
                    background: var(--gold-light) !important;
                    color: var(--navy) !important;
                    transform: translateY(-3px) scale(1.02);
                    box-shadow: 0 14px 40px rgba(245,158,11,0.45);
                  }
                  </style>
                </button>
            </form>
        </div>

        <!-- Info Stack -->
        <div class="contact-info-stack">
            <div class="contact-info-card reveal">
                <div class="contact-info-icon icon-green">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h5>Email Address</h5>
                    <a href="mailto:{{ $settings['contact_email'] ?? 'info@laikipia.ecde' }}">
                        {{ $settings['contact_email'] ?? 'info@laikipia.ecde' }}
                    </a>
                </div>
            </div>

            <div class="contact-info-card reveal">
                <div class="contact-info-icon icon-navy">
                    <i class="fas fa-phone"></i>
                </div>
                <div>
                    <h5>Phone Number</h5>
                    <a href="tel:{{ $settings['contact_phone'] ?? '+254' }}">
                        {{ $settings['contact_phone'] ?? '+254' }}
                    </a>
                </div>
            </div>

            <div class="contact-info-card reveal">
                <div class="contact-info-icon icon-gold">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <h5>Our Location</h5>
                    <p>{{ $settings['site_address'] ?? 'Laikipia County, Kenya' }}</p>
                </div>
            </div>

            <!-- Social CTA card -->
            <div class="contact-cta-card reveal">
                <h4>Follow Us</h4>
                <p>Stay connected with us on social media for the latest updates and news.</p>
                <div class="social-row">
                    <a href="{{ $settings['facebook_url'] ?? '#' }}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $settings['twitter_url'] ?? '#' }}" title="X / Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $settings['youtube_url'] ?? '#' }}" title="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
