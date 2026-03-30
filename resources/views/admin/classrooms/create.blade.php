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
    <form method="POST" action="{{ route('admin.classrooms.store') }}">
        @csrf
        <div class="card p-2 shadow-sm mb-4">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Add New ECDE Classroom</h5>
            </div>

            <div class="card-body">

               <div class="row g-4">

                            @if($school_id)

                            
                                <input type="hidden" name="school_id" value="{{ $school_id }}">
                                <div class="col-md-4 ">
                                <div class="position-relative form-group">
                                        <label for="school_id" class=""> School </label>
                                        <select name="school_id" id="school_id" class="form-control" disabled>
                                            {{-- <option value="">Select School</option> --}}
                                            @foreach ($schools as $value)
                                                <option value="{{ $value->id ?? null }}" @if($school_id == $value->id) selected @endif>{{ $value->school_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    
                                </div>
                            @else
                             <div class="col-md-4 " >
                                <div class="position-relative form-group">
                                    <label for="school_id" class=""> School </label>
                                    <select name="school_id" id="school_id" class="form-control">
                                        <option value="">Select School</option>
                                        @foreach ($schools as $value)
                                            <option value="{{ $value->id ?? null }}">{{ $value->school_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                  
                            </div>
                            @endif
                            
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Class Room Name</label>
                                    <input name="name" id="name" placeholder="Enter name" type="text" class="form-control" />
                                </div>
                            </div>

                              <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="status" class=""> Class Rooms Status </label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Select Class Room Status   </option>
                                    <option value="permanent" >Permanent</option>
                                    <option value="Semi_Permanent" >Semi Permanent</option>
                              
                                    <option value="temporary" >Temporary</option>
                                    <option value="mud_walled" >Mud Walled</option>
                                    <option value="under_tree" >Under Tree</option>
                                </select>
                            </div>
                        </div>

                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="number_of_students" class="">Capacity</label>
                                    <input name="number_of_students" id="number_of_students" placeholder="Enter Capacity" type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="description" class="">Description</label>
                                    <textarea name="description" id="description" placeholder="Enter description" class="form-control" rows="5"></textarea>
                                </div>
                            </div>

                          
                           


                            

                   
                </div>
                <div class="text-right p-2">
                    <button class="btn btn-success" type="submit">
                        Register
                    </button>
                </div>

            </div>

        </div>

    </form>

</div>
@endsection

