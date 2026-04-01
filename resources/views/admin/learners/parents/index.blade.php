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
                <a href="{{ route('admin.learners.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Learner
                    </button>
                </a>
            </div>
        </div>
<div class="p-3">
        <!-- Table -->
        <table class="data-table dt-admin" id="learnersTable">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>FULL NAMES  </th>
                    <th>NEMIS NO  </th>
                    <th>GENDER  </th>
                    <th>SCHOOL POSTED  </th>
                    <th>AGE </th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($learners as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name }}</td>
                        <td>{{ $item->nemis_number }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->school->school_name ?? '-' }}</td>
                        <td>
                            @if($item->dob)
                                {{ \Carbon\Carbon::parse($item->dob)->age }}
                            @endif
                        </td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Learner" href="{{ route('admin.learners.show', $item->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
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

</div>
</div>
    
@endsection