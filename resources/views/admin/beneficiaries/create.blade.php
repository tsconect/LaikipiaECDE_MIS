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
    <form method="POST" action="{{ route('admin.beneficiaries.store') }}">
        @csrf


        <!-- ================= PERSONAL INFORMATION ================= -->

        <div class="card p-2 shadow-sm mb-4">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Add  beneficiary</h5>
            </div>
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="first_name" class="">First Name</label>
                        <input name="first_name" id="first_name" placeholder="John" required type="text"
                            class="form-control">
                    </div>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                 <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="middle_name" class="">Middle Name</label>
                        <input name="middle_name" id="middle_name" placeholder="Watt" required type="text"
                            class="form-control">
                    </div>
                    @error('middle_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="last_name" class="">Last Name</label>
                        <input name="last_name" id="last_name" placeholder="Doe" required type="text"
                            class="form-control">
                    </div>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               
                      <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="dob" class="">Date of Birth</label>
                        <input name="dob" id="dob" placeholder="YYYY-MM-DD" required type="date"
                            class="form-control">
                    </div>
                    @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="phone_number" class="">Phone</label>
                        <input name="phone_number" id="phone_number" placeholder="07**********" required
                            type="text" class="form-control">
                    </div>
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="id_number" class="">ID Number</label>
                        <input name="id_number" id="id_number" placeholder="33603456" required type="number"
                            class="form-control">
                    </div>
                    @error('id_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="email" class="">Email</label>
                        <input name="email" id="email" placeholder="example@example.com" required type="email"
                            class="form-control">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="relationship" class="">Relationship</label>
                        <select name="relationship" id="relationship" class="form-control" required>
                            <option value="">Select</option>
                            <option value="spouse">Spouse or Partner</option>
                            <option value="children">Children</option>
                            <option value="parents">Parents</option>
                            <option value="siblings">Siblings</option>
                            <option value="grandparents">Grandparents</option>
                            <option value="aunts">Aunt</option>
                            <option value="uncles">Uncle</option>
                            <option value="cousins">Cousin</option>
                            <option value="nephew">Nephew</option>
                            <option value="niece">Niece</option>
                            <option value="other">Other</option>

                        </select>
                    </div>
                    @error('relationship')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="gender" class="">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
          
              
            </div>

            <div class="text-right">
                    <button class="btn btn-success" type="submit">
                        Submit
                    </button>
                </div>
        </form>
    </div>
</div>


@endsection
