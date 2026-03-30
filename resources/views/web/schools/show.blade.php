@extends('web.app')

@section('title', $school->school_name)

@section('styles')
<style>
  .school-detail-wrap {
    background: linear-gradient(180deg, #f8f6f1 0%, #f4f8fc 100%);
    border: 1px solid rgba(13, 34, 53, 0.08);
    border-radius: 22px;
    box-shadow: 0 18px 36px rgba(13, 34, 53, 0.08);
    padding: 2rem;
  }

  .back-link-btn {
    border-radius: 10px;
    border-color: rgba(13, 34, 53, 0.2);
    color: #163348;
    font-weight: 600;
  }

  .back-link-btn:hover {
    background: #163348;
    color: #fff;
    border-color: #163348;
  }

  .detail-card {
    background: #fff;
    border: 1px solid rgba(13, 34, 53, 0.1);
    border-radius: 16px;
    box-shadow: 0 10px 24px rgba(13, 34, 53, 0.06);
    height: 100%;
  }

  .detail-card .card-body {
    padding: 1.35rem;
  }

  .detail-card h5 {
    color: #0d2235;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .detail-field {
    border: 1px solid rgba(13, 34, 53, 0.08);
    border-radius: 12px;
    padding: 0.7rem 0.8rem;
    background: #fbfdff;
    height: 100%;
  }

  .detail-field small {
    color: #6b7c8d;
    font-weight: 600;
    font-size: 0.76rem;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }

  .detail-field strong {
    margin-top: 0.2rem;
    display: block;
    color: #0d2235;
    line-height: 1.35;
  }

  .teacher-empty {
    padding: 0.85rem;
    border: 1px dashed rgba(13, 34, 53, 0.25);
    border-radius: 10px;
    color: #6b7c8d;
    margin-bottom: 0;
  }

  @media (max-width: 900px) {
    .school-detail-wrap {
      padding: 1.1rem;
    }
  }
</style>
@endsection

@section('content')
<div class="container school-detail-wrap mb-2">
    <div class="page-header-container mb-3">
        <h1 class="page-title">{{ $school->school_name }}</h1>
        <p class="page-subtitle">School profile and location details.</p>
        <a href="{{ route('cms.schools') }}" class="btn btn-outline-secondary btn-sm mt-2 back-link-btn">
            <i class="fa fa-arrow-left me-1"></i> Back to schools
        </a>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="detail-card">
                <div class="card-body">
                    <h5 class="mb-3">School Information</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="detail-field">
                                <small class="d-block">School Name</small>
                                <strong>{{ $school->school_name ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-field">
                                <small class="d-block">Center Code</small>
                                <strong>{{ $school->center_code ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-field">
                                <small class="d-block">County</small>
                                <strong>{{ $school->county->name ?? optional(optional($school->subCounty)->county)->name ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-field">
                                <small class="d-block">Sub County</small>
                                <strong>{{ $school->subCounty->name ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-field">
                                <small class="d-block">Ward</small>
                                <strong>{{ $school->ward->name ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-field">
                                <small class="d-block">Sub Location</small>
                                <strong>{{ $school->subLocation->name ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-field">
                                <small class="d-block">Number of Learners</small>
                                <strong>{{ $school->number_of_students ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-field">
                                <small class="d-block">Number of Classes</small>
                                <strong>{{ $school->number_of_classes ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-field">
                                <small class="d-block">School Location</small>
                                <strong>{{ $school->school_location ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-field">
                                <small class="d-block">Remarks</small>
                                <strong>{{ $school->remarks ?? '-' }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="detail-card">
                <div class="card-body">
                    <h5 class="mb-3">Assigned Teacher</h5>
                    @if($school->teacher)
                        <div class="detail-field mb-3">
                            <small class="d-block">Name</small>
                            <strong>
                                {{ trim(($school->teacher->first_name ?? $school->teacher->user->first_name ?? '') . ' ' . ($school->teacher->middle_name ?? $school->teacher->user->middle_name ?? '') . ' ' . ($school->teacher->last_name ?? $school->teacher->user->last_name ?? '')) ?: '-' }}
                            </strong>
                        </div>
                        <div class="detail-field">
                            <small class="d-block">Phone</small>
                            <strong>{{ $school->teacher->phone_number ?? $school->teacher->user->phone_number ?? '-' }}</strong>
                        </div>
                    @else
                        <p class="teacher-empty">No teacher assigned.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
