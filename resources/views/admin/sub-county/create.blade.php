@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')

@endsection

@section('title', 'Barriers & Roadblocks')
@section('content')


@include('flash-message')




<div class="main-card mb-3 card col-12">
    <div class="card-body">
        <h5 class="card-title">Constituencuy Details</h5>
        <form class="" action="{{route('admin.const.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" id="name" placeholder="Enter Constituency name" required type="text"
                            class="form-control">
                    </div>
                </div>
            </div>

            <button class="mt-2 btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection
