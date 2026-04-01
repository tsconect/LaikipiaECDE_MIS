@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

{{-- ══ PROFILE HEADER ══ --}}
<div class="tp-header">
    <div class="d-flex align-items-center gap-3">
        <img class="tp-avatar" src="{{ asset('/assets/images/teacher.png') }}" alt="Teacher">
        <div>
            <div class="tp-name">
                {{ $teacher->user->first_name ?? '' }}
                {{ $teacher->user->middle_name ?? '' }}
                {{ $teacher->user->last_name ?? 'Teacher' }}
            </div>
            <div class="tp-meta">
                <span><i class="bi bi-envelope-fill"></i> {{ $teacher->user->email ?? '—' }}</span>
                <span><i class="bi bi-telephone-fill"></i> {{ $teacher->user->phone_number ?? '—' }}</span>
                <span><i class="bi bi-credit-card-fill"></i> {{ $teacher->user->id_number ?? '—' }}</span>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-success btn-sm">
        <i class="bi bi-pencil-fill"></i> Edit Teacher
    </a>
</div>

{{-- ══ TABBED CARD ══ --}}
<div class="tp-card">
    <div class="tp-card-body">

        {{-- Tabs --}}
        <ul class="nav tp-tabs" id="teacherTabs">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile">
                    <i class="bi bi-person-fill"></i> Profile
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nextofkin">
                    <i class="bi bi-people-fill"></i> Next of Kin
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#beneficiaries">
                    <i class="bi bi-person-hearts"></i> Beneficiaries
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#unions">
                    <i class="bi bi-diagram-3-fill"></i> Unions
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#academic">
                    <i class="bi bi-mortarboard-fill"></i> Academics
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#documents">
                    <i class="bi bi-folder-fill"></i> Documents
                </button>
            </li>
        </ul>

        {{-- Tab Content --}}
        <div class="tab-content">

            {{-- ── PROFILE TAB ── --}}
            <div class="tab-pane fade show active" id="profile">
                <p class="section-title">Personal &amp; Employment Details</p>
                <div class="detail-grid">

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-hash"></i> ID Number</div>
                        <div class="detail-value">{{ $teacher->id_number ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-file-earmark-text"></i> KRA PIN</div>
                        <div class="detail-value">{{ $teacher->kra_pin ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-gender-ambiguous"></i> Gender</div>
                        <div class="detail-value">{{ ucfirst($teacher->gender ?? '—') }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-cake"></i> Date of Birth</div>
                        <div class="detail-value">{{ $teacher->dob ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-card-text"></i> TSC Number</div>
                        <div class="detail-value">{{ $teacher->tsc_number ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-building"></i> School</div>
                        <div class="detail-value">{{ $teacher->ecdeSchool->school_name ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-person-badge"></i> IPPD Number</div>
                        <div class="detail-value">{{ $teacher->ippd_number ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-calendar-check"></i> First Appointment</div>
                        <div class="detail-value">{{ $teacher->date_of_first_appointment ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-file-earmark-ruled"></i> Terms of Engagement</div>
                        <div class="detail-value">
                            {{ $teacher->terms_of_engagement ?? '—' }}
                            @if($teacher->terms_of_engagement == 'Contract')
                                <span class="text-muted" style="font-size:12px;"> — expires {{ $teacher->contract_expiry }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-shield-check"></i> PWD Status</div>
                        <div class="detail-value">{{ $teacher->pwd_status ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-upc-scan"></i> PWD Number</div>
                        <div class="detail-value">{{ $teacher->pwd_number ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-people"></i> Ethnicity</div>
                        <div class="detail-value">{{ $teacher->ethnicGroup->name ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-layers"></i> Job Group</div>
                        <div class="detail-value">{{ $teacher->jobGroup->name ?? '—' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-geo-alt"></i> County</div>
                        <div class="detail-value">{{ $teacher->county->name ?? '—' }}</div>
                    </div>

                </div>
            </div>

            {{-- ── NEXT OF KIN ── --}}
            <div class="tab-pane fade" id="nextofkin">
                <p class="section-title">Next of Kin Records</p>
                <div class="table-responsive">
                    <div class="table-card">
            <table class="data-table dt-admin">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Relationship</th>
                                <th>Gender</th>
                                <th>ID Number</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($next_of_kins as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                                    <td>{{ ucfirst($item->relationship) }}</td>
                                    <td>{{ ucfirst($item->gender) }}</td>
                                    <td>{{ $item->id_number ?? '—' }}</td>
                                    <td>{{ $item->phone_number ?? '—' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>—</td>
                                    <td class="text-muted">No next of kin records found.</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
</div>

@endsection