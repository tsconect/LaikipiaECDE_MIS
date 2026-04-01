@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>VOCATIONAL</span> TEACHERS</div>
        <div class="banner-actions">
            <a href="{{ route('admin.generate_vtc_staff_returns') }}">
                <button class="btn-generate" type="button"><i class="fa fa-file"></i> Generate VTC Staff Returns</button>
            </a>
            <a href="{{ route('admin.vtc_teachers.create') }}">
                <button class="btn-new" type="button">New VTC Teacher</button>
            </a>
        </div>
    </div>

    <table id="example" class="data-table dt-admin">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>TSC NUMBER</th>
                <th>DATE CREATED</th>
                <th>DATE UPDATED</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="td-id">{{ $item->id }}</td>
                    <td>{{ $item->full_names }}</td>
                    <td>{{ $item->tsc_number ?? 'n/a' }}</td>
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

</div>
@endsection