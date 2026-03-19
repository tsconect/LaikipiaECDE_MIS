@php
    $layout = auth()->check() ? 'admin.app' : 'front.app';
@endphp

@extends($layout)

@section('full_width', '1')

@section('content')
@auth
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-md-12">
                <h1>Dashboard</h1>
                <p>Welcome {{ auth()->user()->name }}!</p>
            </div>
        </div>
    </div>
@else
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
        $heroImageUrl = !empty($settings['home_hero_image']) ? asset('storage/' . $settings['home_hero_image']) : null;
    @endphp

    <style>
        .home-hero {
            min-height: clamp(360px, 58vh, 520px);
            display: flex;
            align-items: center;
            justify-content: flex-start;
            text-align: left;
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        .home-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(130deg, rgba(17, 38, 62, 0.78), rgba(27, 66, 104, 0.64));
        }

        .home-hero-content {
            position: relative;
            z-index: 1;
            max-width: 760px;
            padding: 2rem;
            margin-left: clamp(0.5rem, 6vw, 4rem);
        }

        .home-hero h1 {
            font-size: clamp(2rem, 5vw, 3.8rem);
            font-weight: 800;
            letter-spacing: .4px;
            color: #fff;
        }

        .home-hero p {
            font-size: clamp(1rem, 2.2vw, 1.3rem);
            color: rgba(255,255,255,.92);
        }

        .home-hero .btn {
            border-radius: 8px;
            padding: .8rem 1.35rem;
            font-weight: 600;
        }

        .hero-btn-primary {
            background: #1a3a5c;
            border-color: #1a3a5c;
            color: #fff;
        }

        .hero-btn-primary:hover {
            background: #142e49;
            border-color: #142e49;
            color: #fff;
        }

        .hero-btn-ghost {
            border-color: rgba(255,255,255,.75);
            color: #fff;
            background: transparent;
        }

        .hero-btn-ghost:hover {
            background: rgba(255,255,255,0.14);
            color: #fff;
            border-color: #fff;
        }

        .hero-scroll-indicator {
            position: absolute;
            left: 50%;
            bottom: 22px;
            transform: translateX(-50%);
            z-index: 2;
            color: rgba(255,255,255,.9);
            text-align: center;
            font-size: .9rem;
        }

        .hero-scroll-indicator i {
            display: block;
            font-size: 1.2rem;
            margin-top: .25rem;
            animation: arrowFloat 1.5s infinite ease-in-out;
        }

        @keyframes arrowFloat {
            0% { transform: translateY(0); opacity: .7; }
            50% { transform: translateY(6px); opacity: 1; }
            100% { transform: translateY(0); opacity: .7; }
        }

        .home-section-title {
            color: #1a3c5e;
            font-weight: 700;
            margin-bottom: 1.1rem;
        }

        .home-section-card {
            border: 1px solid #e7ecf3;
            border-radius: 8px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
            height: 100%;
        }

        .home-content-card {
            border-top: 4px solid #1a3a5c;
        }

        .home-content-card.announcement-card {
            border-top-color: #006600;
        }

        .home-meta {
            color: #64748b;
            font-size: .875rem;
            margin-bottom: .6rem;
        }

        @media (max-width: 767.98px) {
            .home-hero {
                justify-content: center;
                text-align: center;
            }

            .home-hero-content {
                margin-left: 0;
            }
        }
    </style>

    @if($showHomeHero)
    <section class="home-hero" style="background-image: {{ $heroImageUrl ? 'url(' . $heroImageUrl . ')' : 'linear-gradient(135deg, #1a3c5e 0%, #2d5f8d 100%)' }};">
        <div class="home-hero-content">
            <h1 class="mb-3">{{ $heroHeadline }}</h1>
            <p class="mb-4">{{ $heroSubtext }}</p>
            <a href="{{ $heroPrimaryLink }}" class="btn hero-btn-primary me-2 mb-2">{{ $heroPrimaryText }}</a>
            <a href="{{ $heroSecondaryLink }}" class="btn hero-btn-ghost mb-2">{{ $heroSecondaryText }}</a>
        </div>
        <a class="hero-scroll-indicator text-decoration-none" href="#home-content-start" aria-label="Scroll down">
            Scroll
            <i class="fa fa-angle-down"></i>
        </a>
    </section>
    @endif

    <div class="container py-5" id="home-content-start">
        @if($showHomePosts)
        <section class="py-2">
            <h3 class="home-section-title">Latest Posts</h3>
            <div class="row g-3">
                @forelse(($recentPosts ?? collect()) as $post)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card home-section-card home-content-card">
                            <div class="card-body">
                                <span class="badge badge-green mb-2">Blog</span>
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <div class="home-meta"><i class="fa fa-calendar"></i> {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') ?? 'N/A' }}</div>
                                <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 110) }}</p>
                                <a href="{{ route('cms.post', $post->slug) }}" class="text-decoration-none fw-semibold">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
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
        <section class="py-4">
            <h3 class="home-section-title">Announcements</h3>
            <div class="row g-3">
                @forelse(($activeAnnouncements ?? collect()) as $announcement)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card home-section-card home-content-card announcement-card">
                            <div class="card-body">
                                <span class="badge badge-green mb-2">Announcement</span>
                                <h5 class="card-title">{{ $announcement->title }}</h5>
                                <div class="home-meta"><i class="fa fa-calendar"></i> {{ optional($announcement->start_date)->format('M d, Y') ?? 'N/A' }}</div>
                                <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit(strip_tags($announcement->content), 120) }}</p>
                                <a href="{{ route('cms.announcements') }}" class="text-decoration-none fw-semibold">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="fa fa-bullhorn"></i>
                            <h5 class="mb-2">No announcements right now</h5>
                            <p class="mb-0">Important notices will be posted here.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </section>
        @endif

        @if($showHomeTestimonials)
        <section class="py-4">
            <h3 class="home-section-title">Testimonials</h3>
            <div class="row g-3">
                @forelse(($featuredTestimonials ?? collect()) as $testimonial)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card home-section-card">
                            <div class="card-body">
                                <p class="mb-2">“{{ \Illuminate\Support\Str::limit($testimonial->message, 120) }}”</p>
                                <small class="text-muted">— {{ $testimonial->name }}</small>
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
        <section class="py-4">
            <h3 class="home-section-title">Explore</h3>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('cms.posts') }}" class="btn btn-outline-primary">Blog</a>
                <a href="{{ route('cms.galleries') }}" class="btn btn-outline-primary">Galleries</a>
                <a href="{{ route('cms.faqs') }}" class="btn btn-outline-primary">FAQs</a>
                <a href="{{ route('cms.testimonials') }}" class="btn btn-outline-primary">Testimonials</a>
                <a href="{{ route('cms.announcements') }}" class="btn btn-outline-primary">Announcements</a>
                <a href="{{ route('cms.contact') }}" class="btn btn-outline-primary">Contact</a>
            </div>
        </section>
        @endif
    </div>

@endauth
@endsection
