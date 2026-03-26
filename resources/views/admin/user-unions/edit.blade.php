@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="card">
    <div class="card-header btn-success">
        <h5>Edit Union Membership</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.user-unions.update', $userUnion->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="union_id">Union</label>
                    <select class="form-control" id="union_id" name="union_id" required>
                        <option value="">Select Union</option>
                        @foreach ($unions as $union)
                            <option value="{{ $union->id }}" {{ old('union_id', $userUnion->union_id) == $union->id ? 'selected' : '' }}>{{ $union->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="membership_no">Membership Number</label>
                    <input type="text" class="form-control" id="membership_no" name="membership_no" value="{{ old('membership_no', $userUnion->membership_number) }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update Membership</button>
            </div>

        </form>
    </div>
</div>
@endsection
