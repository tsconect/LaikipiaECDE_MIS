<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ $settings['site_name'] ?? 'Laikipia ECDE Management System' }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWix+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkR4j8lN2R7+P7q6T2A2R4cV2N4s46HoPazg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{asset('main.d810cf0ae7f39f28f336.css')}}" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --navy: #0d2235;
      --navy-mid: #163348;
      --green: #1a7c3e;
      --green-light: #25a857;
      --green-pale: #e8f5ee;
      --gold: #c8993a;
      --cream: #f8f6f1;
      --white: #ffffff;
      --text: #1a2530;
      --text-muted: #6b7c8d;
      --border: rgba(13,34,53,0.10);
      --primary-color: #0d2235;
      --secondary-color: #1a7c3e;
    }

    html { scroll-behavior: smooth; }
    body {
      font-family: 'Manrope', sans-serif;
      color: var(--text);
      background: var(--cream);
      overflow-x: hidden;
    }

    /* ─── NAV ─────────────────────────────────────────── */
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

    /* ─── SECTION SHARED ──────────────────────────────── */
    section { padding: 96px 64px; }
    .section-label {
      display: inline-flex; align-items: center; gap: 10px;
      font-size: 12px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
      color: var(--green); margin-bottom: 14px;
    }
    .section-label::before {
      content: ''; display: block; width: 28px; height: 2px;
      background: var(--green);
    }
    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 3.5vw, 3rem);
      font-weight: 700; color: var(--navy);
      line-height: 1.15; margin-bottom: 14px;
    }
    .section-sub { font-size: 17px; color: var(--text-muted); max-width: 520px; line-height: 1.7; margin-bottom: 52px; }

    .page-header-container {
      margin-bottom: 2rem;
    }

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

    .page-content-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 20px;
      box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
      overflow: hidden;
    }

    .page-content-card .card-body {
      padding: 2rem;
    }

    .page-meta {
      color: var(--text-muted);
      font-size: .95rem;
    }

    .home-section-card {
      border: 1px solid var(--border);
      border-radius: 16px;
      box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
      background: #fff;
      overflow: hidden;
    }

    .home-content-card {
      border-top: 3px solid var(--green);
    }

    .home-content-card.announcement-card {
      border-top-color: var(--gold);
    }

    .home-meta {
      color: var(--text-muted);
      font-size: .9rem;
    }

    .read-more-link {
      color: var(--green);
      font-weight: 700;
    }

    .read-more-link:hover {
      color: var(--green-light);
    }

    .listing-card-compact {
      height: 430px;
      display: flex;
      flex-direction: column;
    }

    .listing-card-compact .card-img-top {
      height: 190px !important;
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
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .empty-state-container {
      max-width: 780px;
      margin: 0 auto;
    }

    .empty-state {
      border: 1px dashed #cad4e3;
      border-radius: 16px;
      padding: 2rem 1.2rem;
      text-align: center;
      color: var(--text-muted);
      background: linear-gradient(180deg, #fff 0%, #f8fbff 100%);
    }

    .empty-state i {
      font-size: 2rem;
      color: var(--navy);
      margin-bottom: .75rem;
    }

    /* ─── FOOTER ──────────────────────────────────────── */
    footer {
      background: var(--navy);
      padding: 72px 64px 32px;
      color: rgba(255,255,255,0.65);
    }
    .footer-grid { display: grid; grid-template-columns: 1.8fr 1fr 1.2fr; gap: 60px; margin-bottom: 56px; }
    .footer-brand-name { font-family: 'Playfair Display', serif; font-size: 1.3rem; color: #fff; font-weight: 700; margin: 12px 0 10px; }
    .footer-tagline { font-size: 14px; line-height: 1.7; color: rgba(255,255,255,0.50); }
    .footer-social { display: flex; gap: 10px; margin-top: 24px; }
    .social-btn {
      width: 38px; height: 38px; border-radius: 10px;
      background: rgba(255,255,255,0.08);
      border: 1px solid rgba(255,255,255,0.12);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.60); text-decoration: none;
      transition: all .2s; font-size: 14px;
    }
    .social-btn:hover { background: var(--green); color: #fff; border-color: var(--green); transform: translateY(-2px); }
    .footer-col h4 { font-size: 13px; font-weight: 700; letter-spacing: 0.10em; text-transform: uppercase; color: rgba(255,255,255,0.40); margin-bottom: 20px; }
    .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 10px; padding-left: 0; }
    .footer-col ul a { color: rgba(255,255,255,0.60); text-decoration: none; font-size: 14px; transition: color .2s; }
    .footer-col ul a:hover { color: #fff; }
    .footer-contact-item { display: flex; align-items: flex-start; gap: 10px; font-size: 14px; color: rgba(255,255,255,0.60); margin-bottom: 14px; }
    .footer-contact-item svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 2px; color: var(--green-light); }
    .footer-divider { border: none; border-top: 1px solid rgba(255,255,255,0.08); margin-bottom: 28px; }
    .footer-bottom { display: flex; justify-content: space-between; align-items: center; font-size: 13px; color: rgba(255,255,255,0.35); }

    /* ─── BACK TO TOP ─────────────────────────────────── */
    .back-top {
      position: fixed; bottom: 28px; right: 28px; z-index: 99;
      width: 44px; height: 44px; border-radius: 12px;
      background: var(--green); color: #fff;
      display: none; align-items: center; justify-content: center;
      cursor: pointer; border: none;
      box-shadow: 0 4px 16px rgba(26,124,62,0.40);
      transition: all .25s;
    }
    .back-top:hover { background: var(--green-light); transform: translateY(-3px); box-shadow: 0 8px 24px rgba(26,124,62,0.50); }

    /* ─── ANIMATIONS ──────────────────────────────────── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(30px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .reveal {
      opacity: 0; transform: translateY(24px);
      transition: opacity .65s ease, transform .65s ease;
    }
    .reveal.visible { opacity: 1; transform: none; }

    /* ─── RESPONSIVE ──────────────────────────────────── */
    @media (max-width: 900px) {
      section { padding: 72px 28px; }
      nav { padding: 0 20px; }
      .nav-links { display: none; }
      .footer-grid { grid-template-columns: 1fr; gap: 36px; }
      footer { padding: 56px 28px 28px; }
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
      main {
        padding-top: 82px;
      }

      main.main-flush-top {
        padding-top: 0;
      }
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
</nav>

<main class="@hasSection('flush_topbar') main-flush-top @endif">
    @yield('content')
</main>


<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div>
      <div style="display:flex;align-items:center;gap:10px;">
        <img src="{{ !empty($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Coat_of_arms_of_Kenya.svg/800px-Coat_of_arms_of_Kenya.svg.png' }}" height="36" alt="Logo" onerror="this.style.display='none'">
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
  }, { threshold: 0.12 });
  reveals.forEach(el => io.observe(el));

  // Back to top button
  const backTopBtn = document.getElementById('backTopBtn');
  window.onscroll = function() {
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
          backTopBtn.style.display = "flex";
      } else {
          backTopBtn.style.display = "none";
      }
  };
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
    // position: "top-end",
    icon: "{{ session('success') ? 'success' : (session('error') ? 'error' : (session('warning') ? 'warning' : 'info')) }}",
    title: "{{ session('success') ?? session('error') ?? session('warning') ?? session('info') }}",
    showConfirmButton: false,
    timer: 1500,
    width: '400px',
    padding: '0.5em'
});
</script>
@endif
<script>
      new DataTable('#dt-basic2', {
            info: true,
            paging: true,
            searchable: true,
            fixedHeight: true,
            lengthMenu: [5, 10, 25, 50, 100, 500, 1000, 10000],
            pageLength: 50,
            order: [],
            dom: 'lBfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    customize: function (win) {
                        // You can customize the print window if needed
                    }
                },
                'colvis' // Add column visibility button
            ],
            language: {
                lengthMenu: " _MENU_ records per page",
                zeroRecords: "No records available",
                info: "Showing page _PAGE_ of _PAGES_",
                infoEmpty: "No records available",
                search: "",
                searchPlaceholder: "Search... ",
                infoFiltered: "(filtered from _MAX_ total records)",
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>'
                },
            },
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, -1], visible: true } // Make the first 5 and last columns visible by default
            ]
        });

        new DataTable('.dt-basic2', {
            info: true,
            paging: true,
            searchable: true,
            fixedHeight: true,
            lengthMenu: [5, 10, 25, 50, 100, 500, 1000, 10000],
            pageLength: 50,
            order: [],
            dom: 'lBfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    customize: function (win) {
                        // You can customize the print window if needed
                    }
                },
                'colvis' // Add column visibility button
            ],
            language: {
                lengthMenu: " _MENU_ records per page",
                zeroRecords: "No records available",
                info: "Showing page _PAGE_ of _PAGES_",
                infoEmpty: "No records available",
                search: "",
                searchPlaceholder: "Search... ",
                infoFiltered: "(filtered from _MAX_ total records)",
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>'
                },
            },
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, -1], visible: true } // Make the first 5 and last columns visible by default
            ]
        });
</script>



@yield('scripts')
<script type="text/javascript" src="{{asset('assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script>
</body>
</html>

