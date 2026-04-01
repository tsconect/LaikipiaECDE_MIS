@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title -->
        <div class="table-banner">
            <div class="table-banner-title"><span>SUB</span>-COUNTIES</div>
            <div class="banner-actions">
                <!-- Add button if needed -->
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="subCountyTable">
            <thead>
                <tr>
                    <th>S/N <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                </tr>
            </thead>
            <tbody>
                @foreach($constituencies as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

</div>

    
@endsection