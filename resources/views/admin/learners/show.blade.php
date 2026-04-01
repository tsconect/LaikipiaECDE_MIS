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
        <div class="detail-grid mb-4">
            <div class="detail-item"><div class="detail-label"><i class="bi bi-person"></i> First Name</div><div class="detail-value">{{ $learner->first_name }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-person"></i> Middle Name</div><div class="detail-value">{{ $learner->middle_name ?? '-' }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-person"></i> Last Name</div><div class="detail-value">{{ $learner->last_name }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-gender-ambiguous"></i> Gender</div><div class="detail-value">{{ ucfirst($learner->gender) }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-calendar-event"></i> Date of Birth</div><div class="detail-value">{{ $learner->dob }} ({{ \Carbon\Carbon::parse($learner->dob)->age }} yrs)</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-flag"></i> Nationality</div><div class="detail-value">{{ $learner->nationality->name ?? '-' }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-universal-access"></i> PWD Status</div><div class="detail-value">{{ ucfirst($learner->pwd_status) }}</div></div>
            @if(strtolower($learner->pwd_status) == 'yes')
                <div class="detail-item"><div class="detail-label"><i class="bi bi-person-raised-hand"></i> Disability Type</div><div class="detail-value">{{ $learner->disability_type }}</div></div>
                <div class="detail-item full"><div class="detail-label"><i class="bi bi-card-text"></i> Impairment Details</div><div class="detail-value">{{ $learner->impairment_details }}</div></div>
            @endif
        </div>
        <div class="profile-section-title">Admission & Location</div>
        <div class="detail-grid">
            <div class="detail-item"><div class="detail-label"><i class="bi bi-upc-scan"></i> NEMIS Number</div><div class="detail-value">{{ $learner->nemis_number }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-hash"></i> Admission Number</div><div class="detail-value">{{ $learner->admission_number }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-journal-bookmark"></i> Class</div><div class="detail-value">{{ $learner->class }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-calendar-check"></i> Date of Admission</div><div class="detail-value">{{ $learner->date_of_admission }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-signpost"></i> Mode of Admission</div><div class="detail-value">{{ ucfirst($learner->mode_of_admission) }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-file-earmark-text"></i> Birth Certificate No</div><div class="detail-value">{{ $learner->birth_certificate_number }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-geo-alt"></i> Ward</div><div class="detail-value">{{ $learner->ward->name ?? '-' }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-pin-map"></i> Sub Location</div><div class="detail-value">{{ $learner->subLocation->name ?? '-' }}</div></div>
            <div class="detail-item"><div class="detail-label"><i class="bi bi-house-door"></i> Village</div><div class="detail-value">{{ $learner->village }}</div></div>
        </div>
    </div>
    <div class="tab-pane fade" id="parent">
         <div class="table-actions p-3 text-right">
             <a  style="font-size: 12px;" href="{{ route('admin.learner-parents.create', ['learner_id' => $learner->id]) }}" class="btn btn-success" >
                <i class="fa fa-plus"></i> Add Parent/Guardian
            </a>
          </div>
      @if($learner->parents->count() > 0)
       <table class="data-table p-2">
          <thead>
            <tr>
              <th>ID</th>
              <th>Full Names</th>
              <th>Relationship</th>
                <th>ID Number</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Ward</th>
                <th>Village</th>
                <th>Action</th>
            </tr>
          </thead>
            <tbody>
                @foreach($learner->parents as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                        <td>{{ ucfirst($item->relationship) }}</td>
                        <td>{{ $item->id_number ?? '-' }}</td>
                        <td>{{ $item->phone_number ?? '-' }}</td>
                        <td>{{ $item->email ?? '-' }}</td>
                        <td>{{ $item->ward->name ?? '-' }}</td>
                        <td>{{ $item->village ?? '-' }}</td>
                        <td>
                            <div class="action-btns">
                           
                                <a class="act-btn edit" title="Edit Learner" href="{{ route('admin.learners.edit', $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.learners.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this learner?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete Learner">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      @else
      <div class="empty-tab">
                <i class="bi bi-circle"></i>
                <div class="empty-tab-title">No parent/guardian information</div>
                <div class="empty-tab-sub">Use the Add Parent/Guardian button to register guardian details.</div>
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

    document.addEventListener('DOMContentLoaded', function () {
        const actions = document.getElementById('parentGuardianToolbarActions');
        if (!actions) {
            return;
        }

        const tryMountActions = function () {
            const wrapper = document.getElementById('learnerParentGuardianTable_wrapper');
            if (!wrapper) {
                return false;
            }

            const topRow = wrapper.querySelector('.row .col-12.d-flex.align-items-center');
            if (!topRow) {
                return false;
            }

            if (!actions.dataset.mounted) {
                actions.classList.remove('d-none');
                actions.classList.add('ms-auto', 'd-flex', 'align-items-center', 'gap-2');
                topRow.appendChild(actions);
                actions.dataset.mounted = '1';
            }

            return true;
        };

        if (!tryMountActions()) {
            let attempts = 0;
            const timer = setInterval(function () {
                attempts += 1;
                if (tryMountActions() || attempts > 20) {
                    clearInterval(timer);
                }
            }, 150);
        }
    });
</script>

@endsection
