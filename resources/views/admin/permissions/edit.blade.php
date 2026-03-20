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

        <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
            @csrf
            @method('PUT')
            <div class="card p-2 shadow-sm mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Edit Permission</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ old('name', $permission->name) }}" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
