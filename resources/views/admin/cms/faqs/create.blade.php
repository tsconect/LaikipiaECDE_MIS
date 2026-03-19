@extends('admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Create New FAQ</h2>

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
                <div class="card-body">
                    <form action="{{ route('admin.cms.faqs.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="question">Question <span class="text-danger">*</span></label>
                            <textarea name="question" id="question" class="form-control" rows="2" required>{{ old('question') }}</textarea>
                            @error('question')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer">Answer <span class="text-danger">*</span></label>
                            <textarea name="answer" id="answer" class="form-control" rows="6" required>{{ old('answer') }}</textarea>
                            @error('answer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="order">Order</label>
                            <input type="number" name="order" id="order" class="form-control" value="{{ old('order') }}" min="0" placeholder="Auto if left blank">
                        </div>

                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="published" {{ old('status', 'published') === 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                            <small class="text-muted">Only published FAQs appear on the public website.</small>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Create FAQ</button>
                            <a href="{{ route('admin.cms.faqs.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
