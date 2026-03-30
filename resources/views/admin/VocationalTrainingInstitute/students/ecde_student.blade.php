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
                            <a class="act-btn view" title="View" href="{{ route('admin.teacher-view', $item->id) }}"><i class="fa fa-eye"></i></a>
                            <a class="act-btn edit" title="Edit" href="{{ route('admin.teacher-edit-view', $item->id) }}"><i class="fa fa-edit"></i></a>
                            <a class="act-btn delete" title="Delete" href="{{ route('admin.teachers.delete', $item->id) }}"><i class="fa fa-trash"></i></a>
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
