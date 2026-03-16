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
                        <a href=" {{route('student.account')}}" class="list-group-item list-group-item-action  mb-2">Account Details</a>
                        <a href=" {{route('student.logout')}}" class="list-group-item list-group-item-action mb-2">Log Out</a>
                    </div>
                </div>
                <div class="col-md-9 pl-3">
                    <!-- <p><strong>Hello {{ Auth::user()->first_name ?? 'User'}},</strong>  <br>   </p> -->

                    <div class="container">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                                    <li class="active"><a href="#step-1">
                                        <h4 class="list-group-item-heading">1</h4>
                                        <p class="list-group-item-text">Institutional Details</p>
                                    </a></li>
                                    
                                    <li class="disabled"><a href="#step-2">
                                        <h4 class="list-group-item-heading">2</h4>
                                        <p class="list-group-item-text">Student Details</p>
                                    </a></li>
                                    <li class="disabled"><a href="#step-3">
                                        <h4 class="list-group-item-heading">3</h4>
                                        <p class="list-group-item-text">Attachments</p>
                                    </a></li>
                                    <li class="disabled"><a href="#step-4">
                                        <h4 class="list-group-item-heading">4</h4>
                                        <p class="list-group-item-text">Fee Details</p>
                                    </a></li>    
                                  
                                </ul>
                            </div>
                        </div>
                    </div>	
                    <form class="" action="{{route('student.store')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-12">
                                <div class="col-md-12 well text-center">                  
                                    <!-- <form> -->                                                             
                                    <div class="container col-xs-12">
                                        <div class="row clearfix">
                                            <div class="col-md-12 column">
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
                                                        <label for="admission_number" class="">Registration / Admission Number</label>
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
                                        </div>
                                    </div>                                                
                                    <!-- </form> -->
                                    <button id="activate-step-2" class="btn btn-info btn-md">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="container">

                        <div class="row setup-content" id="step-2">
                            <div class="col-xs-12">
                                <div class="col-md-12 well text-center">
                                    <div class="form-row">
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

                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="name" class="">First Name</label>
                                                <input name="parent_first_name" id="parent_first_name" placeholder="First Name" required type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="name" class="">Last Name</label>
                                                <input name="parent_last_name" id="parent_last_name" placeholder="Last Name" required type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
        
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="name" class="">Phone Number</label>
                                                <input name="parent_phone" id="parent_phone" placeholder="07**********" required type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
        
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="name" class="">ID Number</label>
                                                <input name="parent_id_number" id="parent_id_number" placeholder="33603456" required type="number"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="name" class="">Occupation</label>
                                                <input name="parent_occupation" id="parent_occupation" placeholder="Peasant Farmer" required type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
        
                                        <div class="position-relative form-group">
                                            <label for="name" class="plwd_number_label">Disabled </label>
                                            <select name="parent_status" id="parent_status" class="form-control" onchange="return parentDisabled()">
                                                <option>Select Disability Status</option>
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4" id="plwd_number_parent">
                                            <div class="position-relative form-group">
                                                <label for="plwd_number_parent_id" class="" id="plwd_number_label" style="display: none;">PLWD NUMBER</label>
                                                <input name="parent_plwd_id" id="plwd_number_parent_id" placeholder="Plwd Number"  type="text" style="display: none;"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <!-- secodn parents deatils  -->
                                        <div  id="second_parent_details" style="display: none;">
                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="name" class="">Mothers First Name</label>
                                                    <input name="second_parent_first_name"  placeholder="Mothers First Name"  type="text"
                                                        class="form-control">
                                                </div>
                                            </div>
                                    
                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="name" class="">Mothers Last Name</label>
                                                    <input name="second_parent_last_name" id="second_parent_last_name" placeholder="Mothers Last Name"  type="text"
                                                        class="form-control">
                                                </div>
                                            </div>
            
                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="name" class="">Mothers Phone Number</label>
                                                    <input name="second_parent_phone" id="second_parent_phone" placeholder="07**********"  type="text"
                                                        class="form-control">
                                                </div>
                                            </div>
    
                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="name" class="">Mothers ID Number</label>
                                                    <input name="second_parent_id_number" id="second_parent_id_number" placeholder="30303003"  type="number"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="name" class="">Mothers Occupation</label>
                                                    <input name="second_parent_occupation" id="second_parent_occupation" placeholder="House Wife"  type="text"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="name" class="">Mothers Disable? </label>
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
                                    </div>
                                    <button id="activate-step-3" class="btn btn-primary btn-md">Next</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="container">
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-12">
                                <div class="col-md-12 well text-center">
                                    <!-- <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Any Other Information / Remarks</label>
                                            <textarea name="additional_information" class="form-control" placeholder=" Have defered my studies for 3 years due to school fees"></textarea>
                                        </div>
                                    </div> -->
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
                                    
                                    <button id="activate-step-4" class="btn btn-primary btn-md">Next</button>
                                </div>
                            </div>
                        </div>
              

                    </div>
                    <div class="container">                       
                        <div class="row setup-content" id="step-4">
                            <div class="col-xs-12">
                                <div class="col-md-12 well text-center">
                                     <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Total Fees</label>
                                            <input name="total_fees" id="total_fees" placeholder="10,000" required type="number"class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Paid / Able to Pay</label>
                                            <input name="amount_paid" id="amount_paid" placeholder="1000" required type="number"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Outstanding Balance</label>
                                            <input name="balance" id="balance" placeholder="30000" required type="number"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$application->id}}" name="bursary_id">
                                    <button id="" type="submit" class="btn btn-primary btn-md">Submit</button>


            
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
           
</section>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>

$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        $(this).remove();
    })
    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
    })
    
    $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
        $(this).remove();
    })
    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
    })
});




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
        var parentDetails = document.getElementById('second_parent_details');
        var parentStatus = document.getElementById('parental_status').value;
        var parent_death_cert = document.getElementById('death_cert_view');


        if (parentStatus === 'parents_alive') {
            parentDetails.style.display = 'block'; 
            parent_death_cert.style.display = 'none';
        } else {
            parentDetails.style.display = 'none';
            parent_death_cert.style.display = 'block';
        }
    }
</script>


@endsection