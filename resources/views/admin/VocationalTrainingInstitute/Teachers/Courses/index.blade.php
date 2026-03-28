@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>VOCATIONAL</span> COURSES</div>
        <div class="banner-actions">
            <a href="{{ route('admin.vtc_courses.create') }}">
                <button class="btn-new" type="button">Add Course</button>
            </a>
        </div>
    </div>

    <table id="example" class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>COURSE NAME</th>
                <th>DURATION</th>
                <th>EXAMINATION BODY OR CRITERIA</th>
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
                    <td>{{ $item->examination_body_or_creteria }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <div class="action-btns">
                            <a class="act-btn view" title="View" href="{{ route('admin.wards.all', $item->id) }}"><i class="fa fa-eye"></i></a>
                            <a class="act-btn edit" title="Edit" href="{{ url('admin/constituency/edit/' . $item->id) }}"><i class="fa fa-edit"></i></a>
                            <a class="act-btn delete" title="Delete" href="{{ route('admin.delete-constituency', $item->id) }}"><i class="fa fa-trash"></i></a>
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
