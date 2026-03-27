@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* ── Profile Header Card ── */
    .tp-header {
        background: linear-gradient(135deg, #0f1b2d 0%, #1a2d4d 100%);
        border-radius: 14px;
        padding: 24px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 20px rgba(15,27,45,.25);
    }
    .tp-avatar {
        width: 68px; height: 68px;
        border-radius: 50%;
        border: 3px solid rgba(34,197,94,.5);
        object-fit: cover;
        flex-shrink: 0;
    }
    .tp-name {
        font-size: 18px;
        font-weight: 700;
        color: #ffffff;
        line-height: 1.2;
    }
    .tp-meta {
        font-size: 13px;
        color: #94a3b8;
        margin-top: 4px;
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
    }
    .tp-meta span {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #c8d8f0;
    }
    .tp-meta span i { color: #22c55e; }

    /* ── Tabs ── */
    .tp-tabs {
        display: flex;
        gap: 4px;
        border-bottom: 2px solid #e2e8f0;
        margin-bottom: 20px;
        flex-wrap: wrap;
        padding-bottom: 0;
    }
    .tp-tabs .nav-link {
        font-size: 13px;
        font-weight: 500;
        color: #475569;
        border: none;
        border-bottom: 2px solid transparent;
        border-radius: 0;
        padding: 10px 16px;
        margin-bottom: -2px;
        background: none;
        cursor: pointer;
        transition: color .15s, border-color .15s;
    }
    .tp-tabs .nav-link:hover { color: #22c55e; }
    .tp-tabs .nav-link.active {
        color: #22c55e;
        border-bottom-color: #22c55e;
        font-weight: 600;
    }
    .tp-tabs .nav-link i { margin-right: 5px; }

    /* ── Detail Grid ── */
    .detail-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 16px;
        padding: 4px 0 16px;
    }
    .detail-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 14px 16px;
        transition: box-shadow .15s;
    }
    .detail-item:hover { box-shadow: 0 2px 10px rgba(0,0,0,.07); }
    .detail-label {
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .07em;
        color: #94a3b8;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .detail-label i { color: #22c55e; font-size: 12px; }
    .detail-value {
        font-size: 14px;
        font-weight: 600;
        color: #0f172a;
        word-break: break-word;
    }
    .detail-value.muted { color: #94a3b8; font-weight: 400; }

    /* ── Tab content card ── */
    .tp-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        box-shadow: 0 1px 3px rgba(0,0,0,.06);
        overflow: hidden;
    }
    .tp-card-body { padding: 20px 24px; }

    /* Section divider title */
    .section-title {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: #94a3b8;
        margin: 0 0 14px;
        padding-bottom: 8px;
        border-bottom: 1px dashed #e2e8f0;
    }
</style>

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
                    <table class="table table-hover table-striped">
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
                                <tr><td colspan="6" class="text-center text-muted py-4">No next of kin records found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ── BENEFICIARIES ── --}}
            <div class="tab-pane fade" id="beneficiaries">
                <p class="section-title">Beneficiary Records</p>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
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
                            @forelse ($beneficiaries as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                                    <td>{{ ucfirst($item->relationship) }}</td>
                                    <td>{{ ucfirst($item->gender) }}</td>
                                    <td>{{ $item->id_number ?? '—' }}</td>
                                    <td>{{ $item->phone_number ?? '—' }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center text-muted py-4">No beneficiary records found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ── UNIONS ── --}}
            <div class="tab-pane fade" id="unions">
                <p class="section-title">Union Memberships</p>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Joined</th>
                                <th>Union Name</th>
                                <th>Membership No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($unions as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>{{ $item->union->name ?? '—' }}</td>
                                    <td>{{ $item->membership_number ?? '—' }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted py-4">No union memberships found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ── ACADEMICS ── --}}
            <div class="tab-pane fade" id="academic">
                <p class="section-title">Academic Qualifications</p>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Added</th>
                                <th>Institution</th>
                                <th>Award</th>
                                <th>Grade</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Cert No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($academic_histories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>{{ $item->institution_name ?? '—' }}</td>
                                    <td>{{ strtoupper($item->award ?? '—') }}</td>
                                    <td>{{ $item->grade ?? '—' }}</td>
                                    <td>{{ $item->start_date ?? '—' }}</td>
                                    <td>{{ $item->end_date ?? '—' }}</td>
                                    <td>{{ $item->certificate_no ?? '—' }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="8" class="text-center text-muted py-4">No academic records found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ── DOCUMENTS ── --}}
            <div class="tab-pane fade" id="documents">
                <p class="section-title">Uploaded Documents</p>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Document Name</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($documents as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>{{ $item->document->name ?? '—' }}</td>
                                    <td>
                                        @if($item->file)
                                            <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-sm btn-success">
                                                <i class="bi bi-download"></i> View
                                            </a>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted py-4">No documents uploaded.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>{{-- /tab-content --}}
    </div>
</div>

@endsection
