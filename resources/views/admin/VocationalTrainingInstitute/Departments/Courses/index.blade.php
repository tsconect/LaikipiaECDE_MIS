@extends('admin.app')


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
<script>
function goBack() {
    if (document.referrer == "") {
        window.location.href = "/";
    } else {
        window.history.back();
    }
}
</script>

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

</div>

@endsection

@section('content')



<div class="card">

@include('flash-message')


<div class="card-body">
            <h5 class="card-title">Vocational Courses.</h5>

            <h5 class="card-title text-right">  <a href="{{route('admin.vtc_courses.create')}}"><button class="btn btn-warning ">  <i class="fa fa-plus"></i> Vocational Courses.</button></a> </h5>


            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>course_name</th>
                                <th>duration</th>
                                <th>examination_body_or_creteria</th>

                                <th>Date Created</th>
                                <th>Date Updated</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->course_name}}</td>
                                <td>{{$item->duration}}</td>
                                <td>{{$item->examination_body_or_creteria}}</td>

                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                <a type="button" class="btn btn-outline-primary" title="View Wards"
                                        href="{{route('admin.wards.all',$item->id)}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-outline-primary" title="Edit Constituency"
                                        href="{{url('admin/constituency/edit/'. $item->id)}}"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <!-- Button trigger modal -->

                                    <a class="btn btn-outline-primary" title="Delete Constituency"
                                        href="{{route('admin.delete-constituency', $item->id)}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>



                            @endforeach

                            </tfoot>
                    </table>
                </div>
            </div>
        </div>

</div>




@endsection
