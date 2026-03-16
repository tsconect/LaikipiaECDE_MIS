@extends('backoffice.layouts.app')


@section('nav-bar')

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

    @include('layouts.main_nav')
</div>


@endsection


@section('content')
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                                <div class="widget-chat-wrapper-outer">
                                    <div class="widget-chart-content">
                                        <h6 class="widget-subheading">EcdeSchools</h6>
                                        <div class="widget-chart-flex">
                                            <div class="widget-numbers mb-0 w-100">
                                                <div class="widget-chart-flex">
                                                    <div class="fsize-4">
                                                        <small class="opacity-5"></small>
                                                        {{ count(App\Models\EcdeSchools::all()) }}
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div
                                                            class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                            <span class="text-success pl-2">+14%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                                <div class="widget-chat-wrapper-outer">
                                    <div class="widget-chart-content">
                                        <h6 class="widget-subheading">Teachers</h6>
                                        <div class="widget-chart-flex">
                                            <div class="widget-numbers mb-0 w-100">
                                                <div class="widget-chart-flex">
                                                    <div class="fsize-4 text-danger">
                                                        <small class="opacity-5 text-muted"></small>
                                                        {{ count(App\Models\Teacher::all()) }}
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div
                                                            class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                            <span class="text-danger pl-2">
                                                                <span class="pr-1">
                                                                    <i class="fa fa-angle-up"></i>
                                                                </span>
                                                                8%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                                <div class="widget-chat-wrapper-outer">
                                    <div class="widget-chart-content">
                                        <h6 class="widget-subheading">Students</h6>
                                        <div class="widget-chart-flex">
                                            <div class="widget-numbers mb-0 w-100">
                                                <div class="widget-chart-flex">
                                                    <div class="fsize-4">
                                                        <span class="text-success pr-2">
                                                            <i class="fa fa-angle-down"></i>
                                                        </span>
                                                        <small class="opacity-5"></small>
                                                        {{ count(App\Models\Students::all()) }}
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div
                                                            class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                            <span class="text-success pl-2">
                                                                <span class="pr-1">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </span>
                                                                15%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                                <div class="widget-chat-wrapper-outer">
                                    <div class="widget-chart-content">
                                        <h6 class="widget-subheading">Unions</h6>
                                        <div class="widget-chart-flex">
                                            <div class="widget-numbers mb-0 w-100">
                                                <div class="widget-chart-flex">
                                                    <div class="fsize-4">
                                                        <small class="opacity-5"></small>
                                                        {{ count(App\Models\Unions::all()) }}
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div
                                                            class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                            <span class="text-warning pl-2">+76%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5">
                    <div class="mb-3 card">
                        <div class="card-body">
                            <div class="widget-chart widget-chart2 text-left p-0">
                                <div class="widget-chat-wrapper-outer">
                                    <div class="widget-chart-content">
                                        <div class="widget-chart-flex">
                                            <div class="widget-numbers mt-0">
                                                <div class="widget-chart-flex">
                                                    <div>
                                                        <small class="opacity-5">KES</small>
                                                        <span>628</span>
                                                    </div>
                                                    <div class="widget-title ml-2 opacity-5 font-size-lg text-muted">Total
                                                        Bussary Dispersed</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                        <div id="dashboard-sparkline-carousel-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-8">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="header-icon lnr-dice mr-3 text-muted opacity-6"> </i>
                                BURSARY BREAKDOWNS
                            </div>
                            <div class="btn-actions-pane-right actions-icon-btn">
                                <div class="btn-group dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="btn-icon btn-icon-only btn btn-link">
                                        <i class="pe-7s-menu btn-icon-wrapper"></i>
                                    </button>


                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table style="width: 100%;" id="example2"
                                class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SN / No</th>
                                        <th>Bursary Opening</th>
                                        <th>Total Applicants</th>
                                        <th>Allocated</th>
                                        <th>Variance </th>
                                        <th>Amount Disbursed </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2023 / January </td>
                                        <td>1200</td>
                                        <td>100</td>
                                        <td>1100</td>
                                        <td>24000</td>
                                    </tr>
                                    <th>
                                        <tr style="background-color:#c1c1c1;">
                                            <th colspan="6">ECDE Teachers Breakdown</th>
                                        </tr>
                                        <tr>
                                            <th>SN / NO</th>
                                            <th>Total </th>
                                            <th>With TSC</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Disabled</th>
                                        </tr>
                                    </th>
                                 </tbody>
                            </table>


                        </div>

                    </div>

                </div>

                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="header-icon lnr-cloud-download icon-gradient bg-happy-itmeo"> </i>
                                Technical Support
                            </div>
                        </div>
                        <div class="p-0 card-body">
                            <div class="dropdown-menu-header mt-0 mb-0">
                                <div class="dropdown-menu-header-inner bg-heavy-rain">
                                    <div class="menu-header-image opacity-1"
                                        style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Notifications</h5>
                                        <h6 class="menu-header-subtitle">
                                            You have
                                            <b class="text-danger">21 </b>
                                            unread messages
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                                <li class="nav-item">
                                    <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab"
                                        href="#tab-animated-0">
                                        <span>Messages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab"
                                        href="#tab-animated-1">
                                        <span>Events</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab"
                                        href="#tab-animated-2">
                                        <span>System Errors</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-animated-0" role="tabpanel">
                                    <div class="scroll-area-sm">
                                        <div class="scrollbar-container">
                                            <div class="p-3">
                                                <div class="notifications-box">
                                                    <div
                                                        class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                        <div
                                                            class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                            <div>
                                                                <span
                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                            <div>
                                                                <span
                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <p> Yet another one, at<span class="text-success">15:00
                                                                            PM</span></p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item dot-success vertical-timeline-element">
                                                            <div><span
                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">Build the production
                                                                        release
                                                                        <span class="badge badge-danger ml-2">NEW</span>
                                                                    </h4>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                            <div>
                                                                <span
                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">Something not important
                                                                        <div
                                                                            class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                                            <div
                                                                                class="avatar-icon-wrapper avatar-icon-sm">
                                                                                <div class="avatar-icon">
                                                                                    <img src="assets/images/avatars/1.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="avatar-icon-wrapper avatar-icon-sm">
                                                                                <div class="avatar-icon">
                                                                                    <imgsrc="assets images=""
                                                                                        avatars=""
                                                                                        2.jpg"alt="">
                                                                                        </imgsrc="assets></div>
</div>
<div class="avatar-icon-wrapper
                                                                                            avatar-icon-sm">
                                                                                        <div class="avatar-icon">
                                                                                            <img src="assets/images/avatars/3.jpg"
                                                                                                alt="">
                                                                                        </div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/4.jpg"
                                                                                            alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/5.jpg"
                                                                                            alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/9.jpg"
                                                                                            alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/7.jpg"
                                                                                            alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/8.jpg"
                                                                                            alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                                                    <div class="avatar-icon"><i>+</i></div>
                                                                                </div>
                                                                            </div>
                                                                    </h4>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item dot-info vertical-timeline-element">
                                                            <div>
                                                                <span
                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">This dot has an info state
                                                                    </h4>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                            <div>
                                                                <span
                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                            <div>
                                                                <span
                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <p>Yet another one, at <span class="text-success">15:00
                                                                            PM</span></p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item dot-success vertical-timeline-element">
                                                            <div>
                                                                <span
                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">Build the production release
                                                                        <span class="badge badge-danger ml-2">NEW</span>
                                                                    </h4>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item dot-dark vertical-timeline-element">
                                                            <div>
                                                                <span
                                                                    class="vertical-timeline-element-icon bounce-in"></span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">This dot has a dark state
                                                                    </h4>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-animated-1" role="tabpanel">
                                    <div class="scroll-area-sm">
                                        <div class="scrollbar-container">
                                            <div class="p-3">
                                                <div
                                                    class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                            </span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <h4 class="timeline-title">All Hands Meeting</h4>
                                                                <p>Lorem ipsum dolor sic amet, today at
                                                                    <a href="javascript:void(0);">12:00 PM</a>
                                                                </p>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                <i class="badge badge-dot badge-dot-xl badge-warning"></i>
                                                            </span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <p>Another meeting today, at
                                                                    <b class="text-danger">12:00 PM</b>
                                                                </p>
                                                                <p>Yet another one, at
                                                                    <span class="text-success">15:00 PM</span>
                                                                </p>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                <i class="badge badge-dot badge-dot-xl badge-danger"></i>
                                                            </span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <h4 class="timeline-title">Build the production release
                                                                </h4>
                                                                <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                                    incididunt ut labore et dolore magna elit enim at
                                                                    minim veniam quis nostrud
                                                                </p>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                <i class="badge badge-dot badge-dot-xl badge-primary"></i>
                                                            </span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <h4 class="timeline-title text-success">Something not
                                                                    important</h4>
                                                                <p>Lorem ipsum dolor sit amit,consectetur elit enim at
                                                                    minim veniam quis nostrud
                                                                </p>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                            </span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <h4 class="timeline-title">All Hands Meeting</h4>
                                                                <p>Lorem ipsum dolor sic amet, today at
                                                                    <a href="javascript:void(0);">12:00 PM</a>
                                                                </p>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                <i class="badge badge-dot badge-dot-xl badge-warning"></i>
                                                            </span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <p>Another meeting today, at
                                                                    <b class="text-danger">12:00 PM</b>
                                                                </p>
                                                                <p>Yet another one, at
                                                                    <span class="text-success">15:00 PM</span>
                                                                </p>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                <i class="badge badge-dot badge-dot-xl badge-danger"></i>
                                                            </span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <h4 class="timeline-title">Build the production release
                                                                </h4>
                                                                <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                                    incididunt ut labore et dolore magna elit enim at
                                                                    minim veniam quis nostrud
                                                                </p>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                <i class="badge badge-dot badge-dot-xl badge-primary"></i>
                                                            </span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <h4 class="timeline-title text-success">Something not
                                                                    important</h4>
                                                                <p>Lorem ipsum dolor sit amit,consectetur elit enim at
                                                                    minim veniam quis nostrud</p>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-animated-2" role="tabpanel">
                                    <div class="scroll-area-sm">
                                        <div class="scrollbar-container">
                                            <div class="no-results pt-3 pb-0">
                                                <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                    <div class="swal2-success-circular-line-left"
                                                        style="background-color: rgb(255, 255, 255);"></div>
                                                    <span class="swal2-success-line-tip"></span>
                                                    <span class="swal2-success-line-long"></span>
                                                    <div class="swal2-success-ring"></div>
                                                    <div class="swal2-success-fix"
                                                        style="background-color: rgb(255, 255, 255);"></div>
                                                    <div class="swal2-success-circular-line-right"
                                                        style="background-color: rgb(255, 255, 255);"></div>
                                                </div>
                                                <div class="results-subtitle">All caught up!</div>
                                                <div class="results-title">There are no system errors!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-btn text-center pt-4 pb-3 nav-item">
                                    <button class="btn-shadow btn-wide btn-pill btn btn-dark">
                                        <span class="badge badge-dot badge-dot-lg badge-warning badge-pulse">Badge</span>
                                        View All Messages
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
