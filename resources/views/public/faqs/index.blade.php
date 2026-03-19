@extends('public.layout')

@section('page-content')
<style>
    .faq-accordion .accordion-item {
        border: 1px solid #dbe4ef !important;
        border-radius: 8px;
        overflow: hidden;
    }

    .faq-accordion .accordion-button {
        font-weight: 600;
        color: #1a3a5c;
        background: #fff;
    }

    .faq-accordion .accordion-button:not(.collapsed) {
        background: #f4f9f4;
        color: #1a3a5c;
        box-shadow: none;
    }

    .faq-accordion .accordion-body {
        background: #fff;
    }
</style>

<div class="row g-4">
    <div class="col-12 col-lg-8">
        <div class="mb-4">
            <h1 class="mb-2">Frequently Asked Questions</h1>
            <p class="lead">Find answers to common questions about our services</p>
        </div>

        @if($faqs->count() > 0)
            <div class="accordion faq-accordion" id="faqAccordion">
                @foreach($faqs as $faq)
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="faq{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {!! $faq->answer !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fa fa-question-circle"></i>
                <h5 class="mb-2">No FAQs available</h5>
                <p class="mb-0">Common questions and answers will appear here once added.</p>
            </div>
        @endif
    </div>

    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-2">Still Have Questions?</h5>
                <p>Can't find the answer you're looking for? Reach out to us directly.</p>
                <a href="{{ route('cms.contact') }}" class="btn btn-primary w-100">
                    <i class="fa fa-envelope"></i> Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
