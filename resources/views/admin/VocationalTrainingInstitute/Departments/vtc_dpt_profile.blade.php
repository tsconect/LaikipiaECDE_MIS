@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>VTC</span> COURSES</div>
        <div class="banner-actions">
            <a href="{{ route('admin.const.create') }}">
                <button class="btn-new" type="button">New Course</button>
            </a>
        </div>
    </div>

    <table id="example" class="data-table dt-admin">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DURATION</th>
                <th>DATE CREATED</th>
                <th>DATE UPDATED</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td class="td-id">{{ $item->id }}</td>
                    <td>{{ $item->course_name }}</td>
                    <td>{{ $item->duration }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <div class="action-btns">
                            <a class="act-btn view" title="Create Department" href="{{ url('admin/new-vtc_dept/?vtc=' . $item->id) }}"><i class="fa fa-plus"></i></a>
                            <a class="act-btn edit" title="View Students" href="{{ route('admin.coursesWithinVtcDPT', $item->id) }}"><i class="fa fa-eye"></i></a>
                            <a class="act-btn delete" title="Delete" href="{{ route('admin.delete-constituency', $item->id) }}"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection