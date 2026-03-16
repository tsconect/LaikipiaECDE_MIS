@extends('frontend.app')
@section('content')

<section class="experience_section layout_padding-top layout_padding2-bottom"  style="background-color: #f5f5f5;">
    
    
    <section class="contact spad mb-4 p-4"  style="background-color: #f5f5f5;">
        <div class="container">
            <div class="row pl-4 align-items-start"> <!-- Remove 'align-items-center' class -->
                <div class="col-md-3 dashboard-menu">
                    <div class="list-group text-center">
                        <a href="{{route ('student.dashboard')}}" class="list-group-item active list-group-item-action mb-2">Dashboard</a>
                        <a href="{{ route('student.applications')}} " class="list-group-item list-group-item-action mb-2">My Applications</a>
                        <a href=" {{route('student.profile')}}" class="list-group-item list-group-item-action mb-2">Student Profile</a>
                        <a href=" {{route('student.account')}}" class="list-group-item list-group-item-action  mb-2">Account Details</a>
                        <a href=" {{route('student.logout')}}" class="list-group-item list-group-item-action mb-2">Log Out</a>
                    </div>
                </div>
                <div class="col-md-9 pl-3">
                    
                        @if(Auth::user()->studentDetails->profile_status == 'approved')
                        <div class="card p-4 mb-2"></div>

                            <h4 class="text-center">Open Bursaries</h4>
                            <table class="table">
                                <thead>
                                    <tr style="background-color: rgba(26, 46, 53, 0.5);;">
                                        <th>Name</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <?php
                                                    $deadline = \Carbon\Carbon::parse($item->deadline);
                                                    $today = \Carbon\Carbon::now();
                                                    echo ($today > $deadline) ? "Closed" : $today->diffInDays($deadline) . " days remaining";
                                                ?>
                                            </td>
                                            <td><span class="badge badge-primary">{{ $item->status ?? 'Unknown' }}</span></td>
                                            <td>
                                                @php
                                                    $hasApplied = $student->applications->contains('bursary_id', $item->id);
                                                @endphp

                                                @if ($hasApplied)
                                                    <a type="button" class="btn btn-outline-primary" title="View Wards"
                                                    href="{{ route('student.application.view', $student->applications->last()->id) }}">
                                                        <i class="fa fa-eye mr-1"></i> View 
                                                    </a>
                                                @else
                                                    @if ($today > $deadline)
                                                        <a type="button" class="btn btn-outline-danger" title="Closed">
                                                            <i class="fa fa-eye mr-1"></i> Closed
                                                        </a>
                                                    @else
                                                        <a type="button" class="btn btn-outline-primary" title="Make Application"
                                                        href="{{ route('bursary.application', $item->id) }}">
                                                            <i class="fa fa-eye mr-1"></i> Make Application
                                                        </a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        @elseif(Auth::user()->studentDetails->profile_status == 'pending')
                            <p><strong>Hello {{ Auth::user()->first_name ?? 'User'}},</strong>  <br>   </p>

                            <div class="alert alert-warning">

                                <p>Your profile is still pending approval. You will not be able to apply for bursaries until your profile is approved. CDF management will review your profile as soon as possible and notify you.</p>
                            </div>
                     
                        @elseif(Auth::user()->studentDetails->profile_status == 'declined')
                            <div class="alert alert-warning">
                                <p><strong>Hello {{ Auth::user()->first_name ?? 'User'}},</strong>  <br>   </p>

                                <p>Your profile approval has been rejected. <br>
                                <strong>Reason:</strong>
                                <li class="ml-5">{{ Auth::user()->studentDetails->comment}}</li> <br>
                                <p>Click <a href=""><i class="ml-2 mr-2 fa fa-edit"></i> EDIT</a> to make the necessary amendments to your application.</p>
                            </div>
                    
                        @elseif(Auth::user()->studentDetails->profile_status == 'profile_incomplete')
                 

                            <form class="" action="{{route('student.details.update')}}" method="post"  enctype="multipart/form-data">
                            @csrf
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
                                                                        <input name="phone_number" id="phone_number" placeholder="Phone Number" required type="text"  value="{{ old('phone_number', auth()->user()->phone_number) }}" disabled
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="school_name" class="">ID Number</label>
                                                                        <input name="id_birth_cert_no" id="id_birth_cert_no" placeholder="ID Number" required type="text"  value="{{ old('id_birth_cert_no', auth()->user()->studentDetails->id_birth_cert_no) }}" disabled
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="school_name" class="">DOB</label>
                                                                        <input name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth" required type="text"  value="{{ old('date_of_birth', auth()->user()->studentDetails->date_of_birth) }}"  disabled
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                @if(\Carbon\Carbon::parse(auth()->user()->studentDetails->date_of_birth)->age > 18)

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="kra_pin" class="">KRA Pin</label>
                                                                        <input name="kra_pin" id="kra_pin" placeholder="KRA Pin" required type="text"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                @endif
                        
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="religion" class="">Religion</label>
                                                                        <select name="religion" id="religion" class="form-control" required >
                                                                            <option>Select Religion</option>
                                                                            <option value="muslim">Muslim</option>
                                                                            <option value="christian"> Christian</option>
                                                                            <option value="other">Other</option>
                                                                        
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                
                                                            
                                                            
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="employment_status" class="">Employment Status</label>
                                                                        <select name="employment_status" id="" class="form-control" required>
                                                                            <option> Select Employment Status</option>
                                                                            <option value="employed">Employed</option>
                                                                            <option value="unemployed">Unemployed</option>
                                                                            <option value="self_employed">Self Employed</option>
                                                                            <option value="other">Other</option>                                       
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="marital_status" class="">Marital Status</label>
                                                                        <select name="marital_status" id="" class="form-control" required>
                                                                            <option>Select Marital Status</option>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                            <option value="divorced">Divorced</option>
                                                                            <option value="widowed">Widowed</option>
                                                                            <option value="other">Other</option>   
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">Parental Status </label>
                                                                        <select name="parental_status" id="parental_status" class="form-control" required onchange="updateParentalFields()">
                                                                            <option value="">Select Parental Status</option>
                                                                            <option value="parents_alive">Both Parents Alive</option>
                                                                            <option value="father_alive">Father Alive (Mother Dead)</option>
                                                                            <option value="mother_alive">Mother Alive (Father Dead)</option>
                                                                            <option value="single_mother">Single Mother</option>
                                                                            <option value="single_father">Single Father</option>
                                                                            <option value="total_orphan">Guardian</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">Who pays Your Fees </label>
                                                                        <select name="who_pays_fees" id="" class="form-control" required>
                                                                            <option>Select</option>
                                                                            <option value="Parents">Parents</option>
                                                                            <option value="Guardian">Guardian</option>
                                                                            <option value="Well Wishers">Well Wishers</option>
                                                                            <option value="Sponsors">Sponsors</option>
                                                                            <option value="Other">Other</option>
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
                                                            <div id="fathers-details">
                                                                <h4 id="first_parent_title" class="text-center mb-2">Fathers Details</h4>

                                                                <div class="form-row">
                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class="">First Name</label>
                                                                            <input name="parent_first_name" id="parent_first_name" placeholder="First Name"  type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class="">Last Name</label>
                                                                            <input name="parent_last_name" id="parent_last_name" placeholder="Last Name"  type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class="">Phone Number</label>
                                                                            <input name="parent_phone" id="parent_phone" placeholder="07**********"  type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class="">ID Number</label>
                                                                            <input name="parent_id_number" id="parent_id_number" placeholder="33603456"  type="number"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class="">Occupation</label>
                                                                            <input name="parent_occupation" id="parent_occupation" placeholder="Teacher"  type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class="">Annual Salary</label>
                                                                            <input name="parent_annual_salary" id="annual_salary" placeholder="Ksh 2000"  type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="first_parent_type" id="first_parent_type" value="Father">
                                                                    <div class="col-md-4">

                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class="plwd_number_label">Disabled? </label>
                                                                            <select name="parent_status" id="parent_status" class="form-control" onchange="return parentDisabled()">
                                                                                <option>Select Disability Status</option>
                                                                                <option value="no">No</option>
                                                                                <option value="yes">Yes</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4" id="plwd_number_parent">
                                                                        <div class="position-relative form-group">
                                                                            <label for="plwd_number_parent_id" class="" id="plwd_number_label" style="display: none;">PLWD NUMBER</label>
                                                                            <input name="parent_plwd_id" id="plwd_number_parent_id" placeholder="Plwd Number"  type="text" style="display: none;"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                          
                                                                
                                                            <!-- secodn parents deatils  -->
                                                            <div id="mothers-details">
                                                                <h4 class="text-center mb-2">Mothers Details</h4>
                                                                <div  id="second_parent_details" class="form-row">
                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class=""> First Name</label>
                                                                            <input name="second_parent_first_name"  placeholder="Mothers First Name"  type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                            
                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class=""> Last Name</label>
                                                                            <input name="second_parent_last_name" id="second_parent_last_name" placeholder="Mothers Last Name"  type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                    
                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class=""> Phone Number</label>
                                                                            <input name="second_parent_phone" id="second_parent_phone" placeholder="07**********"  type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                            
                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class=""> ID Number</label>
                                                                            <input name="second_parent_id_number" id="second_parent_id_number" placeholder="30303003"  type="number"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class=""> Occupation</label>
                                                                            <input name="second_parent_occupation" id="second_parent_occupation" placeholder="Teacher"  type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class="">Annual Salary</label>
                                                                            <input name="second_parent_annual_salary" id="mothers_annual_salary" placeholder="Ksh 2000"  type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="position-relative form-group">
                                                                            <label for="name" class=""> Disabled? </label>
                                                                            <select name="second_parent_status" id="second_parent_status" class="form-control"  onchange="return secondParentDisabled()">
                                                                                <option>Select Disability Status</option>
                                                                                <option value="no">No</option>
                                                                                <option value="yes">Yes</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4" id="">
                                                                        <div class="position-relative form-group">
                                                                            <label for="plwd_number_second_parent_id" class="plwd_number_label" id="second_plwd_number_label" style="display: none;">PLWD NUMBER</label>
                                                                            <input name="second_plwd_number" id="second_parent_plwd_id" placeholder="Plwd Number"  type="text"
                                                                                class="form-control" style="display: none;">
                                                                        </div>
                                                                    </div>                                          
                                                                </div>  
                                                                <hr>
                                                                    
                                                            </div>
                                                           
                                                            <div class="container" id="">
                                                                <div class="form-group">
                                                                <h4 class="text-center mb-2">Sibling Details</h4>
                                                                    <form name="add_name" id="add_name">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered" id="dynamic_field">
                                                                                <tr>
                                                                                    <td><input type="text" name="sibling_name[]" id="qty1" placeholder="Name" class="form-control name_list" /></td>
                                                                                    <!-- <td><input type="date" name="dob[]" id="rate1" placeholder="DOB" class="form-control name_list" /></td> -->
                                                                                    <td><input type="text" name="sibling_gender[]" id="rate1" placeholder="Gender" class="form-control name_list" /></td>
                                                                                    <td><input type="text" name="sibling_school[]" id="rate1" placeholder="School" class="form-control name_list" /></td>
                                                                                    <td><input type="text" name="sibling_fees[]" id="rate1" placeholder="Fees" class="form-control name_list" /></td>
                                                                                    <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                                                                                </tr>
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
                                                                        <input name="school_name" id="school_name" placeholder="School name" required type="text"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="level_of_study" class="">Level of study</label>
                                                                        <select name="level_of_study" id="level_of_study" class="form-control" required onChange="return schoolType()">

                                                                            <option value="secondary">Secondary School</option>
                                                                            <option value="college"> College</option>
                                                                            <option value="vtc">Vocational Training Center</option>
                                                                            <option value="tti">TTI</option>
                                                                            <option value="university">University</option>
                                                                            <option value="other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">School Category</label>
                                                                        <select name="school_category" id="" class="form-control" required>
                                                                            <option value="public">Public</option>
                                                                            <option value="private">Private</option>
                                                                            <option value="hybrid">Hybrid</option>
                                                                            <option value="other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="admission_number" class="">Reg / Adm Number</label>
                                                                        <input name="admission_number" id="admission_number" placeholder="***" required type="text"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="year_of_study" class="">Year of Study / Form</label>
                                                                        <select name="year_of_study" id="" class="form-control" required>
                                                                            <option>Select</option>
                                                                            <option value="1">1st</option>
                                                                            <option value="2">2nd</option>
                                                                            <option value="3">3rd</option>
                                                                            <option value="4">4th</option>
                                                                            <option value="4">6th</option>
                                                                            <option value="Other">Other</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">County</label>
                                                                        <select name="school_county" id="" class="form-control" required>
                                                                            <option>Select County</option>
                                                                            @foreach ($counties as $county)
                                                                                <option value="{{ $county->name }}">{{ $county->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="physical_address" class="">Physical Address</label>
                                                                        <input name="physical_address" id="physical_address" placeholder="Po Box 10400 - Nanyuki" required type="text" class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group">
                                                                        <label for="name" class="">Contact Phone Number</label>
                                                                        <input name="contact_person" id="contact_person" placeholder="079----" required type="number"
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
                                                                <div class="col-md-6">
                                                                    <div class="position-relative form-group">
                                                                        <label for="attachements" class="">Attachements * Attach all Documents Combined in A single PDF (5 MB Max)</label>
                                                                        <input name="attachements" id="attachements"  type="file" class="form-control">
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="col-md-6">
                                                                    <div class="position-relative form-group">
                                                                        <label for="transcript" class=""> Transcript/Report form (5 MB Max)</label>
                                                                        <input name="transcript" id="transcript"  type="file" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="position-relative form-group">
                                                                        <label for="national_id" class="">Photocopy of Parents/Guardian National ID  (5 MB Max)</label>
                                                                        <input name="national_id" id="national_id"  type="file" class="form-control">
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="col-md-6">
                                                                    <div class="position-relative form-group">
                                                                        <label for="fees_structure" class="">Current fees structure (5 MB Max)</label>
                                                                        <input name="fees_structure" id="fees_structure"  type="file" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6" id="death_cert_view">
                                                                    <div class="position-relative form-group">
                                                                        <label for="death_certificate" class="">Attach Death Certificate of the parent</label>
                                                                        <input name="death_certificate" id="death_certificate" placeholder="First Name"  type="file" class="form-control">
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="col-md-6">
                                                                    <div class="position-relative form-group">
                                                                        <label for="birth_certificate" class="">Photocopy of birth certificate  (5 MB Max)</label>
                                                                        <input name="birth_certificate" id="birth_certificate"  type="file" class="form-control">
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
                                                                    <button type="submit" class="btn btn-info " style="border-radius: 10px; width: 100%; ">Submit</button>
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
                    @else
                        <p><strong>Hello {{ Auth::user()->first_name ?? 'User'}},</strong>  <br>   </p>

                        <div class="alert alert-info">

                            <p>You have logged In  successfully we do not have open bursaries at the moment</p>
                        </div>
                    @endif
                        
                   
                </div>
            </div>
        </div>
    </section>
           
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
@if(isset($item))
var deadline = new Date('{{ $item->deadline }}').getTime();

// Update the countdown every second
var countdownTimer = setInterval(function() {
    // Get the current date and time
    var now = new Date().getTime();
    
    // Calculate the remaining time
    var distance = deadline - now;
    
    // Calculate days, hours, minutes, and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Display the countdown timer
    document.getElementById('countdown_timer').innerHTML = days + " dys, " + hours + " hrs, " + minutes + " mins, " + seconds + " secs ";
    
    // If the countdown is over, display a message
    if (distance < 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown_timer').innerHTML = "EXPIRED";
    }
}, 1000); // Update every second
@endif
</script>



@endsection