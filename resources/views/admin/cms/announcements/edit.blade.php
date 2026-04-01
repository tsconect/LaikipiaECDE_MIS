@extends('admin.cms.layout')

@section('cms-title', 'Edit Announcement')
@section('cms-description', 'Update announcement content and schedule')

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
                    <i class="bi bi-megaphone"></i> Announcement Details
                </div>
                <div class="card-body">
                    <form class="modern-form-shell" action="{{ route('admin.cms.announcements.update', $announcement) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $announcement->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Content <span class="text-danger">*</span></label>
                            <textarea name="content" id="content" class="form-control" rows="4" required>{{ $announcement->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="priority">Priority (1-10) <span class="text-danger">*</span></label>
                            <input type="number" name="priority" id="priority" class="form-control" min="1" max="10" value="{{ $announcement->priority }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            @if($announcement->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $announcement->image) }}" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ $announcement->start_date->format('Y-m-d\TH:i') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">End Date <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ $announcement->end_date->format('Y-m-d\TH:i') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="draft" {{ old('status', $announcement->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $announcement->status) === 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-end gap-2 flex-wrap">
                            <button type="submit" class="btn btn-success">Update Announcement</button>
                            <a href="{{ route('admin.cms.announcements.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
