@extends('admin.cms.layout')

@section('cms-title', 'Create New Gallery')
@section('cms-description', 'Set up a new photo gallery')

@section('cms-action')
<a href="{{ route('admin.cms.galleries.index') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Back
</a>
@endsection

@section('cms-content')
<div class="card">
    <div class="card-header">
        <i class="fas fa-plus-circle"></i> Gallery Information
    </div>
    <div class="card-body">
        <form action="{{ route('admin.cms.galleries.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Gallery Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" 
                               name="title" value="{{ old('title') }}" placeholder="Enter gallery name" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" 
                                  name="description" rows="4" placeholder="Enter gallery description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Create Gallery
                    </button>
                    <a href="{{ route('admin.cms.galleries.index') }}" class="btn btn-secondary">Cancel</a>
                </div>

                <div class="col-lg-4">
                    <div class="alert alert-info">
                        <small>
                            <strong>Tip:</strong> Create the gallery first, then upload images to it.
                        </small>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
