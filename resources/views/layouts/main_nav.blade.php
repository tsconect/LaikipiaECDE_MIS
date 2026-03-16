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
                

       

                <li class="active">
                    <a href="{{ route('admin.home')}}" class="active">
                        <i class="metismenu-icon fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon fas fa-file-alt"></i>Bursaries
                        <i class="metismenu-state-icon fas fa-caret-left"></i> 
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.bursary.application.all')}}">
                                <i class="metismenu-icon "></i> Bursaries  <span class="badge badge-success">{{ \App\Models\BursaryApplications::count(); }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.bursary.application.create')}}">
                                <i class="metismenu-icon"></i>Create Bursary 
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li>
                    <a href="#">
                        <i class="metismenu-icon fas fa-address-card"></i>Bursary Applications
                        <i class="metismenu-state-icon fas fa-caret-left"></i> 
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.bursary.application.all')}}">
                                <i class="metismenu-icon "></i>All Applications  <span class="badge badge-success">{{ \App\Models\StudentApplications::count(); }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.applications.reviewed')}}">
                                <i class="metismenu-icon"></i>Reviewed Applications  <span class="badge badge-success">{{  \App\Models\StudentApplications::whereHas('committeeReviews')->count()  }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.applications.unreviewed')}}">
                                <i class="metismenu-icon"></i>Unreviewed Applications  <span class="badge badge-success">{{  \App\Models\StudentApplications::whereDoesntHave('committeeReviews')->count()  }}</span>
                            </a>
                        </li>
                        {{--
                        <li>
                            <a href="{{route('admin.applications.released')}}">
                                <i class="metismenu-icon"></i>Released Applications <span class="badge badge-success">{{  \App\Models\StudentApplications::whereHas('cheques')->count()  }}</span>
                            </a>
                        </li>
                        --}}
                    </ul>
                </li>     


                <li>
                    <a href="#">
                        <i class="metismenu-icon fas fa-money-check-alt"></i>Cheques
                        <i class="metismenu-state-icon fas fa-caret-left"></i> 
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.cheques.all')}}">
                                <i class="metismenu-icon "></i> Cheques  <span class="badge badge-success">{{ \App\Models\BursaryApplications::count(); }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.cheques.create')}}">
                                <i class="metismenu-icon"></i>Add New Cheque
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="#"   >
                        <i class="metismenu-icon fas fa-user-graduate"  ></i>Students
                        <i class="metismenu-state-icon fas fa-caret-left"></i> 
                    </a>
                    <ul>
                        <li>
                            <a     href="{{route('admin.students.all')}}">
                                <i class="metismenu-icon "></i>All Students  <span class="badge badge-success">{{ \App\Models\StudentDetails::count(); }}</span>
                            </a>
                        </li>
                        <li  >
                            <a  href="{{route('admin.students.approved')}}">
                                <i class="metismenu-icon"></i>Approved Students <span class="badge badge-success">{{  \App\Models\StudentDetails::where('profile_status', 'approved')->count()  }}</span>
                            </a>
                        </li>
                        <li  >
                            <a  href="{{route('admin.students.pending')}}">
                                <i class="metismenu-icon"></i>Pending Students <span class="badge badge-success">{{  \App\Models\StudentDetails::where('profile_status', 'pending')->count()  }}</span>
                            </a>
                        </li>

                    </ul>
                </li>     

                <li>
                    <a href="#">
                        <i class="metismenu-icon fas fa-user-tie"></i>Chiefs
                        <i class="metismenu-state-icon fas fa-caret-left"></i> 
                    </a>

                    <ul>
                        <li>
                            <a href="{{route('admin.chiefs.all')}}">
                                <i class="metismenu-icon "></i>All Chiefs  <span class="badge badge-success">{{ \App\Models\Chief::count(); }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.chiefs.create')}}">
                                <i class="metismenu-icon"></i>New Chief
                            </a>
                        </li>

                    </ul>
                </li>
              
                </li> 
                <li>
                <a href="#">
                    <i class="metismenu-icon fas fa-globe"></i> Locational Details
                    <i class="metismenu-state-icon fas fa-caret-left"></i> 
                </a>

                    <ul>
                        <li>
                            <a href="{{route('admin.location.all')}}">
                                <i class="metismenu-icon "></i>All Locations <span class="badge badge-success">{{ \App\Models\Location::count(); }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.location.create')}}">
                                <i class="metismenu-icon"></i>New Location                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon fas fa-address-card"></i>Reports
                        <i class="metismenu-state-icon fas fa-caret-left"></i> 
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.reports.bursary.all')}}">
                                <i class="metismenu-icon "></i>Bursary Reports
                            </a>
                        </li>
                        
                    </ul>
                </li> 

                <li>
                    <a href="#">
                        <i class="metismenu-icon fas fa-user-circle"></i>My Profile
                        <i class="metismenu-state-icon fas fa-caret-left"></i> 
                    </a>
                    <ul>
                    <li>
                            <a href="{{ route('admin.profile')}}">
                                <i class="metismenu-icon"></i>My Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout')}}">
                                <i class="metismenu-icon"></i>Logout
                            </a>
                        </li>

                    </ul>
                </li>



            </ul>
        </div>
    </div>
</div>
<style>
    a {
        color: black;
        text-decoration: none;
    }

    a.active {
        background-color: #cccccc; 
    }
</style>