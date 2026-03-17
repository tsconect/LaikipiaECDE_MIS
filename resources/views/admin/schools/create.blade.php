@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')
@endsection


@section('content')
    @include('flash-message')

    <div class="card-body">
        <form  class="" action="{{ route('admin.school.store') }}" method="post">
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
                                    <label for="feeder_id" class="">Feeder School </label>

                                        <select name="feeder_id" id="feeder_id" class="form-control">
                                            @foreach (App\Models\FeederSchools::all() as $key => $value)
                                                <option value="{{ $value->id ?? null }}">{{ $value->school_name }}</option>
                                            @endforeach

                                        </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="school_name" class="">School Name</label>
                                    <input name="school_name" id="school_name" placeholder="Enter School name" required
                                        type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="number_of_classes" class="">Number of class Rooms</label>
                                    <input name="number_of_classes" id="number_of_classes" placeholder="3" required
                                        type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="class_rooms_status" class=""> Class Rooms Status </label>
                                    <select name="class_rooms_status" id="class_rooms_status" class="form-control" required>
                                        <option value="permanent">Permanent</option>
                                        <option value="Semi_Permanent">Semi Permanent</option>
                                        <option value="one_semipermanent_others_permanent">One Semi-Permanent, Others
                                            Permanent
                                        </option>
                                        <option value="temporary">Temporary</option>
                                        <option value="mud_walled">Mud Walled</option>
                                        <option value="under_tree">Under Tree</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="constituency" class="">Select Constituency </label>
                                    <select name="constituency" id="constituency" class="form-control" required>
                                        <option>Select Constituency</option>
                                        @foreach ($constituencies as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="ward" class="">Select Ward </label>
                                    <select name="ward" id="consituency" class="form-control" required>
                                        <option>Select Ward</option>
                                        @foreach ($wards as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="school_name" class="">Number of students:</label>
                                    <input name="number_of_students" id="number_of_students" placeholder="Enter School name" required
                                        type="text" class="form-control">
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="number_of_teachers" class="">Number of Teachers:</label>
                                    <input name="number_of_teachers" id="number_of_teachers" placeholder="Number of Teachers:" required
                                        type="text" class="form-control">
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <label>School Location</label> <span><button onclick="getCurrentLocation()"
                                        class="btn-danger">Get Current Location</button></span>

                            </div>

                            <div class="col-12">
                                <div class="">
                                    <label for="remarks"> Remarks</label>
                                    <textarea name="remarks" class=" form-control col-12" placeholder="Built on a public land" id="remarks" colspan="4"
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
                                        <input name="school_contact_first_name" id="school_contact_first_name"
                                            placeholder="John" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_middle_name" class="">Middle Name</label>
                                        <input name="school_contact_middle_name" id="school_contact_middle_name"
                                            placeholder="Doe" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_last_name" class="">Last Name</label>
                                        <input name="school_contact_last_name" id="school_contact_last_name"
                                            placeholder="Watt" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_designation" class=""> Designation </label>
                                        <select name="school_contact_designation" id="school_contact_designation"
                                            class="form-control" required>
                                            <option value="headeteacher">Headteacher</option>
                                            <option value="deputy_headteacher">Deputy Headteacher</option>
                                            <option value="senior_master">Senior Master</option>
                                            <option value="ecde_teacher">ECDE Teacher</option>
                                            <option value="bom_representative">BOM Representative</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
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
                                    <div class="position-relative form-group">
                                        <label for="school_contact_id_number" class="">ID Number</label>
                                        <input name="school_contact_id_number" id="school_contact_id_number"
                                            placeholder="33811804" required type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="school_contact_phone_number" class="">Phone Number</label>
                                        <input name="school_contact_phone_number" id="school_contact_phone_number"
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
                                <button type="submit" class="btn-shadow btn-wide btn btn-success btn-lg">Register</button>
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

