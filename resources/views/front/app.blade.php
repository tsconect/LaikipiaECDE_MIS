<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>LAIKIPIA COUNTY - CDF MANAGEMENT SYSTEM</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="Laikipia Cdf management SYstem.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('main.d810cf0ae7f39f28f336.css')}}" rel="stylesheet">
    <style>
        :root {
            --public-primary: #1a3a5c;
            --public-primary-dark: #142e49;
            --public-kenya-green: #006600;
            --public-accent: #f59e0b;
            --public-surface: #ffffff;
            --public-surface-soft: #f7f9fc;
            --public-border: #e7ecf3;
            --public-text: #1f2937;
            --public-muted: #64748b;
            --public-shadow: 0 12px 30px rgba(15, 23, 42, 0.1);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background: var(--public-surface-soft);
            color: var(--public-text);
            min-height: 100vh;
        }

        a,
        button,
        .btn,
        .nav-link,
        .card,
        .form-control,
        .form-select,
        .accordion-button {
            transition: all 0.2s ease;
        }

        .public-navbar {
            background: linear-gradient(90deg, var(--public-primary) 0%, #22496f 100%);
            position: sticky;
            top: 0;
            z-index: 1040;
        }

        .public-navbar.scrolled {
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.22);
        }

        .public-navbar .navbar-brand {
            color: #fff !important;
            font-weight: 800;
            letter-spacing: 0.2px;
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            font-size: 1.05rem;
        }

        .public-brand-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255,255,255,0.12);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,0.18);
            color: #fff;
        }

        .public-navbar .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            border-radius: 8px;
            padding: .5rem .7rem !important;
        }

        .public-navbar .nav-link:hover,
        .public-navbar .nav-link:focus {
            color: #fff !important;
            background: rgba(255,255,255,0.08);
        }

        .public-navbar .btn {
            border-radius: 8px;
            font-weight: 600;
        }

        .public-navbar .icon-login-btn {
            border: 1px solid rgba(255,255,255,0.26);
            color: #fff;
            background: rgba(255,255,255,0.08);
            padding: .5rem .75rem;
        }

        .public-navbar .icon-login-btn:hover {
            background: rgba(255,255,255,0.16);
            color: #fff;
        }

        .public-navbar .dropdown-menu {
            border-radius: 8px;
            border: 1px solid var(--public-border);
            box-shadow: var(--public-shadow);
        }

        .public-main {
            min-height: calc(100vh - 200px);
        }

        .public-content-wrapper {
            padding-top: 2.25rem;
            padding-bottom: 3rem;
        }

        .public-content-wrapper .card {
            border: 1px solid var(--public-border);
            border-radius: 8px;
            box-shadow: var(--public-shadow);
            transition: transform .2s ease, box-shadow .2s ease;
            overflow: hidden;
        }

        .public-content-wrapper .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 34px rgba(15, 23, 42, 0.12);
        }

        .public-content-wrapper h1,
        .public-content-wrapper h2,
        .public-content-wrapper h3,
        .public-content-wrapper h4 {
            color: var(--public-primary);
        }

        .public-content-wrapper .lead,
        .public-content-wrapper .text-muted,
        .public-content-wrapper p {
            color: var(--public-muted);
        }

        .public-content-wrapper .btn-primary {
            background: var(--public-primary);
            border-color: var(--public-primary);
            border-radius: 8px;
            font-weight: 600;
        }

        .public-content-wrapper .btn-primary:hover {
            background: var(--public-primary-dark);
            border-color: var(--public-primary-dark);
        }

        .public-content-wrapper .btn-outline-primary {
            border-radius: 8px;
            font-weight: 600;
            border-color: var(--public-primary);
            color: var(--public-primary);
        }

        .public-content-wrapper .btn-outline-primary:hover {
            background: var(--public-primary);
            color: #fff;
        }

        .public-content-wrapper .alert {
            border-radius: 8px;
            border: 0;
            box-shadow: var(--public-shadow);
        }

        .public-content-wrapper .badge {
            border-radius: 999px;
            padding: .4rem .65rem;
            font-weight: 600;
            letter-spacing: .2px;
        }

        .badge-green {
            background: rgba(0, 102, 0, 0.12);
            color: var(--public-kenya-green);
            border: 1px solid rgba(0, 102, 0, 0.25);
        }

        .empty-state {
            border: 1px dashed #c8d3e2;
            border-radius: 8px;
            background: linear-gradient(180deg, #f9fbff 0%, #f3f8ff 100%);
            text-align: center;
            padding: 2rem 1.2rem;
            color: var(--public-muted);
        }

        .empty-state i {
            font-size: 2rem;
            color: var(--public-primary);
            margin-bottom: .7rem;
        }

        .public-content-wrapper .form-control,
        .public-content-wrapper .form-select,
        .public-content-wrapper textarea {
            border-radius: 8px;
            border: 1px solid #d8e1ec;
            min-height: 46px;
        }

        .public-content-wrapper textarea {
            min-height: 130px;
        }

        .public-content-wrapper .pagination {
            gap: 0.35rem;
        }

        .public-content-wrapper .page-link {
            border-radius: 8px;
            border: 1px solid var(--public-border);
            color: var(--public-primary);
        }

        .public-content-wrapper .page-item.active .page-link {
            background: var(--public-primary);
            border-color: var(--public-primary);
            color: #fff;
        }

        .public-footer {
            background: linear-gradient(135deg, var(--public-primary-dark) 0%, var(--public-primary) 100%);
            color: #fff;
            margin-top: 2.5rem;
        }

        .public-footer a {
            color: rgba(255,255,255,0.9);
        }

        .public-footer a:hover {
            color: #fff;
            text-decoration: none;
        }


        .social-icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.08);
            margin-right: .4rem;
            font-size: 1rem;
        }

        .social-icon-btn:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }

        .back-to-top {
            position: fixed;
            right: 18px;
            bottom: 18px;
            width: 42px;
            height: 42px;
            border-radius: 8px;
            border: 0;
            background: var(--public-kenya-green);
            color: #fff;
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.18);
            z-index: 1050;
            display: none;
        }

        .back-to-top:hover {
            background: #007a00;
            transform: translateY(-2px);
        }

        .public-navbar .navbar-toggler {
            border-color: rgba(255,255,255,0.34);
            border-radius: 8px;
            padding: .35rem .55rem;
        }

        .public-navbar .navbar-toggler-icon {
            filter: brightness(0) invert(1);
        }

        .public-nav-center {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: .2rem;
            margin: 0 auto;
        }

        @media (max-width: 991.98px) {
            .public-navbar .navbar-collapse {
                margin-top: 0.75rem;
                background: rgba(16, 42, 66, 0.96);
                border-radius: 8px;
                padding: .75rem;
            }

            .public-nav-center {
                margin: .25rem 0 .6rem;
                align-items: flex-start;
            }

            .public-navbar .nav-link {
                margin-bottom: .25rem;
            }
        }
    </style>
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light public-navbar" id="publicNavbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="public-brand-icon"><i class="fa fa-shield"></i></span>
                    <span>Laikipia CDF Management System</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav public-nav-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cms.posts') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cms.announcements') }}">Announcements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cms.galleries') }}">Galleries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cms.faqs') }}">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cms.contact') }}">Contact</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn icon-login-btn">
                                    <i class="fa fa-user-circle me-1"></i> Sign In
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <button class="btn icon-login-btn dropdown-toggle" id="publicUserMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user-circle me-1"></i>
                                    <span class="d-none d-md-inline">{{ auth()->user()->first_name ?? auth()->user()->name ?? 'Account' }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="publicUserMenu">
                                    <li><a class="dropdown-item" href="{{ route('home') }}"><i class="fa fa-home me-2"></i>Dashboard</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                                            @csrf
                                            <button type="submit" class="dropdown-item"><i class="fa fa-sign-out me-2"></i>Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>


        <main class="public-main @hasSection('full_width') py-0 @else py-3 @endif">
            @yield('content')
        </main>

        <footer class="public-footer mt-5 pt-4 pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h5 class="mb-2">{{ $settings['site_name'] ?? 'Laikipia CDF Management System' }}</h5>
                        <p class="mb-1">{{ $settings['site_description'] ?? 'Empowering communities through education and development.' }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h6 class="mb-2">Quick Links</h6>
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{ route('cms.posts') }}" class="text-white">Blog</a></li>
                            <li><a href="{{ route('cms.galleries') }}" class="text-white">Galleries</a></li>
                            <li><a href="{{ route('cms.faqs') }}" class="text-white">FAQs</a></li>
                            <li><a href="{{ route('cms.announcements') }}" class="text-white">Announcements</a></li>
                            <li><a href="{{ route('cms.contact') }}" class="text-white">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h6 class="mb-2">Contact</h6>
                        <p class="mb-1"><i class="fa fa-envelope"></i> {{ $settings['contact_email'] ?? 'info@laikipia.ecde' }}</p>
                        <p class="mb-1"><i class="fa fa-phone"></i> {{ $settings['contact_phone'] ?? '+254' }}</p>
                        <p class="mb-0"><i class="fa fa-map-marker"></i> {{ $settings['site_address'] ?? ($settings['contact_address'] ?? 'Laikipia County') }}</p>
                        <div class="mt-3">
                            <h6 class="mb-2">Follow Us</h6>
                            @if(!empty($settings['facebook_url']) || !empty($settings['social_facebook']))
                                <a href="{{ $settings['facebook_url'] ?? $settings['social_facebook'] }}" target="_blank" class="text-white social-icon-btn" title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            @endif

                            @if(!empty($settings['twitter_url']) || !empty($settings['social_twitter']))
                                <a href="{{ $settings['twitter_url'] ?? $settings['social_twitter'] }}" target="_blank" class="text-white social-icon-btn" title="Twitter/X">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            @endif

                            @if(!empty($settings['youtube_url']) || !empty($settings['social_youtube']))
                                <a href="{{ $settings['youtube_url'] ?? $settings['social_youtube'] }}" target="_blank" class="text-white social-icon-btn" title="YouTube">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <hr style="border-color: rgba(255,255,255,0.2);">
                <div class="text-center">
                    <small>&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Laikipia CDF Management System' }}. All rights reserved.</small>
                </div>
            </div>
        </footer>

        <button type="button" class="back-to-top" id="backToTop" aria-label="Back to top">
            <i class="fa fa-arrow-up"></i>
        </button>

@yield('scripts')
    </div>
</body>



<script type="text/javascript" src="{{asset('assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('publicNavbar');
        const backToTop = document.getElementById('backToTop');

        function updateScrolledState() {
            if (window.scrollY > 10) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            if (window.scrollY > 260) {
                backToTop.style.display = 'inline-flex';
            } else {
                backToTop.style.display = 'none';
            }
        }

        updateScrolledState();
        window.addEventListener('scroll', updateScrolledState, { passive: true });

        backToTop?.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
</script>
</html>

