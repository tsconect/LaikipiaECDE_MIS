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

    @include('chief.sidebar')
</div>


@endsection


@section('content')
    <div class="container">
        <div class="col-12">
            <div class="row align-content-center">
                <div class="col-sm-12 col-md-12">
                    <div class="row ">
                        <div class="col-sm-12 col-md-6">
                            <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                                <div class="widget-chat-wrapper-outer">
                                    <div class="widget-chart-content">
                                        <h6 class="widget-subheading">Students</h6>
                                        <div class="widget-chart-flex">
                                            <div class="widget-numbers mb-0 w-100">
                                                <div class="widget-chart-flex">
                                                    <div class="fsize-4">
                                                        <small class="opacity-5"></small>
                                                        {{ count(App\Models\EcdeSchools::all()) }}
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
                                        <h6 class="widget-subheading">Applications</h6>
                                        <div class="widget-chart-flex">
                                            <div class="widget-numbers mb-0 w-100">
                                                <div class="widget-chart-flex">
                                                    <div class="fsize-4 text-danger">
                                                        <small class="opacity-5 text-muted"></small>
                                                        {{ count(App\Models\Teacher::all()) }}
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
                                        <h6 class="widget-subheading">Reviewed Applications</h6>
                                        <div class="widget-chart-flex">
                                            <div class="widget-numbers mb-0 w-100">
                                                <div class="widget-chart-flex">
                                                    <div class="fsize-4">
                                                   
                                                        <small class="opacity-5"></small>
                                                        {{ count(App\Models\Students::all()) }}
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div
                                                            class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                            <span class="text-success pl-2">
                                                             
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
                                        <h6 class="widget-subheading">New Applications (Unreviewed)</h6>
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
                                                            <span class="text-danger pl-2">76%</span>
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
                
            </div>
          

        </div>
    </div>
@endsection
