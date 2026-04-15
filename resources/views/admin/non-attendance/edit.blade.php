@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="card-body">
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form class="modern-form-shell" method="POST" action="{{ route('admin.non-attendance-days.update', $item->id) }}">
@csrf
@method('PUT')

<div class="card shadow-sm mb-4">

    <div class="card-header btn-success">
        <h5 class="mb-0">Edit Non-Attendance Days</h5>
    </div>

    <div class="row p-3">

        {{-- TITLE --}}
        <div class="col-md-12 mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required placeholder="Enter Title" value="{{ $item->title }}">
        </div>

        {{-- TYPE --}}
        <div class="col-md-6 mb-3">
            <label>Type</label>
            <select name="type" id="typeSelect" class="form-control" required>
                <option value="holiday" {{ $item->type === 'holiday' ? 'selected' : '' }}>Holiday</option>
                <option value="weekend" {{ $item->type === 'weekend' ? 'selected' : '' }}>Weekend</option>
                <option value="closure" {{ $item->type === 'closure' ? 'selected' : '' }}>Closure</option>
                <option value="other" {{ $item->type === 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        {{-- SINGLE DATE --}}
        <div class="col-md-6 mb-3" id="singleDateBox">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $item->date->format('Y-m-d') }}">
        </div>

       

        

        {{-- RECURRENCE --}}
        {{-- <div class="col-md-6 mb-3">
            <label>Recurring</label>
            <select name="is_recurring" class="form-control">
                <option value="0" {{ $item->is_recurring === 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ $item->is_recurring === 1 ? 'selected' : '' }}>Yes</option>
            </select>
        </div> --}}

    </div>

    <div class="modern-form-footer px-3 pb-3">
        <button class="btn modern-form-submit" type="submit">
            Update
        </button>
    </div>

</div>
</form>
    </div>
</div>

@endsection
