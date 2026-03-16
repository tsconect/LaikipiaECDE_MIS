@extends('backoffice.layouts.app')


@section('nav-bar')

@include('layouts.main_nav')

@endsection

@section('content')
<div class="btn-success p-2">
    <h5>Add New Union</h5>
</div>
<div class="main-card mb-3 card col-12">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="card-body">

        <form class="" action="{{route('admin.unions.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">Union Name</label>
                        <input name="name" id="name" placeholder="Enter Union name eg. KUPPET" required type="text"
                            class="form-control">
                    </div>
                </div>
            </div>

            <button class="mt-2 btn btn-success col-12">Submit</button>
        </form>
    </div>
</div>
@endsection
