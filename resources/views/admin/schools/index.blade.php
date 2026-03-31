@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection


@section('content')

<div class="table-card">
    <!-- Banner with title + action buttons -->
    <div class="table-banner">
        <div class="table-banner-title"><span>ECDE</span> SCHOOLS</div>
        <div class="banner-actions">
            <a href="{{ route('admin.ecde-schools.create') }}">
                <button class="btn-new">
                    <i class="bi bi-plus-lg"></i>
                    New School
                </button>
            </a>
        </div>
    </div>

    <!-- Table -->
    <table class="data-table dt-admin" id="schoolsTable">
        <thead>
            <tr>
                <th>ID <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                <th>School Name <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                <th>Center Code <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                <th>County <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                <th>Sub County <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                <th>Ward <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                <th>Sub Location <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schools as $item)
            <tr>
                <td class="td-id">{{$item->id}}</td>
                <td class="td-strong">{{$item->school_name}}</td>
                <td>{{$item->center_code }}</td>
                <td>{{$item->county->name ?? ($item->subCounty->county->name ?? '-') }}</td>
                <td>{{$item->subCounty->name ?? ($item->ward->subCounty->name ?? '-') }}</td>
                <td>{{$item->ward->name??'-'}}</td>
                <td>{{$item->subLocation->name ?? '-'}}</td>
                <td>
                    <div class="action-btns">
                        <a class="act-btn view" title="View School" href="{{ route('admin.ecde-schools.show', $item->id) }}">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a class="act-btn edit" title="Edit School" href="{{ route('admin.ecde-schools.edit', $item->id) }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('admin.ecde-schools.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this school?');">
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