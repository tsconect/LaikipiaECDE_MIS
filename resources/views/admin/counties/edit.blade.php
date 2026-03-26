@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="main-card mb-3 card col-12">
    <div class="card-body">
        <h5 class="card-title">Edit County</h5>
        <form action="{{ route('admin.counties.update', $county->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name">Name</label>
                        <input value="{{ $county->name }}" name="name" id="name" placeholder="Enter county name" required type="text" class="form-control">
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
