@extends('admin.cms.layout')

@section('cms-title', 'Edit FAQ')
@section('cms-description', 'Update a frequently asked question')

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
                    <i class="fas fa-question-circle"></i> FAQ Details
                </div>
                <div class="card-body">
                    <form class="modern-form-shell" action="{{ route('admin.cms.faqs.update', $faq) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="question">Question <span class="text-danger">*</span></label>
                            <textarea name="question" id="question" class="form-control" rows="2" required>{{ $faq->question }}</textarea>
                            @error('question')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer">Answer <span class="text-danger">*</span></label>
                            <textarea name="answer" id="answer" class="form-control" rows="6" required>{{ $faq->answer }}</textarea>
                            @error('answer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="order">Order</label>
                            <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $faq->order) }}" min="0">
                        </div>

                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="published" {{ old('status', $faq->status) === 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ old('status', $faq->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                            <small class="text-muted">Only published FAQs appear on the public website.</small>
                        </div>

                        <div class="form-group d-flex justify-content-end gap-2 flex-wrap">
                            <button type="submit" class="btn btn-success">Update FAQ</button>
                            <a href="{{ route('admin.cms.faqs.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
