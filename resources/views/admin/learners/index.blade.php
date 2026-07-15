@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>LEARNERS</span></div>
            <div class="banner-actions">
            @can('admin.learners.create')
                <a href="{{ route('admin.learners.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Learner
                    </button>
                </a>
            @endcan
            </div>
        </div>
<div class="p-3">
        <!-- Table -->
        <table class="" id="learnersTable">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>FULL NAMES  </th>
                    <th>Birth Cert </th>
                    <th>Gender  </th>
                    <th>DOB </th>
                    <th>Age</th>
                    <th>Sub Location </th>
                    <th>Village </th>
                    <th>ADM</th>
                    <th>Date Of Adm</th>
                    <th>Class</th>
                    <th>School</th>
                    <th>Parental Status</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

</div>
</div>

<script>
$(document).ready(function () {
    $('#learnersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.learners.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'full_name', name: 'first_name' },
            { data: 'birth_certificate_number', name: 'birth_certificate_number' },
            { data: 'gender', name: 'gender' },
            { data: 'dob', name: 'dob' },
            { data: 'age', name: 'age', orderable: false, searchable: false },
            { data: 'sub_location', name: 'sub_location_id', orderable: false, searchable: false },
            { data: 'village', name: 'village' },
            { data: 'admission_number', name: 'admission_number' },
            { data: 'date_of_admission', name: 'date_of_admission' },
            { data: 'class', name: 'class' },
            { data: 'school', name: 'school.school_name', orderable: false, searchable: false },
            { data: 'parental_status', name: 'parental_status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[0, 'desc']]
    });
});
</script>
@endsection
