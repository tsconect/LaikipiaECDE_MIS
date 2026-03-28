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
        <form class="modern-form-shell" method="POST" action="{{ route('admin.feeder-schools.update', $school->id) }}">
            @csrf
            @method('PUT')
            <div class="card shadow-sm mb-4">
                <div class="card-header btn-success">
                    <h5 class="mb-0">Edit Feeder School: {{ $school->school_name }}</h5>
                </div>

                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="school_name" class="">School Name</label>
                                <input name="school_name" id="school_name" value="{{ $school->school_name }}" placeholder="Enter School name" required
                                    type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="number_of_classes" class="">Number of class Rooms</label>
                                <input name="number_of_classes" id="number_of_classes" value="{{ $school->number_of_classes }}" placeholder="3" required
                                    type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="class_rooms_status" class=""> Class Rooms Status </label>
                                <select name="class_rooms_status" id="class_rooms_status" class="form-control" required>
                                    <option value="permanent" {{ $school->class_rooms_status == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                    <option value="Semi_Permanent" {{ $school->class_rooms_status == 'Semi_Permanent' ? 'selected' : '' }}>Semi Permanent</option>
                                    <option value="one_semipermanent_others_permanent" {{ $school->class_rooms_status == 'one_semipermanent_others_permanent' ? 'selected' : '' }}>One Semi-Permanent, Others Permanent</option>
                                    <option value="temporary" {{ $school->class_rooms_status == 'temporary' ? 'selected' : '' }}>Temporary</option>
                                    <option value="mud_walled" {{ $school->class_rooms_status == 'mud_walled' ? 'selected' : '' }}>Mud Walled</option>
                                    <option value="under_tree" {{ $school->class_rooms_status == 'under_tree' ? 'selected' : '' }}>Under Tree</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="number_of_students" class="">Number of students:</label>
                                <input name="number_of_students" id="number_of_students" value="{{ $school->number_of_students }}" placeholder="Enter of students" required
                                    type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="school_location" class="">School Location (Latitude, Longitude)</label>
                                <input name="school_location" id="school_location" value="{{ $school->school_location }}" placeholder="Enter School location" required
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="teacher_id" class="">Teacher in Charge</label>
                                <select name="teacher_id" id="teacher_id" class="form-control">
                                    <option value="">Select teacher</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ $school->teacher_id == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->user->first_name ?? '' }} {{ $teacher->user->last_name ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">County <span class="text-danger">*</span></label>
                            <select name="county_id" id="countySelect" class="form-control" required>
                                <option value="">Select county</option>
                                @foreach($counties as $county)
                                    <option value="{{ $county->county_id }}" {{ $school->county_id == $county->county_id ? 'selected' : '' }}>{{ $county->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Sub-County</label>
                            <select name="subcounty_id" id="constituencySelect" class="form-control">
                                <option value="">Select sub-county</option>
                                @foreach($sub_counties as $sub_county)
                                    <option value="{{ $sub_county->constituency_id }}" {{ $school->subcounty_id == $sub_county->constituency_id ? 'selected' : '' }}>{{ $sub_county->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Ward</label>
                            <select name="ward_id" id="wardSelect" class="form-control">
                                <option value="">Select ward</option>
                                @foreach($wards as $ward)
                                    <option value="{{ $ward->id }}" {{ $school->ward_id == $ward->id ? 'selected' : '' }}>{{ $ward->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <div class="">
                                <label for="remarks"> Remarks</label>
                                <textarea name="remarks" class="form-control col-12" id="remarks">{{ $school->remarks }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-right p-2">
                        <button class="btn btn-success" type="submit">Update Feeder School</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <input type="hidden" id="counties-data" value='{{ json_encode($counties) }}'>
    <input type="hidden" id="constituencies-data" value='{{ json_encode($sub_counties) }}'>
    <input type="hidden" id="wards-data" value='{{ json_encode($wards) }}'>

    <script>
        const data = {
            counties: JSON.parse(document.getElementById('counties-data').value || '[]'),
            constituencies: JSON.parse(document.getElementById('constituencies-data').value || '[]'),
            wards: JSON.parse(document.getElementById('wards-data').value || '[]'),
        };

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
</div>
@endsection
