@extends('backoffice.layouts.app')


@section('nav-bar')
@include('layouts.main_nav')
@endsection


@section('content')
    @include('flash-message')

    <div class="card-body">
        <form id="teachers" class="" action="{{ route('admin.vtc_teachers.store') }}" method="post" enctype="multipart/form-data">
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
                            <em>2</em><span>Residential Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-3">
                            <em>3</em><span>School Details</span>
                        </a>
                    </li>

                    <li>
                        <a href="#step-4">
                            <em>4</em><span>Education Background & Unions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-5">
                            <em>5</em><span>Next of Kin</span>
                        </a>
                    </li>

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
                            {{-- <div class="col-md-3">
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
                            </div> --}}
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="email" class="">Email</label>
                                    <input name="email" id="email" placeholder="example@xyz.com" required
                                        type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="phone_number" class="">Phone</label>
                                    <input name="phone_number" id="phone_number" placeholder="07**********" required
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="id_number" class="">ID Number</label>
                                    <input name="id_number" id="id_number" placeholder="33603456" required
                                        type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="kra_pin" class="">KRA Pin</label>
                                    <input name="kra_pin" id="kra_pin" placeholder="Teacher name" required
                                        type="text" class="form-control">
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
                            <div class="col-md-3">
                                <label for="has_tsc" class=""> Has TSC NUMBER: </label>
                                <select onchange="hasTsc()" name="has_tsc" id="has_tsc" class="form-control" required>
                                    <option value="0">No.</option>
                                    <option value="1">Yes.</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="school_contact_tsc_number" class="">TSC Number</label>
                                    <input name="school_contact_tsc_number" id="school_contact_tsc_number"
                                        placeholder="TSC Number" required type="text" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="religion" class=""> Religion: </label>
                                <select name="religion" id="religion" class="form-control" required>
                                    <option value="Christian">Christian.</option>
                                    <option value="Muslim">Muslim.</option>
                                    <option value="Pagan">Pagan.</option>
                                    <option value="Hiddu">Hiddu.</option>
                                    <option value="other">other.</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="passport_photo_attachment" class="">Passport Photo (Upload size 2MB
                                        Max)</label>
                                    <input name="passport_photo_attachment" id="passport_photo_attachment" required
                                        type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step-2">
                        <div id="accordion" class="accordion-wrapper mb-3">
                            <div class="form-row">
                                {{-- <div class="col-md-6">
                                    <label for="county_id" class="">County Of Origin </label>
                                    <select name="county_id" id="county_id" class="form-control" required>
                                        <option>Select County</option>
                                        <option value="Laikipia">Laikipia</option>
                                    </select>
                                </div> --}}
                                <div class="col-md-6">
                                    <label for="constituency_id" class="">Select Constituency </label>
                                    <select name="constituency_id" id="constituency_id" class="form-control" required>
                                        <option>Select Constituency</option>
                                        @foreach (App\Models\Constituency::all() as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="ward_id" class="">Select Ward </label>
                                    <select name="ward_id" id="ward_id" class="form-control" required>
                                        <option>Select Ward</option>
                                        @foreach (App\Models\Wards::all() as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <label for="sublocation_id" class="">Sub-Location </label>
                                    <select name="sublocation_id" id="sublocation_id" class="form-control" required>
                                        <option>Select Sublocation</option>
                                        @foreach (App\Models\SubLocation::all() as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="village" class="">Village</label>
                                        <input name="village" id="village" placeholder="village" required
                                            type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="step-3">
                        <div class="form-row">

                            @if (isset($vct_id))
                            <div class="col-md-6">
                                <label for="school_id" class="">Which vtc center is the Teacher Posted? </label>
                                <select name="school_id" id="school_id" class="form-control" required>
                                    <option>Select School</option>
                                    @foreach (App\Models\VTC::all() as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                                @else
                                    <input name="school_id" id="school_id"  value="{{ $vtc_id }}"  hidden>
                                @endif


                            <div class="col-md-6">

                                <label for="union_id" class="">Please select a union.</label>
                                <select name="union_id" id="union_id" class="form-control" required>
                                    <option>Select union</option>
                                    @foreach (App\Models\Unions::all() as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="step-4">
                        <div class="form-row">

                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="education_level" class="">Education Level</label>
                                    <select name="education_level" id="education_level" class="form-control" required>
                                        <option>Select Education Level</option>
                                        <option value="degree">Degree</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="certificate">Certificate</option>
                                        <option value="form four certificate">Form Four Certifcate</option>
                                        <option value="None of Above">None of Above</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="certificate" class="">Academic Certificates (Upload size 5MB Max
                                        Combined as
                                        one PDF)</label>
                                    <input name="certification_attachment" id="certification_attachment" required type="file"
                                        class="form-control">
                                </div>
                            </div>
                            {{-- <div class="col-md-9">
                                <div class="position-relative form-group ">
                                    <label for="union" class="">Union *(are you a member any Union)</label>
                                    <div class="row">
                                        @foreach (\App\Models\Unions::get() as $value)
                                            <div class="form-check pl-5">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $value->id }}" id="flexCheckChecked{{ $value->id }}"
                                                    name="union[]">
                                                <label class="form-check-label"
                                                    for="flexCheckChecked{{ $value->id }}">
                                                    {{ $value->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="form-check pl-5">
                                            <input type="checkbox" class="form-check-input" name="None"
                                                id="none">
                                            <label>None</label>
                                        </div>
                                    </div>

                                </div>
                            </div> --}}

                        </div>
                    </div>



                    <div id="step-5">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="next_kin_first_name" class="">First Name</label>
                                    <input name="next_kin_first_name" id="next_kin_first_name" placeholder="John"
                                        required type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="next_kin_middle_name" class="">Middle Name</label>
                                    <input name="next_kin_middle_name" id="next_kin_middle_name" placeholder="Doe"
                                        required type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="next_kin_last_name" class="">Last Name</label>
                                    <input name="next_kin_last_name" id="next_kin_last_name" placeholder="Watt" required
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="next_of_kin_phone_number" class="">Phone</label>
                                    <input name="next_of_kin_phone_number" id="next_of_kin_phone_number" placeholder="07**********" required
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="next_of_kin_gender" class="">Gender</label>
                                    <select name="next_of_kin_gender" id="" class="form-control" required>
                                        <option>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="next_of_kin_id_number" class="">ID Number</label>
                                    <input name="next_of_kin_id_number" id="next_of_kin_id_number" placeholder="33603456"
                                        required type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="next_of_kin_relationship" class="">RelationShip </label>
                                    <input name="next_of_kin_relationship" id="next_of_kin_relationship"
                                        placeholder="Relationship" required type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        {{-- <button type="submit"  class="mt-5 btn btn-success col-12 ">Submit</button> --}}

                    </div>

                    <div id="step-6">
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
                                    class="btn-shadow btn-wide btn btn-success btn-lg">Register new Teacher</button>
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
