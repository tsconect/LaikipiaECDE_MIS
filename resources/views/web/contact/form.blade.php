@extends('web.app')
@section('title', 'Contact Us')

@section('content')
<style>
    .contact-form-card {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e7ecf3;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
        padding: 2rem;
    }

    .contact-info-section {
        background: #f8fafc;
        border-radius: 12px;
        padding: 2rem;
        height: 100%;
    }

    .contact-info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .contact-info-item .icon {
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(26, 58, 92, 0.1);
        color: var(--primary-color);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }

    .contact-info-item .info-content h6 {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: .2rem;
    }

    .contact-info-item .info-content p,
    .contact-info-item .info-content a {
        color: #475569;
        text-decoration: none;
        margin-bottom: 0;
    }
    .contact-info-item .info-content a:hover {
        color: var(--primary-color);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 .25rem rgba(26, 58, 92, 0.15);
    }
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        padding: .75rem 1.5rem;
        font-weight: 600;
    }
    .btn-primary:hover {
        background-color: #142e49;
        border-color: #142e49;
    }
</style>

<div class="container py-5">
    <div class="page-header-container">
        <h1 class="page-title">Get In Touch</h1>
        <p class="page-subtitle">Have a question? Send us a message and we’ll respond as soon as possible.</p>
    </div>

    <div class="row g-4 g-lg-5">
        <div class="col-lg-7">
            <div class="contact-form-card">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa fa-check-circle me-2"></i> <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please fix the following errors:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('cms.contact.submit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label fw-semibold">Subject *</label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="form-label fw-semibold">Message *</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="6" required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa fa-paper-plane me-2"></i> Send Message
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="contact-info-section">
                <div class="contact-info-item">
                    <div class="icon"><i class="fa fa-envelope"></i></div>
                    <div class="info-content">
                        <h6>Email Address</h6>
                        <a href="mailto:{{ $settings['contact_email'] ?? 'info@laikipia.ecde' }}">{{ $settings['contact_email'] ?? 'info@laikipia.ecde' }}</a>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="icon"><i class="fa fa-phone"></i></div>
                    <div class="info-content">
                        <h6>Phone Number</h6>
                        <a href="tel:{{ $settings['contact_phone'] ?? '+254' }}">{{ $settings['contact_phone'] ?? '+254' }}</a>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                    <div class="info-content">
                        <h6>Our Location</h6>
                        <p>{{ $settings['site_address'] ?? 'Laikipia County, Kenya' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
