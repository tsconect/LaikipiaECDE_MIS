<style>
/* ── Reset ── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

/* ── Sidebar Tokens ── */
:root {
    --sidebar-w: 268px;
    --sidebar-bg: #142240; /* Match topbar background color */
    --sidebar-surface: #1a2235;
    --sidebar-border: rgba(255,255,255,0.06);
    --accent: #22c55e;
    --accent-dim: rgba(34,197,94,0.12);
    --text-primary: #f0f4ff;
    --text-secondary: #8892a4;
    --text-muted: #4f5a6e;
    --hover-bg: rgba(255,255,255,0.05);
    --font: 'DM Sans', sans-serif;
    --transition: 0.18s ease;
}

.app-sidebar {
    width: var(--sidebar-w);
    background: var(--sidebar-bg) !important;
    display: flex;
    flex-direction: column;
    height: 100vh;
    border-right: 1px solid var(--sidebar-border);
    font-family: var(--font);
    transition: width 0.3s ease;
    user-select: none;
    pointer-events: auto;
}

/* ── Scrollable nav body ── */
.sidebar-nav {
    flex: 1;
    overflow-y: auto;
    overflow-x: hidden;
    padding: 8px 0 20px;
    scrollbar-width: thin;
    scrollbar-color: var(--sidebar-border) transparent;
}
.sidebar-nav::-webkit-scrollbar { width: 3px; }
.sidebar-nav::-webkit-scrollbar-thumb { background: var(--sidebar-border); border-radius: 4px; }

/* ── Nav item wrapper ── */
.nav-item { position: relative; }

/* ── Top-level link ── */
.nav-link {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 10px 18px;
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 400;
    cursor: pointer;
    user-select: none;
    position: relative;
    transition: color var(--transition), background var(--transition);
}
.nav-link:hover {
    background: var(--hover-bg);
    color: var(--text-primary);
}
.nav-link.active {
    background: var(--accent-dim);
    color: var(--accent);
    font-weight: 500;
}
.nav-link.active::before {
    content: '';
    position: absolute;
    left: 0; top: 7px; bottom: 7px;
    width: 3px;
    background: var(--accent);
    border-radius: 0 3px 3px 0;
}

/* ── Icon ── */
.nav-icon {
    width: 17px; height: 17px;
    flex-shrink: 0;
    opacity: 0.65;
    transition: opacity var(--transition);
}
.nav-link:hover .nav-icon,
.nav-link.active .nav-icon { opacity: 1; }

/* ── Chevron ── */
.nav-chevron {
    margin-left: auto;
    width: 14px; height: 14px;
    flex-shrink: 0;
    color: var(--text-muted);
    transition: transform 0.2s ease;
}
.nav-link.open .nav-chevron { transform: rotate(180deg); }

/* ── Sub-menu ── */
.sub-menu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.25s ease;
    background: rgba(0,0,0,0.18);
}
.sub-menu.open { max-height: 300px; }

.sub-link {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 7px 18px 7px 46px;
    color: var(--text-muted);
    text-decoration: none;
    font-size: 12.5px;
    font-family: var(--font);
    transition: color var(--transition), background var(--transition);
    cursor: pointer;
}
.sub-link::before {
    content: '';
    width: 5px; height: 5px;
    border-radius: 50%;
    background: var(--text-muted);
    flex-shrink: 0;
    transition: background var(--transition);
}
.sub-link:hover { color: var(--text-primary); background: var(--hover-bg); }
.sub-link:hover::before { background: var(--accent); }
.sub-link.active { color: var(--accent); }
.sub-link.active::before { background: var(--accent); }

/* ── Thin divider ── */
.nav-divider {
    height: 1px;
    background: var(--sidebar-border);
    margin: 6px 18px;
}

/* ── Header logo section ── */
.app-header__logo {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0 16px;
    height: 60px;
    border-bottom: 1px solid var(--sidebar-border);
    flex-shrink: 0;
}
.app-header__logo img {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
}
.header__pane {
    margin-left: auto;
    display: flex;
    align-items: center;
    gap: 8px;
}
.header__pane button {
    padding: 4px;
    border: none;
    background: none;
    cursor: pointer;
}

/* ── Bottom user strip ── */
.sidebar-footer {
    border-top: 1px solid var(--sidebar-border);
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
    font-family: var(--font);
}
.footer-avatar {
    width: 34px; height: 34px;
    border-radius: 50%;
    background: #1e293b;
    border: 1.5px solid var(--sidebar-border);
    display: flex; align-items: center; justify-content: center;
    font-size: 12px; font-weight: 600; color: var(--text-secondary);
    flex-shrink: 0;
}
.footer-name { font-size: 12.5px; font-weight: 500; color: var(--text-primary); }
.footer-role { font-size: 11px; color: var(--text-muted); }
.footer-dots {
    margin-left: auto;
    background: none; border: none; cursor: pointer;
    color: var(--text-muted); font-size: 18px; padding: 4px;
    transition: color var(--transition);
    font-family: var(--font);
}
.footer-dots:hover { color: var(--text-primary); }

/* ── Collapsed sidebar state ── */
.app-sidebar.closed-sidebar {
    width: 60px !important;
}
.app-sidebar.closed-sidebar:hover {
    width: 60px !important;
}
.app-sidebar.closed-sidebar .logo-src,
.app-sidebar.closed-sidebar .nav-link span,
.app-sidebar.closed-sidebar .sub-menu,
.app-sidebar.closed-sidebar .nav-chevron,
.app-sidebar.closed-sidebar .footer-name,
.app-sidebar.closed-sidebar .footer-role {
    display: none;
}
.app-sidebar.closed-sidebar .nav-link {
    justify-content: center;
    padding: 12px;
}
.app-sidebar.closed-sidebar .nav-icon {
    width: 22px;
    height: 22px;
    opacity: 1;
}
.app-sidebar.closed-sidebar .sidebar-footer {
    justify-content: center;
    padding: 12px 8px;
}
.app-sidebar.closed-sidebar .footer-dots {
    display: none;
}
.app-sidebar.closed-sidebar .app-header__logo {
    justify-content: space-between;
    padding: 0 4px;
}
.app-sidebar.closed-sidebar .app-header__logo img {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
}
.app-sidebar.closed-sidebar .header__pane {
    margin-left: auto !important;
    display: flex;
    align-items: center;
}
.app-sidebar.closed-sidebar .brand-logo {
    width: 36px;
    height: 36px;
    font-size: 14px;
}
</style>

<div class="app-sidebar">
    <div class="app-header__logo">
        <img src="{{asset('assets/images/laikipia.png')}}" alt="Laikipia" style="height: 40px; width: 40px;">
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner" style="background-color:#ffffff"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button"
                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>

    <nav class="sidebar-nav">
        <!-- Dashboard -->
        <div class="nav-item">
            <a class="nav-link active" href="{{ route('dashboard') }}">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h4a1 1 0 001-1v-3h2v3a1 1 0 001 1h4a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                <span>Dashboard</span>
            </a>
        </div>

        @can('admin.ecde-schools.index')
        <div class="nav-divider"></div>
        <!-- ECDE Teachers -->
        <div class="nav-item">
            <div class="nav-link" onclick="toggleMenu(this)">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 14.094A5.973 5.973 0 004 17v1H1v-1a3 3 0 013.75-2.906z"/></svg>
                <span>ECDE Teachers</span>
                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </div>
            <div class="sub-menu">
                <a class="sub-link" href="{{route('admin.teachers.index')}}">All Teachers</a>
                <a class="sub-link" href="{{route('admin.teachers.create')}}">New Teacher</a>
            </div>
        </div>
        @endcan

        @can('admin.ecde-schools.index')
        <!-- Schools -->
        <div class="nav-item">
            <div class="nav-link" onclick="toggleMenu(this)">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/></svg>
                <span>Schools</span>
                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </div>
            <div class="sub-menu">
                <a class="sub-link" href="{{route('admin.ecde-schools.index')}}">All Schools</a>
                <a class="sub-link" href="{{route('admin.feeder-schools.index')}}">Feeder Schools</a>
            </div>
        </div>
        @endcan

        @can('admin.coordinators.index')
        <!-- ECDE Coordinators -->
        <div class="nav-item">
            <div class="nav-link" onclick="toggleMenu(this)">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                <span>ECDE Coordinators</span>
                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </div>
            <div class="sub-menu">
                <a class="sub-link" href="{{route('admin.coordinators.index')}}">All Coordinators</a>
            </div>
        </div>
        @endcan

        <div class="nav-divider"></div>

        <!-- My Profile -->
        <div class="nav-item">
            <div class="nav-link" onclick="toggleMenu(this)">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                <span>My Profile</span>
                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </div>
            <div class="sub-menu">
                <a class="sub-link" href="{{ route('admin.next-of-kins.index') }}">Next of Kin</a>
                <a class="sub-link" href="{{ route('admin.beneficiaries.index') }}">Beneficiaries</a>
                <a class="sub-link" href="{{ route('admin.education-histories.index') }}">Academic Qualifications</a>
                <a class="sub-link" href="{{ route('admin.user-unions.index') }}">My Unions</a>
                <a class="sub-link" href="{{ route('admin.user-documents.index') }}">My Documents</a>
            </div>
        </div>

        @can('admin.ecde-students.index')
        <!-- Students -->
        <div class="nav-item">
            <div class="nav-link" onclick="toggleMenu(this)">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/></svg>
                <span>Learners</span>
                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </div>
            <div class="sub-menu">
                <a class="sub-link" href="{{ route('admin.learners.index') }}">All Learners</a>
            </div>
        </div>
        @endcan

        @can('admin.counties.index')
        <!-- Locations -->
        <div class="nav-item">
            <div class="nav-link" onclick="toggleMenu(this)">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                <span>Locations</span>
                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </div>
            <div class="sub-menu">
                <a class="sub-link" href="{{route('admin.counties.index')}}">Counties</a>
                <a class="sub-link" href="{{route('admin.sub-counties.index')}}">Sub Counties</a>
                <a class="sub-link" href="{{route('admin.wards.index')}}">Wards</a>
                <a class="sub-link" href="{{route('admin.sub-locations.index')}}">Sub Locations</a>
            </div>
        </div>
        @endcan

        @can('admin.sms-logs.index')
        <!-- Communication -->
        <div class="nav-item">
            <div class="nav-link" onclick="toggleMenu(this)">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/><path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/></svg>
                <span>Communication</span>
                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </div>
            <div class="sub-menu">
                <a class="sub-link" href="{{route('admin.sms-logs.index')}}">SMS Logs</a>
                <a class="sub-link" href="{{route('admin.sms-dashboard')}}">SMS Dashboard</a>
            </div>
        </div>
        @endcan

        <div class="nav-divider"></div>

        @can('admin.unions.all')
        <!-- System Setup -->
        <div class="nav-item">
            <div class="nav-link" onclick="toggleMenu(this)">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/></svg>
                <span>System Setup</span>
                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </div>
            <div class="sub-menu">
                <a class="sub-link" href="{{route('admin.unions.index')}}">Unions</a>
                <a class="sub-link" href="{{route('admin.documents.index')}}">Documents</a>
                <a class="sub-link" href="{{route('admin.ethnic-groups.index')}}">Ethnic Groups</a>
                <a class="sub-link" href="{{route('admin.job-groups.index')}}">Job Groups</a>
            </div>
        </div>
        @endcan

        @can('admin.users.index')
        <!-- User Management -->
        <div class="nav-item">
            <div class="nav-link" onclick="toggleMenu(this)">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 14.094A5.973 5.973 0 004 17v1H1v-1a3 3 0 013.75-2.906z"/></svg>
                <span>User Management</span>
                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </div>
            <div class="sub-menu">
                <a class="sub-link" href="{{route('admin.users.index')}}">Users</a>
                <a class="sub-link" href="{{route('admin.roles.index')}}">Roles</a>
                <a class="sub-link" href="{{route('admin.system.logs')}}">System Logs</a>
            </div>
        </div>
        @endcan

        @can('admin.cms.settings.index')
        <!-- Settings -->
        <div class="nav-item">
            <div class="nav-link" onclick="toggleMenu(this)">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/></svg>
                <span>Settings</span>
                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </div>
            <div class="sub-menu">
                <a class="sub-link" href="{{ route('admin.cms.settings.index') }}">Site Settings</a>
                <a class="sub-link" href="{{ route('admin.cms.pages.index') }}">Pages</a>
                <a class="sub-link" href="{{ route('admin.cms.posts.index') }}">Blog Posts</a>
                <a class="sub-link" href="{{ route('admin.cms.galleries.index') }}">Galleries</a>
                <a class="sub-link" href="{{ route('admin.cms.announcements.index') }}">Announcements</a>
                <a class="sub-link" href="{{ route('admin.cms.faqs.index') }}">FAQs</a>
                <a class="sub-link" href="{{ route('admin.cms.testimonials.index') }}">Testimonials</a>
                <a class="sub-link" href="{{ route('admin.cms.contact-messages.index') }}">Contact Messages</a>
            </div>
        </div>
        @endcan

        <!-- My Account -->
        <div class="nav-item">
            <a class="nav-link" href="{{ route('admin.my-account') }}">
                <svg class="nav-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                <span>My Account</span>
            </a>
        </div>
    </nav>

    <!-- Footer user strip -->
    <div class="sidebar-footer">
        <div class="footer-avatar">{{ substr(Auth::user()->first_name ?? 'U', 0, 1) }}{{ substr(Auth::user()->last_name ?? 'S', 0, 1) }}</div>
        <div>
            <div class="footer-name">{{ Auth::user()->first_name ?? 'User' }} {{ substr(Auth::user()->last_name ?? '', 0, 1) }}.</div>
            <div class="footer-role">{{ Auth::user()->role ?? 'User' }}</div>
        </div>
        <button class="footer-dots">⋯</button>
    </div>
</div>

<script>
function toggleMenu(el) {
    const sub = el.nextElementSibling;
    const isOpen = sub.classList.contains('open');
    sub.classList.toggle('open', !isOpen);
    el.classList.toggle('open', !isOpen);
}

document.addEventListener('DOMContentLoaded', function () {
    // Handle sidebar collapse/expand button
    const closeBtn = document.querySelector('.close-sidebar-btn');
    const appSidebar = document.querySelector('.app-sidebar');
    
    if (closeBtn && appSidebar) {
        closeBtn.addEventListener('click', function (e) {
            e.preventDefault();
            appSidebar.classList.toggle('closed-sidebar');
        });
    }

    // Handle active nav links
    const currentPath = window.location.pathname + window.location.search;
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(function (link) {
        const href = link.getAttribute('href');
        if (!href || href === '#') return;
        if (currentPath === href || currentPath.startsWith(href + '?')) {
            link.classList.add('active');
            const parent = link.closest('.nav-item');
            if (parent) {
                const subMenu = parent.querySelector('.sub-menu');
                if (subMenu) {
                    subMenu.classList.add('open');
                    link.classList.add('open');
                }
            }
        }
    });
});
</script>
