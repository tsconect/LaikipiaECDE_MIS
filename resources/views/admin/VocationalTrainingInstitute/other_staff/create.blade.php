@extends('admin.app')


@section('nav-bar')

@include('admin.layouts.sidebar')
@endsection


@section('content')
    @include('flash-message')

    <div class="card-body">
        <form id="teachers" class="" action="{{ route('admin.other_vtc_staff.store') }}" method="post" enctype="multipart/form-data">
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
                        <a href="#step-5">
                            <em>3</em><span>Next of Kin</span>
                        </a>
                    </li>

                    <li>
                        <a href="#step-6">
                            <em>4</em><span>Finish</span>
                        </a>
                    </li>

                </ul>
                <div class="form-wizard-content">
                    <div id="step-1">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="first_name" class="">First Name</label>
                                    <input name="first_name" id="first_name" placeholder="John"
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="middle_name" class="">Middle Name</label>
                                    <input name="middle_name" id="middle_name" placeholder="Doe"
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="last_name" class="">Last Name</label>
                                    <input name="last_name" id="last_name" placeholder="Watt"
                                        type="text"class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="email" class="">Email</label>
                                    <input name="email" id="email" placeholder="example@xyz.com"
                                        type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="phone_number" class="">Phone</label>
                                    <input name="phone_number" id="phone_number" placeholder="07**********"
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="id_number" class="">ID Number</label>
                                    <input name="id_number" id="id_number" placeholder="33603456"
                                        type="number" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="kra_pin" class="">KRA PIN</label>
                                    <input name="kra_pin" id="kra_pin" placeholder="John"
                                          type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="gender" class="">Gender</label>
                                    <select name="gender" id="gender" class="form-control"  >
                                        <option>Select Gender</option>

                                        <option value="male">Male</option>
                                        <option value="female">Female</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="dob" class="">Date of birth</label>
                                    <input name="dob" id="dob" placeholder="D.O.B"   type="date"
                                        class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="religion" class=""> Religion: </label>
                                <select name="religion" id="religion" class="form-control"  >
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
                                    <input name="passport_photo_attachment" id="passport_photo_attachment"
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
                                    <select name="county_id" id="county_id" class="form-control"  >
                                        <option>Select County</option>
                                        <option value="Laikipia">Laikipia</option>
                                    </select>
                                </div> --}}
                                <div class="col-md-6">
                                    <label for="constituency_id" class="">Select Constituency </label>
                                    <select name="constituency_id" id="constituency_id" class="form-control"  >
                                        <option>Select Constituency</option>
                                        @foreach (App\Models\Constituency::all() as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="ward_id" class="">Select Ward </label>
                                    <select name="ward_id" id="ward_id" class="form-control"  >
                                        <option>Select Ward</option>
                                        @foreach (App\Models\Wards::all() as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>

                                </div>



                                <div class="col-md-6">
                                    <label for="sublocation_id" class="">Sub-Location </label>
                                    <select name="sublocation_id" id="sublocation_id" class="form-control"  >
                                        <option>Select Sublocation</option>
                                        @foreach (App\Models\SubLocation::all() as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="village" class="">Village</label>
                                        <input name="village" id="village" placeholder="village"
                                            type="text" class="form-control">
                                    </div>
                                </div>

                                <input name="school_id" id="school_id"  value="{{ request()->input('vtc') }}"  hidden>


                            </div>
                        </div>
                    </div>


                    <div id="step-5">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="next_kin_first_name" class="">First Name</label>
                                    <input name="next_kin_first_name" id="next_kin_first_name" placeholder="John"
                                          type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="next_kin_middle_name" class="">Middle Name</label>
                                    <input name="next_kin_middle_name" id="next_kin_middle_name" placeholder="Doe"
                                          type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="next_kin_last_name" class="">Last Name</label>
                                    <input name="next_kin_last_name" id="next_kin_last_name" placeholder="Watt"
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="next_of_kin_phone_number" class="">Phone</label>
                                    <input name="next_of_kin_phone_number" id="next_of_kin_phone_number" placeholder="07**********"
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="next_of_kin_gender" class="">Gender</label>
                                    <select name="next_of_kin_gender" id="" class="form-control"  >
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
                                          type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="next_of_kin_relationship" class="">RelationShip </label>
                                    {{-- <input name="next_of_kin_relationship" id="next_of_kin_relationship"
                                        placeholder="Relationship"   type="text" class="form-control"> --}}

                                        <select name="next_of_kin_relationship" id="next_of_kin_relationship" class="form-control"  >
                                            <option>Select next_kin_relationship</option>
                                            <option value="spouse">Spouse or Partner</option>
                                            <option value="children">Children</option>
                                            <option value="parents">Parents</option>
                                            <option value="siblings">Siblings</option>
                                            <option value="grandparents">Grandparents</option>
                                            <option value="aunts-uncles">Aunts and Uncles</option>
                                        </select>
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
