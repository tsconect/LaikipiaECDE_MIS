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
    <form class="modern-form-shell" method="POST" action="{{ route('admin.user-unions.store') }}">
        @csrf


        <!-- ================= PERSONAL INFORMATION ================= -->

        <div class="card shadow-sm mb-4">

            <div class="card-header btn-success">
                <h5 class="mb-0">Add New Union Membership</h5>
            </div>
            <div class="form-row modern-form-body">

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="union_id" class="">Union</label>
                        <select name="union_id" id="union_id" class="form-control" required>
                            <option value="">Select Union</option>
                            @foreach ($unions as $union)
                                <option value="{{ $union->id }}">{{ $union->name }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
                {{-- memebership no --}}
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="membership_no" class="">Membership Number</label>
                        <input name="membership_no" id="membership_no" placeholder="Enter membership number" type="text"
                            class="form-control">
                    </div>
                </div>
            </div>


            <div class="modern-form-footer px-3 pb-3">
                    <button class="btn modern-form-submit" type="submit">
                        Submit
                    </button>
                </div>
        </div>
        </form>
    </div>
</div>


@endsection
