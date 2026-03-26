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
    <form method="POST" action="{{ route('admin.ecde-schools.store') }}">
        @csrf
        <div class="card p-2 shadow-sm mb-4">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Register New ECDE</h5>
            </div>

            <div class="card-body">

               <div class="row g-4">

                            

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="school_name" class="">School Name</label>
                                    <input name="school_name" id="school_name" placeholder="Enter School name" required
                                        type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="number_of_classes" class="">Number of class Rooms</label>
                                    <input name="number_of_classes" id="number_of_classes" placeholder="3" required
                                        type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="class_rooms_status" class=""> Class Rooms Status </label>
                                    <select name="class_rooms_status" id="class_rooms_status" class="form-control" required>
                                        <option value="permanent">Permanent</option>
                                        <option value="Semi_Permanent">Semi Permanent</option>
                                        <option value="one_semipermanent_others_permanent">One Semi-Permanent, Others
                                            Permanent
                                        </option>
                                        <option value="temporary">Temporary</option>
                                        <option value="mud_walled">Mud Walled</option>
                                        <option value="under_tree">Under Tree</option>

                                    </select>
                                </div>
                            </div>

                            {{-- center_code --}}
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="center_code" class="">Center Code</label>
                                    <input name="center_code" id="center_code" placeholder="Enter center code" required
                                        type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="school_name" class="">Number of students:</label>
                                    <input name="number_of_students" id="number_of_students" placeholder="Enter of students" required
                                        type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="school_location" class="">School Location (Latitude, Longitude)</label>
                                    <input name="school_location" id="school_location" placeholder="Enter School location in terms of latitude, longitude e.g. 37.7749, -122.4194" required
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="teacher_id" class="">Teacher in Charge</label>
                                    <select name="teacher_id" id="teacher_id" class="form-control">
                                        <option value="">Select teacher</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id ?? null }}">{{ $teacher->user->first_name ?? null }} {{ $teacher->user->last_name ?? null }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">County <span class="text-danger">*</span></label>
                            <select name="county_id" id="countySelect" 
                                    class="form-control @error('county_id') is-invalid @enderror"
                                     required>
                                <option value="">Select county</option>
                                     @foreach($counties as $county)
                                        <option value="{{ $county->county_id }}" {{ old('county_id') == $county->county_id ? 'selected' : '' }}>{{ $county->name }}</option>
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
                                <div class="position-relative form-group">
                                    <label for="has_feeder" class="">Does this school have a feeder school?</label>
                                    <select name="has_feeder" id="has_feeder" class="form-control" onchange="showFeederDiv()">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                             <div class="col-md-6 d-none" id="feeder_div">
                                <div class="position-relative form-group">
                                    <label for="feeder_id" class="">Feeder School </label>

                                    <select name="feeder_id" id="feeder_id" class="form-control">
                                        <option value="">Select Feeder School</option>
                                        @foreach ($feeder_schools as $value)
                                            <option value="{{ $value->id ?? null }}">{{ $value->school_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="">
                                    <label for="remarks"> Remarks</label>
                                    <textarea name="remarks" class=" form-control col-12" placeholder="Built on a public land" id="remarks" colspan="4"
                                        style="width: 100%;"></textarea>
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
                                function showFeederDiv() {
                                    var has_feeder = document.getElementById("has_feeder").value;
                                    var feeder_div = document.getElementById("feeder_div");

                                    if (has_feeder == 1) {
                                        feeder_div.classList.remove("d-none");
                                    } else {
                                        feeder_div.classList.add("d-none");
                                    }
                                }
                            </script>
      <script>
                                // Pass PHP variables to JavaScript
    const data = {
        counties: @json($counties),
        constituencies: @json($sub_counties),
        wards: @json($wards),

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

