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
                        <i class="metismenu-icon pe-7s-rocket"></i>Constituencies
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li  >
                            <a href="{{route('admin.const.all')}}" >
                                <i class="metismenu-icon "></i>All Constituencies
                            </a>
                        </li>
                        <li  >
                            <a  href="{{route('admin.const.create')}}">
                                <i class="metismenu-icon"></i>New Constituency
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-rocket"></i>Counties
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.county.all')}}">
                                <i class="metismenu-icon "></i>All Counties
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.county.create')}}">
                                <i class="metismenu-icon"></i>New County
                            </a>
                        </li>

                    </ul>
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
                            <a href="{{route('admin.school.all')}}">
                                <i class="metismenu-icon "></i>All Schools
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.feeder_school.all')}}">
                                <i class="metismenu-icon "></i>Feeder Schools
                            </a>
                        </li>

                        <li  >
                            <a  href="{{route('admin.school.create')}}">
                                <i class="metismenu-icon"></i>New School
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
                            <a   href="{{route('admin.teachers.all')}}">
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
                            <a     href="{{ url('admin/ecde_students?ecde=') }}">
                                <i class="metismenu-icon "></i>Ecde Students
                            </a>
                        </li>
                        <li  >
                            <a  href="{{ url('admin/ecde_students?vtc=') }}">
                                <i class="metismenu-icon"></i>VTC Students
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-rocket"></i>Vocation Training Institutes
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li class="mm-active">
                            <a class="mm-active" href="{{ route('admin.vtc.all') }}">
                                <i class="metismenu-icon "></i>All VTC
                            </a>



                        </li>
                        <li class="mm-active">
                            <a class="mm-active" href="{{ route('admin.vtc.create') }}">
                                <i class="metismenu-icon"></i>New VTC
                            </a>
                        </li>

                        {{-- Deparments --}}
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-rocket"></i>Deparments
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('admin.vtc_dept.all') }}">
                                        <i class="metismenu-icon "></i>All Deparments
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('admin.vtc_dept.create') }}">
                                        <i class="metismenu-icon"></i>New Deparments
                                    </a>
                                </li>

                                {{-- VTC Courses --}}
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-rocket"></i> VTC Courses
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('admin.vtc_courses.all') }}">
                                                <i class="metismenu-icon "></i>All Courses
                                            </a>

                                        </li>
                                        <li>
                                            <a href="{{ route('admin.vtc_courses.create') }}">
                                                <i class="metismenu-icon"></i>New Courses
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                            </ul>
                        </li>
                        {{-- VTC Teachers --}}
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-rocket"></i>VTC Teachers
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('admin.vtc_teachers.all')}}">
                                        <i class="metismenu-icon "></i>All VTC Teachers
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('admin.vtc_teachers.create')}}">
                                        <i class="metismenu-icon"></i>New VTC Teacher
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>

                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-rocket"></i>Bursary Applications
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.bursary.application.all')}}">
                                <i class="metismenu-icon "></i>All Bursary Application
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.bursary.application.create')}}">
                                <i class="metismenu-icon"></i>New Bursary Application
                            </a>
                        </li>

                    </ul>
                </li>
                      <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-rocket"></i>Communication
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.bursary.application.all')}}">
                                <i class="fa fa-email"></i>Compose New Message
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.bursary.application.create')}}">
                                <i class="metismenu-icon"></i>Analytics
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-browser"></i>Disbursement Bursaries
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="pages-login.html">
                                <i class="metismenu-icon"></i> Awaiting Disbursement
                            </a>
                        </li>
                        <li>
                            <a href="pages-login-boxed.html">
                                <i class="metismenu-icon"></i>Allocated Bursaries
                            </a>
                        </li>
                        <li>
                            <a href="pages-register.html">
                                <i class="metismenu-icon"></i>Disqualified Bursaries
                            </a>
                        </li>
                        <li>
                            <a href="pages-register-boxed.html">
                                <i class="metismenu-icon"></i>All Allocations
                            </a>
                        </li>
                        <li>
                            <a href="pages-forgot-password.html">
                                <i class="metismenu-icon"></i>Forgot Password
                            </a>
                        </li>
                        <li>
                            <a href="pages-forgot-password-boxed.html">
                                <i class="metismenu-icon"></i>Forgot Password Boxed
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>

@endsection

@section('title', 'Barriers & Roadblocks')
@section('content')


    @include('flash-message')




    <div class="main-card mb-3 card col-12">
        <div class="card-body">
            <h5 class="card-title">Vocational Course Details</h5>
            <form class="" action="{{ route('admin.vtc_courses.store') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="vtc_id" class="">vtc </label>
                            <select name="vtc_id" id="vtc_id" class="form-control" required>
                                <option>Select VTC</option>
                                @foreach (App\Models\VTC::all() as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach

                            </select>

                            {{-- <input name="vtc_id" id="vtc_id" placeholder="Select VTC " required type="text"
                                class="form-control"> --}}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="vtc_id" class="">vtc department </label>
                            <select name="vtc_dpt_id" id="vtc_dpt_id" class="form-control" required>
                                <option>Select vtc department</option>
                                @foreach (App\Models\VTCDepartments::all() as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                                @endforeach

                            </select>

                            {{-- <input name="vtc_id" id="vtc_id" placeholder="Select VTC " required type="text"
                                class="form-control"> --}}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="course_name" class="">course_name</label>
                            <input name="course_name" id="course_name"
                                placeholder="Enter course_name" required type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="duration" class="">duration</label>
                            <input name="duration" id="duration" placeholder="Enter duration"
                                required type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                    <div class="position-relative form-group">
                            <label for="capacity" class="">capacity</label>
                            <input name="capacity" id="capacity" placeholder="Enter capacity"
                                required type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="registration_code" class="">registration_code</label>
                            <input name="registration_code" id="registration_code" placeholder="Enter registration_code"
                                required type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="examination_body_or_creteria" class="">examination_body_or_creteria</label>
                            <input name="examination_body_or_creteria" id="examination_body_or_creteria" placeholder="Enter examination_body_or_creteria"
                                required type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="addtional_description" class="">addtional_description</label>
                            <input name="addtional_description" id="addtional_description" placeholder="Enter addtional_description"
                                required type="text" class="form-control">
                        </div>
                    </div>



                </div>

                <button class="mt-2 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


@endsection
