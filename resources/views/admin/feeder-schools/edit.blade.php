@extends('admin.app')


@section('nav-bar')

@include('admin.layouts.sidebar')
@endsection


@section('content')
    @include('flash-message')

    <div class="card-body">
        <h5>Edit {{ $school->school_name }} school... </h5>
        <form  class="" action="{{ route('admin.feeder-schools.update', $school->id) }}" method="post">
            @csrf
            @method('PUT')
            <div id="smartwizard">
                <ul class="forms-wizard">
                    <li>
                        <a href="#step-1">
                            <em>1</em><span>School Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-2">
                            <em>2</em><span>School Contacts Details</span>
                        </a>
                    </li>

                    <li>
                        <a href="#step-3">
                            <em>3</em><span>Register</span>
                        </a>
                    </li>


                </ul>

                <div class="form-wizard-content">


                    <div id="step-1">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="school_name" class="">School Name</label>
                                    <input value="{{ $school->school_name }}"  name="school_name" id="school_name" placeholder="Enter School name" required
                                        type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="number_of_classes" class="">Number of class Rooms</label>
                                    <input  value="{{ $school->number_of_classes }}" name="number_of_classes" id="number_of_classes" placeholder="3" required
                                        type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="class_rooms_status" class=""> Class Rooms Status </label>
                                    <select name="class_rooms_status" id="class_rooms_status" class="form-control" required>
                                        <option value="permanent" {{ $school->class_rooms_status == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                        <option value="Semi_Permanent" {{ $school->class_rooms_status == 'Semi_Permanent' ? 'selected' : '' }}>Semi Permanent</option>
                                        <option  value="one_semipermanent_others_permanent" {{ $school->class_rooms_status == 'one_semipermanent_others_permanent' ? 'selected' : '' }}>One Semi-Permanent, Others Permanent</option>
                                        <option value="temporary" {{ $school->class_rooms_status == 'temporary' ? 'selected' : '' }}>Temporary</option>
                                        <option value="mud_walled" {{ $school->class_rooms_status == 'mud_walled' ? 'selected' : '' }} >Mud Walled</option>
                                        <option  value="under_tree" {{ $school->class_rooms_status == 'under_tree' ? 'selected' : '' }}>Under Tree</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="number_of_students" class="">Number of students</label>
                                    <input name="number_of_students" id="number_of_students" placeholder="Enter number of students" value="{{ $school->number_of_students }}"
                                        type="number" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="school_location" class="">School Location (Latitude, Longitude)</label>
                                    <input name="school_location" id="school_location" placeholder="Enter School location in terms of latitude, longitude e.g. 37.7749, -122.4194" value="{{ $school->school_location }}"
                                        type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="teacher_id" class="">Teacher in Charge</label>
                                    <select name="teacher_id" id="teacher_id" class="form-control">
                                        <option value="">Select teacher</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id ?? null }}" {{ $school->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->user->first_name ?? null }} {{ $teacher->user->last_name ?? null }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">County</label>
                                <select name="county_id" id="countySelect" class="form-control">
                                    <option value="">Select county</option>
                                    @foreach($counties as $county)
                                        <option value="{{ $county->county_id }}" {{ $school->county_id == $county->county_id ? 'selected' : '' }}>{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Sub-County</label>
                                <select name="subcounty_id" id="constituencySelect" class="form-control">
                                    <option value="">Select sub-county</option>
                                    @foreach($sub_counties as $sub_county)
                                        <option value="{{ $sub_county->constituency_id }}" {{ $school->subcounty_id == $sub_county->constituency_id ? 'selected' : '' }}>{{ $sub_county->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Ward</label>
                                <select name="ward_id" id="wardSelect" class="form-control">
                                    <option value="">Select ward</option>
                                    @foreach($wards as $ward)
                                        <option value="{{ $ward->id }}" {{ $school->ward_id == $ward->id ? 'selected' : '' }}>{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>School Location (Coordinates)</label> <span><button type="button" onclick="getCurrentLocation()"
                                        class="btn-danger">Get Current Location</button></span>
                            </div>
                            <div class="col-12">
                                <div class="">
                                    <label for="remarks"> Remarks</label>
                                    <textarea  name="remarks" class=" form-control col-12" placeholder="{{ $school->remarks }}" id="remarks" colspan="4"
                                        style="width: 100%;"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="step-2">
                        <div id="accordion" class="accordion-wrapper mb-3">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_first_name" class="">First Name</label>
                                        <input value="{{$school->school_contact_first_name}}" name="school_contact_first_name" id="school_contact_first_name"
                                            placeholder="John" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_middle_name" class="">Middle Name</label>
                                        <input value="{{$school->school_contact_middle_name}}"  name="school_contact_middle_name" id="school_contact_middle_name"
                                            placeholder="Doe" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_last_name" class="">Last Name</label>
                                        <input value="{{$school->school_contact_last_name}}" name="school_contact_last_name" id="school_contact_last_name"
                                            placeholder="Watt" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_designation" class=""> Designation </label>
                                        <select name="school_contact_designation" id="school_contact_designation"
                                            class="form-control" required>
                                            <option value="headeteacher" >Headteacher</option>
                                            <option value="deputy_headteacher">Deputy Headteacher</option>
                                            <option value="senior_master">Senior Master</option>
                                            <option value="ecde_teacher">ECDE Teacher</option>
                                            <option value="bom_representative">BOM Representative</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_tsc_number" class="">TSC Number</label>
                                        <input  value="{{$school->school_contact_tsc_number}}" name="school_contact_tsc_number" id="school_contact_tsc_number"
                                            placeholder="TSC Number" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_id_number" class="">ID Number</label>
                                        <input  value="{{$school->school_contact_id_number}}" name="school_contact_id_number" id="school_contact_id_number"
                                            placeholder="33811804" required type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_phone_number" class="">Phone Number</label>
                                        <input value="{{$school->school_contact_phone_number}}" name="school_contact_phone_number" id="school_contact_phone_number"
                                            placeholder="0791799466" required type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_gender" class=""> Gender </label>
                                        <select name="school_contact_gender" id="" class="form-control"
                                            required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="none">Consider Not to Say</option>
                                        </select>
                                    </div>
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
                                <div class="swal2-success-circular-line-right"
                                    ></div>
                            </div>
                            <div class="results-subtitle mt-4">Finished!</div>
                            <div class="results-title">You arrived at the last form wizard step!</div>
                            <div class="mt-3 mb-3"></div>
                            <div class="text-center">
                                <button class="btn-shadow btn-wide btn btn-success btn-lg">Upate Item</button>
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
