@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>ECDE</span> STUDENTS</div>
        <div class="banner-actions">
            <a href="{{ route('admin.ecde-students.create') }}">
                <button class="btn-new" type="button">
                    <i class="bi bi-plus-lg"></i>
                    New ECDE Student
                </button>
            </a>
        </div>
    </div>

    <table class="data-table dt-admin" id="studentsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>FULL NAMES</th>
                <th>REG NO</th>
                <th>GENDER</th>
                <th>SCHOOL POSTED</th>
                <th>AGE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $item)
                <tr>
                    <td class="td-id">{{ $item->id }}</td>
                    <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                    <td>{{ $item->reg_number }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->school->school_name ?? '-' }}</td>
                    <td>
                        @if($item->dob)
                            {{ \Carbon\Carbon::parse($item->dob)->age }}
                        @endif
                    </td>
                    <td>
                        <div class="action-btns">
                            <a class="act-btn view" title="View Student" href="{{ route('admin.ecde-students.show', $item->id) }}">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a class="act-btn edit" title="Edit Student" href="{{ route('admin.ecde-students.edit', $item->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.ecde-students.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this student?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="act-btn delete" title="Delete">
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
@endsection