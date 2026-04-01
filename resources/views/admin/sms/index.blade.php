@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

    {{-- Breadcrumb --}}
    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0 text-dark"><i class="bi bi-chat-dots-fill me-2 text-success"></i>SMS Management</h4>
            <p class="text-muted mb-0 small">Monitor SMS balance, usage and top-up history</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.sms-logs.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-list-ul me-1"></i> SMS Logs
            </a>
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#sendSMSModal">
                <i class="bi bi-send-fill me-1"></i> Send SMS
            </button>
        </div>
    </div>

    {{-- Stat Cards Row --}}
    <div class="row g-4 mb-4">

        {{-- Balance Card --}}
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 h-100"
                style="background: linear-gradient(135deg, rgb(39, 147, 186) 0%, #0d3a52 100%); border-radius: 16px;">
                <div class="card-body p-4 text-white">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div
                            style="background: rgba(255,255,255,0.2); width:48px; height:48px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:22px; backdrop-filter:blur(10px);">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <span
                            style="background:rgba(255,255,255,0.2); padding:4px 12px; border-radius:20px; font-size:11px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase;">LIVE</span>
                    </div>
                    <p
                        style="font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; opacity:0.85; margin:0;">
                        SMS BALANCE</p>
                    <h2
                        style="font-size:2.4rem; font-weight:800; margin:4px 0 6px 0; text-shadow:0 2px 4px rgba(0,0,0,0.15);">
                        {{ number_format($balance) }}
                    </h2>
                    <p style="font-size:13px; opacity:0.85; margin:0;"><i class="bi bi-check-circle me-1"></i>Available
                        Credits</p>
                </div>
            </div>
        </div>

        {{-- Usage Card --}}
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 h-100"
                style="background: linear-gradient(135deg, #1e7ea1 0%, rgb(39, 147, 186) 100%); border-radius: 16px;">
                <div class="card-body p-4 text-white">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div
                            style="background: rgba(255,255,255,0.2); width:48px; height:48px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:22px; backdrop-filter:blur(10px);">
                            <i class="bi bi-bar-chart-fill"></i>
                        </div>
                        <span
                            style="background:rgba(255,255,255,0.2); padding:4px 12px; border-radius:20px; font-size:11px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase;">USED</span>
                    </div>
                    <p
                        style="font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; opacity:0.85; margin:0;">
                        TOTAL USAGE</p>
                    <h2
                        style="font-size:2.4rem; font-weight:800; margin:4px 0 6px 0; text-shadow:0 2px 4px rgba(0,0,0,0.15);">
                        {{ number_format($usage ?? 0) }}
                    </h2>
                    <p style="font-size:13px; opacity:0.85; margin:0;"><i class="bi bi-graph-up me-1"></i>Messages Sent</p>
                </div>
            </div>
        </div>

        {{-- Total Cost Card --}}
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 h-100"
                style="background: #f0f6fa; border-radius: 16px; border: 2px solid #c8dde8 !important;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div
                            style="background: linear-gradient(135deg, rgb(39, 147, 186), #0d3a52); width:48px; height:48px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:22px; color:white;">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <span
                            style="background: rgba(23,78,109,0.12); color:rgb(39, 147, 186); padding:4px 12px; border-radius:20px; font-size:11px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase;">COST</span>
                    </div>
                    <p
                        style="font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; color:#5a8099; margin:0;">
                        TOTAL COST</p>
                    <h2 style="font-size:2.4rem; font-weight:800; margin:4px 0 6px 0; color:rgb(39, 147, 186);">
                        {{ number_format($totalCost ?? 0) }}
                    </h2>
                    <p style="font-size:13px; color:#5a8099; margin:0;"><i class="bi bi-receipt me-1"></i>Cumulative Spend
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- Top-Up History Table --}}
    <div class="table-card">
        <div class="table-banner">
            <div class="table-banner-title"><span>TOP-UP</span> HISTORY</div>
        </div>

        <div class="section-body section-body-flush">
            <div class="table-responsive">
                <table class="data-table dt-admin" id="sms-history-table">
                    <thead>
                        <tr>
                            <th class="px-4 py-3"
                                style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#6b7280; border:none;">
                                S/N</th>
                            <th class="py-3"
                                style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#6b7280; border:none;">
                                Top-Up Amount</th>
                            <th class="py-3"
                                style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#6b7280; border:none;">
                                Initial Balance</th>
                            <th class="py-3"
                                style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#6b7280; border:none;">
                                New Balance</th>
                            <th class="py-3"
                                style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#6b7280; border:none;">
                                Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($history as $item)
                            <tr style="border-bottom: 1px solid #f3f4f6; transition: background 0.2s;">
                                <td class="px-4 py-3">
                                    <span
                                        style="background:#f3f4f6; color:#374151; padding:4px 10px; border-radius:8px; font-size:12px; font-weight:600;">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>
                                <td class="py-3">
                                    <span class="fw-bold text-success" style="font-size:15px;">
                                        <i class="bi bi-plus-circle me-1"></i>{{ number_format($item['amount']) }}
                                    </span>
                                </td>
                                <td class="py-3">
                                    <span
                                        class="text-secondary fw-semibold">{{ number_format($item['current_balance']) }}</span>
                                </td>
                                <td class="py-3">
                                    <span class="fw-bold text-primary"
                                        style="font-size:14px;">{{ number_format($item['new_balance']) }}</span>
                                </td>
                                <td class="py-3">
                                    <span style="color:#6b7280; font-size:13px;">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y, H:i') }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div style="opacity:0.4;">
                                        <i class="bi bi-inbox" style="font-size:2.5rem; display:block; margin-bottom:8px;"></i>
                                        <p class="mb-0 fw-semibold">No top-up history found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

</div>

@endsection