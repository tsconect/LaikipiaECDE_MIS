@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')
@endsection


@section('content')

@include('flash-message')


<h5 class="card-title">  <a href="{{url('admin/all-wards', $data->id)}}"><button class="btn btn">  <i class="fa fa-arrow-left"></i> Back</button></a> </h5>


<div class="main-card mb-3 card col-12">

    <div class="card-body">

        <h5 class="card-title">Create Ward in {{ $data->name }} Constituency.</h5>
        <form class="" action="{{route('admin.wards.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" id="name" placeholder="Enter Ward name" required type="text"
                            class="form-control">
                            <input type="hidden" name="const_id" value="{{$data->id}}">
                    </div>
                </div>
            </div>

            <button class="mt-2 btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
