@extends('frontend.app')
@section('content')

<section class="experience_section layout_padding-top layout_padding2-bottom"  style="background-color: #f5f5f5;">
    
    
    <section class="contact spad mb-4 p-4"  style="background-color: #f5f5f5;">
        <div class="container">
            <div class="row pl-4 align-items-start"> <!-- Remove 'align-items-center' class -->
                <div class="col-md-3 dashboard-menu">
                    <div class="list-group text-center">
                        <a href="{{route ('student.dashboard')}}" class="list-group-item  list-group-item-action mb-2">Dashboard</a>
                        <a href="{{ route('student.applications')}} " class="list-group-item list-group-item-action mb-2">My Applications</a>
                        <a href=" {{route('student.profile')}}" class="list-group-item list-group-item-action mb-2 active">Student Profile</a>
                        <a href=" {{route('student.account')}}" class="list-group-item list-group-item-action  mb-2">Account Details</a>
                        <a href=" {{route('student.logout')}}" class="list-group-item list-group-item-action mb-2">Log Out</a>
                    </div>
                </div>
                <div class="col-md-9 pl-3">
                    <form class="" action="{{ route('student.user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card p-4 mb-2">
                                    <p class="text-bold text-green">Update your profile with accurate information to apply for open Bursaries</p>
                                </div>
                                <div class="card p-4">

                                    <div class="container mt-2">
                                        <ul class="nav flex-column flex-sm-row nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="personal-details-tab" data-toggle="pill" href="#personal-details" role="tab" aria-controls="personal-details" aria-selected="true" >Student Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="business-details-tab" data-toggle="pill" href="#investment-details" role="tab" aria-controls="business-details" aria-selected="false" >Parental Details </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="examination-point-tab" data-toggle="pill" href="#examination-point" role="tab" aria-controls="examination-point" aria-selected="false">Institutional Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="payments-tab" data-toggle="pill" href="#payments" role="tab" aria-controls="payments" aria-selected="false">Attachments</a>
                                            </li>
                                        </ul>
                                    </div>
                                    

                                    <div class="tab-content" id="pills-tabContent">

                                        <!-- STUDENT DETAILS TAB -->
                                        <div class="tab-pane fade show active" id="personal-details" role="tabpanel" aria-labelledby="personal-details-tab">
                                            <div class="row">      
                                                <div class="col-md-12">
                                                    <div class="container mt-3">
                                                        <div class="form-row">


                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="school_name" class="">First Name</label>
                                                                    <input name="first_name" id="first_name" placeholder="First name" value="{{ old('first_name', auth()->user()->first_name) }}" required type="text" disabled
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="school_name" class="">Last Name</label>
                                                                    <input name="last_name" id="school_name" placeholder="Last name" value="{{ old('last_name', auth()->user()->last_name) }}" required type="text" disabled
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="school_name" class="">Gender</label>
                                                                    <input name="gender" id="gender" placeholder="Gender" value="{{ old('gender', auth()->user()->studentDetails->gender) }}" required class="form-control" type="text" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="school_name" class="">Email</label>
                                                                    <input name="email" id="email" placeholder="Email" required type="text"   value="{{ old('email', auth()->user()->email) }}" disabled
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="school_name" class="">Phone Number</label>
                                                                    <input name="phone_number" id="phone_number" placeholder="Phone Number" required type="text"  value="{{ old('phone_number', auth()->user()->phone_number) }}" 
                                                                        class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="school_name" class="">ID Number</label>
                                                                    <input name="id_birth_cert_no" id="id_birth_cert_no" placeholder="ID Number" required type="text"  value="{{ old('id_birth_cert_no', auth()->user()->studentDetails->id_birth_cert_no) }}" 
                                                                        class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="school_name" class="">DOB</label>
                                                                    <input name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth" required type="text"  value="{{ old('date_of_birth', auth()->user()->studentDetails->date_of_birth) }}"  
                                                                        class="form-control">
                                                                </div>
                                                            </div>

                                                            @if(\Carbon\Carbon::parse(auth()->user()->studentDetails->date_of_birth)->age > 18)

                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="kra_pin" class="">KRA Pin</label>
                                                                    <input name="kra_pin" id="kra_pin" placeholder="KRA Pin" required  type="text" value="{{ old('kra_pin', auth()->user()->studentDetails->kra_pin) }}"  class="form-control">
                                                                     
                                                                </div>
                                                            </div>
                                                            @endif
                                                           <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="religion" class="">Religion</label>
                                                                    <select name="religion"  autocomplete="off" id="religion" class="form-control" required>
                                                                        <option value="muslim" @if(auth()->user()->studentDetails->religion == 'muslim') selected @endif>Muslim</option>
                                                                        <option value="christian" @if(auth()->user()->studentDetails->religion == 'christian') selected @endif>Christian</option>
                                                                        <option value="other" @if(auth()->user()->studentDetails->religion == 'other') selected @endif>Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                            
                                                        
                                                        
                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="employment_status" class="">Employment Status</label>
                                                                    <select name="employment_status"  autocomplete="off" id="employment_status" class="form-control" required>
                                                                        <option value="employed" @if(auth()->user()->studentDetails->employment_status == 'employed') selected @endif>Employed</option>
                                                                        <option value="unemployed" @if(auth()->user()->studentDetails->employment_status == 'unemployed') selected @endif>Unemployed</option>
                                                                        <option value="self_employed" @if(auth()->user()->studentDetails->employment_status == 'self_employed') selected @endif>Self Employed</option>
                                                                        <option value="other" @if(auth()->user()->studentDetails->employment_status == 'other') selected @endif>Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="marital_status" class="">Marital Status</label>
                                                                    <select name="marital_status"  autocomplete="off" id="marital_status" class="form-control" required>
                                                                        <option value="single" @if(auth()->user()->studentDetails->marital_status == 'single') selected @endif>Single</option>
                                                                        <option value="married" @if(auth()->user()->studentDetails->marital_status == 'married') selected @endif>Married</option>
                                                                        <option value="divorced" @if(auth()->user()->studentDetails->marital_status == 'divorced') selected @endif>Divorced</option>
                                                                        <option value="widowed" @if(auth()->user()->studentDetails->marital_status == 'widowed') selected @endif>Widowed</option>
                                                                        <option value="other" @if(auth()->user()->studentDetails->marital_status == 'other') selected @endif>Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="parental_status" class="">Parental Status</label>
                                                                    <select name="parental_status"  autocomplete="off" id="parental_status" class="form-control" required onchange="updateParentalFields()">
                                                                        <option value="parents_alive" @if(auth()->user()->studentDetails->parental_status == 'parents_alive') selected @endif>Both Parents Alive</option>
                                                                        <option value="father_alive" @if(auth()->user()->studentDetails->parental_status == 'father_alive') selected @endif>Father Alive (Mother Dead)</option>
                                                                        <option value="mother_alive" @if(auth()->user()->studentDetails->parental_status == 'mother_alive') selected @endif>Mother Alive (Father Dead)</option>
                                                                        <option value="single_mother" @if(auth()->user()->studentDetails->parental_status == 'single_mother') selected @endif>Single Mother</option>
                                                                        <option value="single_father" @if(auth()->user()->studentDetails->parental_status == 'single_father') selected @endif>Single Father</option>
                                                                        <option value="total_orphan" @if(auth()->user()->studentDetails->parental_status == 'total_orphan') selected @endif>Total Orphan</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="who_pays_fees" class="">Who pays Your Fees</label>
                                                                    <select name="who_pays_fees"  autocomplete="off" id="who_pays_fees" class="form-control" required>
                                                                        <option value="Parents" @if(auth()->user()->studentDetails->who_pays_fees == 'Parents') selected @endif>Parents</option>
                                                                        <option value="Guardian" @if(auth()->user()->studentDetails->who_pays_fees == 'Guardian') selected @endif>Guardian</option>
                                                                        <option value="Well Wishers" @if(auth()->user()->studentDetails->who_pays_fees == 'Well Wishers') selected @endif>Well Wishers</option>
                                                                        <option value="Sponsors" @if(auth()->user()->studentDetails->who_pays_fees == 'Sponsors') selected @endif>Sponsors</option>
                                                                        <option value="Other" @if(auth()->user()->studentDetails->who_pays_fees == 'Other') selected @endif>Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="container text-center mt-4 mb-4">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-5 mb-2 mr-3">
                                                                <!-- <button type="button" class="btn btn-primary" style="border-radius: 40px; width: 100%; color: #fff;">Back</button> -->
                                                            </div>
                                                            <div class="col-12 col-lg-5">
                                                                <button type="button"  class="btn btn-info " style="border-radius: 10px; width: 100%; " onclick="showInvestmentDetails()">Next</button>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- PARENTS DETAILS tab -->
                                        <div class="tab-pane fade" id="investment-details" role="tabpanel" aria-labelledby="investment-details-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="container mt-3">
                                                        @if(isset(auth()->user()->studentDetails->parent->first()->parent_type) && (auth()->user()->studentDetails->parent->first()->parent_type == 'Father' || auth()->user()->studentDetails->parent->first()->parent_type == 'guardian'))
                                                        <div id="fathers-details">
                                                            <h4 id="first_parent_title" class="text-center mb-2">Fathers Details</h4>

                                                            <div class="form-row">
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">First Name</label>
                                                                        <input name="parent_first_name" id="parent_first_name" placeholder="First Name"  type="text" value="{{$student->parent->first()->first_name}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">Last Name</label>
                                                                        <input name="parent_last_name" id="parent_last_name" placeholder="Last Name"  type="text"  value="{{$student->parent->first()->last_name}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">Phone Number</label>
                                                                        <input name="parent_phone" id="parent_phone" placeholder="07**********"  type="text"  value="{{$student->parent->first()->phone}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">ID Number</label>
                                                                        <input name="parent_id_number" id="parent_id_number" placeholder="33603456"  type="number"  value="{{$student->parent->first()->parent_id_number}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">Occupation</label>
                                                                        <input name="parent_occupation" id="parent_occupation" placeholder="Teacher"  type="text"  value="{{$student->parent->first()->occupation}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">Annual Salary</label>
                                                                        <input name="parent_annual_salary" id="annual_salary" placeholder="Ksh 2000"  type="text"  value="{{$student->parent->first()->annual_salary}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="first_parent_type" id="first_parent_type" value="Father">
                                                                <div class="col-md-4">

                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="plwd_number_label">Disabled? </label>
                                                                        <select name="parent_status" id="parent_status"  autocomplete="off" class="form-control" onchange="return parentDisabled()">
                                                                            <option value="yes" @if($student->parent->first()->parent_status == 'yes') selected @endif>Yes</option>
                                                                            <option value="no" @if($student->parent->first()->parent_status == 'no') selected @endif>No</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                @if($student->parent->first()->plwd_number)

                                                                <div class="col-md-4" id="plwd_number_parent">
                                                                    <div class="position-relative form-group">
                                                                        <label for="plwd_number_parent_id" class="" id="plwd_number_label" >PLWD NUMBER</label>
                                                                        <input name="parent_plwd_id" id="plwd_number_parent_id" placeholder="Plwd Number"  type="text" style="display: none;" value="{{$student->parent->first()->plwd_number}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <hr>
                                                        </div>

                                                        @endif
                                                      
                                                            
                                                        <!-- secodn parents deatils  -->
                                                        @if(auth()->user()->studentDetails->parent->first()->parent_type == 'mother' ) 
                                                        <div id="mothers-details">
                                                            <h4 class="text-center mb-2">Mothers Details</h4>
                                                            <div  id="second_parent_details" class="form-row">
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class=""> First Name</label>
                                                                        <input name="second_parent_first_name"  placeholder="Mothers First Name"  type="text"  value="{{$student->parent->last()->first_name}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                        
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class=""> Last Name</label>
                                                                        <input name="second_parent_last_name" id="second_parent_last_name" placeholder="Mothers Last Name"  type="text" value="{{$student->parent->last()->last_name}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class=""> Phone Number</label>
                                                                        <input name="second_parent_phone" id="second_parent_phone" placeholder="07**********"  type="text" value="{{$student->parent->last()->phone}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                        
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class=""> ID Number</label>
                                                                        <input name="second_parent_id_number" id="second_parent_id_number" placeholder="30303003"  type="number" value="{{$student->parent->last()->id_number}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class=""> Occupation</label>
                                                                        <input name="second_parent_occupation" id="second_parent_occupation" placeholder="House Wife"  type="text" value="{{$student->parent->last()->occupation}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">Annual Salary</label>
                                                                        <input name="second_parent_annual_salary" id="mothers_annual_salary" placeholder="Ksh 2000"  type="text" value="{{$student->parent->last()->annual_salary}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class=""> Disabled? </label>
                                                                        <select name="second_parent_status" id="second_parent_status"  autocomplete="off" class="form-control"  onchange="return secondParentDisabled()">
                                                                            <option value="yes" @if($student->parent->last()->parent_status == 'yes') selected @endif>Yes</option>
                                                                            <option value="no" @if($student->parent->last()->parent_status == 'no') selected @endif>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                @if($student->parent->last()->plwd_number)

                                                                <div class="col-md-4" id="">
                                                                    <div class="position-relative form-group">
                                                                        <label for="plwd_number_second_parent_id" class="plwd_number_label" id="second_plwd_number_label" style="display: none;">PLWD NUMBER</label>
                                                                        <input name="second_plwd_number" id="second_parent_plwd_id" placeholder="Plwd Number"  type="text"
                                                                            class="form-control" value="{{$student->parent->last()->plwd_number}}" >
                                                                    </div>
                                                                </div>      
                                                                @endif                                    
                                                            </div>  
                                                            <hr>
                                                                
                                                        </div>
                                                        @endif
                                                       
                                                        <div class="container" id="">
                                                            <div class="form-group">
                                                            <h4 class="text-center mb-2">Sibling Details</h4>
                                                                <form name="add_name" id="add_name">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered" id="dynamic_field">
                                                                            @foreach($student->siblings as $sibling)
                                                                            <tr>
                                                                                <td><input type="text" name="sibling_name[]" id="qty1" placeholder="Name" class="form-control name_list" value="{{$sibling->name}}" /></td>
                                                                                <!-- <td><input type="date" name="dob[]" id="rate1" placeholder="DOB" class="form-control name_list" /></td> -->
                                                                                <td><input type="text" name="sibling_gender[]" id="rate1" placeholder="Gender" value="{{$sibling->gender}}"  class="form-control name_list" /></td>
                                                                                <td><input type="text" name="sibling_school[]" id="rate1" placeholder="School" value="{{$sibling->school}}"  class="form-control name_list" /></td>
                                                                                <td><input type="text" name="sibling_fees[]" id="rate1" placeholder="Fees" value="{{$sibling->fees}}"  class="form-control name_list" /></td>
                                                                                <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </table>                                  
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>        
                                            
                                            </div>
                                            <div class="container text-center mt-4 mb-4">
                                                <div class="row">
                                                    <div class="col-12 col-lg-5 mb-2 mr-3">
                                                        <button type="button" class="btn btn-primary"  style="border-radius: 10px; width: 100%; "onclick="showPersonalDetails()">Back</button>
                                                    </div>
                                                    <div class="col-12 col-lg-5">
                                                        <button type="button"class="btn btn-info " style="border-radius: 10px; width: 100%; " onclick="showExaminationPoint()">Next</button>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>

                        
                                    
                                        
                                            <!-- Institutional Details -->

                                            <div class="tab-pane fade" id="examination-point" role="tabpanel" aria-labelledby="examination-point-tab">
                                                <div class="row">      
                                                    <div class="col-md-12">
                                                        <div class="container mt-3">
                                                            <div class="form-row">
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="school_name" class="">School Name</label>
                                                                        <input name="school_name" id="school_name" value="{{$student->school->school_name}}" placeholder="School name" required type="text"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="level_of_study" class="">Level of study</label>
                                                                        <select name="level_of_study" id="level_of_study" class="form-control" required onChange="return schoolType()" autocomplete="off">
                                                                            <option value="secondary" {{ $student->school->level_of_study == 'secondary' ? 'selected' : '' }}>Secondary School</option>
                                                                            <option value="college" {{ $student->school->level_of_study == 'college' ? 'selected' : '' }}>College</option>
                                                                            <option value="vtc" {{ $student->school->level_of_study == 'vtc' ? 'selected' : '' }}>Vocational Training Center</option>
                                                                            <option value="tti" {{ $student->school->level_of_study == 'tti' ? 'selected' : '' }}>TTI</option>
                                                                            <option value="university" {{ $student->school->level_of_study == 'university' ? 'selected' : '' }}>University</option>
                                                                            <option value="other" {{ $student->school->level_of_study == 'other' ? 'selected' : '' }}>Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">School Category</label>
                                                                        <select name="school_category" id="" class="form-control" required autocomplete="off">
                                                                            <option value="public" {{ $student->school->school_category == 'public' ? 'selected' : '' }}>Public</option>
                                                                            <option value="private" {{ $student->school->school_category == 'private' ? 'selected' : '' }}>Private</option>
                                                                            <option value="hybrid" {{ $student->school->school_category == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                                                            <option value="other" {{ $student->school->school_category == 'other' ? 'selected' : '' }}>Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="admission_number" class="">Reg / Adm Number</label>
                                                                        <input name="admission_number" value="{{$student->school->admission_number}}"  id="admission_number" placeholder="***" required type="text"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="year_of_study" class="">Year of Study / Form</label>
                                                                        <select name="year_of_study" id="" class="form-control" required autocomplete="off">
                                                                            <option value="1"  @if($student->school->year_of_study == '1') selected @endif>1st</option>
                                                                            <option value="2"  @if($student->school->year_of_study == '2') selected @endif>2nd</option>
                                                                            <option value="3"  @if($student->school->year_of_study == '3') selected @endif>3rd</option>
                                                                            <option value="4"  @if($student->school->year_of_study == '4') selected @endif>4th</option>
                                                                            <option value="4"  @if($student->school->year_of_study == '5') selected @endif>6th</option>
                                                                            <option value="other"  @if($student->school->year_of_study == 'other') selected @endif>Other</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">County</label>
                                                                        <select name="school_county" id="" class="form-control" required autocomplete="off">
                                                                            @foreach ($counties as $county)
                                                                                <option value="{{ $county->name }}" {{ $student->school->county == $county->name ? 'selected' : '' }}>
                                                                                    {{ $county->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="physical_address" class="">Physical Address</label>
                                                                        <input name="physical_address" id="physical_address"  value="{{$student->school->physical_address}}"  placeholder="Po Box 10400 - Nanyuki" required type="text" class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">Contact Phone Number</label>
                                                                        <input name="contact_person" id="contact_person"  value="{{$student->school->contact_person}}"  placeholder="079----" required type="number"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container text-center mt-4 mb-4">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-5 mb-2 mr-3">
                                                                    <button type="button" class="btn btn-primary"  style="border-radius: 10px; width: 100%; " onclick="showInvestmentDetails()">Back</button>
                                                                </div>
                                                                <div class="col-12 col-lg-5">
                                                                    <button type="button" class="btn btn-info " style="border-radius: 10px; width: 100%; " onclick="showPayments()">Next</button>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  

                                        <!-- Payments Tab -->

                                        <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                                            <div class="row">      
                                                <div class="col-md-12">
                                                    <div class="container mt-3">
                                                        <div class="row">
                                                            @foreach($student->attachments as $attachment)
                                                                <div class="col-md-6">
                                                                    <div class="position-relative form-group">
                                                                        <label for="attachments" class="">{{$attachment->name}}</label>
                                                                        <input name="attachments[]" id="attachments" type="file" class="form-control">
                                                                        <span class="file-name">{{ $attachment->filename }}</span>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>              
                                                        </div>
                                                        
                                                    
                                                    </div>
                                                    <div class="container text-center mt-4 mb-4">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-5 mb-2 mr-3">
                                                                <button type="button" class="btn btn-primary"  style="border-radius: 10px; width: 100%; " onclick="showInvestmentDetails()">Back</button>
                                                            </div>
                                                            <div class="col-12 col-lg-5">
                                                                <button type="submit" class="btn btn-info " style="border-radius: 10px; width: 100%; ">Update</button>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Custom styles for the nav-pills */
        .nav-pills .nav-link {
            border: none;
            color: #000; /* Set the color of the text */
        }
    
        .nav-pills .nav-link.active {
            background-color: #17a0b6;
            border-bottom: 2px solid #000; /* Color of the underline for the active tab */
        }
    
        /* Center text vertically */
        .nav-pills .nav-link {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .text-green{
            color: #17a0b6;
        }
    </style>
    
    
    
    <script>
    
        
    
    function parentDisabled() {
            var parentStatus = document.getElementById('parent_status').value;
            var plwdNumberLabel = document.getElementById('plwd_number_label');
            var plwdNumberInput = document.getElementById('plwd_number_parent_id');
    
    
            if (parentStatus === 'yes') {
                plwdNumberLabel.style.display = 'block'; 
                plwdNumberInput.style.display = 'block'; 
            } else {
                plwdNumberLabel.style.display = 'none';
                plwdNumberInput.style.display = 'none'; 
            }
        }
    
        function secondParentDisabled() {
            console.log('second parent disabled');
            var parentStatus = document.getElementById('second_parent_status').value;
            var plwdNumberLabel = document.getElementById('second_plwd_number_label');
            var plwdNumberInput = document.getElementById('second_parent_plwd_id');
    
            if (parentStatus === 'yes') {
                plwdNumberLabel.style.display = 'block'; // Show the label
                plwdNumberInput.style.display = 'block'; // Show the input
            } else {
                plwdNumberLabel.style.display = 'none'; // Hide the label
                plwdNumberInput.style.display = 'none'; // Hide the input
            }
        }
    
    
        function updateParentalFields() {
            var mothersDetails = document.getElementById('mothers-details');
            var fathersDetails = document.getElementById('fathers-details');
            var parentStatus = document.getElementById('parental_status').value;
            var parent_death_cert = document.getElementById('death_cert_view');
            var firstParentTitle = document.getElementById('first_parent_title');
            var firstParentType = document.getElementById('first_parent_type');
    
    
            if (parentStatus === 'father_alive' ) {
                console.log('father alive');
                mothersDetails.style.display = 'none'; 
                fathersDetails.style.display = 'block';
                firstParentTitle.innerHTML = 'Fathers Details';
    
                parent_death_cert.style.display = 'block';
            } 
            else if (parentStatus === 'single_father') {
                console.log('single father');
                mothersDetails.style.display = 'none';
                fathersDetails.style.display = 'block';
                firstParentTitle.innerHTML = 'Fathers Details';
    
                parent_death_cert.style.display = 'none';
            } 
            else if (parentStatus === 'parents_alive') {
                console.log('parents alive');
                mothersDetails.style.display = 'block';
                fathersDetails.style.display = 'block';
                parent_death_cert.style.display = 'none';
            }
            else if (parentStatus === 'mother_alive') {
                console.log('mother alive');
                fathersDetails.style.display = 'none';
                mothersDetails.style.display = 'block';
                parent_death_cert.style.display = 'block';
            } 
            else if (parentStatus === 'single_mother') {
                console.log('single mother');
                fathersDetails.style.display = 'none';
                mothersDetails.style.display = 'block';
                parent_death_cert.style.display = 'none';
            } 
            else if (parentStatus === 'total_orphan') {
                
                console.log('total orphan');
                mothersDetails.style.display = 'none';
                fathersDetails.style.display = 'block';
                firstParentTitle.innerHTML = 'Guardian Details';
                parent_death_cert.style.display = 'none';
                firstParentType.value = 'guardian';
            }
            
            else {
                console.log('other');
                mothersDetails.style.display = 'block';
                fathersDetails.style.display = 'block';
                firstParentTitle.innerHTML = 'Fathers Details';
                parent_death_cert.style.display = 'none';
            }
        }
    
    
        
     function showPersonalDetails() {
      
      document.getElementById('investment-details').classList.remove('show');
      document.getElementById('investment-details').classList.remove('active');
      document.getElementById('examination-point').classList.remove('show');
      document.getElementById('examination-point').classList.remove('active');
      document.getElementById('business-details-tab').classList.remove('active');
    
      // Show the investment details tab
      document.getElementById('personal-details').classList.add('show');
      document.getElementById('personal-details').classList.add('active');
      document.getElementById('personal-details-tab').classList.add('active');
    
    }
    
    function showInvestmentDetails() {
        // Hide the personal details tab
        document.getElementById('personal-details').classList.remove('show');
        document.getElementById('personal-details').classList.remove('active');
        document.getElementById('examination-point').classList.remove('show');
        document.getElementById('examination-point').classList.remove('active');
        document.getElementById('personal-details-tab').classList.remove('active');
        document.getElementById('payments-tab').classList.remove('active');
        document.getElementById('examination-point-tab').classList.remove('active');
    
        // Show the investment details tab
        document.getElementById('investment-details').classList.add('show');
        document.getElementById('investment-details').classList.add('active');
        document.getElementById('business-details-tab').classList.add('active');
    }
    
    function showExaminationPoint() {
      
        document.getElementById('investment-details').classList.remove('show');
        document.getElementById('investment-details').classList.remove('active');
        document.getElementById('personal-details').classList.remove('show');
        document.getElementById('personal-details').classList.remove('active');
        document.getElementById('business-details-tab').classList.remove('active');
    
        // Show the investment details tab
        document.getElementById('examination-point').classList.add('show');
        document.getElementById('examination-point').classList.add('active');
        document.getElementById('examination-point-tab').classList.add('active');
    
    }
     
    function showPayments() {
    
    
        document.getElementById('personal-details').classList.remove('show');
        document.getElementById('personal-details').classList.remove('active');
        document.getElementById('examination-point').classList.remove('show');
        document.getElementById('examination-point').classList.remove('active');
        document.getElementById('personal-details-tab').classList.remove('active');
        document.getElementById('investment-details').classList.remove('active');
        document.getElementById('investment-details').classList.remove('show');
        document.getElementById('examination-point-tab').classList.remove('active');
    
    
        // Show the investment details tab
        document.getElementById('payments').classList.add('show');
        document.getElementById('payments').classList.add('active');
        document.getElementById('payments-tab').classList.add('active');
    
    }
    
    function nextTab() {
        var active = $('#pills-tab .nav-link.active');
        var nextTab = active.parent().next('li').find('.nav-link');
        if (nextTab.length > 0) {
            nextTab.trigger('click');
        } else {
            active.trigger('click');
        }
    }
    
    function prevTab() {
        var active = $('#pills-tab .nav-link.active');
        var prevTab = active.parent().prev('li').find('.nav-link');
        if (prevTab.length > 0) {
            prevTab.trigger('click');
        } else {
            active.trigger('click');
        }
    }
    
    $(document).ready(function(){
      var i=1;
      $('#add').click(function(){
          i++;
          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="sibling_name[]" id="qty1" placeholder="Name" class="form-control name_list" /></td><td><input type="text" name="sibling_gender[]" id="rate1" placeholder="Gender" class="form-control name_list" /></td><td><input type="text" name="sibling_school[]" id="rate1" placeholder="School" class="form-control name_list" /></td><td><input type="text" name="sibling_fees[]" id="rate1" placeholder="Fees" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr></tr>');
      });
      
      $(document).on('click', '.btn_remove', function(){
          var button_id = $(this).attr("id"); 
          $('#row'+button_id+'').remove();
      });
      
    
      
    });
    
    
     </script>
    @endsection