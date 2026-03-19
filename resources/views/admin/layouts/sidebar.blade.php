<div class="app-sidebar sidebar-shadow" style="background: #1a3c5e;">
    <div class="app-header__logo">
        <img src="{{asset('assets/images/laikipia.png')}}" alt="Laikipia" style="height: 40px; width: 40px; margin-right: 10px;">
        <div class="logo-src">Laikipia CDF</div>
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
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">

                <li>
                    <a href="{{ route('home') }}"  >
                        <i class="metismenu-icon pe-7s-home" ></i>Dashboard
                    </a>
                </li>
               <li>
                    <a href="#"   >
                        <i class="metismenu-icon fa fa-book"   ></i>ECDE Teachers
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left "></i>
                    </a>
                    <ul>
                        <li   >
                            <a   href="{{route('admin.teachers.index')}}">
                                <i class="metismenu-icon "></i>All Teachers
                            </a>
                        </li>
                        <li    >
                            <a   href="{{route('admin.teachers.create')}}">
                                <i class="metismenu-icon"></i>New Teacher
                            </a>
                        </li>

                    </ul>
                </li>
              
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-building"></i>Schools
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.ecde-schools.index')}}">
                                <i class="metismenu-icon "></i>All Schools
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.feeder-schools.index')}}">
                                <i class="metismenu-icon "></i>Feeder Schools
                            </a>
                        </li>

                       

                    </ul>
                </li>
                <li>
                    <a href="#"   >
                        <i class="metismenu-icon fa fa-user-tie"   ></i>ECDE Coordinators
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left "></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.coordinators.all')}}">
                                <i class="metismenu-icon "></i>All Coordinators
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.coordinators.create')}}">
                                <i class="metismenu-icon"></i>New Coordinators
                            </a>
                        </li>

                    </ul>
                </li>

              

                <li>
                    <a href="#"   >
                        <i class="metismenu-icon fa fa-graduation-cap"   ></i>Students
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left "></i>
                    </a>
                    <ul>
                        <li     >
                            <a     href="{{ route('admin.ecde-students.index') }}">
                                <i class="metismenu-icon "></i>ECDE Students
                            </a>
                        </li>
                     

                    </ul>
                </li>

                <li>
                    <a href="#"   >
                        <i class="metismenu-icon pe-7s-rocket"   ></i>Locations
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li     >
                            <a     href="{{route('admin.counties.index')}}">
                                <i class="metismenu-icon"></i>Counties
                            </a>
                        </li>
                        <li     >
                            <a     href="{{route('admin.sub-counties.index')}}">
                                <i class="metismenu-icon"></i>Sub Counties
                            </a>
                        </li>
                        <li     >
                            <a     href="{{route('admin.wards.index')}}">
                                <i class="metismenu-icon"></i>Wards
                            </a>
                        </li>
                        <li     >
                            <a     href="{{route('admin.sub-locations.index')}}">
                                <i class="metismenu-icon"></i>Sub Locations
                            </a>
                        </li>

                    </ul>
                </li>

                    

                

                {{-- <li>
                    <a href="#"   >
                        <i class="metismenu-icon pe-7s-rocket"   ></i>Department Workers
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left "></i>
                    </a>
                    <ul>
                        <li     >
                            <a     href="{{ url('admin/all-department_workers') }}">
                                <i class="metismenu-icon "></i>All Department Workers
                            </a>
                        </li>


                    </ul>
                </li> --}}

              
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-comments"></i>Communication
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.sms-logs.index')}}">
                                <i class="fa fa-email"></i>SMS Logs
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.sms-dashboard')}}">
                                <i class="metismenu-icon"></i>SMS Dashboard
                            </a>
                        </li>

                    </ul>
                </li>

                 <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-rocket"></i>System Setup
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.unions.all')}}">
                                <i class="metismenu-icon "></i> Unions
                            </a>
                        </li>
                       

                    </ul>
                </li>
                 <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-rocket"></i>User Management
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.unions.all')}}">
                                <i class="metismenu-icon "></i>Users
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.unions.create')}}">
                                <i class="metismenu-icon"></i>Roles
                            </a>
                        </li>
                          <li>
                            <a href="{{route('admin.unions.create')}}">
                                <i class="metismenu-icon"></i>Permissions
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-cog"></i>Settings
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.cms.settings.index') }}">
                                <i class="metismenu-icon"></i>Site Settings
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.cms.pages.index') }}">
                                <i class="metismenu-icon"></i>Pages
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.cms.posts.index') }}">
                                <i class="metismenu-icon"></i>Blog Posts
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.cms.galleries.index') }}">
                                <i class="metismenu-icon"></i>Galleries
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.cms.announcements.index') }}">
                                <i class="metismenu-icon"></i>Announcements
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.cms.faqs.index') }}">
                                <i class="metismenu-icon"></i>FAQs
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.cms.testimonials.index') }}">
                                <i class="metismenu-icon"></i>Testimonials
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.cms.contact-messages.index') }}">
                                <i class="metismenu-icon"></i>Contact Messages
                            </a>
                        </li>
                    </ul>
                </li>
               


            </ul>
        </div>
    </div>
</div>

<style>
.vertical-nav-menu a {
    color: #ffffff !important;
    text-decoration: none !important;
}
.vertical-nav-menu a:hover {
    color: #060c48 !important;
    text-decoration: none !important;
}
.vertical-nav-menu a.active {
    color: #ffffff !important;
    text-decoration: none !important;
}
.vertical-nav-menu li.active a {
    color: #ffffff !important;
    text-decoration: none !important;
}
.vertical-nav-menu a:focus {
    color: #4c77ab !important;
    text-decoration: none !important;
}
.app-sidebar .logo-src {
    color: #ffffff;
}
.metismenu-icon {
    color: #c6c9eb !important;
    margin-right: 10px;
}
.metismenu-state-icon {
    color: #ffffff !important;
}

.vertical-nav-menu > li > ul {
    display: none !important;
}

.vertical-nav-menu > li.sidebar-open > ul {
    display: block !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menu = document.querySelector('.vertical-nav-menu');
    if (!menu) return;

    const topItems = menu.querySelectorAll(':scope > li');

    topItems.forEach(function (item) {
        const trigger = item.querySelector(':scope > a');
        const submenu = item.querySelector(':scope > ul');
        if (!trigger || !submenu) return;

        trigger.addEventListener('click', function (event) {
            event.preventDefault();

            const isOpen = item.classList.contains('sidebar-open');

            topItems.forEach(function (other) {
                other.classList.remove('sidebar-open');
            });

            if (!isOpen) {
                item.classList.add('sidebar-open');
            }
        });
    });

    const currentPath = window.location.pathname + window.location.search;
    topItems.forEach(function (item) {
        const submenuLinks = item.querySelectorAll(':scope > ul a[href]');
        submenuLinks.forEach(function (link) {
            const href = link.getAttribute('href');
            if (!href || href === '#') return;
            if (currentPath === href || currentPath.startsWith(href + '?')) {
                item.classList.add('sidebar-open');
            }
        });
    });
});
</script>
