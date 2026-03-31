@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>VTC</span> STUDENTS</div>
        <div class="banner-actions">
            <a href="{{ route('admin.students.create') }}">
                <button class="btn-new" type="button">Add Student</button>
            </a>
        </div>
    </div>

    <table id="example" class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>FULL NAMES</th>
                <th>REG NO</th>
                <th>GENDER</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td class="td-id">{{ $item->id }}</td>
                    <td>{{ $item->user->first_name }} {{ $item->user->middle_name }} {{ $item->user->last_name }}</td>
                    <td>{{ $item->identity_number }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>
                        <div class="action-btns">
                            <a class="act-btn view" title="View" href="{{ route('admin.teacher-view', $item->id) }}">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                            </a>
                            <a class="act-btn edit" title="Edit" href="{{ route('admin.teacher-edit-view', $item->id) }}">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                            </a>
                            <a class="act-btn delete" title="Delete" href="{{ route('admin.teachers.delete', $item->id) }}">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="table-footer">
        <div class="showing-text">Showing {{ count($data) }} record(s)</div>
    </div>
</div>
@endsection
