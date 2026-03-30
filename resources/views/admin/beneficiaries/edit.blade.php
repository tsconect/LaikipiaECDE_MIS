@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="card">
    <div class="card-header btn-success">
        <h5>Edit Beneficiary</h5>
    </div>
    <div class="card-body">
        <form class="modern-form-shell" method="POST" action="{{ route('admin.beneficiaries.update', $beneficiary->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $beneficiary->first_name) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $beneficiary->middle_name) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $beneficiary->last_name) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $beneficiary->dob) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $beneficiary->phone_number) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="id_number">ID Number</label>
                    <input type="text" class="form-control" id="id_number" name="id_number" value="{{ old('id_number', $beneficiary->id_number) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $beneficiary->email) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="relationship">Relationship</label>
                    <select class="form-control" id="relationship" name="relationship" required>
                        @foreach (['spouse'=>'Spouse or Partner','children'=>'Children','parents'=>'Parents','siblings'=>'Siblings','grandparents'=>'Grandparents','aunts'=>'Aunt','uncles'=>'Uncle','cousins'=>'Cousin','nephew'=>'Nephew','niece'=>'Niece','other'=>'Other'] as $value => $label)
                            <option value="{{ $value }}" {{ old('relationship', $beneficiary->relationship) === $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="male" {{ old('gender', $beneficiary->gender) === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $beneficiary->gender) === 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update Beneficiary</button>
            </div>

        </form>
    </div>
</div>
@endsection
