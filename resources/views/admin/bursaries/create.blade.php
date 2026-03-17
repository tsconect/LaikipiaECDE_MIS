@extends('backoffice.layouts.app')

@section('nav-bar')<div class="app-sidebar sidebar-shadow">
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
<div class="p-2 btn-success">
        <h5 >Bursary Batch</h5>
    </div>
<div class="main-card mb-3 card col-12">

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="card-body">
        <form class="" action="{{route('admin.bursary.application.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">New Finacial Yeal  Busary Opening</label>
                        <input name="name" id="name" placeholder="2023/GOVERNOR'S/BURSARY" required type="text"
                            class="form-control">
                    </div>
                </div>
            </div>

            <button class="mt-2 btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection
