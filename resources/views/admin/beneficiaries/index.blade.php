@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>BENEFICIARIES</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.beneficiaries.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        Add Beneficiary
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="beneficiariesTable">
            <thead>
                <tr>
                    <th>S/N <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>RELATIONSHIP <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>GENDER <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ID NUMBER <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>PHONE NUMBER <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                        <td>{{ $item->relationship }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->id_number }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Beneficiary" href="{{ route('admin.beneficiaries.show', $item->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit Beneficiary" href="{{ route('admin.beneficiaries.edit', $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.beneficiaries.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this beneficiary?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete Beneficiary">
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