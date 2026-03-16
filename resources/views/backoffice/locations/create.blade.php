@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')

@endsection

@section('title', 'Barriers & Roadblocks')
@section('content')


@include('flash-message')




<div class="main-card mb-3 card col-12">
    <div class="card-body">
        <h5 class="card-title">Add a Location</h5>
        <form class="" action="{{route('admin.location.store')}}" method="post">
            @csrf
            <div class="form-row">
              
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
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" id="name" placeholder="Enter Locations name" required type="text"
                            class="form-control">
                    </div>
                </div>
            </div>
            <button class="mt-2 btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script>
        var thecounties = @json($counties);
        var thesubcounties = @json($subCounties);
        var thecounties = @json($counties);
        console.log(thecounties);

        // Check the type of the first county's id
        console.log(typeof thecounties[0].id);



        var countySelect = document.getElementById('county');
        var subcountySelect = document.getElementById('subcounty');
        var wardSelect = document.getElementById('ward');
        
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
    </script>
@endsection
