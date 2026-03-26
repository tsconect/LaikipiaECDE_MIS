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
    <form method="POST" action="{{ route('admin.documents.update', $document->id) }}">
        @csrf
        @method('PUT')

        <!-- ================= DOCUMENT INFORMATION ================= -->

        <div class="card p-2 shadow-sm mb-4">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Edit Document</h5>
            </div>
            <div class="form-row p-3">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" id="name" placeholder="Enter document name" required type="text" value="{{ old('name', $document->name) }}"
                            class="form-control">
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="is_required" class="">Is Required</label>
                        <select name="is_required" id="is_required" class="form-control" required>
                            <option value="">Select</option>
                            <option value="1" {{ old('is_required', $document->is_required) == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('is_required', $document->is_required) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    @error('is_required')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="text-right p-3">
                    <button class="btn btn-success" type="submit">
                        Update
                    </button>
                </div>
        </div>
        </form>
    </div>
</div>


@endsection
