@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')

@endsection


@section('content')
    @include('flash-message')

    <div class="card-body">
        <form id="teachers" class="" action="{{ route('admin.students.store') }}" method="post">
            @csrf
                <div id="smartwizard">
                <ul class="forms-wizard">
                    <li>
                        <a href="#step-1">
                            <em>1</em><span>Personal Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-2">
                            <em>2</em><span>Student Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-3">
                            <em>3</em><span>School Details</span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="#step-4">
                            <em>4</em><span>Education Background & Unions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-5">
                            <em>5</em><span>Next of Kin</span>
                        </a>
                    </li> --}}

                    <li>
                        <a href="#step-6">
                            <em>6</em><span>Finish</span>
                        </a>
                    </li>

                </ul>
                <div class="form-wizard-content">

            {{-- $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name'); --}}
                    <div id="step-1">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="first_name" class="">First Name</label>
                                    <input name="first_name" id="first_name" placeholder="John" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="middle_name" class="">Middle Name</label>
                                    <input name="middle_name" id="middle_name" placeholder="Doe" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="last_name" class="">Last Name</label>
                                    <input name="last_name" id="last_name" placeholder="Watt" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Are you Differently abled?</label>
                                    <select onchange="hasDisability()"  name="disability" id="disability" class="form-control" required>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="plwd_number" class="">PLWD Number</label>
                                    <input name="plwd_number" id="plwd_number" placeholder="PLWD-TS128/2012"
                                        type="text"class="form-control" disabled >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="email" class="">Email</label>
                                    <input name="email" id="email" placeholder="example@xyz.com" required type="email"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="gender" class="">Gender</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option>Select Gender</option>

                                        <option value="male">Male</option>
                                        <option value="female">Female</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="dob" class="">Date of birth</label>
                                    <input name="dob" id="dob" placeholder="D.O.B" required type="date"
                                        class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="photo" class="">Passport Photo (Upload size 2MB Max)</label>
                                    <input name="photo" id="photo" required type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step-2">
                        <div id="accordion" class="accordion-wrapper mb-3">
                            <div class="form-row">

                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="reg_no" class="">Registration Number:</label>
                                        <input name="reg_no" id="reg_no" placeholder="Registration Number:" required type="text"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="stundent_type_id" class="">Student Category</label>
                                    <select name="stundent_type_id" id="stundent_type_id" class="form-control" required>
                                        <option>Student Category</option>
                                        @foreach (App\Models\StudentType::all() as $_)

                                        <option value="{{ $_->id }}">{{ $_->student_type_name }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <label for="county_id" class="">County Of Origin </label>
                                    <select name="county_id" id="county_id" class="form-control" required>
                                        <option>Select County</option>
                                        <option value="Laikipia">Laikipia</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="const_id" class="">Select Constituency </label>
                                    <select name="const_id" id="const_id" class="form-control" required>
                                        <option>Select Constituency</option>
                                        @foreach ($constituencies as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="ward_id" class="">Select Ward </label>
                                    <select name="ward_id" id="ward_id" class="form-control" required>
                                        <option>Select Ward</option>
                                        @foreach ($wards as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <label for="sub_location_id" class="">Sub-Location </label>
                                    <select name="sub_location_id" id="sub_location_id" class="form-control" required>
                                        <option>Select Sublocation</option>
                                        @foreach (App\Models\SubLocation::all() as $_)

                                        <option value="{{ $_->id }}">{{ $_->name }}</option>
                                        @endforeach

                                    </select>

                                </div>



                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="village" class="">Village</label>
                                        <input name="village" id="village" placeholder="village" required type="text"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="step-3">
                        <div class="form-row">
                            <div class="col-md-6">

                                <label for="school_id" class="">Which school does the student attend? </label>
                                <select name="school_id" id="school_id" class="form-control" required>
                                    <option>Select School</option>
                                    @foreach ($ecde_schools as $value)
                                        <option value="{{ $value->id }}">{{ $value->school_name }}</option>
                                    @endforeach

                                </select>
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
                                <button  type="submit" form="teachers" value="submit" class="btn-shadow btn-wide btn btn-success btn-lg">Register</button>
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


@endsection


