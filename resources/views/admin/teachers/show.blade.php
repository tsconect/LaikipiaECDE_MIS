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
             <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#deployment">
                    <i class="bi bi-diagram-3-fill"></i> Deployment History
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
            <table class="data-table">
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
                            @foreach($next_of_kins as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                                    <td>{{ ucfirst($item->relationship) }}</td>
                                    <td>{{ ucfirst($item->gender) }}</td>
                                    <td>{{ $item->id_number ?? '—' }}</td>
                                    <td>{{ $item->phone_number ?? '—' }}</td>
                                </tr>
                        
                            @endforeach
                        </tbody>
                    </table>
        </div>
                </div>
            </div>

            {{-- ── BENEFICIARIES ── --}}
            <div class="tab-pane fade" id="beneficiaries">
                <p class="section-title">Beneficiary Records</p>
                <div class="table-responsive">
                    <div class="table-card">
            <table class="data-table">
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
                            @foreach ($beneficiaries as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                                    <td>{{ ucfirst($item->relationship) }}</td>
                                    <td>{{ ucfirst($item->gender) }}</td>
                                    <td>{{ $item->id_number ?? '—' }}</td>
                                    <td>{{ $item->phone_number ?? '—' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
                </div>
            </div>

            {{-- ── UNIONS ── --}}
            <div class="tab-pane fade" id="unions">
                <p class="section-title">Union Memberships</p>
                <div class="table-responsive">
                    <div class="table-card">
            <table class="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Joined</th>
                                <th>Union Name</th>
                                <th>Membership No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unions as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>{{ $item->union->name ?? '—' }}</td>
                                    <td>{{ $item->membership_number ?? '—' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
                </div>
            </div>

            {{-- ── ACADEMICS ── --}}
            <div class="tab-pane fade" id="academic">
                <p class="section-title">Academic Qualifications</p>
                <div class="table-responsive">
                    <div class="table-card">
            <table class="data-table">
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
                            @foreach ($academic_histories as $item)
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
                            @endforeach
                        </tbody>
                    </table>
        </div>
                </div>
            </div>

            {{-- ── DOCUMENTS ── --}}
            <div class="tab-pane fade" id="documents">
                <p class="section-title">Uploaded Documents</p>
                <div class="table-responsive">
                    <div class="table-card">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Document Name</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $item)
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
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

            {{-- DEPLOYMENT HISTORY --}}

                <div class="tab-pane fade" id="deployment">
                    <p class="section-title">Deployment History</p>
               
                        <div class="table-card p-3">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>School Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Period</th>
                                    
                                    <th>File Attachment</th>
 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deployments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->school->school_name }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->end_date ?? 'Present' }}</td>
                                        <td>
                                            @php
                                                $start = \Carbon\Carbon::parse($item->start_date);
                                                $end = $item->end_date ? \Carbon\Carbon::parse($item->end_date) : \Carbon\Carbon::now();
                                                $period = $start->diffForHumans($end, true);
                                            @endphp
                                            {{ $period }}
                                        </td>
                                        <td>
                                            @if ($item->file_attachment)
                                                <a href="{{ asset('storage/' . $item->file_attachment) }}" target="_blank">
                                                    View Attachment
                                                </a>
                                            @else
                                                No Attachment
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                  
                </div>

        </div>{{-- /tab-content --}}
    </div>
</div>

@endsection
