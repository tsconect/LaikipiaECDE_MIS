@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')

@endsection

@section('title', 'Barriers & Roadblocks')
@section('content')


@include('flash-message')


<div class="main-card mb-3 card col-12">
    <div class="card-body">
        <h5 class="card-title mb-4">Add A New Chief</h5>
        <form class="" action="{{ route('admin.chiefs.store') }}" method="post">
            @csrf
            <div class="form-row">
                <!-- First Name -->
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="first_name" class="">First Name</label>
                        <input name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Enter first name" required type="text"
                               class="form-control">
                               @error('first_name')
                          <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <!-- Last Name -->
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="last_name" class="">Last Name</label>
                        <input name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Enter last name" required type="text"
                               class="form-control">
                               @error('last_name')
                          <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="email" class="">Email</label>
                        <input name="email" id="email" value="{{ old('email') }}" placeholder="Enter email" required type="email"
                               class="form-control">
                               @error('email')
                          <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <!-- Phone Number -->
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="phone_number" class="">Phone Number</label>
                        <input name="phone_number" id="phone_number" value="{{ old('phone_number') }}" placeholder="Enter phone number" required type="text"
                               class="form-control">
                               @error('phone_number')
                          <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <!-- Password -->
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="password" class="">Password</label>
                        <input name="password" id="password" value="{{ old('password') }}" placeholder="Enter password" required type="password"
                               class="form-control">
                        @error('password')
                          <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <!-- Confirm Password -->
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="password_confirmation" class="">Confirm Password</label>
                        <input name="password_confirmation" value="{{ old('password_') }}" id="password_confirmation" placeholder="Confirm password" required type="password"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group col-md-6 required">
                    
                    <label for="county" class="control-label">County</label>
                    <select name="county" id="county" class="form-control" required>
                        <option>Select County</option>
                        @foreach ($counties as $county)
                            <option value="{{ $county->name }}" @if(old('county') == $county->name) selected @endif>{{ $county->name }}</option>
                        @endforeach
                    </select>

                    @error('county')
                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 required">
                    <label for="subCounty" class="control-label">Sub County</label>
                    <select name="sub_county" class="form-control" id="subcounty" required>
                        <option value="">Select Subcounty</option>
                    </select>
                    
                </div>
             

                <div class="form-group col-md-6 required">
                    <label for="ward" class="control-label">Ward</label>
                    <select name="ward_id" class="form-control " id="ward" required>
                        <option value="">Select Ward</option>
                    </select>

              
                </div>

                <!-- Location -->
                <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="location" class="">Location</label>
                    <div class="input-group">
                        <select name="location_id" id="location" class="form-control" required>
                            <option value="">Select Location</option>
                        </select>     
                    </div>
                    @error('location_id')
                          <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                      @enderror
                    <small id="locationHelp" class="form-text text-muted">
                        <a href="{{route('admin.location.create')}}" onclick="addLocation()">Location not available? Add location</a>
                    </small>
                </div>
            </div>
            </div>
            <button class="mt-2 btn btn-primary text-right">Submit</button>
        </form>
    </div>
</div>

<script>
        var thecounties = @json($counties);
        var thesubcounties = @json($subCounties);
        var thewards = @json($wards);
        var thelocations = @json($locations);
        console.log(thelocations);

        // Check the type of the first county's id
        console.log(typeof thelocations[0].id);



        var countySelect = document.getElementById('county');
        var subcountySelect = document.getElementById('subcounty');
        var wardSelect = document.getElementById('ward');
        var locationSelect = document.getElementById('location');
        
        document.addEventListener("DOMContentLoaded", function() {
                var selectedCounty = thecounties.find(function(county) {
                    return county.id === "xuFdFy6t9AH";
                });
                countySelect.value = selectedCounty.name;
                countySelect.disabled = true;
                countySelect.dispatchEvent(new Event('change'));
            });

            countySelect.addEventListener('change', function() {
                var selectedCounty = countySelect.value;
                subcountySelect.innerHTML = '<option value="">Select Subcounty</option>';
                wardSelect.innerHTML = '<option value="">Select Ward</option>';
                if (selectedCounty) {
                    var county = thecounties.find(function(county) {
                        return county.name === selectedCounty;
                    });
                    var subcounties = @json($subCounties);

                    console.log(county.id);
                    var subcounties = subcounties.filter(function(subcounty) {
                        return subcounty.county_id === county.id;
                    });
                    subcounties.forEach(function(subcounty) {
                        var option = document.createElement('option');
                        option.value = subcounty.name;
                        option.innerHTML = subcounty.name;
                        subcountySelect.appendChild(option);
                    });
                }
         });
        
        subcountySelect.addEventListener('change', function() {
            var selectedSubcounty = subcountySelect.value;
            wardSelect.innerHTML = '<option value="">Select Ward</option>';
            if (selectedSubcounty) {
                var subcounty = thesubcounties.find(function(subcounty) {
                    return subcounty.name === selectedSubcounty;
                });
                var wards = @json($wards);
                var wards = wards.filter(function(ward) {
                    return ward.sub_county_id === subcounty.id;
                });
                wards.forEach(function(ward) {
                    var option = document.createElement('option');
                    option.value = ward.id;
                    option.innerHTML = ward.name;
                    wardSelect.appendChild(option);
                });
            }
        });
        wardSelect.addEventListener('change', function() {
            var selectedWard = wardSelect.value;
            locationSelect.innerHTML = '<option value="">Select Location</option>';
            if (selectedWard) {
                var ward = thewards.find(function(ward) {
                    return ward.id == selectedWard;  // Use == to allow type coercion
                });
                var locations = @json($locations);
                var locations = locations.filter(function(location) {
                    return location.ward_id === ward.id;
                });
                locations.forEach(function(location) {
                    var option = document.createElement('option');
                    option.value = location.id;
                    option.innerHTML = location.name;
                    locationSelect.appendChild(option);
                });
            }
        });

    </script>

@endsection
