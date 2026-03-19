@extends('public.layout')

@section('page-content')
<style>
    .contact-info-card {
        border-left: 4px solid #006600;
    }

    .contact-map iframe {
        width: 100%;
        min-height: 240px;
        border: 0;
        border-radius: 8px;
    }
</style>

<div class="mb-4">
    <h1 class="mb-2">Get In Touch</h1>
    <p class="lead">Have a question? Send us a message and we’ll respond as soon as possible.</p>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle"></i> <strong>Success!</strong> Your message has been sent successfully.
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

<div class="row g-4">
    <div class="col-12 col-lg-7">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('cms.contact.submit') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                        <label for="name">Full Name *</label>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                        <label for="email">Email Address *</label>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Subject" required>
                        <label for="subject">Subject *</label>
                        @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="Message" style="height: 170px" required>{{ old('message') }}</textarea>
                        <label for="message">Message *</label>
                        @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="card contact-info-card mb-3">
            <div class="card-body">
                <h5 class="mb-3">Contact Information</h5>
                <p class="mb-2"><i class="fa fa-envelope text-primary"></i> <strong>Email:</strong> <a href="mailto:{{ $settings['contact_email'] ?? 'info@laikipia.ecde' }}">{{ $settings['contact_email'] ?? 'info@laikipia.ecde' }}</a></p>
                <p class="mb-2"><i class="fa fa-phone text-primary"></i> <strong>Phone:</strong> <a href="tel:{{ $settings['contact_phone'] ?? '+254' }}">{{ $settings['contact_phone'] ?? '+254' }}</a></p>
                <p class="mb-0"><i class="fa fa-map-marker text-primary"></i> <strong>Location:</strong> {{ $settings['site_address'] ?? 'Laikipia County, Kenya' }}</p>
            </div>
        </div>

        <div class="card contact-map">
            <div class="card-body">
                <h6 class="mb-3">Find Us</h6>
                <iframe loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=Laikipia%20County%20Kenya&output=embed" title="Laikipia County map"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
