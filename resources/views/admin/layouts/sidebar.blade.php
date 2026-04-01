<div class="app-sidebar">
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>

    <nav class="sidebar-nav">
        @php
            $dashboardActive = request()->routeIs('dashboard');
        @endphp
        <!-- Dashboard -->
        <a class="lw-link {{ $dashboardActive ? 'lw-link-active' : '' }}" href="{{ route('dashboard') }}">
            <span class="lw-icon">
                <i class="bi bi-house-door"></i>
            </span>
            <span class="lw-text">Dashboard</span>
        </a>

        @can('admin.ecde-schools.index')
            <div class="nav-divider"></div>
            @php
                $teachersOpen = request()->routeIs('admin.teachers.*');
            @endphp
            <div class="lw-dropdown {{ $teachersOpen ? 'lw-open' : '' }}">
                <button class="lw-link lw-drop-btn {{ $teachersOpen ? 'lw-link-active' : '' }}" data-label="ECDE Teachers" type="button">
                    <span class="lw-icon">
                        <i class="bi bi-people"></i>
                    </span>
                    <span class="lw-text">ECDE Teachers</span>
                    <i class="bi bi-chevron-down lw-chevron"></i>
                </button>
                <div class="lw-submenu">
                    <a href="{{route('admin.teachers.index')}}" class="lw-sub {{ request()->routeIs('admin.teachers.index') ? 'lw-sub-active' : '' }}">All Teachers</a>
                    <a href="{{route('admin.teachers.create')}}" class="lw-sub {{ request()->routeIs('admin.teachers.create') ? 'lw-sub-active' : '' }}">New Teacher</a>
                </div>
            </div>

            @php
                $schoolsOpen = request()->routeIs('admin.ecde-schools.*', 'admin.feeder-schools.*');
            @endphp
            <div class="lw-dropdown {{ $schoolsOpen ? 'lw-open' : '' }}">
                <button class="lw-link lw-drop-btn {{ $schoolsOpen ? 'lw-link-active' : '' }}" data-label="Schools" type="button">
                    <span class="lw-icon">
                        <i class="bi bi-building"></i>
                    </span>
                    <span class="lw-text">Schools</span>
                    <i class="bi bi-chevron-down lw-chevron"></i>
                </button>
                <div class="lw-submenu">
                    <a href="{{route('admin.ecde-schools.index')}}" class="lw-sub {{ request()->routeIs('admin.ecde-schools.*') ? 'lw-sub-active' : '' }}">All Schools</a>
                    <a href="{{route('admin.feeder-schools.index')}}" class="lw-sub {{ request()->routeIs('admin.feeder-schools.*') ? 'lw-sub-active' : '' }}">Feeder Schools</a>
                </div>
            </div>
        @endcan

        @if (Route::has('zones.index') && Route::has('routes.index') && Route::has('zones.analytics'))
            @php
                $netOpen = request()->routeIs('zones.*', 'routes.*');
            @endphp
            <div class="lw-dropdown {{ $netOpen ? 'lw-open' : '' }}">
                <button class="lw-link lw-drop-btn {{ $netOpen ? 'lw-link-active' : '' }}" data-label="Network Management" type="button">
                    <span class="lw-icon"><i class="bi bi-diagram-3"></i></span>
                    <span class="lw-text">Network Management</span>
                    <i class="bi bi-chevron-down lw-chevron"></i>
                </button>
                <div class="lw-submenu">
                    <a href="{{ route('zones.index') }}" class="lw-sub {{ request()->routeIs('zones.index', 'zones.create', 'zones.edit', 'zones.show') ? 'lw-sub-active' : '' }}">Zones</a>
                    <a href="{{ route('routes.index') }}" class="lw-sub {{ request()->routeIs('routes.*') ? 'lw-sub-active' : '' }}">Routes</a>
                    <a href="{{ route('zones.analytics') }}" class="lw-sub {{ request()->routeIs('zones.analytics') ? 'lw-sub-active' : '' }}">Analytics</a>
                </div>
            </div>
        @endif

        @can('admin.coordinators.index')
            @php
                $coordinatorsOpen = request()->routeIs('admin.coordinators.*');
            @endphp
            <div class="lw-dropdown {{ $coordinatorsOpen ? 'lw-open' : '' }}">
                <button class="lw-link lw-drop-btn {{ $coordinatorsOpen ? 'lw-link-active' : '' }}" data-label="ECDE Coordinators" type="button">
                    <span class="lw-icon">
                        <i class="bi bi-person-badge"></i>
                    </span>
                    <span class="lw-text">ECDE Coordinators</span>
                    <i class="bi bi-chevron-down lw-chevron"></i>
                </button>
                <div class="lw-submenu">
                    <a href="{{route('admin.coordinators.index')}}" class="lw-sub {{ request()->routeIs('admin.coordinators.*') ? 'lw-sub-active' : '' }}">All Coordinators</a>
                </div>
            </div>
        @endcan

        <div class="nav-divider"></div>

        @php
            $profileOpen = request()->routeIs('admin.next-of-kins.*', 'admin.beneficiaries.*', 'admin.education-histories.*', 'admin.user-unions.*', 'admin.user-documents.*');
        @endphp
        <div class="lw-dropdown {{ $profileOpen ? 'lw-open' : '' }}">
            <button class="lw-link lw-drop-btn {{ $profileOpen ? 'lw-link-active' : '' }}" data-label="My Profile" type="button">
                <span class="lw-icon">
                    <i class="bi bi-person-lines-fill"></i>
                </span>
                <span class="lw-text">My Profile</span>
                <i class="bi bi-chevron-down lw-chevron"></i>
            </button>
            <div class="lw-submenu">
                <a href="{{ route('admin.next-of-kins.index') }}" class="lw-sub {{ request()->routeIs('admin.next-of-kins.*') ? 'lw-sub-active' : '' }}">Next of Kin</a>
                <a href="{{ route('admin.beneficiaries.index') }}" class="lw-sub {{ request()->routeIs('admin.beneficiaries.*') ? 'lw-sub-active' : '' }}">Beneficiaries</a>
                <a href="{{ route('admin.education-histories.index') }}" class="lw-sub {{ request()->routeIs('admin.education-histories.*') ? 'lw-sub-active' : '' }}">Academic Qualifications</a>
                <a href="{{ route('admin.user-unions.index') }}" class="lw-sub {{ request()->routeIs('admin.user-unions.*') ? 'lw-sub-active' : '' }}">My Unions</a>
                <a href="{{ route('admin.user-documents.index') }}" class="lw-sub {{ request()->routeIs('admin.user-documents.*') ? 'lw-sub-active' : '' }}">My Documents</a>
            </div>
        </div>

        @can('admin.ecde-students.index')
            @php
                $learnersOpen = request()->routeIs('admin.learners.*', 'admin.learner-attendances.*');
            @endphp
            <div class="lw-dropdown {{ $learnersOpen ? 'lw-open' : '' }}">
                <button class="lw-link lw-drop-btn {{ $learnersOpen ? 'lw-link-active' : '' }}" data-label="Learners" type="button">
                    <span class="lw-icon">
                        <i class="bi bi-mortarboard"></i>
                    </span>
                    <span class="lw-text">Learners</span>
                    <i class="bi bi-chevron-down lw-chevron"></i>
                </button>
                <div class="lw-submenu">
                    <a href="{{ route('admin.learners.index') }}" class="lw-sub {{ request()->routeIs('admin.learners.*') ? 'lw-sub-active' : '' }}">All Learners</a>
                    <a href="{{ route('admin.learner-attendances.index') }}" class="lw-sub {{ request()->routeIs('admin.learner-attendances.index') ? 'lw-sub-active' : '' }}">Attendances</a>
                    <a href="{{ route('admin.learner-attendances.create') }}" class="lw-sub {{ request()->routeIs('admin.learner-attendances.create') ? 'lw-sub-active' : '' }}">Mark Register</a>
                     <a class="sub-link" href="{{ route('admin.deployment-histories.index') }}">My Deployment History</a>
                </div>
            </div>
        @endcan

        @can('admin.counties.index')
            @php
                $locationsOpen = request()->routeIs('admin.counties.*', 'admin.sub-counties.*', 'admin.wards.*', 'admin.sub-locations.*');
            @endphp
            <div class="lw-dropdown {{ $locationsOpen ? 'lw-open' : '' }}">
                <button class="lw-link lw-drop-btn {{ $locationsOpen ? 'lw-link-active' : '' }}" data-label="Locations" type="button">
                    <span class="lw-icon">
                        <i class="bi bi-geo-alt"></i>
                    </span>
                    <span class="lw-text">Locations</span>
                    <i class="bi bi-chevron-down lw-chevron"></i>
                </button>
                <div class="lw-submenu">
                    <a href="{{route('admin.counties.index')}}" class="lw-sub {{ request()->routeIs('admin.counties.*') ? 'lw-sub-active' : '' }}">Counties</a>
                    <a href="{{route('admin.sub-counties.index')}}" class="lw-sub {{ request()->routeIs('admin.sub-counties.*') ? 'lw-sub-active' : '' }}">Sub Counties</a>
                    <a href="{{route('admin.wards.index')}}" class="lw-sub {{ request()->routeIs('admin.wards.*') ? 'lw-sub-active' : '' }}">Wards</a>
                    <a href="{{route('admin.sub-locations.index')}}" class="lw-sub {{ request()->routeIs('admin.sub-locations.*') ? 'lw-sub-active' : '' }}">Sub Locations</a>
                </div>
            </div>
        @endcan

        @can('admin.sms-logs.index')
            @php
                $smsOpen = request()->routeIs('admin.sms-logs.*', 'admin.sms-dashboard');
            @endphp
            <div class="lw-dropdown {{ $smsOpen ? 'lw-open' : '' }}">
                <button class="lw-link lw-drop-btn {{ $smsOpen ? 'lw-link-active' : '' }}" data-label="Communication" type="button">
                    <span class="lw-icon">
                        <i class="bi bi-chat-dots"></i>
                    </span>
                    <span class="lw-text">Communication</span>
                    <i class="bi bi-chevron-down lw-chevron"></i>
                </button>
                <div class="lw-submenu">
                    <a href="{{route('admin.sms-logs.index')}}" class="lw-sub {{ request()->routeIs('admin.sms-logs.*') ? 'lw-sub-active' : '' }}">SMS Logs</a>
                    <a href="{{route('admin.sms-dashboard')}}" class="lw-sub {{ request()->routeIs('admin.sms-dashboard') ? 'lw-sub-active' : '' }}">SMS Dashboard</a>
                </div>
            </div>
        @endcan

        <div class="nav-divider"></div>

        @can('admin.unions.all')
            @php
                $setupOpen = request()->routeIs('admin.unions.*', 'admin.documents.*', 'admin.ethnic-groups.*', 'admin.job-groups.*');
            @endphp
            <div class="lw-dropdown {{ $setupOpen ? 'lw-open' : '' }}">
                <button class="lw-link lw-drop-btn {{ $setupOpen ? 'lw-link-active' : '' }}" data-label="System Setup" type="button">
                    <span class="lw-icon">
                        <i class="bi bi-gear"></i>
                    </span>
                    <span class="lw-text">System Setup</span>
                    <i class="bi bi-chevron-down lw-chevron"></i>
                </button>
                <div class="lw-submenu">
                    <a href="{{route('admin.unions.index')}}" class="lw-sub {{ request()->routeIs('admin.unions.*') ? 'lw-sub-active' : '' }}">Unions</a>
                    <a href="{{route('admin.documents.index')}}" class="lw-sub {{ request()->routeIs('admin.documents.*') ? 'lw-sub-active' : '' }}">Documents</a>
                    <a href="{{route('admin.ethnic-groups.index')}}" class="lw-sub {{ request()->routeIs('admin.ethnic-groups.*') ? 'lw-sub-active' : '' }}">Ethnic Groups</a>
                    <a href="{{route('admin.job-groups.index')}}" class="lw-sub {{ request()->routeIs('admin.job-groups.*') ? 'lw-sub-active' : '' }}">Job Groups</a>
                </div>
            </div>
        @endcan

        @can('admin.users.index')
            @php
                $usersOpen = request()->routeIs('admin.users.*', 'admin.roles.*', 'admin.system.logs', 'admin.system_logs_details');
            @endphp
            <div class="lw-dropdown {{ $usersOpen ? 'lw-open' : '' }}">
                <button class="lw-link lw-drop-btn {{ $usersOpen ? 'lw-link-active' : '' }}" data-label="User Management" type="button">
                    <span class="lw-icon">
                        <i class="bi bi-people"></i>
                    </span>
                    <span class="lw-text">User Management</span>
                    <i class="bi bi-chevron-down lw-chevron"></i>
                </button>
                <div class="lw-submenu">
                    <a href="{{route('admin.users.index')}}" class="lw-sub {{ request()->routeIs('admin.users.*') ? 'lw-sub-active' : '' }}">Users</a>
                    <a href="{{route('admin.roles.index')}}" class="lw-sub {{ request()->routeIs('admin.roles.*') ? 'lw-sub-active' : '' }}">Roles</a>
                    <a href="{{route('admin.system.logs')}}" class="lw-sub {{ request()->routeIs('admin.system.logs', 'admin.system_logs_details') ? 'lw-sub-active' : '' }}">System Logs</a>
                </div>
            </div>
        @endcan

        @can('admin.cms.settings.index')
            @php
                $settingsOpen = request()->routeIs('admin.cms.settings.*', 'admin.cms.pages.*', 'admin.cms.posts.*', 'admin.cms.galleries.*', 'admin.cms.announcements.*', 'admin.cms.faqs.*', 'admin.cms.testimonials.*', 'admin.cms.contact-messages.*');
            @endphp
            <div class="lw-dropdown {{ $settingsOpen ? 'lw-open' : '' }}">
                <button class="lw-link lw-drop-btn {{ $settingsOpen ? 'lw-link-active' : '' }}" data-label="Settings" type="button">
                    <span class="lw-icon">
                        <i class="bi bi-sliders"></i>
                    </span>
                    <span class="lw-text">Settings</span>
                    <i class="bi bi-chevron-down lw-chevron"></i>
                </button>
                <div class="lw-submenu">
                    <a href="{{ route('admin.cms.settings.index') }}" class="lw-sub {{ request()->routeIs('admin.cms.settings.*') ? 'lw-sub-active' : '' }}">Site Settings</a>
                    <a href="{{ route('admin.cms.pages.index') }}" class="lw-sub {{ request()->routeIs('admin.cms.pages.*') ? 'lw-sub-active' : '' }}">Pages</a>
                    <a href="{{ route('admin.cms.posts.index') }}" class="lw-sub {{ request()->routeIs('admin.cms.posts.*') ? 'lw-sub-active' : '' }}">Blog Posts</a>
                    <a href="{{ route('admin.cms.galleries.index') }}" class="lw-sub {{ request()->routeIs('admin.cms.galleries.*') ? 'lw-sub-active' : '' }}">Galleries</a>
                    <a href="{{ route('admin.cms.announcements.index') }}" class="lw-sub {{ request()->routeIs('admin.cms.announcements.*') ? 'lw-sub-active' : '' }}">Announcements</a>
                    <a href="{{ route('admin.cms.faqs.index') }}" class="lw-sub {{ request()->routeIs('admin.cms.faqs.*') ? 'lw-sub-active' : '' }}">FAQs</a>
                    <a href="{{ route('admin.cms.testimonials.index') }}" class="lw-sub {{ request()->routeIs('admin.cms.testimonials.*') ? 'lw-sub-active' : '' }}">Testimonials</a>
                    <a href="{{ route('admin.cms.contact-messages.index') }}" class="lw-sub {{ request()->routeIs('admin.cms.contact-messages.*') ? 'lw-sub-active' : '' }}">Contact Messages</a>
                </div>
            </div>
        @endcan

        <!-- My Account -->
        <a class="lw-link {{ request()->routeIs('admin.my-account') ? 'lw-link-active' : '' }}" href="{{ route('admin.my-account') }}">
            <span class="lw-icon">
                <i class="bi bi-person-circle"></i>
            </span>
            <span class="lw-text">My Account</span>
        </a>
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
document.addEventListener('DOMContentLoaded', function () {
    const closeBtn = document.querySelector('.close-sidebar-btn');
    const appSidebar = document.querySelector('.app-sidebar');

    if (closeBtn && appSidebar) {
        closeBtn.addEventListener('click', function (e) {
            e.preventDefault();
            appSidebar.classList.toggle('closed-sidebar');
        });
    }

    const dropdownButtons = document.querySelectorAll('.lw-drop-btn');
    dropdownButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const dropdown = btn.closest('.lw-dropdown');
            if (!dropdown) return;
            dropdown.classList.toggle('lw-open');
        });
    });
});
</script>
