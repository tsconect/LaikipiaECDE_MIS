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
    <form method="POST" action="{{ route('admin.ecde-students.store') }}">
        @csrf
        <div class="card p-2 shadow-sm mb-4">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Register New ECDE</h5>
            </div>
<div class="card-body">

               <div class="row g-4">
  
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="first_name" class="">First Name</label>
                                    <input name="first_name" id="first_name" placeholder="John" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="middle_name" class="">Middle Name</label>
                                    <input name="middle_name" id="middle_name" placeholder="Doe" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="last_name" class="">Last Name</label>
                                    <input name="last_name" id="last_name" placeholder="Watt" required
                                        type="text"class="form-control">
                                </div>
                            </div>
                              <!-- PWD Status -->
                         <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Are you a Person with Disability (PWD)? <span class="text-danger">*</span></label>
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
                           <div class="col-md-6 mb-3">
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
                            <div class="col-md-6 mb-3">
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
                        
                            {{-- <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="email" class="">Email</label>
                                    <input name="email" id="email" placeholder="example@xyz.com" required type="email"
                                        class="form-control">
                                </div>
                            </div> --}}

                            <div class="col-md-6">
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
                                    <label for="dob" class="">Date of birth</label>
                                    <input name="dob" id="dob" placeholder="D.O.B" required type="date"
                                        class="form-control">
                                </div>
                            </div>


                            {{-- <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="photo" class="">Passport Photo (Upload size 2MB Max)</label>
                                    <input name="photo" id="photo" required type="file" class="form-control">
                                </div>
                            </div>
                      --}}
                

                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="reg_no" class="">Registration Number:</label>
                                        <input name="reg_no" id="reg_no" placeholder="Registration Number:" required type="text"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="stundent_type_id" class="">Student Category</label>
                                    <select name="stundent_type_id" id="stundent_type_id" class="form-control" >
                                        <option value="" >Student Category</option>
                                        @foreach (App\Models\StudentType::all() as $_)

                                        <option value="{{ $_->id }}">{{ $_->student_type_name }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                  <div class="col-md-6">
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

                                <div class="col-md-6">
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

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Ward</label>
                                    <select name="ward_id" id="wardSelect" 
                                            class="form-control @error('ward_id') is-invalid @enderror">
                                        <option value="">Select ward</option>
                                    </select>
                                    @error('ward_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="sub_location_id" class="">Sub-Location </label>
                                    <select name="sub_location_id" id="sub_location_id" class="form-control" required>
                                        <option>Select Sublocation</option>
                                        @foreach (App\Models\SubLocation::all() as $_)

                                        <option value="{{ $_->id }}">{{ $_->name }}</option>
                                        @endforeach

                                    </select>

                                </div>



                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="village" class="">Village</label>
                                        <input name="village" id="village" placeholder="village" required type="text"
                                            class="form-control">
                                    </div>
                                </div>

                            <div class="col-md-6">

                                <label for="school_id" class="">Which school does the student attend? </label>
                                <select name="school_id" id="school_id" class="form-control" required>
                                    <option>Select School</option>
                                    @foreach ($ecde_schools as $value)
                                        <option value="{{ $value->id }}">{{ $value->school_name }}</option>
                                    @endforeach

                                </select>
                            </div>
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
          
                          
      <script>
                                
    const data = {
        counties: @json($counties),
        constituencies: @json($sub_counties),
        wards: @json($wards),

    };
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
@endsection


