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


     <form class="modern-form-shell" action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
        

                <!-- ================= PERSONAL INFORMATION ================= -->

                <div class="card shadow-sm mb-4">

                    <div class="card-header btn-success">
                        <h5 class="mb-0">Register Job Group</h5>
                    </div>
                    @csrf
                    <div class="form-row">


                   

                            <div class="row">

                                <!-- TITLE -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Title</label>

                                    <input type="text" name="title" class="form-control" placeholder="Feature title">
                                </div>

                                <!-- ICON -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">FontAwesome Icon</label>

                                    <input type="text" name="icon" class="form-control" placeholder="fas fa-school">
                                </div>

                                <!-- DESCRIPTION -->
                                <div class="col-12 mb-3">
                                    <label class="form-label">Description</label>

                                    <textarea name="description" class="form-control" rows="4" placeholder="Feature description"></textarea>
                                </div>

                                <!-- IMAGE -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Image</label>

                                    <input type="file" name="image" class="form-control">
                                </div>

                                <!-- ICON COLOR -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Icon Color Class</label>

                                    <input type="text" name="icon_color" class="form-control"
                                        placeholder="feature-icon-green">
                                </div>

                                <!-- LAYOUT -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Layout Type</label>

                                    <select name="layout" class="form-select">

                                        <option value="normal">Normal</option>
                                        <option value="wide">Wide</option>
                                        <option value="showcase">Showcase</option>

                                    </select>
                                </div>

                                <!-- POSITION -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Position</label>

                                    <input type="number" name="position" value="0" class="form-control">
                                </div>

                                
                                {{-- <div class="col-md-6 mb-3">
                                    <label class="form-label">Overlay Title</label>

                                    <input type="text" name="overlay_title" class="form-control"
                                        placeholder="Overlay title">
                                </div>

                               
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Overlay Description</label>

                                    <textarea name="overlay_description" class="form-control" rows="2"></textarea>
                                </div> --}}

                                <!-- ACTIVE -->
                                <div class="col-12 mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" checked>

                                        <label class="form-check-label">
                                            Active Feature
                                        </label>
                                    </div>
                                </div>
                                 <div class="text-right">
                            <button class="btn btn-success" type="submit">
                                Save
                            </button>
                        </div>


                            </div>

                        </form>




                       

                    </div>
                </div>


            @endsection
