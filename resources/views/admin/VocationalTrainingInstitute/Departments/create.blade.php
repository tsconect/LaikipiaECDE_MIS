@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')

@endsection

@section('title', 'Barriers & Roadblocks')
@section('content')


    @include('flash-message')




    <div class="main-card mb-3 card col-12">
        <div class="card-body">
            @if ($dpt)
                <h5 class="card-title">Create Vocational Training Deptment Details <small>within
                        {{ App\Models\VTC::find($dpt)->name }}</small></h5>
            @else
                <h5 class="card-title">Create Vocational Training Deptment Details </small></h5>
            @endif
            <form class="" action="{{ route('admin.vtc_dept.store') }}" method="post">
                @csrf
                <div class="form-row">

                    @if ($dpt)
                        <input value="{{ $dpt }}" name="vtc_id" type="text" hidden>
                    @else
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="vtc_id" class="">vtc </label>
                                <select name="vtc_id" id="vtc_id" class="form-control" required>
                                    <option>Select Vtc</option>
                                    @foreach (App\Models\VTC::all() as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    @endif


                    {{-- <input name="vtc_id" id="vtc_id" placeholder="Select VTC " required type="text"
                                class="form-control"> --}}

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="department_name" class="">department_name</label>
                            <input name="department_name" id="department_name" placeholder="Enter department_name"
                                required type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="capacity" class="">capacity</label>
                            <input name="capacity" id="capacity" placeholder="Enter capacity" required type="text"
                                class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="additional_description" class="">additional_description</label>
                            <input name="additional_description" id="additional_description"
                                placeholder="Enter additional_description" required type="text" class="form-control">
                        </div>
                    </div>



                </div>

                <button class="mt-2 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


@endsection
