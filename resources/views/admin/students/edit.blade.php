@extends('admin.app')


@section('nav-bar')

@include('admin.layouts.sidebar')
@endsection


@section('content')
    @include('flash-message')

    <div class="card-body">
        <form class="" action="{{ route('admin. Students.store') }}" method="post">
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

                </ul>
                <div class="form-wizard-content">
                    <div id="step-1">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">First Name</label>
                                    <input name="name" id="first_name" placeholder="John" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Middle Name</label>
                                    <input name="name" id="middle_name" placeholder="Doe" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Last Name</label>
                                    <input name="name" id="last_name" placeholder="Watt" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Are you Differently abled?</label>
                                    <select name="disability" id="disability" class="form-control" required>
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">PLWD Number</label>
                                    <input name="plwd_number" id="plwd_number" placeholder="PLWD-TS128/2012" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Email</label>
                                    <input name="email" id="email" placeholder="example@xyz.com" required type="email"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Phone</label>
                                    <input name="phone" id="phone" placeholder="07**********" required type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">ID Number</label>
                                    <input name="id_number" id="id_number" placeholder="33603456" required type="number"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">KRA Pin</label>
                                    <input name="kra_pin" id="kra_pin" placeholder="Teacher name" required type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Gender</label>
                                    <select name="gender" id="" class="form-control" required>
                                        <option>Select Gender</option>


                                        <option value="male">Male</option>
                                        <option value="female">Female</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Date of birth</label>
                                    <input name="dob" id="dob" placeholder="D.O.B" required type="date"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Do you have TSC No.</label>
                                    <select name="gender" id="" class="form-control" required>
                                        <option value="no_tsc_number">N0</option>
                                        <option value="yes_tsc_number">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">TSC Number</label>
                                    <input name="tsc_number" id="tsc_number" placeholder="TSC/0352/3826" required type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Passport Photo (Upload size 2MB Max)</label>
                                    <input name="photo" id="photo" required type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step-2">
                        <div id="accordion" class="accordion-wrapper mb-3">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="name" class="">County Of Origin </label>
                                    <select name="const_id" id="" class="form-control" required>
                                        <option>Select County</option>
                                        <option value="">Laikipia</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="">Select Constituency </label>
                                    <select name="const_id" id="" class="form-control" required>
                                        <option>Select Constituency</option>
                                        @foreach ($constituencies as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="">Select Ward </label>
                                    <select name="ward_id" id="" class="form-control" required>
                                        <option>Select Ward</option>
                                        @foreach ($wards as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <label for="name" class="">Sub-Location </label>
                                    <select name="ward_id" id="" class="form-control" required>
                                        <option>Select Sublocation</option>
                                        <option value="">Gatirima</option>

                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Village</label>
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

                                <label for="school_id" class="">Which school is the Teacher Posted? </label>
                                <select name="school_id" id="" class="form-control" required>
                                    <option>Select School</option>
                                    @foreach ($ecde_schools as $value)
                                        <option value="{{ $value->id }}">{{ $value->school_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="step-4">
                        <div class="form-row">

                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Education Level</label>
                                    <select name="education_level" id="" class="form-control" required>
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
                                    <label for="name" class="">Academic Certificates (Upload size 5MB Max Combined as
                                        one PDF)</label>
                                    <input name="certificate" id="certificates" required type="file" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="position-relative form-group ">
                                    <label for="name" class="">Union *(are you a member any Union)</label>
                                    <div class="row">
                                        @foreach (\App\Models\Unions::get() as $value)
                                            <div class="form-check pl-5">
                                                <input class="form-check-input" type="checkbox" value="{{ $value->id }}"
                                                    id="flexCheckChecked{{ $value->id }}" name="unions[]">
                                                <label class="form-check-label" for="flexCheckChecked{{ $value->id }}">
                                                    {{ $value->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="form-check pl-5">
                                            <input type="checkbox" class="form-check-input" name="None" id="none">
                                            <label>None</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="step-5">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">First Name</label>
                                    <input name="next_kin_name" id="next_kin_first_name" placeholder="John" required
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Middle Name</label>
                                    <input name="next_kin_name" id="next_kin_middle_name" placeholder="Doe" required
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Last Name</label>
                                    <input name="next_kin_name" id="next_kin_last_name" placeholder="Watt" required
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Phone</label>
                                    <input name="next_kin_phone" id="next_kin_phone" placeholder="07**********" required
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Gender</label>
                                    <select name="next_kin_gender" id="" class="form-control" required>
                                        <option>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="name" class="">ID Number</label>
                                    <input name="next_kin_id_number" id="next_kin_id_number" placeholder="33603456" required
                                        type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="name" class="">RelationShip </label>
                                    <input name="next_kin_relationship" id="next_kin_relationship" placeholder="Relationship"
                                        required type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <button class="mt-5 btn btn-success col-12 ">Submit</button>

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
