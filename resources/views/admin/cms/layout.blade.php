@extends('admin.app')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
@endpush

@section('content')
@unless(View::hasSection('hide-cms-header'))
<div class="cms-header-shell table-card mb-4">
    <div class="table-banner cms-table-banner">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 w-100">
            <div>
                <h1 class="cms-title">@yield('cms-title', 'CMS Management')</h1>
                <p class="cms-subtitle mb-0">@yield('cms-description', '')</p>
            </div>
            @yield('cms-action')
        </div>
    </div>
</div>
@endunless

<div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading"><i class="fas fa-exclamation-circle"></i> Validation Errors</h4>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('cms-content')
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor for all textareas with class 'editor'
    if (typeof CKEDITOR !== 'undefined') {
        document.querySelectorAll('textarea.editor').forEach(function(element) {
            CKEDITOR.replace(element.id);
        });
    }

    // Auto-hide alerts after 5 seconds
    document.querySelectorAll('.alert').forEach(function(alert) {
        setTimeout(function() {
            if (alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    });
</script>
@endpush
@endsection
