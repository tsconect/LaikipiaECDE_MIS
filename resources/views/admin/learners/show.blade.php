@extends('admin.app')

@section('content')


@php
    $avatar = $learner->passport_photo
        ? asset('storage/' . $learner->passport_photo)
        : 'https://ui-avatars.com/api/?name='.urlencode($learner->first_name.' '.$learner->last_name).'&background=3b82f6&color=fff';
    $name = $learner->first_name . ' ' . ($learner->middle_name ?? '') . ' ' . $learner->last_name;
    $email = $learner->parent->email ?? null;
    $phone = $learner->parent->phone_number ?? null;
    $id_number = $learner->nemis_number ?? null;
    $tabs = [
        ['id' => 'profile', 'label' => 'Profile', 'icon' => 'bi bi-person-fill'],
        ['id' => 'parent', 'label' => 'Parent / Guardian', 'icon' => 'bi bi-people-fill'],
    ];
@endphp

<x-admin.profile-header :avatar="$avatar" :name="$name" :email="$email" :phone="$phone" :id_number="$id_number" />

<x-admin.tabbed-card :tabs="$tabs">
    <div class="tab-pane fade show active" id="profile">
        <div class="profile-section-title">Personal Information</div>
        <div class="info-grid mb-4">
            <div class="info-item"><div class="info-label">First Name</div><div class="info-value">{{ $learner->first_name }}</div></div>
            <div class="info-item"><div class="info-label">Middle Name</div><div class="info-value">{{ $learner->middle_name ?? '-' }}</div></div>
            <div class="info-item"><div class="info-label">Last Name</div><div class="info-value">{{ $learner->last_name }}</div></div>
            <div class="info-item"><div class="info-label">Gender</div><div class="info-value">{{ ucfirst($learner->gender) }}</div></div>
            <div class="info-item"><div class="info-label">Date of Birth</div><div class="info-value">{{ $learner->dob }} ({{ \Carbon\Carbon::parse($learner->dob)->age }} yrs)</div></div>
            <div class="info-item"><div class="info-label">Nationality</div><div class="info-value">{{ $learner->nationality->name ?? '-' }}</div></div>
            <div class="info-item"><div class="info-label">PWD Status</div><div class="info-value">{{ ucfirst($learner->pwd_status) }}</div></div>
            @if(strtolower($learner->pwd_status) == 'yes')
                <div class="info-item"><div class="info-label">Disability Type</div><div class="info-value">{{ $learner->disability_type }}</div></div>
                <div class="info-item full"><div class="info-label">Impairment Details</div><div class="info-value">{{ $learner->impairment_details }}</div></div>
            @endif
        </div>
        <div class="profile-section-title">Admission & Location</div>
        <div class="info-grid">
            <div class="info-item"><div class="info-label">NEMIS Number</div><div class="info-value">{{ $learner->nemis_number }}</div></div>
            <div class="info-item"><div class="info-label">Admission Number</div><div class="info-value">{{ $learner->admission_number }}</div></div>
            <div class="info-item"><div class="info-label">Class</div><div class="info-value">{{ $learner->class }}</div></div>
            <div class="info-item"><div class="info-label">Date of Admission</div><div class="info-value">{{ $learner->date_of_admission }}</div></div>
            <div class="info-item"><div class="info-label">Mode of Admission</div><div class="info-value">{{ ucfirst($learner->mode_of_admission) }}</div></div>
            <div class="info-item"><div class="info-label">Birth Certificate No</div><div class="info-value">{{ $learner->birth_certificate_number }}</div></div>
            <div class="info-item"><div class="info-label">Ward</div><div class="info-value">{{ $learner->ward->name ?? '-' }}</div></div>
            <div class="info-item"><div class="info-label">Sub Location</div><div class="info-value">{{ $learner->subLocation->name ?? '-' }}</div></div>
            <div class="info-item"><div class="info-label">Village</div><div class="info-value">{{ $learner->village }}</div></div>
        </div>
    </div>
    <div class="tab-pane fade" id="parent">
        @if($learner->parent)
            <div class="profile-section-title">Guardian Information</div>
            <div class="info-grid">
                <div class="info-item"><div class="info-label">Full Name</div><div class="info-value">{{ $learner->parent->first_name }} {{ $learner->parent->middle_name }} {{ $learner->parent->last_name }}</div></div>
                <div class="info-item"><div class="info-label">Relationship</div><div class="info-value">{{ ucfirst($learner->parent->relationship) }}</div></div>
                <div class="info-item"><div class="info-label">ID Number</div><div class="info-value">{{ $learner->parent->id_number ?? '-' }}</div></div>
                <div class="info-item"><div class="info-label">Phone Number</div><div class="info-value">{{ $learner->parent->phone_number ?? '-' }}</div></div>
                <div class="info-item"><div class="info-label">Email</div><div class="info-value">{{ $learner->parent->email ?? '-' }}</div></div>
                <div class="info-item"><div class="info-label">Village</div><div class="info-value">{{ $learner->parent->village ?? '-' }}</div></div>
            </div>
        @else
            <div class="empty-tab">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                <div class="empty-tab-title">No parent/guardian information</div>
                <div class="empty-tab-sub">No details have been registered for this learner's guardian.</div>
            </div>
        @endif
    </div>
</x-admin.tabbed-card>

<script>
  function switchTab(name, btn) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('tab-' + name).classList.add('active');
  }
</script>

@endsection
