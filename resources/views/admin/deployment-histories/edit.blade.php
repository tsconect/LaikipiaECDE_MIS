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
    <form class="modern-form-shell" method="POST" action="{{ route('admin.user-documents.update', $userDocument->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- ================= DOCUMENT INFORMATION ================= -->

        <div class="card shadow-sm mb-4">

            <div class="card-header btn-success">
                <h5 class="mb-0">Edit User Document</h5>
            </div>
            <div class="form-row p-3">

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="document_id" class="">Document</label>
                        <select name="document_id" id="document_id" class="form-control" required>
                            <option value="">Select</option>
                            @foreach ($documents as $document)
                                <option value="{{ $document->id }}" {{ old('document_id', $userDocument->document_id) == $document->id ? 'selected' : '' }}>{{ $document->name }}</option>
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
                        <input type="file" name="file" id="file" class="form-control" accept=".pdf,.jpg,.png,.jpeg">
                        <small class="text-muted">Leave blank to keep existing file</small>
                
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
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
