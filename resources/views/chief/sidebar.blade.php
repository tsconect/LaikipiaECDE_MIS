<?php

$chiefLocationId = auth()->user()->chief->location_id;

?>
<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src">{{ Auth::user()->chief->location->name ?? 'laikipia cdf' }}</div>
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
                    <a href="{{route('chief.home')}}" class="{{ request()->routeIs('chief.home') ? 'active' : '' }} ">
                        <i class="metismenu-icon fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li class="menu-item-dropdown">
                    <a href="#" class="{{ request()->routeIs('chief.bursary.application.*') ? 'active' : '' }}">
                        <i class="metismenu-icon fas fa-file-alt"></i>Bursary Applications
                        <i class="metismenu-state-icon fas fa-caret-left"></i>
                    </a>
                    <ul>
                        <li class="{{ request()->routeIs('chief.bursary.application.all') ? 'active' : '' }}">
                            <a href="{{route('chief.bursary.application.all')}}">
                                <i class="metismenu-icon"></i>All Applications  <span class="badge badge-success">{{ \App\Models\BursaryApplications::whereHas('studentApplications', function ($query) use ($chiefLocationId) {
                                    $query->whereHas('student', function ($subQuery) use ($chiefLocationId) {
                                        $subQuery->where('location_id', $chiefLocationId);
                                    });})->count()}}</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('chief.applications.reviewed') ? 'active' : '' }}">
                            <a href="{{route('chief.applications.reviewed')}}">
                                <i class="metismenu-icon"></i>Reviewed Applications <span class="badge badge-success"> {{  \App\Models\StudentApplications::whereHas('chiefsReviews')->count();  }} </span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('chief.applications.unreviewed') ? 'active' : '' }}">
                            <a href="{{route('chief.applications.unreviewed')}}">
                                <i class="metismenu-icon"></i>Unreviewed Applications <span class="badge badge-success"> {{  \App\Models\StudentApplications::whereDoesntHave('chiefsReviews')->count();  }} </span>
                            </a>
                        </li>
                    </ul>
                </li>
 

                <li>
                    <a href="#"  class="{{ request()->routeIs('chief.students.all') ? 'active' : '' }} " >
                        <i class="metismenu-icon fas fa-user-graduate"  ></i>Students
                        <i class="metismenu-state-icon fas fa-caret-left"></i> 
                    </a>
                    <ul>
                        <li     >
                            <a     href="{{route('chief.students.all')}}">
                                <i class="metismenu-icon "></i>Registered Students <span class="badge badge-success"> {{  \App\Models\StudentApplications::whereHas('chiefsReviews')->count();  }}</span>
                            </a>
                        </li>
                    

                    </ul>
                </li>         
                <li>
                    <a href="#" class="{{ request()->routeIs('chief.profile') ? 'active' : '' }} ">
                        <i class="metismenu-icon fas fa-user-circle"></i>My Profile
                        <i class="metismenu-state-icon fas fa-caret-left"></i> 
                    </a>
                    <ul>
                    <li>
                            <a href="{{ route('chief.profile')}}">
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

