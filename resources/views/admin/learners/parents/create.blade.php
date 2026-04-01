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
    <form class="modern-form-shell" method="POST" action="{{ route('admin.learner-parents.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card shadow-sm mb-4">

            <div class="card-header btn-success">
                <h5 class="mb-0">Add Parental Details</h5>
            </div>
                            <div class="card-body">
                            <input type="hidden" name="learner_id" value="{{ $learner_id }}">

             
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Parent Details</label>
                                <select id="family_setup" name="family_setup" class="form-control" onchange="toggleFamilyFields()" required>
                                    <option value="">Select option</option>
                                    {{-- <option value="both">Both Parents Alive</option> --}}
                                    <option value="father_only">Single Father</option>
                                    <option value="mother_only">Single Mother</option>
                                    <option value="guardian">Guardian</option>
                                </select>
                            </div>


        
                  
                 

   

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
    

    // Hide all first
    father.style.display = 'none';
    mother.style.display = 'none';
    guardian.style.display = 'none';


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


