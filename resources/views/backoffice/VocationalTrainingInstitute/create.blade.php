@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')

@endsection

@section('title', 'Barriers & Roadblocks')
@section('content')


    @include('flash-message')




    <div class="main-card mb-3 card col-12">
        <div class="card-body">
            <h5 class="card-title">Vocational Training Institute Details</h5>
            <form class="" action="{{ route('admin.vtc.store') }}" method="post">
                @csrf



                <div class="card-body">
                    <form id="teachers" class="" action="{{ route('admin.teachers.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="smartwizard">
                            <ul class="forms-wizard">
                                <li>
                                    <a href="#step-1">
                                        <em>1</em><span>School Details</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <em>2</em><span>Schoo Contact Details</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#step-3">
                                        <em>6</em><span>Finish</span>
                                    </a>
                                </li>

                            </ul>
                            <div class="form-wizard-content">
                                <div id="step-1">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="name" class="">Name</label>
                                                <input name="name" id="name" placeholder="Enter VTC name"
                                                    required type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="registration_number"
                                                    class="">registration_number</label>
                                                <input name="registration_number" id="registration_number"
                                                    placeholder="Enter registration_number" required type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="area_in_hectares" class="">area_in_hectares</label>
                                                <input name="area_in_hectares" id="area_in_hectares"
                                                    placeholder="Enter area_in_hectares" required type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="legal_ownership" class="">legal_ownership</label>
                                                <input name="legal_ownership" id="legal_ownership"
                                                    placeholder="Enter legal_ownership" required type="text"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="infrastracture" class="">infrastracture</label>
                                                <input name="infrastracture" id="infrastracture"
                                                    placeholder="Enter infrastracture" required type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-2">
                                    <div class="form-row">
                                        <div class="col-6">

                                            <div  class="position-relative form-group">
                                                <label for="designation" class="">designation</label>
                                                {{-- <input name="designation" id="designation" placeholder="Enter designation" required
                                                type="text" class="form-control"> --}}

                                                <select name="designation" id="designation" class="form-control">
                                                    <option value="Principle">Principle</option>
                                                    <option value="Deputy Principle">Deputy Principle</option>
                                                    <option value="Teacher">Teacher</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div  class="position-relative form-group">
                                                <label for="first_name" class="">first_name</label>
                                                <input name="first_name" id="first_name" placeholder="Enter first_name"
                                                    required type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="position-relative form-group">
                                                <label for="middle_name" class="">middle_name</label>
                                                <input name="middle_name" id="middle_name"
                                                    placeholder="Enter middle_name" required type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="position-relative form-group">
                                                <label for="last_name" class="">last_name</label>
                                                <input name="last_name" id="last_name" placeholder="Enter last_name"
                                                    required type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="id_number" class="">id_number</label>
                                                <input name="id_number" id="id_number" placeholder="Enter id_number"
                                                    required type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="kra_pin" class="">Name</label>
                                                <input name="kra_pin" id="kra_pin" placeholder="Enter kra_pin" required
                                                    type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="phone_number" class="">phone_number</label>
                                                <input name="phone_number" id="phone_number"
                                                    placeholder="Enter phone_number" required type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="has_tsc" class=""> Has TSC NUMBER: </label>
                                            <select onchange="hasTsc()" name="has_tsc" id="has_tsc"
                                                class="form-control" required>
                                                <option value="0">No.</option>
                                                <option value="1">Yes.</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="school_contact_tsc_number" class="">TSC Number</label>
                                                <input name="school_contact_tsc_number" id="school_contact_tsc_number"
                                                    placeholder="TSC Number" required type="text" class="form-control"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="p_o_box" class="">p_o_box</label>
                                                <input name="p_o_box" id="p_o_box" placeholder="Enter p_o_box" required
                                                    type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="step-3">
                                    <div class="no-results">
                                        <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                            <div class="swal2-success-circular-line-left"></div>
                                            <span class="swal2-success-line-tip"></span>
                                            <span class="swal2-success-line-long"></span>
                                            <div class="swal2-success-ring"></div>
                                            <div class="swal2-success-fix"></div>
                                            <div class="swal2-success-circular-line-right"></div>
                                        </div>
                                        <div class="results-subtitle mt-4">Finished!</div>
                                        {{-- <div class="results-title">You arrived at the last form wizard step!</div> --}}
                                        <div class="mt-3 mb-3"></div>
                                        <div class="text-center">
                                            <button type="submit" form="teachers" value="submit"
                                                class="btn-shadow btn-wide btn btn-success btn-lg">Register new
                                                Teacher</button>
                                        </div>
                                    </div>
                                </div>



                            </div>
                    </form>
                </div>
                <div class="divider"></div>
                <div class="clearfix">
                    <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reset</button>
                    <button type="button" id="next-btn"
                        class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Next</button>
                    <button type="button" id="prev-btn"
                        class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Previous</button>
                </div>

        </div>
        <button class="mt-2 btn btn-primary">Submit</button>
        </form>
    </div>
    </div>


@endsection
