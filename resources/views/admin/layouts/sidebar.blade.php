@php
    $path = request()->path();

    $isActive = function (array $patterns) use ($path) {
        foreach ($patterns as $pattern) {
            if (request()->is($pattern)) {
                return true;
            }
        }
        return false;
    };
@endphp

<div class="app-sidebar sidebar-shadow admin-modern-sidebar">
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner modern-nav-wrap">
            <div class="nav-group-label">Overview</div>
            <a href="{{ route('home') }}" class="nav-item {{ $isActive(['home', 'dashboard']) ? 'active' : '' }}">
                <span class="nav-icon"><i class="fa fa-home"></i></span>
                Dashboard
            </a>

            <div class="nav-group-label">Management</div>

            <div class="nav-parent {{ $isActive(['admin/teachers*']) ? 'open' : '' }}">
                <button class="nav-item nav-toggle" type="button">
                    <span class="nav-icon"><i class="fa fa-book"></i></span> ECDE Teachers <span class="nav-arrow">›</span>
                </button>
                <div class="nav-children">
                    <a href="{{ route('admin.teachers.index') }}" class="nav-child {{ $isActive(['admin/teachers']) ? 'active' : '' }}">All Teachers</a>
                    <a href="{{ route('admin.teachers.create') }}" class="nav-child {{ $isActive(['admin/teachers/create']) ? 'active' : '' }}">New Teacher</a>
                </div>
            </div>

            <div class="nav-parent {{ $isActive(['admin/ecde-schools*', 'admin/feeder-schools*']) ? 'open' : '' }}">
                <button class="nav-item nav-toggle" type="button">
                    <span class="nav-icon"><i class="fa fa-building"></i></span> Schools <span class="nav-arrow">›</span>
                </button>
                <div class="nav-children">
                    <a href="{{ route('admin.ecde-schools.index') }}" class="nav-child {{ $isActive(['admin/ecde-schools*']) ? 'active' : '' }}">All Schools</a>
                    <a href="{{ route('admin.feeder-schools.index') }}" class="nav-child {{ $isActive(['admin/feeder-schools*']) ? 'active' : '' }}">Feeder Schools</a>
                </div>
            </div>

            <div class="nav-parent {{ $isActive(['admin/coordinators*']) ? 'open' : '' }}">
                <button class="nav-item nav-toggle" type="button">
                    <span class="nav-icon"><i class="fa fa-user"></i></span> ECDE Coordinators <span class="nav-arrow">›</span>
                </button>
                <div class="nav-children">
                    <a href="{{ route('admin.coordinators.index') }}" class="nav-child {{ $isActive(['admin/coordinators*']) ? 'active' : '' }}">All Coordinators</a>
                </div>
            </div>

            <div class="nav-parent {{ $isActive(['admin/ecde-students*']) ? 'open' : '' }}">
                <button class="nav-item nav-toggle" type="button">
                    <span class="nav-icon"><i class="fa fa-graduation-cap"></i></span> Students <span class="nav-arrow">›</span>
                </button>
                <div class="nav-children">
                    <a href="{{ route('admin.ecde-students.index') }}" class="nav-child {{ $isActive(['admin/ecde-students*']) ? 'active' : '' }}">ECDE Students</a>
                </div>
            </div>

            <div class="nav-group-label">Locations</div>
            <div class="nav-parent {{ $isActive(['admin/counties*', 'admin/sub-counties*', 'admin/wards*', 'admin/sub-locations*']) ? 'open' : '' }}">
                <button class="nav-item nav-toggle" type="button">
                    <span class="nav-icon"><i class="fa fa-map-marker"></i></span> Locations <span class="nav-arrow">›</span>
                </button>
                <div class="nav-children">
                    <a href="{{ route('admin.counties.index') }}" class="nav-child {{ $isActive(['admin/counties*']) ? 'active' : '' }}">Counties</a>
                    <a href="{{ route('admin.sub-counties.index') }}" class="nav-child {{ $isActive(['admin/sub-counties*']) ? 'active' : '' }}">Sub Counties</a>
                    <a href="{{ route('admin.wards.index') }}" class="nav-child {{ $isActive(['admin/wards*']) ? 'active' : '' }}">Wards</a>
                    <a href="{{ route('admin.sub-locations.index') }}" class="nav-child {{ $isActive(['admin/sub-locations*']) ? 'active' : '' }}">Sub Locations</a>
                </div>
            </div>

            <div class="nav-group-label">System</div>
            <div class="nav-parent {{ $isActive(['admin/sms-dashboard*', 'admin/sms-logs*']) ? 'open' : '' }}">
                <button class="nav-item nav-toggle" type="button">
                    <span class="nav-icon"><i class="fa fa-comments"></i></span> Communication <span class="nav-arrow">›</span>
                </button>
                <div class="nav-children">
                    <a href="{{ route('admin.sms-logs.index') }}" class="nav-child {{ $isActive(['admin/sms-logs*']) ? 'active' : '' }}">SMS Logs</a>
                    <a href="{{ route('admin.sms-dashboard') }}" class="nav-child {{ $isActive(['admin/sms-dashboard*']) ? 'active' : '' }}">SMS Dashboard</a>
                </div>
            </div>

            <div class="nav-parent {{ $isActive(['admin/users*', 'admin/roles*', 'admin/permissions*', 'admin/system-logs*']) ? 'open' : '' }}">
                <button class="nav-item nav-toggle" type="button">
                    <span class="nav-icon"><i class="fa fa-users"></i></span> User Management <span class="nav-arrow">›</span>
                </button>
                <div class="nav-children">
                    <a href="{{ route('admin.users.index') }}" class="nav-child {{ $isActive(['admin/users*']) ? 'active' : '' }}">Users</a>
                    <a href="{{ route('admin.roles.index') }}" class="nav-child {{ $isActive(['admin/roles*']) ? 'active' : '' }}">Roles</a>
                    <a href="{{ route('admin.permissions.index') }}" class="nav-child {{ $isActive(['admin/permissions*']) ? 'active' : '' }}">Permissions</a>
                    <a href="{{ route('admin.system.logs') }}" class="nav-child {{ $isActive(['admin/system-logs*']) ? 'active' : '' }}">System Logs</a>
                </div>
            </div>

            <div class="nav-parent {{ $isActive(['admin/cms/*']) ? 'open' : '' }}">
                <button class="nav-item nav-toggle" type="button">
                    <span class="nav-icon"><i class="fa fa-cog"></i></span> CMS Settings <span class="nav-arrow">›</span>
                </button>
                <div class="nav-children">
                    <a href="{{ route('admin.cms.settings.index') }}" class="nav-child {{ $isActive(['admin/cms/settings*']) ? 'active' : '' }}">Site Settings</a>
                    <a href="{{ route('admin.cms.pages.index') }}" class="nav-child {{ $isActive(['admin/cms/pages*']) ? 'active' : '' }}">Pages</a>
                    <a href="{{ route('admin.cms.posts.index') }}" class="nav-child {{ $isActive(['admin/cms/posts*']) ? 'active' : '' }}">Blog Posts</a>
                    <a href="{{ route('admin.cms.galleries.index') }}" class="nav-child {{ $isActive(['admin/cms/galleries*']) ? 'active' : '' }}">Galleries</a>
                    <a href="{{ route('admin.cms.announcements.index') }}" class="nav-child {{ $isActive(['admin/cms/announcements*']) ? 'active' : '' }}">Announcements</a>
                    <a href="{{ route('admin.cms.faqs.index') }}" class="nav-child {{ $isActive(['admin/cms/faqs*']) ? 'active' : '' }}">FAQs</a>
                    <a href="{{ route('admin.cms.testimonials.index') }}" class="nav-child {{ $isActive(['admin/cms/testimonials*']) ? 'active' : '' }}">Testimonials</a>
                    <a href="{{ route('admin.cms.contact-messages.index') }}" class="nav-child {{ $isActive(['admin/cms/contact-messages*']) ? 'active' : '' }}">Contact Messages</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.admin-modern-sidebar {
    background: #1a2d4d !important;
    color: rgba(255,255,255,.7);
}
.admin-modern-sidebar .modern-nav-wrap {
    padding: 14px 10px;
}
.admin-modern-sidebar .nav-group-label {
    color: rgba(255,255,255,.4);
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: .15em;
    font-weight: 700;
    padding: 12px 10px 4px;
}
.admin-modern-sidebar .nav-item {
    display: flex;
    align-items: center;
    gap: 8px;
    width: 100%;
    border: 0;
    background: transparent;
    color: rgba(255,255,255,.72);
    border-radius: 8px;
    padding: 9px 10px;
    text-align: left;
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
}
.admin-modern-sidebar .nav-item:hover,
.admin-modern-sidebar .nav-item.active,
.admin-modern-sidebar .nav-parent.open > .nav-item {
    background: rgba(255,255,255,.1);
    color: #fff;
}
.admin-modern-sidebar .nav-icon {
    width: 18px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    opacity: .9;
    flex-shrink: 0;
}
.admin-modern-sidebar .nav-icon i {
    font-size: 14px;
    line-height: 1;
}
.admin-modern-sidebar .nav-arrow {
    margin-left: auto;
    transition: transform .2s;
}
.admin-modern-sidebar .nav-parent.open > .nav-item .nav-arrow {
    transform: rotate(90deg);
}
.admin-modern-sidebar .nav-children {
    display: none;
    padding: 2px 0 4px 18px;
}
.admin-modern-sidebar .nav-parent.open > .nav-children {
    display: block;
}
.admin-modern-sidebar .nav-child {
    display: block;
    color: rgba(255,255,255,.5);
    text-decoration: none;
    border-radius: 7px;
    font-size: 12.5px;
    padding: 6px 10px;
}
.admin-modern-sidebar .nav-child:hover {
    color: rgba(255,255,255,.78);
    background: rgba(255,255,255,.06);
}
.admin-modern-sidebar .nav-child.active {
    color: #f5c842;
    background: rgba(255,255,255,.05);
}

.closed-sidebar .admin-modern-sidebar .modern-nav-wrap {
    padding: 12px 6px;
}

.closed-sidebar .admin-modern-sidebar .nav-group-label {
    display: none;
}

.closed-sidebar .admin-modern-sidebar .nav-item {
    justify-content: center;
    font-size: 0;
    padding: 10px 8px;
}

.closed-sidebar .admin-modern-sidebar .nav-icon {
    width: 20px;
    opacity: 1;
}

.closed-sidebar .admin-modern-sidebar .nav-icon i {
    font-size: 16px;
}

.closed-sidebar .admin-modern-sidebar .nav-arrow,
.closed-sidebar .admin-modern-sidebar .nav-children {
    display: none !important;
}

.closed-sidebar .admin-modern-sidebar .nav-parent.open > .nav-item {
    background: rgba(255,255,255,.1);
}

.closed-sidebar .app-sidebar.admin-modern-sidebar:hover {
    flex: 0 0 80px !important;
    width: 80px !important;
    min-width: 80px !important;
}

.closed-sidebar:not(.sidebar-mobile-open) .app-sidebar.admin-modern-sidebar:hover .scrollbar-sidebar {
    position: static !important;
    height: auto !important;
    overflow: initial !important;
}

.closed-sidebar .app-sidebar.admin-modern-sidebar:hover .modern-nav-wrap {
    padding: 12px 6px !important;
}

.closed-sidebar .app-sidebar.admin-modern-sidebar:hover .nav-group-label {
    display: none !important;
}

.closed-sidebar .app-sidebar.admin-modern-sidebar:hover .nav-item {
    justify-content: center !important;
    font-size: 0 !important;
    padding: 10px 8px !important;
}

.closed-sidebar .app-sidebar.admin-modern-sidebar:hover .nav-icon {
    width: 20px !important;
    opacity: 1 !important;
}

.closed-sidebar .app-sidebar.admin-modern-sidebar:hover .nav-icon i {
    font-size: 16px !important;
}

.closed-sidebar .app-sidebar.admin-modern-sidebar:hover .nav-arrow,
.closed-sidebar .app-sidebar.admin-modern-sidebar:hover .nav-children {
    display: none !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const parents = document.querySelectorAll('.admin-modern-sidebar .nav-parent');

    parents.forEach(function (parent) {
        const trigger = parent.querySelector(':scope > .nav-toggle');
        if (!trigger) return;

        trigger.addEventListener('click', function () {
            const open = parent.classList.contains('open');
            parents.forEach(function (p) { p.classList.remove('open'); });
            if (!open) parent.classList.add('open');
        });
    });
});
</script>
