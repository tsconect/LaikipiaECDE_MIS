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
    <form class="modern-form-shell" method="POST" action="{{ route('admin.deployment-histories.store') }}" enctype="multipart/form-data">
        @csrf


        <!-- ================= PERSONAL INFORMATION ================= -->

        <div class="card shadow-sm mb-4">

            <div class="card-header btn-success">
                <h5 class="mb-0">
                    Add Deployment History
                </h5>
            </div>
            @csrf
            <div class="form-row">


                

                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="school_id" class="">School Deployed</label>
                        <select name="school_id" id="school_id" class="form-control" required>
                            <option value="">Select School</option>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

              

                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="start_date" class="">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required
                        max="{{ date('Y-m-d') }}">
                        
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="end_date" class="">End Date (optional)</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required
                        max="{{ date('Y-m-d') }}">
                        
                    </div>

                </div>

                

                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="file_attachment" class="">Transfer Letter</label>
                        <input type="file" name="file_attachment" id="file_attachment" class="form-control" required accept=".pdf">
                    </div>
                </div>

                <div class="col-md-12 ">
                    <div class="position-relative form-group">
                        <label for="reason" class="">Reason (optional)</label>
                        <textarea name="reason" id="reason" class="form-control" rows="5"></textarea>
                    </div>

                </div>
               
             
            </div>

            <div class="text-right">
                    <button class="btn btn-success" type="submit">
                        Submit
                    </button>
                </div>
        </form>
    </div>
</div>


@endsection
