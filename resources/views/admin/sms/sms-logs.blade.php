@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
<div class="sms-logs-page">
    <div class="table-card sms-logs-hero mb-4">
        <div class="table-banner">
            <div class="table-banner-title"><span>SMS</span> LOGS</div>
            <div class="sms-logs-hero-meta">Delivery performance and communication history</div>
        </div>
    </div>

<div class="container-fluid px-0 mt-3">
    <!-- Stats Bar -->
    <div class="row g-4 mb-5 sms-stats-row">
        {{-- Total SMS --}}
        <div class="col-xl-3 col-md-6">
            <div class="modern-card kpi-card sms-kpi-card sms-kpi-total">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="icon-wrapper">
                            <i class="bi bi-chat-left-dots"></i>
                        </div>
                        <span class="badge-pill">Total</span>
                    </div>
                    <div>
                        <p class="card-label mb-1">TOTAL MESSAGES</p>
                        <h2 class="card-value mb-2">{{ number_format($stats['total']) }}</h2>
                        <p class="card-description mb-0">
                            <i class="bi bi-info-circle me-1"></i>Cumulative outreach
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sent --}}
        <div class="col-xl-3 col-md-6">
            <div class="modern-card kpi-card sms-kpi-card sms-kpi-delivered">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="icon-wrapper">
                            <i class="bi bi-check-all"></i>
                        </div>
                        <span class="badge-pill">Delivered</span>
                    </div>
                    <div>
                        <p class="card-label mb-1">SENT SUCCESSFULLY</p>
                        <h2 class="card-value mb-2">{{ number_format($stats['sent']) }}</h2>
                        <p class="card-description mb-0">
                            <i class="bi bi-send-check me-1"></i>Successful delivery
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Failed --}}
        <div class="col-xl-3 col-md-6">
            <div class="modern-card kpi-card sms-kpi-card sms-kpi-failed">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="icon-wrapper">
                            <i class="bi bi-exclamation-octagon"></i>
                        </div>
                        <span class="badge-pill">Errors</span>
                    </div>
                    <div>
                        <p class="card-label mb-1">FAILED MESSAGES</p>
                        <h2 class="card-value mb-2">{{ number_format($stats['failed']) }}</h2>
                        <p class="card-description mb-0">
                            <i class="bi bi-x-circle me-1"></i>Undelivered alerts
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Today --}}
        <div class="col-xl-3 col-md-6">
            <div class="modern-card kpi-card sms-kpi-card sms-kpi-daily">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="icon-wrapper">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <span class="badge-pill">Daily</span>
                    </div>
                    <div>
                        <p class="card-label mb-1">SENT TODAY</p>
                        <h2 class="card-value mb-2">{{ number_format($stats['today']) }}</h2>
                        <p class="card-description mb-0">
                            <i class="bi bi-clock me-1"></i>Last 24 hours
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-card">
        <div class="table-banner">
            <div class="table-banner-title"><span>SMS</span> COMMUNICATION LOGS</div>
            <div class="banner-actions">
                <button type="button" class="btn-generate" data-bs-toggle="modal" data-bs-target="#sendSmsModal">
                    <i class="bi bi-send me-1"></i> Send Single SMS
                </button>
            </div>
        </div>

        <div class="section-body section-body-flush">
            <div class="table-responsive">
                <table id="example" class="data-table dt-admin">
                    <thead>
                        <tr>
                            <th width="50">S/N</th>
                            {{-- <th>Name</th> --}}
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Message Length</th>
                                                        <th>Cost</th>
                                                        <th>Sent On</th>
                                                        <th>Status</th>
                          
                            {{-- <th width="150">Actions</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($messages as $item)
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            {{-- <td>{{ $item->name??'--' }}</td> --}}
                            <td>{{ substr($item->phone_number, 0, 4) }}XXXXXXX</td>
                            <td>{{ $item->message }}</td>
                            <td>{{ strlen($item->message) }}</td>

                               <td>
                                {{$item->cost}}
                            </td>
                            <td>{{ $item->created_at->formatLocalized('%d-%m-%Y %H:%M %p %T') }}</td>
                            <td>
                                @if($item->status == 'success')
                                    <span class="badge bg-success">Delivered</span>
                                @else
                                    <span class="badge bg-danger">Failed</span>
                                @endif
                            </td>
                         
                            {{-- <td>
                                <a href="{{ route('services.edit', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
</div></td> --}}

                        </tr>
                        @endforeach
                    </tbody>
                </table>

</div>
@endsection