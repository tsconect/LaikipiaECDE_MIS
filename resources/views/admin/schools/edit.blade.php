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
            <form class="modern-form-shell" method="POST" action="{{ route('admin.ecde-schools.update', $school->id) }}">
                @csrf
                @method('PUT')
                <div class="card shadow-sm mb-4">

                    <div class="card-header btn-success">
                        <h5 class="mb-0">Update ECDE School</h5>
                    </div>

                    <div class="card-body">

                        <div class="row g-4">



                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="school_name" class="">School Name</label>
                                    <input name="school_name" id="school_name" placeholder="Enter School name" required
                                        value="{{ $school->school_name ?? old('school_name') }}" type="text"
                                        class="form-control">
                                </div>
                            </div>



                            {{-- center_code --}}
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="center_code" class="">Center Code</label>
                                    <input name="center_code" id="center_code" placeholder="Enter center code" 
                                        value="{{ $school->center_code ?? old('center_code') }}" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            {{-- reg_number --}}

                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="reg_number" class="">Registration Number</label>
                                    <input name="reg_number" id="reg_number" placeholder="Enter registration number"
                                        required value="{{ $school->reg_number ?? old('reg_number') }}" type="text"
                                        class="form-control">
                                </div>
                            </div>


                            {{-- 
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="teacher_id" class="">Teacher in Charge</label>
                                    <select name="teacher_id" id="teacher_id" class="form-control">
                                        <option value="">Select teacher</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id ?? null }}">
                                                {{ $teacher->user->first_name ?? null }}
                                                {{ $teacher->user->last_name ?? null }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-4">
                                <label class="form-label fw-semibold">County <span class="text-danger">*</span></label>
                                <select name="county_id" id="countySelect"
                                    class="form-control @error('county_id') is-invalid @enderror" required>
                                    <option value="">Select county</option>
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->county_id }}"
                                            {{ old('county_id') == $county->county_id ? 'selected' : '' }}>
                                            {{ $county->name }}</option>
                                    @endforeach
                                </select>
                                @error('county_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Sub-County</label>
                                <select name="subcounty_id" id="constituencySelect"
                                    class="form-control @error('subcounty_id') is-invalid @enderror">
                                    <option value="">Select sub-county</option>
                                    @foreach ($sub_counties as $sub_county)
                                        <option value="{{ $sub_county->constituency_id }}"
                                            @if ($school->ward->subCounty->constituency_id == $sub_county->constituency_id) selected @elseif(old('subcounty_id') == $sub_county->constituency_id) selected @endif>
                                            {{ $sub_county->name }}</option>
                                    @endforeach
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
                                    @foreach ($wards as $ward)
                                        @if ($ward->constituency_code == $school->ward->subCounty->constituency_id)
                                            <option value="{{ $ward->id }}"
                                                @if ($school->ward_id == $ward->id) selected @elseif(old('ward_id') == $ward->id) selected @endif>
                                                {{ $ward->name }}</option>
                                        @endif
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
                                        @if ($value->ward_id == $school->ward_id)
                                            <option value="{{ $value->id }}"
                                                @if (old('sub_location_id') == $value->id) selected @endif>{{ $value->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('sub_location_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>










                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="has_feeder" class="">Is this a feeder school?</label>
                                    <select name="has_feeder" id="has_feeder" class="form-control">
                                        <option value="No"
                                            @if ($school->feeder_school == 'No') selected @elseif(old('has_feeder') == 'No') selected @endif>
                                            No</option>
                                        <option value="Yes"
                                            @if ($school->feeder_school == 'Yes') selected @elseif(old('has_feeder') == 'Yes') selected @endif>
                                            Yes</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="">
                                    <label for="remarks"> Remarks</label>
                                    <textarea name="remarks" class=" form-control col-12" placeholder="Built on a public land" id="remarks"
                                        colspan="4">
                                        {{ $school->remarks ?? old('remarks') }}
                                    </textarea>
                                </div>
                            </div>




                        </div>
                        <div class="text-right p-2">
                            <button class="btn btn-success" type="submit">
                                Update
                            </button>
                        </div>

                    </div>

                </div>

            </form>

        </div>

        {{-- <script>
            function showFeederDiv() {
                var has_feeder = document.getElementById("has_feeder").value;
                var feeder_div = document.getElementById("feeder_div");

                if (has_feeder == 1) {
                    feeder_div.classList.remove("d-none");
                } else {
                    feeder_div.classList.add("d-none");
                }
            }
        </script> --}}
        {{-- <input type="hidden" id="counties-data" value='{{ json_encode($counties) }}'> --}}
        <script>
            const data = {
               
                constituencies: @json($sub_counties),
                wards: @json($wards),
                sub_locations: @json($sub_locations),

            };
        </script>
      
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const constituencySelect = document.getElementById('constituencySelect');
                const wardSelect = document.getElementById('wardSelect');
                const subLocationSelect = document.getElementById('sub_location_id');



                constituencySelect.addEventListener('change', function() {
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



            wardSelect.addEventListener('change', function() {
                const wardId = this.value;
                subLocationSelect.innerHTML = '<option value="">Select Sublocation</option>';

                if (wardId) {
                    const subLocations = data.sub_locations.filter(sl => sl.ward_id == wardId);
                    subLocations.forEach(subLocation => {
                        const option = document.createElement('option');
                        option.value = subLocation.id;
                        option.textContent = subLocation.name;
                        subLocationSelect.appendChild(option);
                    });
                }
            });
        });
        </script>

    @endsection
