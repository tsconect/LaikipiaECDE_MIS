@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>SMS LOGS</h5>
        </div>
<div class="card ">
<div class="container-fluid mt-4">
    <!-- Stats Bar -->
    <div class="row g-4 mb-5">
        {{-- Total SMS --}}
        <div class="col-xl-3 col-md-6">
            <div class="modern-card kpi-card" style="background: linear-gradient(135deg, #0a304a 0%, #0e4a70 100%);">
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
            <div class="modern-card kpi-card" style="background: linear-gradient(135deg, #176e54 0%, #0d5240 100%);">
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
            <div class="modern-card kpi-card" style="background: linear-gradient(135deg, #072e48 0%, #1f5b82 100%);">
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
            <div class="modern-card kpi-card" style="background: linear-gradient(135deg, #bb3534 0%, #b12e2e 100%);">
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
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 text-primary fw-bold">SMS Communication Logs</h5>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#sendSmsModal">
                        <i class="bi bi-send me-1"></i> Send Single SMS
                    </button>
                   
                </div>
            </div>

           
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="50">S/N</th>
                            {{-- <th>Name</th> --}}
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Message Length</th>
                               <td>Cost</td>
                             <td>Sent On</td>
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
        </div>
    </div>
</div>

<!-- Send SMS Modal -->
<div class="modal fade" id="sendSmsModal" tabindex="-1" aria-labelledby="sendSmsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendSmsModalLabel">Send Single SMS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.sms.send') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Recipient Name (Optional)</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. John Doe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" required placeholder="e.g. 07XXXXXXXX">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-control" rows="4" required placeholder="Type your message here..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
