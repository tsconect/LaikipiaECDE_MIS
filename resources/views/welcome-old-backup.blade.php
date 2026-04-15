<?php $auth=auth()->user();
if($auth!=null){
    $layout='admin.app';
}
else{
    $layout='front.app';
}
?>

@extends($layout)


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
                        <a class="mm-active"  href="/home"  >
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
                                <a href="" >
                                    <i class="metismenu-icon "></i>All Constituencies
                                </a>
                            </li>
                            <li>
                                <a href="">
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
                                <a href="">
                                    <i class="metismenu-icon "></i>All Counties
                                </a>
                            </li>
                            <li>
                                <a href="">
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
                                <a href="">
                                    <i class="metismenu-icon "></i>All Unions
                                </a>
                            </li>
                            <li>
                                <a href="">
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
                                <a href="">
                                    <i class="metismenu-icon "></i>All Schools
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="metismenu-icon"></i>New School
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>

                    <li>
                        <a href="#"  >
                            <i class="metismenu-icon pe-7s-rocket"  ></i>ECDE Teachers
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left "></i>
                        </a>
                        <ul>
                            <li  >
                                <a  href="{{route('admin.teachers.index')}}">
                                    <i class="metismenu-icon "></i>All Teachers
                                </a>
                            </li>
                            <li >
                                <a href="{{route('admin.teachers.create')}}">
                                    <i class="metismenu-icon"></i>New Teacher
                                </a>
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

@section('content')

@if(count($applications)==0)
<style type="text/css">
    body{
        color: #000;
        background-color: #fff;
    }
</style>
<div class="alert alert-info">

<h6>Notice</h6>
<p>Thank you for  visiting laikipia cdf bursary portal, unfortunately we do not have active bursaries for applications </p>

</div>

@else

<!-- Student Registration -->
@if(session()->has('success'))
 <div class="col-12 row ">
 <div class="col-12 alert alert-success">
        {{ session()->get('success') }}
    </div>
    <br>
    <div class="col-12 alert alert-success text-center">
       <a href="/"><button class="btn btn-success">Home</button></a>
       <a href="/bursary-status-query"><button class="btn btn-success">Check Application</button></a>
    </div>
 </div>
@else
    <div style="margin: 0; height: 100%; overflow: hidden;" class="card-body">
        <h4>Bursary Application Portal</h4>
        <form class="" action="{{route('student.store')}}" method="post">
            @csrf
                <div id="smartwizard">
                    <ul class="forms-wizard">
                        <li>
                            <a href="#step-1">
                                <em>1</em><span>Student Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <em>2</em><span>Institution details</span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3">
                                <em>3</em><span>Attach Fee Structure</span>
                            </a>
                        </li>

                        <li>
                            <a href="#step-4">
                                <em>4</em><span>PARENTAL DETAILS</span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-5">
                                <em>5</em><span>Attachements</span>
                            </a>
                        </li>

                        <li>
                            <a href="#step-6">
                                <em>6</em><span>Finish</span>
                            </a>
                        </li>

                    </ul>
                    <div class="form-wizard-content">
                        <div id="step-1">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Bursay  Application Type </label>
                                        <select name="bursary_id" id="is_disabled" class="form-control" required>
                                        <!-- <option >Select Bursary Application</option> -->
                                        @foreach($applications as $key=>$value)
                                        <option value="{{$value->id}}" >{{$value->name}}</option>

                                        @endforeach

                                        </select>
                                    </div>
                                </div>

                                <hr>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="middle_name" class="">First Name</label>
                                        <input name="middle_name" id="name" placeholder="John" required type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="last_name" class="">Middle name</label>
                                        <input name="last_name" id="last_name" placeholder="Doe" required type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Surname</label>
                                        <input name="surname" id="surname" placeholder="Surname" required type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <label for="name" class="">Disabled </label>
                                        <select name="is_disabled" id="is_disabled" class="form-control" required onchange="return isDisabled()">
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3" id="plwd_number_l">
                                    <div class="position-relative form-group">
                                        <label for="plwd_number" class="">PLWD NUMBER</label>
                                        <input name="plwd_number" id="plwd_number_l_id" placeholder="Plwd Number" required type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Gender</label>
                                        <select name="student_gender" id="" class="form-control" required>
                                            <option>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="trans-gender">Transgender</option>
                                            <option value="consider-not-to-say">Consider Not To say</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">ID / Birth Certificate No</label></label>
                                        <input name="identity_number" id="identity_number" placeholder="33603456" required type="number"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Date of birth</label>
                                        <input name="dob" id="student_dob" placeholder="D.O.B" required type="date" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="step-2">
                            <div id="accordion" class="accordion-wrapper mb-3">
                                <div class="form-row">

                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="school_name" class="">School Name</label>
                                            <input name="school_name" id="school_name" placeholder="School name" required type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Level of study</label>
                                            <select name="school_type" id="school_type" class="form-control" required onChange="return schoolType()">

                                                <option value="secondary">Secondary School</option>
                                                <option value="college"> College</option>
                                                <option value="vtc">Vocational Training Center</option>
                                                <option value="tti">TTI</option>
                                                <option value="university">University</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">School category</label>
                                            <select name="school_type" id="" class="form-control" required>
                                                <option value="public">Public</option>
                                                <option value="private">Private</option>
                                                <option value="hybrid">Hybrid</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group" id="sec_select">
                                            <label for="name" class="">Classification / category</label>
                                            <select name="school_category" id="sec_select_id" class="form-control" required ob>
                                                <option>Select</option>
                                                <option value="National">National School</option>
                                                <option value="county">County School</option>
                                                <option value="subcounty">Subcounty</option>
                                                <option value="day">Day School</option>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Registration / Admission Number</label>
                                            <input name="tsc_number" id="tsc_number" placeholder="***" required type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                        <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Year of Study / Form</label>
                                            <select name="year_of_study" id="" class="form-control" required>
                                                <option>Select</option>
                                                <option value="1">1st</option>
                                                <option value="2">2nd</option>
                                                <option value="3">3rd</option>
                                                <option value="4">4th</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Study Duration</label>
                                            <select name="study_duration" id="" class="form-control" required>
                                                <option>Select</option>
                                                <option value="1">1 Year</option>
                                                <option value="2">2 Years</option>
                                                <option value="3">3 Years</option>
                                                <option value="4">4 Years</option>
                                                <option value="5">5 Years</option>
                                                <option value="6">6 Years</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">County</label>
                                            <select name="sschool_county" id="" class="form-control" required>
                                                <option>Select County</option>
                                                <option value="laikipia">Laikipia</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3" id="branch_select">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Branch Name</label>
                                            <input name="branch_name" id="branch_select_id" placeholder="Nanyuki" required type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">P.O.Box</label>
                                            <input name="box" id="school_box" placeholder="10400 - Nanyuki" required type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Contact Phone Number</label>
                                            <input name="birth_certificate" id="school_phone_number" placeholder="079----" required type="number"
                                                class="form-control">
                                        </div>
                                    </div>
                                    </div>

                            {{-- <div class="p-2 col-12 " style="background-color:#c1c1c1;">
                                    <h5>Fees  <i class="fa fa-asteric" style="tab-size: 11 px;"> Attach Fee Structure</i></h5>
                            </div>
                                <div class="form-row">


                                </div> --}}
                            </div>
                        </div>
                        <div id="step-3">
                            <div class="form-row">

                                    {{-- <label for="school_id" class="">Which school is the Teacher Posted? </label>
                                    <select name="school_id" id="" class="form-control" required>
                                        <option>Select School</option>
                                        @foreach ($ecde_schools as $value)
                                            <option value="{{ $value->id }}">{{ $value->school_name }}</option>
                                        @endforeach

                                    </select> --}}

                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Total Fees</label>
                                            <input name="total_fees" id="total_fees" placeholder="10,000" required type="number"class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Paid / Able to Pay</label>
                                            <input name="amount_paid" id="amount_paid" placeholder="1000" required type="number"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Outstanding Balance</label>
                                            <input name="balance" id="balance" placeholder="33603456" required type="number"
                                                class="form-control">
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div id="step-4">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Parental Status </label>
                                        <select name="parental_status" id="parental_status" class="form-control" required onChange="parentStatus()">
                                        <option value="">Select Parental Status</option>
                                            <option value="parents_alive">Both Parents Alive</option>
                                            <option value="father_alive">Father Alive (Mother Dead)</option>
                                            <option value="mother_alive">Mother alive (Father Dead)</option>
                                            <option value="single_mother">Single Mother</option>
                                            <option value="single_father">Single Father</option>
                                            <option value="abardoned">Abardoned</option>
                                            <option value="total_orphan">Total Orphan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Who pays Your Fees - If abandon</label>
                                        <select name="study_duration" id="" class="form-control" required>
                                            <option>Select</option>
                                            <option value="1">Guardian</option>
                                            <option value="2">Well Wishers</option>
                                            <option value="3">Sponsors</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3" id="death_cert_view">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Attach Death Certificate</label>
                                        <input name="annex_file" id="death_cert_view_id" placeholder="First Name" required type="file"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">First Name</label>
                                        <input name="parent_first_name" id="parent_first_name" placeholder="First Name" required type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Middle Name</label>
                                        <input name="parent_middle_name" id="parent_middle_name" placeholder="Middle Name" required type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Last Name</label>
                                        <input name="parent_last_name" id="parent_last_name" placeholder="Last Name" required type="text"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Phone</label>
                                        <input name="parent_phone" id="parent_phone" placeholder="07**********" required type="text"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">ID Number</label>
                                        <input name="parent_id_number" id="parent_id_number" placeholder="33603456" required type="number"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Occupation</label>
                                        <input name="parent_occupation" id="parent_occupation" placeholder="Peasant Farmer" required type="text"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="position-relative form-group">
                                    <label for="name" class="">Disabled </label>
                                    <select name="parent_status" id="parent_status" class="form-control" required onChange="return parentDisabled()">
                                    <option>Select Disability Status</option>
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </div>

                                <div class="col-md-3" id="plwd_number_parent">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">PLWD NUMBER</label>
                                        <input name="parent_plwd_id" id="plwd_number_parent_id" placeholder="Name" required type="text"
                                            class="form-control">
                                    </div>
                                </div>



                            </div>




                        </div>

                        <div id="step-5">
                            <div class="col-md-12">

                                    {{-- <div class="p-2 mb-2 mt-2" style="background-color: #c1c1c1;">
                                        <h5 >Attachements</h5>
                                    </div> --}}

                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Any Other Information / Remarks</label>
                                            <textarea class="form-control" placeholder=" Have defered my studies for 3 years due to school fees"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Attachements * Attach all Documents Combined in A single PDF (5 MB Max)</label>
                                            <input name="photo" id="photo" required type="file" class="form-control">
                                        </div>
                                    </div>

                                </div>
                        </div>

                        <div id="step-6">
                            <div class="no-results">
                                <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                    <div class="swal2-success-circular-line-left"></div>
                                    <span class="swal2-success-line-tip"></span>
                                    <span class="swal2-success-line-long"></span>
                                    <div class="swal2-success-ring"></div>
                                    <div class="swal2-success-fix"></div>
                                    <div class="swal2-success-circular-line-right"
                                        ></div>
                                </div>
                                <div class="results-subtitle mt-4">Finished!</div>
                                {{-- <div class="results-title">You arrived at the last form wizard step!</div> --}}
                                <div class="mt-3 mb-3"></div>
                                <div class="text-center">
                                    <button class="btn-shadow btn-wide btn btn-success btn-lg">Submit</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </form>

        <div class="divider"></div>
        <div style="align-self: auto !important;" class="clearfix">
            <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reset</button>
            <button type="button" id="next-btn"
                class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Next</button>
            <button type="button" id="prev-btn"
                class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Previous</button>
        </div>
    </div>


@endif
@endsection

@section('scripts')
<script>
    function isDisabled(){

        if($("#is_disabled").val()=='no'){
            $("#plwd_number_l").hide();
            $("#plwd_number_l_id").prop('required',false);
        }
        else{
            $("#plwd_number_l").show();
            $("#plwd_number_l_id").prop('required',true);
        }
    }

    function schoolType(){
        if($("#school_type").val()=='secondary'){
            $("#sec_select").show();
            $("#branch_select").hide();
            $("#branch_select_id").prop('required',false);
            $("#sec_select_id").prop('required',true);
        }
        else{
            $("#sec_select").hide();
            $("#branch_select").show();
            $("#branch_select_id").prop('required',true);
            $("#sec_select_id").prop('required',false);
        }

    }
    function parentStatus(){
        if($("#parental_status").val()=='father_alive' || $("#parental_status").val()=='mother_live' || $("#parental_status").val()=='total_orphan'  ){
            $("#death_cert_view").show();
            $("#death_cert_view_id").prop('required',true);
        }
        else{
            $("#death_cert_view").hide();
            $("#death_cert_view_id").prop('required',false);
        }
    }
    function parentDisabled (){
        if($("#parent_status").val()=='no'){
            $("#plwd_number_parent").hide();
            $("#plwd_number_parent_id").prop('required',false);

        }
        else{
            $("#plwd_number_parent").show();
            $("#plwd_number_parent_id").prop('required',true);
     }
    }
    isDisabled();
    parentDisabled();
    parentStatus();
    schoolType();
</script>
@endif

@endsection

