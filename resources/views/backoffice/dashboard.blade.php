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
   

<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">General Report For {{$data->name}}</div>

                <div class="card-body">
  
    

                    <div class="col-sm-12 col-md-12">
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
                                                            <span>{{ number_format($cheques->sum('amount')) }}</span>
                                                        </div>
                                                        <div class="widget-title ml-2 opacity-5 font-size-lg text-muted">
                                                            Total Amount Disbursed</div>
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

                    <div class="row">
                        <div class="col-sm-12 col-md-4" >
                            <a class="anchor" href=" {{route ('admin.reports.bursary.rejected')}}">

                                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card" style="background-color: azure;">
                                    <div class="widget-chat-wrapper-outer" >
                                        <div class="widget-chart-content" >
                                            <h6 class="widget-subheading">Rejected Applications</h6>
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers mb-0 w-100">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5"></small>
                                                            {{ count($rejected_applications) }}
                                                        </div>
                                                        <div class="ml-auto">
                                                            <div
                                                                class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                                <span class="text-danger pl-2">{{ count($rejected_applications) / count($all_applications ) * 100}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
    
    
                        <div class="col-sm-12 col-md-4" >
                            <a class="anchor" href=" {{route ('admin.reports.bursary.approved')}}">
                                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card" style="background-color: azure;">
                                    <div class="widget-chat-wrapper-outer" >
                                        <div class="widget-chart-content" >
                                            <h6 class="widget-subheading">Approved Applications</h6>
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers mb-0 w-100">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5"></small>
                                                            {{ count( $approved_applications) }}
                                                        </div>
                                                        <div class="ml-auto">
                                                            <div
                                                                class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                                <span class="text-primary pl-2">{{ count($approved_applications) / count($all_applications ) * 100}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-12 col-md-4" >
                            <a class="anchor" href=" {{route ('admin.reports.bursary.pending')}}">

                                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card" style="background-color: azure;">
                                    <div class="widget-chat-wrapper-outer" >
                                        <div class="widget-chart-content" >
                                            <h6 class="widget-subheading">Pending Applications</h6>
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers mb-0 w-100">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5"></small>
                                                            {{ count($pending_applications) }}
                                                        </div>
                                                        <div class="ml-auto">
                                                            <div
                                                                class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                                <span class="text-success pl-2">{{ count($pending_applications) / count($all_applications ) * 100}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    
            
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
