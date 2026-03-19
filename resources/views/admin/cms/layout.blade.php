@extends('admin.app')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    .cms-header {
        background: linear-gradient(135deg, #1a3c5e 0%, #2a5a8e 100%);
        color: white;
        padding: 30px 0;
        margin-bottom: 30px;
        border-radius: 8px;
    }
    .cms-header h1 {
        margin: 0;
        font-weight: 600;
    }
    .card-header {
        background-color: #1a3c5e;
        color: white;
        font-weight: 600;
    }
    .table-actions {
        display: flex;
        gap: 5px;
    }
    .badge-status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    .badge-published {
        background-color: #28a745;
        color: white;
    }
    .badge-draft {
        background-color: #ffc107;
        color: #333;
    }
    .badge-active {
        background-color: #28a745;
        color: white;
    }
    .badge-inactive {
        background-color: #6c757d;
        color: white;
    }
    .badge-approved {
        background-color: #28a745;
        color: white;
    }
    .badge-pending {
        background-color: #ffc107;
        color: #333;
    }
    .form-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .form-section-title {
        font-size: 16px;
        font-weight: 600;
        color: #1a3c5e;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    .form-section-title i {
        margin-right: 10px;
    }
</style>
@endpush

@section('content')
<div class="cms-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>@yield('cms-title', 'CMS Management')</h1>
                <p class="text-muted mb-0">@yield('cms-description', '')</p>
            </div>
            @yield('cms-action')
        </div>
    </div>
</div>

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
