@extends('web.app')

@section('title', 'ECDE Schools')
@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── SCHOOLS HERO ────────────────────────────────── */
    .schools-hero {
      background: #F1FDF3;
      padding: 72px 64px 32px;
      position: relative; overflow: hidden;
    }
    .schools-hero::before {
      content: ''; position: absolute;
      top: -150px; right: -80px;
      width: 500px; height: 500px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.05) 0%, transparent 70%);
      pointer-events: none;
    }
    .schools-hero::after {
      content: ''; position: absolute;
      bottom: -100px; left: -60px;
      width: 320px; height: 320px; border-radius: 50%;
      background: radial-gradient(circle, rgba(26,124,62,0.08) 0%, transparent 70%);
      pointer-events: none;
    }
    .schools-hero .page-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.2rem, 4vw, 3.1rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 10px;
      position: relative; z-index: 1;
    }
    .schools-hero .page-subtitle {
      color: var(--text-muted);
      font-size: 15px; max-width: 520px; line-height: 1.55;
      position: relative; z-index: 1;
      margin-bottom: 20px;
    }
    .schools-hero .floating-asset {
      position: absolute; right: 40px; bottom: -40px;
      height: 180px; z-index: 0;
      animation: floatBounce 6s ease-in-out infinite;
      filter: drop-shadow(0 24px 48px rgba(0,0,0,0.25));
      pointer-events: none;
    }

    /* Stats bento in hero */
    .schools-hero-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 14px;
      max-width: 640px;
      position: relative; z-index: 1;
    }
    .schools-hero-stat {
      background: linear-gradient(145deg, rgba(255,255,255,0.92), rgba(245,255,248,0.94));
      border: 1px solid rgba(13,34,53,0.09);
      border-radius: 16px;
      padding: 16px 16px 14px;
      transition: all 0.35s cubic-bezier(0.4,0,0.2,1);
      position: relative;
      overflow: hidden;
      box-shadow: 0 8px 22px rgba(13,34,53,0.08);
      backdrop-filter: blur(8px);
    }
    .schools-hero-stat::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(96deg, rgba(241,253,243,0.55) 0%, rgba(241,253,243,0.32) 48%, rgba(241,253,243,0.08) 100%);
      opacity: 1;
      transition: opacity 0.35s;
      pointer-events: none;
    }
    .schools-hero-stat::after {
      content: '';
      position: absolute;
      inset: 18% -8% -8% 18%;
      border-radius: 14px;
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      opacity: 0.55;
      filter: saturate(1.08) contrast(1.04);
      pointer-events: none;
    }
    .schools-hero-stat.stat-total::after {
      background-image: url("{{ asset('assets/images/Suburban neighborhood.jpeg') }}");
    }
    .schools-hero-stat.stat-subcounty::after {
      background-image: url("{{ asset('assets/images/Village VS Town VS City_ What is the difference_.jpeg') }}");
    }
    .schools-hero-stat.stat-wards::after {
      background-image: url("{{ asset('assets/images/_ (12).jpeg') }}");
    }
    .scard {
      border-radius: 14px;
      overflow: hidden;
      position: relative;
      cursor: pointer;
      box-shadow: 0 6px 16px rgba(13,34,53,0.08);
      background: #222;
      transition: box-shadow .3s, transform .3s;
    }
    .scard img {
      width: 100%; height: 100%;
      object-fit: cover;
      transition: transform .3s;
      display: block;
      min-height: 100%;
    }
    .scard:hover img { transform: scale(1.04); }

    .scard-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(
        to top,
        rgba(0,0,0,.72) 0%,
        rgba(0,0,0,.15) 55%,
        transparent 100%
      );
      z-index: 1;
    }
    .scard-badge {
      position: absolute; top: 8px; left: 10px;
      background: rgba(255,255,255,.18);
      backdrop-filter: blur(6px);
      border: 0.5px solid rgba(255,255,255,.3);
      border-radius: 16px;
      padding: 2px 8px;
      font-size: 9px; font-weight: 600;
      color: #fff; letter-spacing: .3px;
      z-index: 2;
    }
    .scard-body {
      position: absolute; bottom: 0; left: 0; right: 0;
      padding: 8px 10px;
      z-index: 2;
    }
    .scard-num {
      font-size: 28px; font-weight: 700;
      color: #fff; line-height: 1;
      text-shadow: 0 2px 8px rgba(0,0,0,0.18);
    }
    .scard-label {
      font-size: 9px; font-weight: 600;
      letter-spacing: .7px; text-transform: uppercase;
      color: rgba(255,255,255,.7); margin-top: 2px;
      text-shadow: 0 1px 4px rgba(0,0,0,0.13);
    }

    /* staggered heights for visual depth */
    .card-schools  { height: 110px; }
    .card-subcounty{ height: 150px; transform: translateY(-6px); }
    .card-wards    { height: 125px; }
    .schools-toolbar h3 i { color: var(--green); font-size: 18px; }
    .schools-count-badge {
      display: inline-flex; align-items: center;
      padding: 4px 14px; border-radius: var(--radius-pill);
      background: rgba(26,124,62,0.08);
      color: var(--green); font-size: 13px; font-weight: 700;
    }

    /* Custom search */
    .schools-search-wrap {
      position: relative;
      min-width: 280px;
      width: 100%;
      max-width: 340px;
      margin-left: auto;
      margin-right: 0;
      background: #fff;
      border-radius: 32px;
      box-shadow: 0 2px 12px rgba(13,34,53,0.06);
      transition: box-shadow 0.2s;
      display: flex;
      align-items: center;
      padding: 2px 8px 2px 0;
    }
    .schools-search-wrap input {
      width: 100%;
      padding: 12px 18px 12px 44px;
      border-radius: 32px;
      border: none;
      font-size: 15px; font-weight: 500;
      color: var(--navy);
      background: transparent;
      outline: none;
      box-shadow: none;
      transition: background 0.2s;
    }
    .schools-search-wrap input:focus {
      background: #f1fdf3;
    }
    .schools-search-wrap input::placeholder {
      color: #b0bfcf;
      font-weight: 400;
      letter-spacing: 0.02em;
    }
    .schools-search-wrap .search-icon {
      position: absolute; left: 18px; top: 50%;
      transform: translateY(-50%);
      color: #1a7c3e;
      font-size: 18px;
      pointer-events: none;
      opacity: 0.7;
    }

    /* ─── FILTER BAR ──────────────────────────────────── */
    .schools-filter-bar {
      padding: 20px 32px;
      display: flex; align-items: center; gap: 14px; flex-wrap: wrap;
      border-bottom: 1px solid var(--border);
      background: #fafbfc;
    }
    .filter-label {
      font-size: 12px; font-weight: 800; color: var(--navy);
      text-transform: uppercase; letter-spacing: 0.08em;
      display: flex; align-items: center; gap: 6px;
    }
    .filter-label i { color: var(--green); font-size: 13px; }
    .filter-select-pill {
      border-radius: var(--radius-pill) !important;
      border: 1.5px solid rgba(13,34,53,0.10) !important;
      min-height: 40px;
      padding: 6px 16px !important;
      font-size: 13px !important;
      font-weight: 600 !important;
      color: var(--text) !important;
      background: #fff !important;
      transition: all 0.25s !important;
      cursor: pointer;
      min-width: 180px;
      appearance: auto;
    }
    .filter-select-pill:focus {
      border-color: var(--green) !important;
      box-shadow: 0 0 0 3px rgba(26,124,62,0.08) !important;
    }
    .filter-divider {
      width: 1px; height: 28px;
      background: rgba(13,34,53,0.08);
    }

    /* ─── TABLE STYLES ────────────────────────────────── */
    .schools-table-wrap {
      padding: 0;
      overflow-x: auto;
    }

    /* Hide DataTables default controls */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dt-buttons {
      display: none !important;
    }

    /* Table itself */
    .schools-table {
      width: 100% !important;
      border-collapse: separate;
      border-spacing: 0;
      border: none !important;
    }
    .schools-table thead th {
      background: var(--navy) !important;
      color: rgba(255,255,255,0.85) !important;
      font-size: 11px !important;
      font-weight: 800 !important;
      letter-spacing: 0.10em !important;
      text-transform: uppercase !important;
      padding: 16px 20px !important;
      border: none !important;
      border-bottom: 2px solid rgba(52,211,153,0.20) !important;
      white-space: nowrap;
      position: relative;
    }
    .schools-table thead th:first-child {
      padding-left: 32px !important;
    }
    .schools-table thead th:last-child {
      padding-right: 32px !important;
      text-align: center !important;
    }
    /* Sorting icons override */
    .schools-table thead th.sorting::after,
    .schools-table thead th.sorting_asc::after,
    .schools-table thead th.sorting_desc::after {
      color: rgba(52,211,153,0.50) !important;
    }

    .schools-table tbody td {
      padding: 18px 20px !important;
      border: none !important;
      border-bottom: 1px solid rgba(13,34,53,0.05) !important;
      vertical-align: middle !important;
      font-size: 14px;
      color: var(--text);
      transition: all 0.2s;
    }
    .schools-table tbody td:first-child {
      padding-left: 32px !important;
    }
    .schools-table tbody td:last-child {
      padding-right: 32px !important;
    }

    .schools-table tbody tr {
      background: #fff !important;
      transition: all 0.25s cubic-bezier(0.4,0,0.2,1);
    }
    .schools-table tbody tr:hover {
      background: linear-gradient(90deg, rgba(26,124,62,0.03) 0%, rgba(26,124,62,0.06) 100%) !important;
      transform: scale(1.002);
    }
    .schools-table tbody tr:hover td {
      border-bottom-color: rgba(26,124,62,0.10) !important;
    }

    /* Row number */
    .row-number {
      display: inline-flex; align-items: center; justify-content: center;
      width: 32px; height: 32px;
      border-radius: 10px;
      background: rgba(13,34,53,0.04);
      color: var(--text-muted);
      font-size: 12px; font-weight: 700;
    }

    /* School name cell */
    .school-name-cell {
      font-weight: 700 !important;
      color: var(--navy) !important;
      font-size: 14px;
    }
    .school-name-cell a {
      color: var(--navy);
      text-decoration: none;
      transition: color 0.25s;
    }
    .school-name-cell a:hover {
      color: var(--green);
    }

    /* Center code */
    .center-code-cell {
      font-family: 'Space Grotesk', monospace;
      font-weight: 600;
      color: var(--text-muted);
      font-size: 13px;
      letter-spacing: 0.02em;
    }

    /* Location chips */
    .location-chip {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 4px 12px; border-radius: var(--radius-pill);
      font-size: 12px; font-weight: 600;
      background: rgba(13,34,53,0.04);
      color: var(--text);
      white-space: nowrap;
    }
    .location-chip.county-chip {
      background: rgba(26,124,62,0.06);
      color: var(--green);
    }
    .location-chip.ward-chip {
      background: rgba(37,99,235,0.05);
      color: #2563eb;
    }
    .location-chip.empty-chip {
      color: rgba(13,34,53,0.25);
      background: transparent;
      font-style: italic;
    }

    /* View button */
    .school-view-btn {
      display: inline-flex; align-items: center; justify-content: center;
      gap: 6px;
      padding: 8px 18px;
      border-radius: var(--radius-pill);
      background: rgba(26,124,62,0.06);
      color: var(--green);
      font-size: 12px; font-weight: 700;
      text-decoration: none;
      border: 1px solid rgba(26,124,62,0.12);
      transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
      white-space: nowrap;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }
    .school-view-btn:hover {
      background: var(--green); color: #fff;
      border-color: var(--green);
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(26,124,62,0.25);
    }
    .school-view-btn i { font-size: 11px; }

    /* ─── PAGINATION OVERRIDE ─────────────────────────── */
    .dataTables_wrapper .dataTables_paginate {
      padding: 20px 32px !important;
      border-top: 1px solid var(--border);
      display: flex; align-items: center; justify-content: flex-end;
      gap: 6px;
    }
    .dataTables_wrapper .dataTables_info {
      padding: 20px 32px !important;
      font-size: 13px !important;
      color: var(--text-muted) !important;
      font-weight: 600 !important;
    }
    .dataTables_paginate .paginate_button {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      min-width: 36px !important;
      height: 36px !important;
      padding: 0 12px !important;
      border-radius: var(--radius-pill) !important;
      border: 1.5px solid rgba(13,34,53,0.10) !important;
      background: #fff !important;
      color: var(--text) !important;
      font-size: 13px !important;
      font-weight: 600 !important;
      cursor: pointer !important;
      transition: all 0.25s !important;
      margin: 0 2px !important;
    }
    .dataTables_paginate .paginate_button:hover {
      background: rgba(26,124,62,0.08) !important;
      border-color: var(--green) !important;
      color: var(--green) !important;
      transform: translateY(-1px) !important;
      box-shadow: none !important;
    }
    .dataTables_paginate .paginate_button.current {
      background: var(--green) !important;
      border-color: var(--green) !important;
      color: #fff !important;
      font-weight: 700 !important;
      box-shadow: 0 4px 12px rgba(26,124,62,0.25) !important;
    }
    .dataTables_paginate .paginate_button.current:hover {
      background: var(--green-light) !important;
      color: #fff !important;
    }
    .dataTables_paginate .paginate_button.disabled {
      opacity: 0.35 !important;
      cursor: not-allowed !important;
    }
    .dataTables_paginate .paginate_button.disabled:hover {
      background: #fff !important;
      border-color: rgba(13,34,53,0.10) !important;
      transform: none !important;
    }

    /* Footer row */
    .schools-footer-row {
      display: flex; align-items: center; justify-content: space-between;
      flex-wrap: wrap; gap: 12px;
    }

    /* ─── RESPONSIVE ──────────────────────────────────── */
    @media (max-width: 900px) {
      .schools-hero { padding: 62px 16px 28px; }
      .schools-hero .floating-asset { display: none; }
      .schools-hero-stats { grid-template-columns: 1fr; max-width: 100%; }
      .schools-content { padding: 32px 16px 60px; }
      .schools-toolbar { padding: 20px; flex-direction: column; align-items: stretch; }
      .schools-search-wrap { min-width: 100%; }
      .schools-filter-bar { padding: 16px 20px; }
      .filter-divider { display: none; }
      .schools-table thead th { font-size: 10px !important; padding: 12px 10px !important; }
      .schools-table tbody td { padding: 14px 10px !important; font-size: 13px; }
      .schools-table thead th:first-child,
      .schools-table tbody td:first-child { padding-left: 16px !important; }
      .schools-table thead th:last-child,
      .schools-table tbody td:last-child { padding-right: 16px !important; }
      .dataTables_wrapper .dataTables_paginate { padding: 16px 20px !important; justify-content: center; }
      .dataTables_wrapper .dataTables_info { padding: 0 20px 16px !important; text-align: center; }
    }
    @media (max-width: 600px) {
      .schools-hero-stats { grid-template-columns: 1fr 1fr; gap: 10px; }
    }
</style>
@endsection

@section('content')
<!-- Schools Hero -->
<div class="schools-hero">
    <h1 class="page-title" style="animation: fadeUp 0.7s ease both;">ECDE Schools</h1>
    <p class="page-subtitle" style="animation: fadeUp 0.7s ease 0.1s both;">Browse early childhood education centres across Laikipia County.</p>

    @php
        $subCountyOptions = $schools->map(fn($s) => optional($s->subCounty)->name)->filter()->unique()->sort()->values();
        $wardOptions = $schools->map(fn($s) => optional($s->ward)->name)->filter()->unique()->sort()->values();
        $subLocationOptions = $schools->map(fn($s) => optional($s->subLocation)->name)->filter()->unique()->sort()->values();
    @endphp


    <div class="schools-hero-stats" style="animation: fadeUp 0.7s ease 0.2s both; gap: 14px; margin-bottom: 18px;">
      <div class="scard card-schools">
        <img src="{{ asset('assets/images/Suburban neighborhood.jpeg') }}" alt="Schools" loading="lazy">
        <div class="scard-overlay"></div>
        <div class="scard-badge">Total</div>
        <div class="scard-body">
          <div class="scard-num">{{ $schools->count() }}</div>
          <div class="scard-label">Schools</div>
        </div>
      </div>
      <div class="scard card-subcounty">
        <img src="{{ asset('assets/images/Village VS Town VS City_ What is the difference_.jpeg') }}" alt="Sub Counties" loading="lazy">
        <div class="scard-overlay"></div>
        <div class="scard-badge">Regions</div>
        <div class="scard-body">
          <div class="scard-num">{{ $subCountyOptions->count() }}</div>
          <div class="scard-label">Sub Counties</div>
        </div>
      </div>
      <div class="scard card-wards">
        <img src="{{ asset('assets/images/_ (12).jpeg') }}" alt="Wards" loading="lazy">
        <div class="scard-overlay"></div>
        <div class="scard-badge">Zones</div>
        <div class="scard-body">
          <div class="scard-num">{{ $wardOptions->count() }}</div>
          <div class="scard-label">Wards</div>
        </div>
      </div>
    </div>

        <img src="{{ asset('assets/images/Two_african_american_children_wearing_school_uniforms_stand_side_by_side_against_a_bright_yellow_background_both_students_appear_to_be_looking_ahead_possibly_posing_for_a___Premium_AI-generated_image-.png') }}"
          alt="" class="floating-asset" loading="lazy">
</div>

<div class="schools-content">
  <div class="schools-page-wrap">
    @if($schools->count() > 0)

        <!-- Toolbar -->
        <div class="schools-toolbar">
            <div class="schools-toolbar-left">
                <h3><i class="fas fa-school"></i> School Directory</h3>
                <span class="schools-count-badge">{{ $schools->count() }} schools</span>
            </div>
            <div class="schools-search-wrap">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="schoolsSearchInput" placeholder="Search schools by name, code, or location...">
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="schools-filter-bar">
            <span class="filter-label"><i class="fas fa-sliders-h"></i> Filter by</span>
            <div class="filter-divider"></div>
            <select id="filter-sub-county" class="filter-select-pill">
                <option value="">All Sub Counties</option>
                @foreach($subCountyOptions as $name)
                    <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
            <select id="filter-ward" class="filter-select-pill">
                <option value="">All Wards</option>
                @foreach($wardOptions as $name)
                    <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
            <select id="filter-sub-location" class="filter-select-pill">
                <option value="">All Sub Locations</option>
                @foreach($subLocationOptions as $name)
                    <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Table -->
        <div class="schools-table-wrap">
            <table style="width: 100%;" id="dt-basic2" class="schools-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>School Name</th>
                        <th>Center Code</th>
                        <th>County</th>
                        <th>Sub County</th>
                        <th>Ward</th>
                        <th>Sub Location</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schools as $item)
                    <tr>
                        <td><span class="row-number">{{ $loop->iteration }}</span></td>
                        <td class="school-name-cell">
                            <a href="{{ route('cms.schools.show', $item->id) }}">{{ $item->school_name }}</a>
                        </td>
                        <td><span class="center-code-cell">{{ $item->center_code }}</span></td>
                        <td>
                            <span class="location-chip county-chip">
                                {{ $item->county->name ?? ($item->subCounty->county->name ?? '-') }}
                            </span>
                        </td>
                        <td>
                            <span class="location-chip">
                                {{ $item->subCounty->name ?? ($item->ward->subCounty->name ?? '-') }}
                            </span>
                        </td>
                        <td>
                            @if($item->ward->name ?? false)
                                <span class="location-chip ward-chip">{{ $item->ward->name }}</span>
                            @else
                                <span class="location-chip empty-chip">—</span>
                            @endif
                        </td>
                        <td>
                            @if($item->subLocation->name ?? false)
                                <span class="location-chip">{{ $item->subLocation->name }}</span>
                            @else
                                <span class="location-chip empty-chip">—</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <a class="school-view-btn" title="View School"
                                    href="{{ route('cms.schools.show', $item->id) }}">
                                    <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @else
        <div style="padding: 60px 32px;">
            <div class="empty-state-container">
                <div class="empty-state">
                    <i class="fas fa-school"></i>
                    <h5 class="mb-2">No schools found</h5>
                    <p class="mb-0">ECDE school records will appear here once available.</p>
                </div>
            </div>
        </div>
    @endif
  </div>
</div>
@endsection

@section('scripts')
<script>
  (function () {
      const tableElement = document.getElementById('dt-basic2');
      if (!tableElement || !window.jQuery || !$.fn.DataTable) {
          return;
      }

      // Initialize DataTable with minimal public-facing controls
      let table;
      if ($.fn.DataTable.isDataTable('#dt-basic2')) {
          table = $('#dt-basic2').DataTable();
      } else {
          table = $('#dt-basic2').DataTable({
              info: true,
              paging: true,
              searching: true,
              fixedHeight: true,
              lengthChange: false,
              pageLength: 15,
              order: [],
              dom: '<"schools-footer-row"ip>',
              language: {
                  zeroRecords: '<div style="text-align:center;padding:40px 20px;color:#6b7c8d;"><i class="fas fa-search" style="font-size:2rem;color:#d1d5db;margin-bottom:12px;display:block;"></i><strong>No matching schools found</strong><br><span style="font-size:13px;">Try adjusting your search or filter criteria</span></div>',
                  info: "Showing _START_ to _END_ of _TOTAL_ schools",
                  infoEmpty: "No schools to display",
                  infoFiltered: "(filtered from _MAX_ total)",
                  paginate: {
                      first: '<i class="fas fa-angle-double-left"></i>',
                      last: '<i class="fas fa-angle-double-right"></i>',
                      previous: '<i class="fas fa-chevron-left"></i>',
                      next: '<i class="fas fa-chevron-right"></i>'
                  },
              },
          });
      }

      // Custom search input
      $('#schoolsSearchInput').on('keyup', function() {
          table.search(this.value).draw();
      });

      function escapeRegex(value) {
          return value.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
      }

      function applySchoolFilters() {
          const subCounty = $('#filter-sub-county').val();
          const ward = $('#filter-ward').val();
          const subLocation = $('#filter-sub-location').val();

          table.column(4).search(subCounty ? '^' + escapeRegex(subCounty) + '$' : '', true, false);
          table.column(5).search(ward ? '^' + escapeRegex(ward) + '$' : '', true, false);
          table.column(6).search(subLocation ? '^' + escapeRegex(subLocation) + '$' : '', true, false);
          table.draw();
      }

      $('#filter-sub-county, #filter-ward, #filter-sub-location').on('change', applySchoolFilters);
  })();
</script>
@endsection
