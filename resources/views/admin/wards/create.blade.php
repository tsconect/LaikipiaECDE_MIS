@extends('admin.app')


@section('nav-bar')

@include('admin.layouts.sidebar')
@endsection


@section('content')

@include('flash-message')


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

            <div class="text-end">
                <button class="mt-2 btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
