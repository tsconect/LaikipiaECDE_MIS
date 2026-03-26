@extends('admin.app')


@section('nav-bar')
   @include('backoffice.teachers.navbar')
@endsection

@section('title', 'Barriers & Roadblocks')
@section('content')

@include('flash-message')

<div class="main-card mb-3 card col-12">
    <div class="card-body">
        <h5 class="card-title">Edit {{ $data->name }} Constituency Details</h5>
        <form class="" action="{{url('admin/constituency/edit/'. $data->id)}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input value="{{ $data->name }}" name="name" id="name" placeholder="Enter Constituency name" required type="text"
                            class="form-control">
                    </div>
                </div>
            </div>

            <button class="mt-2 btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection
