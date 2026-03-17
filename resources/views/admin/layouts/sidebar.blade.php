<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
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
                    <a href="/home"  >
                        <i class="metismenu-icon pe-7s-home" ></i>Dashboard
                    </a>
                </li>
             
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-rocket"></i>Unions
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.unions.all')}}">
                                <i class="metismenu-icon "></i>All Unions
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.unions.create')}}">
                                <i class="metismenu-icon"></i>New Union
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-rocket"></i>Schools
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

                    <li>
                        <a href="#"   >
                            <i class="metismenu-icon pe-7s-rocket"   ></i>ECDE Coordinators
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left "></i>
                        </a>
                        <ul>
                            <li   >
                                <a   href="{{route('admin.coordinators.all')}}">
                                    <i class="metismenu-icon "></i>All Coordinators
                                </a>
                            </li>
                            <li    >
                                <a   href="{{route('admin.coordinators.create')}}">
                                    <i class="metismenu-icon"></i>New Coordinators
                                </a>
                            </li>

                        </ul>
                    </li>

                <li>
                    <a href="#"   >
                        <i class="metismenu-icon pe-7s-rocket"   ></i>ECDE Teachers
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
                    <a href="#"   >
                        <i class="metismenu-icon pe-7s-rocket"   ></i>Students
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
                        <i class="metismenu-icon pe-7s-rocket"></i>Communication
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
               


            </ul>
        </div>
    </div>
</div>
