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
    <form class="modern-form-shell" method="POST" action="{{ route('admin.education-histories.store') }}">
        @csrf


        <!-- ================= PERSONAL INFORMATION ================= -->

        <div class="card shadow-sm mb-4">

            <div class="card-header btn-success">
                <h5 class="mb-0">Add New Academic Qualification</h5>
            </div>
            <div class="form-row modern-form-body">
                
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="institution_name" class="">Institution Name</label>
                        <input name="institution_name" id="institution_name" placeholder="Enter institution name" type="text"
                            class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="award" class="">Award</label>
                        <select name="award" id="award" class="form-control" required>
                            <option value="">Select Award</option>
                            <option value="kcpe">KCPE</option>
                            <option value="kcse">KCSE</option>
                            <option value="artisan">Artisan</option>
                            <option value="certificate">Certificate</option>
                            <option value="diploma">Diploma</option>
                            <option value="degree">Degree</option>
                            <option value="masters">Masters</option>
                            <option value="phd">PhD</option>
                        </select>
                    </div>
                </div>
          
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="course" class="">Course</label>
                        <input name="course" id="course" placeholder="Enter course" type="text"
                            class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="grade" class="">Grade</label>
                        <input name="grade" id="grade" placeholder="Enter grade" type="text"
                            class="form-control">
                    </div>
                </div>
         
          
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="start_date" class="">Start Date</label>
                        <input name="start_date" id="start_date" placeholder="Enter start date" type="date"
                            class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="end_date" class="">End Date</label>
                        <input name="end_date" id="end_date" placeholder="Enter end date" type="date"
                            class="form-control">
                    </div>
                </div>
           
         
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="certificate_no" class="">Certificate Number</label>
                        <input name="certificate_no" id="certificate_no" placeholder="Enter certificate number" type="text"
                            class="form-control">
                    </div>
                </div>
            </div>

            <div class="modern-form-footer px-3 pb-3">
                    <button class="btn modern-form-submit" type="submit">
                        Submit
                    </button>
                </div>
        </div>
        </form>
    </div>
</div>


@endsection
