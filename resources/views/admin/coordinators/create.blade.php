@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')
@endsection


@section('content')
    @include('flash-message')

    <div class="card-body">
        <form id="teachers" class="" action="{{ route('admin.coordinators.store') }}" method="post">
            @csrf
                <div id="smartwizard">
                <ul class="forms-wizard">
                    <li>
                        <a href="#step-1">
                            <em>1</em><span>Personal Details</span>
                        </a>
                    </li>

                    <li>
                        <a href="#step-3">
                            <em>2</em><span>School Details</span>
                        </a>
                    </li>

                    <li>
                        <a href="#step-4">
                            <em>3</em><span>Education Background & Unions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-6">
                            <em>4</em><span>Finish</span>
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
                                    <label for="phone_no" class="">phone_no</label>
                                    <input name="phone_no" id="phone_no" placeholder="phone_no" required
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
                                    <label for="id_number" class="">ID Number</label>
                                    <input name="id_number" id="id_number" placeholder="33603456" required type="number"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="kra_pin" class="">KRA Pin</label>
                                    <input name="kra_pin" id="kra_pin" placeholder="Teacher name" required type="text"
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



                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="photo" class="">Passport Photo (Upload size 2MB Max)</label>
                                    <input name="photo" id="photo" required type="file" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">

                                <label for="sub_location_id" class="">sub_location? </label>
                                <select name="sub_location_id" id="sub_location_id" class="form-control" required>
                                    <option>Select School</option>
                                    @foreach (App\Models\SubLocation::all() as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>
                    </div>

                    <div id="step-3">
                        <div class="form-row">
                            <div class="col-md-6">

                                <label for="school_id" class="">Which schools does he/she coordinate? </label>
                                <select name="school_id" id="school_id" class="form-control" required>
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
                                    <label for="certificate" class="">Academic Certificates (Upload size 5MB Max Combined as
                                        one PDF)</label>
                                    <input name="level_of_education_attachment" id="level_of_education_attachment" required type="file" class="form-control">
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
                                <button  type="submit" form="teachers" value="submit" class="btn-shadow btn-wide btn btn-success btn-lg">Register new Coordinator</button>
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


