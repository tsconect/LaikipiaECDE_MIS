@extends('admin.app')


@section('nav-bar')
    @include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>DEPARTMENT WORKERS</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.generate_dpt_staff_returns') }}">
                    <button class="btn-generate">
                        <i class="bi bi-file-earmark-arrow-down"></i>
                        Generate <?php $month = date('F ,Y'); echo $month; ?> Staff Returns
                    </button>
                </a>
                <a href="{{ route('admin.department_workers.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Department Worker
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="departmentWorkersTable">
            <thead>
                <tr>
                    <th>ID <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ID NUMBER <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>DATE CREATED <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>DATE UPDATED <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->full_names }}</td>
                        <td>{{ $item->id_number ?? 'n/a' }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Wards" href="{{ route('admin.wards.all', $item->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit Constituency" href="{{ url('admin/constituency/edit/' . $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a class="act-btn delete" title="Delete Constituency" href="{{ route('admin.delete-constituency', $item->id) }}">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</div>

    
@endsection