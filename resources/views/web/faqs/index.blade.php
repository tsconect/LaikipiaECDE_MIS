@extends('web.app')

@section('styles')
<style>
    .faq-shell {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 320px;
        gap: 1.5rem;
    }

    .faq-main,
    .faq-side {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    }

    .faq-main { padding: 1.5rem; }
    .faq-side { padding: 1.25rem; height: fit-content; }

    .faq-accordion .accordion-item {
        border: 0 !important;
        border-bottom: 1px solid #e8eff7 !important;
        border-radius: 0;
        margin-bottom: 0.5rem;
        background: transparent;
    }

    .faq-accordion .accordion-button {
        font-weight: 700;
        font-size: 1.05rem;
        color: var(--navy);
        background: transparent;
        padding: 1.1rem 0.25rem;
        line-height: 1.6;
        transition: all 0.3s ease;
        border: 0;
        border-radius: 0;
    }

    .faq-accordion .accordion-button:focus {
        box-shadow: none;
        border-color: transparent;
        background: transparent;
        outline: none;
    }

    .faq-accordion .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230d2235'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }

    .faq-accordion .accordion-button:not(.collapsed) {
        background: transparent;
        color: var(--green);
        box-shadow: none;
    }

    .faq-accordion .accordion-body {
        background: #fafcfe;
        color: var(--text);
        line-height: 1.8;
        padding: 1.5rem;
        font-size: 1rem;
    }

    .faq-accordion .accordion-body p {
        margin-bottom: 1rem;
    }

    .faq-accordion .accordion-body p:last-child {
        margin-bottom: 0;
    }

    .faq-accordion .accordion-body ul,
    .faq-accordion .accordion-body ol {
        margin-left: 1.5rem;
        margin-bottom: 1rem;
    }

    .faq-accordion .accordion-body li {
        margin-bottom: 0.5rem;
        color: #4b5563;
    }

    .faq-question-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        background: rgba(26, 124, 62, 0.1);
        border-radius: 50%;
        margin-right: 0.75rem;
        color: var(--green);
        font-size: 1.1rem;
    }

    .answer-content {
        background: linear-gradient(135deg, #fafcfe 0%, #f4fbf6 100%);
        padding: 1.25rem;
        border-radius: 12px;
        margin-top: 0.75rem;
    }

    .answer-content strong {
        color: var(--navy);
        font-weight: 700;
    }

    .answer-content a {
        color: var(--green);
        text-decoration: none;
        border-bottom: 2px solid transparent;
        transition: border-color 0.2s ease;
    }

    .answer-content a:hover {
        border-bottom-color: var(--green);
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1.5rem;
        background: #f9fafb;
        border-radius: 16px;
        color: #6b7280;
    }

    .empty-state i {
        font-size: 3rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }

    .empty-state h5 {
        color: var(--navy);
        font-weight: 700;
    }

    @media (max-width: 992px) {
        .faq-shell { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('page-content')
<div class="faq-shell">
    <div class="faq-main">
        <div class="page-header-container">
            <h1 class="page-title">Frequently Asked Questions</h1>
            <p class="page-subtitle">Find answers to common questions about our services.</p>
        </div>

        @if($faqs->count() > 0)
            <div class="accordion faq-accordion" id="faqAccordion">
                @foreach($faqs as $faq)
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                <span class="faq-question-icon"><i class="fa fa-question"></i></span>
                                <span>{{ $faq->question }}</span>
                            </button>
                        </h2>
                        <div id="faq{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <div class="answer-content">
                                    {!! $faq->answer !!}
                                </div>
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

    <aside class="faq-side">
        <h5 class="mb-2">Still Have Questions?</h5>
        <p class="text-muted mb-3">Can’t find what you’re looking for? Reach out directly and we’ll help.</p>
        <a href="{{ route('cms.contact') }}" class="btn btn-primary w-100">
            <i class="fa fa-envelope me-1"></i> Contact Us
        </a>
    </aside>
</div>
@endsection
