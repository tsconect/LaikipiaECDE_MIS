@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection


@section('content')

<div class="card-body">
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form class="modern-form-shell" method="POST" action="{{ route('admin.learners.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card shadow-sm mb-4">

            <div class="card-header btn-success">
                <h5 class="mb-0">Register New learner</h5>
            </div>
<div class="card-body">

               <div class="row g-4">
                            <h5 class="p-2 text-success">Personal Information</h5>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="first_name" class="">First Name</label>
                                    <input name="first_name" id="first_name" placeholder="John" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="middle_name" class="">Middle Name</label>
                                    <input name="middle_name" id="middle_name" placeholder="Doe" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="last_name" class="">Last Name</label>
                                    <input name="last_name" id="last_name" placeholder="Watt" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="birth_certificate_number" class="">Birth Certificate Number</label>
                                    <input name="birth_certificate_number" id="birth_certificate_number" placeholder="Enter Birth Certificate Number" required
                                        type="text"class="form-control">
                                </div>
                                @error('birth_certificate_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Nationality</label>
                                <select name="nationality_id" id="nationality_id" class="form-control" required>
                                    <option value="">Select option</option>
                                    @foreach($nationalities as $nationality)
                                        <option value="{{ $nationality->id }}" {{ $nationality->name == 'Kenyan' ? 'selected' : '' }}>{{ $nationality->name }}</option>
                                    @endforeach
                                    <option value="1" {{ old('nationality_id') == '1' ? 'selected' : '' }}>Kenyan</option>
                                </select>
                            </div>
                              <!-- PWD Status -->
                         <div class="col-md-4  ">
                            <label class="form-label fw-semibold">Abled Differently(PWD)? <span class="text-danger">*</span></label>
                            <select name="pwd_status" id="pwd_status" 
                                    class="form-control @error('pwd_status') is-invalid @enderror"
                                    onchange="togglePWDFields()" required>
                                <option value="">Select option</option>
                                <option value="Yes" {{ old('pwd_status') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('pwd_status') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('pwd_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Conditional PWD Fields -->
                        <div id="pwd_fields" class="col-md-12 row g-4" style="display: none;">
                             <div class="col-md-4  ">
                                <label class="form-label fw-semibold">PWD Number</label>
                                <input name="pwd_number" id="pwd_number" placeholder="Enter PWD Number" 
                                    type="text"class="form-control @error('pwd_number') is-invalid @enderror">
                                @error('pwd_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                           <div class="col-md-4  ">
                                <label class="form-label fw-semibold">Disability Type</label>
                                <select name="disability_type" class="form-control @error('disability_type') is-invalid @enderror">
                                    <option value="">Select type</option>
                                    <option value="Visual Impairment">Visual Impairment</option>
                                    <option value="Hearing Impairment (Deaf)">Hearing Impairment (Deaf)</option>
                                    <option value="Physical Impairment">Physical Impairment</option>
                                    <option value="Intellectual Disability">Intellectual Disability</option>
                                    <option value="Speech &amp; Language Impairment">Speech &amp; Language Impairment</option>
                                    <option value="Multiple Disabilities">Multiple Disabilities</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('disability_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="col-md-4  ">
                                <label class="form-label fw-semibold">Impairment Details</label>
                                <textarea name="impairment_details" 
                                          class="form-control @error('impairment_details') is-invalid @enderror"
                                          rows="3"
                                          placeholder="Brief description of impairment...">{{ old('impairment_details') }}</textarea>
                                @error('impairment_details')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                           
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="gender" class="">Gender</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="" >Select Gender</option>

                                        <option value="male">Male</option>
                                        <option value="female">Female</option>


                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="dob" class="">Date of birth</label>
                                    <input name="dob" id="dob" placeholder="D.O.B" required type="date"
                                    max="{{ date('Y-m-d', strtotime('-4 years'))}}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Parent Details</label>
                                <select id="family_setup" name="family_setup" class="form-control" onchange="toggleFamilyFields()" required>
                                    <option value="">Select option</option>
                                    <option value="both">Both Parents Alive</option>
                                    <option value="father_only">Single Father</option>
                                    <option value="mother_only">Single Mother</option>
                                    <option value="guardian">Orphan</option>
                                </select>
                            </div>


                           <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="photo" class="">Passport Photo (Upload size 2MB Max)</label>
                                    <input name="photo" id="photo" required type="file" class="form-control" accept="image/*">
                                </div>
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                 <h5 class="p-2 text-success">Enrollment and Admission Details</h5>

                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="nemis_number" class="">Nemis Number:</label>
                                        <input name="nemis_number" id="nemis_number" placeholder="Nemis Number:" required type="text"
                                            class="form-control">
                                    </div>
                                </div>

                                

                                  <div class="col-md-4">
                                    <label class="form-label fw-semibold">County <span class="text-danger">*</span></label>
                                    <select name="county_id" id="countySelect" 
                                            class="form-control @error('county_id') is-invalid @enderror"
                                            required>
                                        <option value="">Select county</option>
                                            @foreach($counties as $county)
                                                <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                                            @endforeach
                                    </select>
                                    @error('county_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Sub-County</label>
                                    <select name="subcounty_id" id="constituencySelect" 
                                            class="form-control @error('subcounty_id') is-invalid @enderror"
                                            >
                                        <option value="">Select sub-county</option>
                                    </select>
                                    @error('subcounty_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Ward</label>
                                    <select name="ward_id" id="wardSelect" 
                                            class="form-control @error('ward_id') is-invalid @enderror">
                                        <option value="">Select ward</option>
                                    </select>
                                    @error('ward_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <label for="sub_location_id" class="">Sub-Location </label>
                                    <select name="sub_location_id" id="sub_location_id" class="form-control" required>
                                        <option value="">Select Sublocation</option>
                                        @foreach ($sub_locations as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_location_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>



                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="village" class="">Village</label>
                                        <input name="village" id="village" placeholder="village" required type="text"
                                            class="form-control">
                                    </div>
                                </div>

                            @if($school_id)

                            
                                <input type="hidden" name="school_id" value="{{ $school_id }}">
                                <div class="col-md-4 ">
                                <div class="position-relative form-group">
                                        <label for="school_id" class=""> School </label>
                                        <select name="school_id" id="school_id" class="form-control" disabled>
                                            {{-- <option value="">Select School</option> --}}
                                            @foreach ($schools as $value)
                                                <option value="{{ $value->id ?? null }}" @if($school_id == $value->id) selected @endif>{{ $value->school_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    
                                </div>
                            @else
                             <div class="col-md-4 " >
                                <div class="position-relative form-group">
                                    <label for="school_id" class=""> School </label>
                                    <select name="school_id" id="school_id" class="form-control">
                                        <option value="">Select School</option>
                                        @foreach ($schools as $value)
                                            <option value="{{ $value->id ?? null }}">{{ $value->school_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                  
                            </div>
                            @endif
                            <div class="col-md-4">
                                <label for="admission_number" class="">Admission Number</label>
                                <input name="admission_number" id="admission_number" placeholder="admission number" required type="text"
                                    class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label for="date_of_admission" class="">Date of Admission</label>
                                <input name="date_of_admission" id="date_of_admission" placeholder="date of admission" required type="date"
                                    class="form-control" max="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="class" class="">Class</label>
                                <select name="class" id="class" class="form-control" required>
                                    <option value="">Select Class</option>
                                    <option value="Baby Class">Baby Class</option>
                                    <option value="PP1"> PP1</option>
                                    <option value="PP2"> PP2</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="mode_of_admission" class="">Mode of Admission</label>
                                <select name="mode_of_admission" id="mode_of_admission" class="form-control" required>
                                    <option value="">Select Mode of Admission</option>
                                    <option value="new">New Student</option>
                                    <option value="transfer">Transfer Student</option>
                                </select>
                            </div>
                      
        
                    <hr> 
                      <h5 class="p-2 text-success parent-title" style="display: none">
Family Information (Parents/Guardian)</h5>

   

                   <div id="father_section" class="row g-3 family-section mt-2" style="display:none;">
                    <h6 class="text-primary">Father Information</h6>

                    <div class="col-md-4">
                        <input type="text" name="father_first_name" class="form-control" placeholder="Father First Name">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="father_middle_name" class="form-control" placeholder="Father Middle Name">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="father_last_name" class="form-control" placeholder="Father Last Name">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="father_id_number" class="form-control" placeholder="Father ID Number">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="father_phone" class="form-control" placeholder="Father Phone Number">
                    </div>

                    <div class="col-md-4">
                        <input type="email" name="father_email" class="form-control" placeholder="Father Email Address">
                    </div>

                    <!-- Location -->
                    <div class="col-md-4">
                        <select name="father_county_id" class="form-control county-select">
                            <option value="">Select  County</option>
                            @foreach($counties as $county)
                                <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select name="father_subcounty_id" class="form-control subcounty-select">
                            <option value="">Select  Sub-County</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select name="father_ward_id" class="form-control ward-select">
                            <option value="">Select  Ward</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="father_village" class="form-control" placeholder="Father Village">
                    </div>
                </div>

                    <!-- ================= MOTHER ================= -->
                <div id="mother_section" class="row g-3 family-section mt-2" style="display:none;">
                <h6 class="text-primary">Mother Information</h6>

                <div class="col-md-4">
                    <input type="text" name="mother_first_name" class="form-control" placeholder="Mother First Name">
                </div>

                <div class="col-md-4">
                    <input type="text" name="mother_middle_name" class="form-control" placeholder="Mother Middle Name">
                </div>

                <div class="col-md-4">
                    <input type="text" name="mother_last_name" class="form-control" placeholder="Mother Last Name">
                </div>

                <div class="col-md-4">
                    <input type="text" name="mother_id_number" class="form-control" placeholder="Mother ID Number">
                </div>

                <div class="col-md-4">
                    <input type="text" name="mother_phone" class="form-control" placeholder="Mother Phone Number">
                </div>

                <div class="col-md-4">
                    <input type="email" name="mother_email" class="form-control" placeholder="Mother Email Address">
                </div>

                <!-- Location -->
                <div class="col-md-4">
                    <select name="mother_county_id" class="form-control county-select">
                        <option value="">Select  County</option>
                        @foreach($counties as $county)
                            <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <select name="mother_subcounty_id" class="form-control subcounty-select">
                        <option value="">Select  Sub-County</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <select name="mother_ward_id" class="form-control ward-select">
                        <option value="">Select  Ward</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="text" name="mother_village" class="form-control" placeholder="Mother Village">
                </div>
            </div>

                    <!-- ================= GUARDIAN ================= -->
            <div id="guardian_section" class="row g-3 family-section mt-2" style="display:none;">
                <h6 class="text-primary">Guardian Information</h6>

                <div class="col-md-4">
                    <input type="text" name="guardian_first_name" class="form-control" placeholder="Guardian First Name">
                </div>

                <div class="col-md-4">
                    <input type="text" name="guardian_middle_name" class="form-control" placeholder="Guardian Middle Name">
                </div>

                <div class="col-md-4">
                    <input type="text" name="guardian_last_name" class="form-control" placeholder="Guardian Last Name">
                </div>

                <div class="col-md-4">
                    <input type="text" name="guardian_id_number" class="form-control" placeholder="Guardian ID Number">
                </div>

                <div class="col-md-4">
                    <input type="text" name="guardian_phone" class="form-control" placeholder="Guardian Phone Number">
                </div>

                <div class="col-md-4">
                    <input type="email" name="guardian_email" class="form-control" placeholder="Guardian Email Address">
                </div>

                <!-- Location -->
                <div class="col-md-4">
                    <select name="guardian_county_id" class="form-control county-select">
                        <option value="">Select  County</option>
                        @foreach($counties as $county)
                            <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <select name="guardian_subcounty_id" class="form-control subcounty-select">
                        <option value="">Select  Sub-County</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <select name="guardian_ward_id" class="form-control ward-select">
                        <option value="">Select  Ward</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="text" name="guardian_village" class="form-control" placeholder=" Village">
                </div>
            </div>
        
                <div class="text-right p-2">
                    <button class="btn btn-success" type="submit">
                        Register
                    </button>
                </div>

            </div>

        </div>

    </form>

</div>
<style>
    .col-md-4 {
        margin-top: 0 !important;
    }
</style>
                          
<input type="hidden" id="counties-data" value='{{ json_encode($counties) }}'>
<input type="hidden" id="constituencies-data" value='{{ json_encode($sub_counties) }}'>
<input type="hidden" id="wards-data" value='{{ json_encode($wards) }}'>

<script>
    const data = {
        counties: JSON.parse(document.getElementById('counties-data').value || '[]'),
        constituencies: JSON.parse(document.getElementById('constituencies-data').value || '[]'),
        wards: JSON.parse(document.getElementById('wards-data').value || '[]'),

    };
</script>

<script>
function toggleFamilyFields() {
    let value = document.getElementById('family_setup').value;

    let father = document.getElementById('father_section');
    let mother = document.getElementById('mother_section');
    let guardian = document.getElementById('guardian_section');
    let parent_title = document.querySelector('.parent-title');

    // Hide all first
    father.style.display = 'none';
    mother.style.display = 'none';
    guardian.style.display = 'none';
    parent_title.style.display = 'block';

    // Remove required first
    document.querySelectorAll('#father_section input, #mother_section input, #guardian_section input')
        .forEach(el => el.required = false);

    if (value === 'both') {
        father.style.display = 'flex';
        mother.style.display = 'flex';

        // make important fields required
        document.querySelector('[name="father_first_name"]').required = true;
        document.querySelector('[name="father_phone"]').required = true;

        document.querySelector('[name="mother_first_name"]').required = true;
        document.querySelector('[name="mother_phone"]').required = true;
    } 
    else if (value === 'father_only') {
        father.style.display = 'flex';

        document.querySelector('[name="father_first_name"]').required = true;
        document.querySelector('[name="father_phone"]').required = true;
    } 
    else if (value === 'mother_only') {
        mother.style.display = 'flex';

        document.querySelector('[name="mother_first_name"]').required = true;
        document.querySelector('[name="mother_phone"]').required = true;
    } 
    else if (value === 'guardian') {
        guardian.style.display = 'flex';

        document.querySelector('[name="guardian_first_name"]').required = true;
        document.querySelector('[name="guardian_phone"]').required = true;
    }
}
</script>


<script>
    // Toggle PWD fields
    function togglePWDFields() {
        const status = document.getElementById('pwd_status').value;
        const fields = document.getElementById('pwd_fields');
        fields.style.display = (status === 'Yes') ? 'flex' : 'none';
    }

   

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
     
        
        // Pre-fill PWD fields if editing
        if (document.getElementById('pwd_status').value === 'Yes') {
            document.getElementById('pwd_fields').style.display = 'flex';
        }
    });
</script>
  <script>
        document.addEventListener('DOMContentLoaded', function () {
        const countySelect = document.getElementById('countySelect');
        const constituencySelect = document.getElementById('constituencySelect');
        const wardSelect = document.getElementById('wardSelect');
       
        countySelect.addEventListener('change', function () {
            const countyId = this.value;
            constituencySelect.innerHTML = '<option value="">Select Sub County</option>';
            wardSelect.innerHTML = '<option value="">Select Ward</option>';
           
            if (countyId) {
                const constituencies = data.constituencies.filter(c => c.county_code == countyId);


                constituencies.forEach(constituency => {
                    const option = document.createElement('option');
                    option.value = constituency.constituency_id;
                    option.textContent = constituency.name;
                    constituencySelect.appendChild(option);
                });
            }
        });


        constituencySelect.addEventListener('change', function () {
            const constituencyId = this.value;
            wardSelect.innerHTML = '<option value="">Select Ward</option>';

            if (constituencyId) {
                const wards = data.wards.filter(w => w.constituency_code == constituencyId);
                wards.forEach(ward => {
                    const option = document.createElement('option');
                    option.value = ward.id;
                    option.textContent = ward.name;
                                            wardSelect.appendChild(option);
                                        });
                                    }
                                });

                              
                            });

                            </script>  
                            
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.county-select').forEach((countySelect) => {

        countySelect.addEventListener('change', function () {

            let parent = this.closest('.family-section');

            let subcountySelect = parent.querySelector('.subcounty-select');
            let wardSelect = parent.querySelector('.ward-select');

            subcountySelect.innerHTML = '<option value="">Select Sub County</option>';
            wardSelect.innerHTML = '<option value="">Select Ward</option>';

            const countyId = this.value;

            if (countyId) {
                const constituencies = data.constituencies.filter(c => c.county_code == countyId);

                constituencies.forEach(c => {
                    let option = document.createElement('option');
                    option.value = c.constituency_id;
                    option.textContent = c.name;
                    subcountySelect.appendChild(option);
                });
            }

            subcountySelect.addEventListener('change', function () {
                const constituencyId = this.value;
                wardSelect.innerHTML = '<option value="">Select Ward</option>';

                if (constituencyId) {
                    const wards = data.wards.filter(w => w.constituency_code == constituencyId);

                    wards.forEach(w => {
                        let option = document.createElement('option');
                        option.value = w.id;
                        option.textContent = w.name;
                        wardSelect.appendChild(option);
                    });
                }
            });

        });

    });

});
</script>


@endsection


