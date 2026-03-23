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
    <form method="POST" action="{{ route('admin.user-documents.store') }}" enctype="multipart/form-data">
        @csrf


        <!-- ================= PERSONAL INFORMATION ================= -->

        <div class="card p-2 shadow-sm mb-4">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Create New Document</h5>
            </div>
            @csrf
            <div class="form-row">




                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="document_id" class="">Document</label>
                        <select name="document_id" id="document_id" class="form-control" required>
                            <option value="">Select</option>
                            @foreach ($documents as $document)
                                <option value="{{ $document->id }}">{{ $document->name }}</option>
                            @endforeach
                        </select>
                    </div>


                     
                    @error('document_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="file" class="">File <span class="text-danger">*</span></label>
                        <input type="file" name="file" id="file" class="form-control" required accept=".pdf">
                
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
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
