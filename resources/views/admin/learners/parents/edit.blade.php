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
        <form class="modern-form-shell" method="POST" action="{{ route('admin.learners.update', $learner->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card shadow-sm mb-4">
                <div class="card-header btn-success">
                    <h5 class="mb-0">Edit Learner: {{ $learner->first_name }} {{ $learner->last_name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <h5 class="p-2 text-success">Personal Information</h5>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="first_name" class="">First Name</label>
                                <input name="first_name" id="first_name" value="{{ $learner->first_name }}" placeholder="John" required type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="middle_name" class="">Middle Name</label>
                                <input name="middle_name" id="middle_name" value="{{ $learner->middle_name }}" placeholder="Doe" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="last_name" class="">Last Name</label>
                                <input name="last_name" id="last_name" value="{{ $learner->last_name }}" placeholder="Watt" required type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="birth_certificate_number" class="">Birth Certificate Number</label>
                                <input name="birth_certificate_number" id="birth_certificate_number" value="{{ $learner->birth_certificate_number }}" placeholder="Enter Birth Certificate Number" required type="text" class="form-control">
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
                                    <option value="{{ $nationality->id }}" {{ $learner->nationality_id == $nationality->id ? 'selected' : '' }}>{{ $nationality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- PWD Status -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Abled Differently(PWD)? <span class="text-danger">*</span></label>
                            <select name="pwd_status" id="pwd_status" class="form-control @error('pwd_status') is-invalid @enderror" onchange="togglePWDFields()" required>
                                <option value="">Select option</option>
                                <option value="Yes" {{ $learner->pwd_status == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ $learner->pwd_status == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('pwd_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Conditional PWD Fields -->
                        <div id="pwd_fields" class="col-md-12 row g-4" style="{{ $learner->pwd_status == 'Yes' ? '' : 'display: none;' }}">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">PWD Number</label>
                                <input name="pwd_number" id="pwd_number" value="{{ $learner->pwd_number }}" placeholder="Enter PWD Number" type="text" class="form-control @error('pwd_number') is-invalid @enderror">
                                @error('pwd_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Disability Type</label>
                                <select name="disability_type" class="form-control @error('disability_type') is-invalid @enderror">
                                    <option value="">Select type</option>
                                    <option value="Visual Impairment" {{ $learner->disability_type == 'Visual Impairment' ? 'selected' : '' }}>Visual Impairment</option>
                                    <option value="Hearing Impairment (Deaf)" {{ $learner->disability_type == 'Hearing Impairment (Deaf)' ? 'selected' : '' }}>Hearing Impairment (Deaf)</option>
                                    <option value="Physical Impairment" {{ $learner->disability_type == 'Physical Impairment' ? 'selected' : '' }}>Physical Impairment</option>
                                    <option value="Intellectual Disability" {{ $learner->disability_type == 'Intellectual Disability' ? 'selected' : '' }}>Intellectual Disability</option>
                                    <option value="Speech & Language Impairment" {{ $learner->disability_type == 'Speech & Language Impairment' ? 'selected' : '' }}>Speech & Language Impairment</option>
                                    <option value="Multiple Disabilities" {{ $learner->disability_type == 'Multiple Disabilities' ? 'selected' : '' }}>Multiple Disabilities</option>
                                    <option value="Other" {{ $learner->disability_type == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('disability_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Impairment Details</label>
                                <textarea name="impairment_details" class="form-control @error('impairment_details') is-invalid @enderror" rows="3" placeholder="Brief description of impairment...">{{ $learner->impairment_details }}</textarea>
                                @error('impairment_details')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="gender" class="">Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ $learner->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $learner->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="dob" class="">Date of birth</label>
                                <input name="dob" id="dob" value="{{ $learner->dob }}" required type="date" max="{{ date('Y-m-d')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="photo" class="">Passport Photo (Upload size 2MB Max)</label>
                                <input name="photo" id="photo" type="file" class="form-control" accept="image/*">
                                @if($learner->passport_photo)
                                    <small class="text-muted">Current photo exists</small>
                                @endif
                            </div>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <h5 class="p-2 text-success">Enrollment and Admission Details</h5>

                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="nemis_number" class="">Nemis Number:</label>
                                <input name="nemis_number" id="nemis_number" value="{{ $learner->nemis_number }}" placeholder="Nemis Number:" required type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">County <span class="text-danger">*</span></label>
                            <select name="county_id" id="countySelect" class="form-control @error('county_id') is-invalid @enderror" required>
                                <option value="">Select county</option>
                                @foreach($counties as $county)
                                    <option value="{{ $county->county_id }}" {{ (isset($learner->ward->constituency->county) && $learner->ward->constituency->county->county_id == $county->county_id) ? 'selected' : '' }}>{{ $county->name }}</option>
                                @endforeach
                            </select>
                            @error('county_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Sub-County</label>
                            <select name="subcounty_id" id="constituencySelect" class="form-control @error('subcounty_id') is-invalid @enderror">
                                <option value="">Select sub-county</option>
                                @foreach($sub_counties as $sc)
                                    <option value="{{ $sc->constituency_id }}" {{ (isset($learner->ward->constituency) && $learner->ward->constituency->constituency_id == $sc->constituency_id) ? 'selected' : '' }}>{{ $sc->name }}</option>
                                @endforeach
                            </select>
                            @error('subcounty_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Ward</label>
                            <select name="ward_id" id="wardSelect" class="form-control @error('ward_id') is-invalid @enderror">
                                <option value="">Select ward</option>
                                @foreach($wards as $w)
                                    <option value="{{ $w->id }}" {{ $learner->ward_id == $w->id ? 'selected' : '' }}>{{ $w->name }}</option>
                                @endforeach
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
                                    <option value="{{ $value->id }}" {{ $learner->sub_location_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @error('sub_location_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="village" class="">Village</label>
                                <input name="village" id="village" value="{{ $learner->village }}" placeholder="village" required type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="school_id" class="">School Name </label>
                            <select name="school_id" id="school_id" class="form-control" required>
                                <option>Select School</option>
                                @foreach ($ecde_schools as $value)
                                    <option value="{{ $value->id }}" {{ $learner->school_id == $value->id ? 'selected' : '' }}>{{ $value->school_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="admission_number" class="">Admission Number</label>
                            <input name="admission_number" id="admission_number" value="{{ $learner->admission_number }}" placeholder="admission number" required type="text" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="date_of_admission" class="">Date of Admission</label>
                            <input name="date_of_admission" id="date_of_admission" value="{{ $learner->date_of_admission }}" placeholder="date of admission" required type="date" class="form-control" max="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="class" class="">Class</label>
                            <select name="class" id="class" class="form-control" required>
                                <option value="">Select Class</option>
                                <option value="Baby Class" {{ $learner->class == 'Baby Class' ? 'selected' : '' }}>Baby Class</option>
                                <option value="PP1" {{ $learner->class == 'PP1' ? 'selected' : '' }}> PP1</option>
                                <option value="PP2" {{ $learner->class == 'PP2' ? 'selected' : '' }}> PP2</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="mode_of_admission" class="">Mode of Admission</label>
                            <select name="mode_of_admission" id="mode_of_admission" class="form-control" required>
                                <option value="">Select Mode of Admission</option>
                                <option value="new" {{ $learner->mode_of_admission == 'new' ? 'selected' : '' }}>New Student</option>
                                <option value="transfer" {{ $learner->mode_of_admission == 'transfer' ? 'selected' : '' }}>Transfer Student</option>
                            </select>
                        </div>
                  
                        <hr>
                        @php $parent = $learner->parent; @endphp
                        <h5 class="p-2 text-success">Parent / Guardian Information</h5>

                        <div class="col-md-4">
                            <label class="form-label">First Name</label>
                            <input type="text" name="parent_first_name" class="form-control @error('parent_first_name') is-invalid @enderror" placeholder="Enter first name" value="{{ old('parent_first_name', $parent->first_name ?? '') }}">
                            @error('parent_first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Middle Name</label>
                            <input type="text" name="parent_middle_name" class="form-control @error('parent_middle_name') is-invalid @enderror" placeholder="Enter middle name" value="{{ old('parent_middle_name', $parent->middle_name ?? '') }}">
                            @error('parent_middle_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="parent_last_name" class="form-control @error('parent_last_name') is-invalid @enderror" placeholder="Enter last name" value="{{ old('parent_last_name', $parent->last_name ?? '') }}">
                            @error('parent_last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Relationship</label>
                            <select name="parent_relationship" class="form-control @error('parent_relationship') is-invalid @enderror">
                                <option value="">Select</option>
                                <option value="mother" {{ old('parent_relationship', $parent->relationship ?? '') == 'mother' ? 'selected' : '' }}>Mother</option>
                                <option value="father" {{ old('parent_relationship', $parent->relationship ?? '') == 'father' ? 'selected' : '' }}>Father</option>
                                <option value="guardian" {{ old('parent_relationship', $parent->relationship ?? '') == 'guardian' ? 'selected' : '' }}>Guardian</option>
                                <option value="other" {{ old('parent_relationship', $parent->relationship ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('parent_relationship')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">ID Number</label>
                            <input type="text" name="parent_id_number" class="form-control @error('parent_id_number') is-invalid @enderror" placeholder="Enter ID number" value="{{ old('parent_id_number', $parent->id_number ?? '') }}">
                            @error('parent_id_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="parent_phone_number" class="form-control @error('parent_phone_number') is-invalid @enderror" placeholder="Enter primary phone" value="{{ old('parent_phone_number', $parent->phone_number ?? '') }}">
                            @error('parent_phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Alternative Phone</label>
                            <input type="text" name="parent_alernative_phone_number" class="form-control @error('parent_alernative_phone_number') is-invalid @enderror" placeholder="Enter alternative phone" value="{{ old('parent_alernative_phone_number', $parent->alernative_phone_number ?? '') }}">
                            @error('parent_alernative_phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="parent_email" class="form-control @error('parent_email') is-invalid @enderror" placeholder="Enter email" value="{{ old('parent_email', $parent->email ?? '') }}">
                            @error('parent_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">County <span class="text-danger">*</span></label>
                            <select name="parent_county_id" id="countySelect2" class="form-control @error('parent_county_id') is-invalid @enderror" required>
                                <option value="">Select county</option>
                                @foreach($counties as $county)
                                    <option value="{{ $county->county_id }}" {{ (isset($parent->ward->constituency->county) && $parent->ward->constituency->county->county_id == $county->county_id) ? 'selected' : '' }}>{{ $county->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_county_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Sub-County</label>
                            <select name="parent_subcounty_id" id="constituencySelect2" class="form-control @error('parent_subcounty_id') is-invalid @enderror">
                                <option value="">Select sub-county</option>
                                @foreach($sub_counties as $sc)
                                    <option value="{{ $sc->constituency_id }}" {{ (isset($parent->ward->constituency) && $parent->ward->constituency->constituency_id == $sc->constituency_id) ? 'selected' : '' }}>{{ $sc->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_subcounty_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                  
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Ward</label>
                            <select name="parent_ward_id" id="wardSelect2" class="form-control @error('parent_ward_id') is-invalid @enderror">
                                <option value="">Select ward</option>
                                @foreach($wards as $w)
                                    <option value="{{ $w->id }}" {{ (isset($parent->ward_id) && $parent->ward_id == $w->id) ? 'selected' : '' }}>{{ $w->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_ward_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Village</label>
                            <input type="text" name="parent_village" class="form-control @error('parent_village') is-invalid @enderror" placeholder="Enter village" value="{{ old('parent_village', $parent->village ?? '') }}">
                            @error('parent_village')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-right p-2">
                            <button class="btn btn-success" type="submit">Update Learner</button>
                        </div>
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

        function togglePWDFields() {
            const status = document.getElementById('pwd_status').value;
            const fields = document.getElementById('pwd_fields');
            fields.style.display = (status === 'Yes') ? 'flex' : 'none';
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Learner location scripts
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

            // Parent location scripts
            const countySelect2 = document.getElementById('countySelect2');
            const constituencySelect2 = document.getElementById('constituencySelect2');
            const wardSelect2 = document.getElementById('wardSelect2');
           
            countySelect2.addEventListener('change', function () {
                const countyId = this.value;
                constituencySelect2.innerHTML = '<option value="">Select Sub County</option>';
                wardSelect2.innerHTML = '<option value="">Select Ward</option>';
               
                if (countyId) {
                    const constituencies = data.constituencies.filter(c => c.county_code == countyId);
                    constituencies.forEach(constituency => {
                        const option = document.createElement('option');
                        option.value = constituency.constituency_id;
                        option.textContent = constituency.name;
                        constituencySelect2.appendChild(option);
                    });
                }
            });

            constituencySelect2.addEventListener('change', function () {
                const constituencyId = this.value;
                wardSelect2.innerHTML = '<option value="">Select Ward</option>';
                if (constituencyId) {
                    const wards = data.wards.filter(w => w.constituency_code == constituencyId);
                    wards.forEach(ward => {
                        const option = document.createElement('option');
                        option.value = ward.id;
                        option.textContent = ward.name;
                        wardSelect2.appendChild(option);
                    });
                }
            });

            if (document.getElementById('pwd_status').value === 'Yes') {
                document.getElementById('pwd_fields').style.display = 'flex';
            }
        });
    </script>   
</div>
@endsection
