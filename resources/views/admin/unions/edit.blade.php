@extends('admin.app')


@section('nav-bar')

@include('admin.layouts.sidebar')
@endsection

@section('title', 'Barriers & Roadblocks')
@section('content')

@include('flash-message')

<div class="main-card mb-3 card col-12">
    <div class="card-body">
        <h5 class="card-title modern-form-card-header-title">Edit {{ $union->name }} union Details</h5>
        <form class=" modern-form-shell" action="{{ route('admin.unions.update', $union->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input value="{{ $union->name }}" name="name" id="name" placeholder="Enter Constituency name" required type="text"
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
