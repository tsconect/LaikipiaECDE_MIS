@extends('admin.app')


@section('nav-bar')


@include('admin.layouts.sidebar')
@endsection


@section('content')
<div class="main-card mb-3 card col-12">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="card-body">
        <h5 class="card-title">County Details</h5>
        <form class="" action="{{ route('admin.counties.store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" id="name" placeholder="Enter county name" required type="text"
                            class="form-control">
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
