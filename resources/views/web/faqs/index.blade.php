@extends('web.app')
@section('title', 'FAQs')
@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── FAQ HERO ────────────────────────────────────── */
    .faq-hero {
      background: #F1FDF3;
      padding: 72px 64px 32px;
      position: relative; overflow: hidden;
    }
    .faq-hero::before {
      content: ''; position: absolute;
      top: -180px; right: -80px;
      width: 500px; height: 500px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.04) 0%, transparent 70%);
      pointer-events: none;
    }
    .faq-hero::after {
      content: ''; position: absolute;
      bottom: -120px; left: 5%;
      width: 350px; height: 350px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.03) 0%, transparent 70%);
      pointer-events: none;
    }
    .faq-hero .page-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.2rem, 4vw, 3.1rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 10px;
      position: relative; z-index: 1;
    }
    .faq-hero .page-subtitle {
      color: var(--text-muted);
      font-size: 15px; max-width: 520px; line-height: 1.55;
      position: relative; z-index: 1;
    }
    .faq-hero .hero-icon {
      position: absolute; right: 80px; top: 50%;
      transform: translateY(-50%);
      font-size: 180px; color: rgba(13,34,53,0.06);
      pointer-events: none; z-index: 0;
    }
    .faq-hero .floating-asset {
      position: absolute; right: 50px; bottom: -30px;
      height: 170px; z-index: 0;
      animation: floatBounce 6s ease-in-out infinite;
      filter: drop-shadow(0 20px 40px rgba(0,0,0,0.20));
      pointer-events: none;
    }

    /* ─── FAQ CONTENT ─────────────────────────────────── */
    .faq-content {
      padding: 48px 64px 80px;
      background: var(--cream);
    }

    .faq-layout {
      display: grid;
      grid-template-columns: minmax(0, 1fr) 360px;
      gap: 32px;
      align-items: start;
    }

    .faq-main-panel {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-md);
      padding: 36px;
    }

    .faq-side-panel {
      position: sticky; top: 100px;
    }

    /* Accordion */
    .faq-accordion .accordion-item {
      border: none !important;
      border-bottom: 1px solid rgba(13,34,53,0.06) !important;
      border-radius: 0; margin-bottom: 0;
      background: transparent;
    }
    .faq-accordion .accordion-item:last-child {
      border-bottom: none !important;
    }
    .faq-accordion .accordion-button {
      font-weight: 700; font-size: 1.05rem;
      color: var(--navy); background: transparent;
      padding: 20px 4px; line-height: 1.5;
      transition: all 0.3s; border: 0; border-radius: 0;
      gap: 14px;
    }
    .faq-accordion .accordion-button:focus {
      box-shadow: none; border-color: transparent;
      background: transparent; outline: none;
    }
    .faq-accordion .accordion-button::after {
      width: 28px; height: 28px; flex-shrink: 0;
      background-color: rgba(26,124,62,0.08);
      border-radius: 50%; background-size: 12px;
      background-position: center;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230d2235'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
      transition: all 0.3s;
    }
    .faq-accordion .accordion-button:not(.collapsed)::after {
      background-color: var(--green);
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }
    .faq-accordion .accordion-button:not(.collapsed) {
      background: transparent;
      color: var(--green); box-shadow: none;
    }

    .faq-question-icon {
      display: inline-flex; align-items: center;
      justify-content: center;
      width: 36px; height: 36px;
      background: rgba(26,124,62,0.08);
      border-radius: var(--radius-sm);
      color: var(--green); font-size: 14px; font-weight: 800;
      flex-shrink: 0;
      transition: all 0.3s;
    }
    .accordion-button:not(.collapsed) .faq-question-icon {
      background: var(--green); color: #fff;
    }

    .faq-accordion .accordion-body {
      background: linear-gradient(135deg, #f8faf9 0%, #f4fbf6 100%);
      color: var(--text); line-height: 1.85;
      padding: 20px 24px; font-size: 0.95rem;
      border-radius: var(--radius-md);
      margin: 0 4px 16px;
    }
    .faq-accordion .accordion-body p { margin-bottom: 0.75rem; }
    .faq-accordion .accordion-body p:last-child { margin-bottom: 0; }
    .faq-accordion .accordion-body ul,
    .faq-accordion .accordion-body ol { margin-left: 1.5rem; margin-bottom: 0.75rem; }
    .faq-accordion .accordion-body li { margin-bottom: 0.4rem; color: #4b5563; }
    .faq-accordion .accordion-body a {
      color: var(--green); text-decoration: none;
      border-bottom: 1.5px solid transparent;
      transition: border-color 0.2s;
    }
    .faq-accordion .accordion-body a:hover { border-bottom-color: var(--green); }

    /* Side panel - Help card */
    .help-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-md);
      padding: 32px;
      text-align: center;
      margin-bottom: 24px;
    }
    .help-card-icon {
      width: 64px; height: 64px;
      border-radius: 50%;
      background: rgba(26,124,62,0.08);
      display: flex; align-items: center; justify-content: center;
      font-size: 24px; color: var(--green);
      margin: 0 auto 20px;
    }
    .help-card h4 {
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; color: var(--navy);
      margin-bottom: 10px;
    }
    .help-card p {
      font-size: 14px; color: var(--text-muted);
      line-height: 1.65; margin-bottom: 20px;
    }

    /* Quick links card */
    .quick-links-card {
      background: var(--navy);
      border-radius: var(--radius-xl);
      padding: 28px;
      box-shadow: var(--shadow-lg);
    }
    .quick-links-card h4 {
      font-family: 'Space Grotesk', sans-serif;
      color: #fff; font-weight: 700; font-size: 1rem;
      margin-bottom: 20px;
    }
    .quick-links-card a {
      display: flex; align-items: center; gap: 10px;
      padding: 10px 16px; border-radius: var(--radius-sm);
      color: rgba(255,255,255,0.65); text-decoration: none;
      font-size: 14px; font-weight: 600;
      transition: all 0.25s; margin-bottom: 4px;
    }
    .quick-links-card a:hover {
      color: #fff;
      background: rgba(255,255,255,0.08);
    }
    .quick-links-card a i { width: 16px; text-align: center; }

    @media (max-width: 992px) {
      .faq-layout { grid-template-columns: 1fr; }
      .faq-side-panel { position: static; }
    }
    @media (max-width: 900px) {
      .faq-hero { padding: 62px 16px 28px; }
      .faq-hero .hero-icon, .faq-hero .floating-asset { display: none; }
      .faq-content { padding: 32px 24px 60px; }
      .faq-main-panel { padding: 24px; }
    }
</style>
@endsection

@section('content')
<!-- FAQ Hero -->
<div class="faq-hero">
    <i class="fas fa-question-circle hero-icon"></i>
    <h1 class="page-title" style="animation: fadeUp 0.7s ease both;">Frequently Asked Questions</h1>
    <p class="page-subtitle" style="animation: fadeUp 0.7s ease 0.1s both;">Find answers to common questions about our ECDE services and programmes.</p>
    <img src="{{ asset('assets/images/cheerful-girl-removebg.png') }}"
         alt="" class="floating-asset" loading="lazy">
</div>

<div class="faq-content">
    <div class="faq-layout">
        <!-- Main FAQ Panel -->
        <div class="faq-main-panel reveal">
            @if($faqs->count() > 0)
                <div class="accordion faq-accordion" id="faqAccordion">
                    @foreach($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed d-flex align-items-center" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                    <span class="faq-question-icon">Q</span>
                                    <span>{{ $faq->question }}</span>
                                </button>
                            </h2>
                            <div id="faq{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-question-circle"></i>
                    <h5 class="mb-2">No FAQs available</h5>
                    <p class="mb-0">Common questions and answers will appear here once added.</p>
                </div>
            @endif
        </div>

        <!-- Side Panel -->
        <div class="faq-side-panel">
            <div class="help-card reveal">
                <div class="help-card-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h4>Still Have Questions?</h4>
                <p>Can't find what you're looking for? Reach out directly and our team will help you.</p>
                <a href="{{ route('cms.contact') }}" class="pill-btn pill-btn-primary" style="width:100%; justify-content:center;">
                    <i class="fas fa-envelope"></i> Contact Us
                </a>
            </div>

            <div class="quick-links-card reveal">
                <h4>Helpful Links</h4>
                <a href="{{ route('cms.posts') }}"><i class="fas fa-blog"></i> Read Our Blog</a>
                <a href="{{ route('cms.schools') }}"><i class="fas fa-school"></i> View Schools</a>
                <a href="{{ route('cms.galleries') }}"><i class="fas fa-images"></i> Photo Galleries</a>
                <a href="{{ route('cms.announcements') }}"><i class="fas fa-bullhorn"></i> Announcements</a>
            </div>
        </div>
    </div>
</div>
@endsection
