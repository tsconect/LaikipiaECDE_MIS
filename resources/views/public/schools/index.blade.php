@extends('front.app')

@section('title', 'ECDE Schools')

@section('content')
<div class="container py-5">
    <div class="page-header-container mb-4">
        <h1 class="page-title">ECDE Schools</h1>
        <p class="page-subtitle">Browse early childhood education centres across Laikipia County.</p>
        <small class="text-muted">Total schools: {{ $totalSchools }}</small>
    </div>

    @if($schools->count() > 0)
        <div class="row g-4">
            @foreach($schools as $school)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card home-section-card home-content-card listing-card-compact h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $school->school_name ?? 'Unnamed School' }}</h5>

                            <div class="home-meta mb-2">
                                <i class="fa fa-map-marker me-1"></i>
                                {{ optional($school->ward)->name ?? 'Ward not set' }}
                            </div>

                            <ul class="list-unstyled text-muted mb-3" style="font-size: 14px; line-height: 1.7;">
                                <li><strong>Students:</strong> {{ $school->number_of_students ?? 0 }}</li>
                                <li><strong>Classes:</strong> {{ $school->number_of_classes ?? 0 }}</li>
                                <li><strong>Classroom Status:</strong> {{ $school->class_rooms_status ?? 'N/A' }}</li>
                                <li><strong>Location:</strong> {{ $school->school_location ?? 'N/A' }}</li>
                            </ul>

                            @if(!empty($school->remarks))
                                <p class="card-text text-muted mb-0">{{ \Illuminate\Support\Str::limit(strip_tags($school->remarks), 120) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $schools->links() }}
        </div>
    @else
        <div class="empty-state-container">
            <div class="empty-state">
                <i class="fa fa-building"></i>
                <h5 class="mb-2">No schools found</h5>
                <p class="mb-0">ECDE school records will appear here once available.</p>
            </div>
        </div>
    @endif
</div>
@endsection
