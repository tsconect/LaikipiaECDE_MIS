@extends('admin.app')


@section('nav-bar')

@include('admin.layouts.sidebar')
@endsection


@section('content')
    @include('flash-message')

    <div class="card-body">
        <form id="teachers" class="" action="{{ route('admin.teachers.store') }}" method="post" enctype="multipart/form-data">
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
                                    <select onchange="hasDisability()" name="disability" id="disability"
                                        class="form-control" required>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="plwd_number" class="">PLWD Number</label>
                                    <input name="plwd_number" id="plwd_number" placeholder="PLWD-TS128/2012"
                                        type="text"class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col-md-3 p-4">
                                <div class="position-relative form-group">
                                    <label for="ethnicity">Select an ethnic group:</label>
                                    <select id="ethnicity" name="ethnicity">
                                        <option value="ameru">Ameru</option>
                                        <option value="bajuni">Bajuni</option>
                                        <option value="bukusu">Bukusu</option>
                                        <option value="burji">Burji</option>
                                        <option value="chonyi">Chonyi</option>
                                        <option value="dabarre">Dabarre</option>
                                        <option value="digo">Digo</option>
                                        <option value="duruma">Duruma</option>
                                        <option value="embu">Embu</option>
                                        <option value="garreh-ajuran">Garreh-Ajuran</option>
                                        <option value="giryama">Giryama</option>
                                        <option value="idakho">Idakho</option>
                                        <option value="isiolo">Isiolo</option>
                                        <option value="isukha">Isukha</option>
                                        <option value="kalenjin">Kalenjin</option>
                                        <option value="kambe">Kambe</option>
                                        <option value="kamboyo">Kamboyo</option>
                                        <option value="kamba">Kamba</option>
                                        <option value="kikuyu">Kikuyu</option>
                                        <option value="kilifi">Kilifi</option>
                                        <option value="kisii">Kisii</option>
                                        <option value="kuria">Kuria</option>
                                        <option value="lamu">Lamu</option>
                                        <option value="luhya">Luhya</option>
                                        <option value="luo">Luo</option>
                                        <option value="maasai">Maasai</option>
                                        <option value="mijikenda">Mijikenda</option>
                                        <option value="meru">Meru</option>
                                        <option value="mbeere">Mbeere</option>
                                        <option value="orma">Orma</option>
                                        <option value="pokomo">Pokomo</option>
                                        <option value="rendille">Rendille</option>
                                        <option value="sabaot">Sabaot</option>
                                        <option value="samburu">Samburu</option>
                                        <option value="somali">Somali</option>
                                        <option value="swahili">Swahili</option>
                                        <option value="taita">Taita</option>
                                        <option value="taveta">Taveta</option>
                                        <option value="teso">Teso</option>
                                        <option value="tharaka">Tharaka</option>
                                        <option value="turkana">Turkana</option>
                                        <option value="watta">Watta</option>
                                        <option value="wanga">Wanga</option>
                                        <option value="watha">Watha</option>
                                        <option value="yaaku">Yaaku</option>
                                        <option value="yawuru">Yawuru</option>
                                        <option value="zaramo">Zaramo</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="email" class="">Email</label>
                                    <input name="email" id="email" placeholder="example@xyz.com" required
                                        type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="phone" class="">Phone</label>
                                    <input name="phone" id="phone" placeholder="07**********" required
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
                                        <option value="Gatirima">Gatirima</option>

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
                            <div class="col-md-6">

                                <label for="school_id" class="">Which school is the Teacher Posted? </label>
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
                                    <label for="certificate" class="">Academic Certificates (Upload size 5MB Max
                                        Combined as
                                        one PDF)</label>
                                    <input name="certificate" id="certificates" required type="file"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="date_of_first_appointment" class="">Date of_first_appointment</label>
                                    <input name="date_of_first_appointment" id="date_of_first_appointment" placeholder="D.O.B" required type="date"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3 p-2">
                                <div class="position-relative form-group">
                                    <label for="terms_of_engagement" class="">terms_of_engagement</label>
                                    {{-- <input name="terms_of_engagement" id="terms_of_engagement" placeholder="terms_of_engagement" required type="text"
                                        class="form-control"> --}}
                                        <select name="terms_of_engagement" id="terms_of_engagement" placeholder="terms_of_engagement" >
                                            <option>Select terms_of_engagement</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Permanent and pensionable">Permanent and pensionable</option>
                                            <option value="Casual">Casual</option>
                                            <option value="Undefined">Undefined</option>
                                        </select>
                                </div>
                            </div>

                            <div class="col-md-3 p-2">
                                <div class="position-relative form-group">
                                    <label for="job_group" class="">Job Group</label>
                                    {{-- <input name="job_group" id="job_group" placeholder="job_group" required type="text"
                                        class="form-control"> --}}
                                        <select name="job_group" id="job_group" placeholder="job_group" >
                                            <option>Select Job Group</option>
                                            <option value="K">Job Group K</option>
                                            <option value="L">Job Group L</option>
                                            <option value="M">Job Group M</option>
                                            <option value="N">Job Group N</option>
                                            <option value="O">Job Group O</option>
                                            <option value="P">Job Group P</option>
                                            <option value="Q">Job Group Q</option>
                                            <option value="R">Job Group R</option>
                                          </select>
                                </div>
                            </div>

                            {{-- //new fields --}}
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="ippd_number" class="">ippd_number</label>
                                    <input name="ippd_number" id="ippd_number" placeholder="ippd_number" required
                                        type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-9">
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
                            </div>

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
                                    <label for="next_kin_phone" class="">Phone</label>
                                    <input name="next_kin_phone" id="next_kin_phone" placeholder="07**********" required
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="next_kin_gender" class="">Gender</label>
                                    <select name="next_kin_gender" id="" class="form-control" required>
                                        <option>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="next_kin_id_number" class="">ID Number</label>
                                    <input name="next_kin_id_number" id="next_kin_id_number" placeholder="33603456"
                                        required type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="next_kin_relationship" class="">RelationShip </label>
                                    {{-- <input name="next_kin_relationship" id="next_kin_relationship"
                                        placeholder="Relationship" required type="text" class="form-control"> --}}
                                        <select name="next_kin_relationship" id="next_kin_relationship" class="form-control" required>
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
