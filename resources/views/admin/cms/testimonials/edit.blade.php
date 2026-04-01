@extends('admin.cms.layout')

@section('cms-title', 'Edit Testimonial')
@section('cms-description', 'Update testimonial details and publish status')

@section('cms-content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header btn-success">
                    <i class="bi bi-chat-dots"></i> Testimonial Details
                </div>
                <div class="card-body">
                    <form class="modern-form-shell" action="{{ route('admin.cms.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $testimonial->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="position">Position <span class="text-danger">*</span></label>
                            <input type="text" name="position" id="position" class="form-control" value="{{ $testimonial->position }}" required>
                        </div>

                        <div class="form-group">
                            <label for="organization">Organization</label>
                            <input type="text" name="organization" id="organization" class="form-control" value="{{ $testimonial->organization }}">
                        </div>

                        <div class="form-group">
                            <label for="message">Message <span class="text-danger">*</span></label>
                            <textarea name="message" id="message" class="form-control" rows="4" required>{{ $testimonial->message }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating (1-5) <span class="text-danger">*</span></label>
                            <select name="rating" id="rating" class="form-control" required>
                                <option value="1" {{ $testimonial->rating == 1 ? 'selected' : '' }}>1 Star</option>
                                <option value="2" {{ $testimonial->rating == 2 ? 'selected' : '' }}>2 Stars</option>
                                <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>3 Stars</option>
                                <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>4 Stars</option>
                                <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>5 Stars</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            @if($testimonial->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" style="max-width: 150px;">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="published" {{ old('status', $testimonial->status) === 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ old('status', $testimonial->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                            <small class="text-muted">Only published testimonials appear on the public website.</small>
                        </div>

                        <div class="form-group d-flex justify-content-end gap-2 flex-wrap">
                            <button type="submit" class="btn btn-success">Update Testimonial</button>
                            <a href="{{ route('admin.cms.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
