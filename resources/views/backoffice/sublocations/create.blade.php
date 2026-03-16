@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')
@endsection


@section('content')



<h5 class="card-title">  <a href="{{url('create/'. $ward->id .'/sublocations')}}"><button class="btn btn">  <i class="fa fa-arrow-left"></i> Back</button></a> </h5>

@include('flash-message')

<div class="main-card mb-3 card col-12">

    <div class="card-body">

        <h5 class="card-title">Add a sublocation <span  > in {{ $ward->name  }} </span> </h5>
        <form class="" action="{{route('admin.sub-location.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" id="name" placeholder="Enter Sub Location name" required type="text"
                            class="form-control">
                            <input type="hidden" name="ward_id" value="{{$ward->id}}">
                    </div>
                </div>
            </div>

            <button class="mt-2 btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
