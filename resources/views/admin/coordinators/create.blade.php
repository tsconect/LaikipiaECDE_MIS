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
    <form class="modern-form-shell" method="POST" action="{{ route('admin.coordinators.store') }}">
        @csrf


        <!-- ================= PERSONAL INFORMATION ================= -->

        <div class="card shadow-sm mb-4">

            <div class="card-header btn-success">
                <h5 class="mb-0">Register New Cordinator</h5>
            </div>

            <div class="card-body">

               <div class="row g-4">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    
                    <div class="col-md-4 mb-3">
                        <label for="first_name">First Name</label>

                        <input 
                            type="text"
                            name="first_name"
                            id="first_name"
                            class="form-control"
                            placeholder="John"
                            value="{{ old('first_name') }}"
                        >

                        @error('first_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="middle_name">Middle Name</label>

                        <input
                            type="text"
                            name="middle_name"
                            id="middle_name"
                            class="form-control"
                            placeholder="Doe"
                            value="{{ old('middle_name') }}"
                        >

                        @error('middle_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="last_name">Last Name</label>

                        <input
                            type="text"
                            name="last_name"
                            id="last_name"
                            class="form-control"
                            placeholder="Watt"
                            value="{{ old('last_name') }}"
                        >

                        @error('last_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- PWD Status -->
                         <div class="col-md-4 mb-3">
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



                    <div class="col-md-4 mb-3">
                        <label for="ethnicity">Ethnicity</label>

                        <select
                            name="ethnicity_id"
                            id="ethnicity_id"
                            class="form-control"
                        >
                            <option value="">Select Ethnicity</option>
                            <option value="kikuyu">Kikuyu</option>
                            <option value="luhya">Luhya</option>
                            <option value="luo">Luo</option>
                            <option value="kalenjin">Kalenjin</option>
                            <option value="kamba">Kamba</option>
                            <option value="meru">Meru</option>
                            <option value="kisii">Kisii</option>
                            <option value="maasai">Maasai</option>
                        </select>

                        @error('ethnicity_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="email">Email</label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            placeholder="example@xyz.com"
                            value="{{ old('email') }}"
                        >

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="phone">Phone</label>

                        <input
                            type="text"
                            name="phone_number"
                            id="phone"
                            class="form-control"
                            placeholder="07********"
                            value="{{ old('phone') }}"
                        >

                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="id_number">ID Number</label>

                        <input
                            type="number"
                            name="id_number"
                            id="id_number"
                            class="form-control"
                            value="{{ old('id_number') }}"
                            placeholder="Enter ID"
                        >

                        @error('id_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="kra_pin">KRA PIN</label>

                        <input
                            type="text"
                            name="kra_pin"
                            id="kra_pin"
                            class="form-control"
                            value="{{ old('kra_pin') }}"
                            placeholder="A*********"
                        >

                        @error('kra_pin')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="gender">Gender</label>

                        <select
                            name="gender"
                            id="gender"
                            class="form-control"
                        >
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                        @error('gender')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="dob">Date of Birth</label>

                        <input
                            type="date"
                            name="dob"
                            id="dob"
                            class="form-control"
                            value="{{ old('dob') }}"
                        >

                        @error('dob')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                   

                    <script type="text/javascript">
                        function hasTsc()
                        {
                            if(document.getElementById('has_tsc').value == 1)
                            {
                                document.getElementById('school_contact_tsc_number_div').style.display = 'block';
                            }
                            else
                            {
                                document.getElementById('school_contact_tsc_number_div').style.display = 'none';
                            }
                        }
                    </script>



                   
 <!-- Location Fields (Cascading) -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">County <span class="text-danger">*</span></label>
                            <select name="county_id" id="countySelect" 
                                    class="form-control @error('county_id') is-invalid @enderror"
                                     required>
                                <option value="">Select county</option>
                                     @foreach($counties as $county)
                                        <option value="{{ $county->county_id }}" {{ old('county_id') == $county->county_id || $county->county_id == 'ob6SxuRcqU4' ? 'selected' : '' }}>{{ $county->name }}</option>
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
                            <label class="form-label fw-semibold">School you cordiante<span class="text-danger">*</span></label>
                            <select name="school_id" id="schoolSelect" 
                                    class="form-control @error('school_id') is-invalid @enderror"
                                    >
                                <option value="">Select school</option>
                                @foreach($ecde_schools as $school)
                                    <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>{{ $school->school_name }}</option>
                                @endforeach
                            </select>
                            @error('school_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @error('job_group')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>
                <div class="text-right">
                    <button class="btn btn-success" type="submit">
                        Register
                    </button>
                </div>

            </div>

        </div>

    </form>

</div>
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
