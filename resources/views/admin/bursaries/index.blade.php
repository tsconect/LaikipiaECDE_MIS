@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>BURSARY</span> OPENINGS</div>
        <div class="banner-actions">
            <a href="{{ route('admin.bursary.application.create') }}">
                <button class="btn-new" type="button">
                    <i class="bi bi-plus-lg"></i>
                    New Bursary
                </button>
            </a>
        </div>
    </div>

    <table class="data-table dt-admin" id="bursariesTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>APPLICANTS</th>
                <th>SECONDARY</th>
                <th>UNIVERSITY</th>
                <th>COLLEGES</th>
                <th>ALLOCATED</th>
                <th>PERCENTAGE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td class="td-id">{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>3000</td>
                    <td>44</td>
                    <td>30</td>
                    <td>456</td>
                    <td>19</td>
                    <td>29 %</td>
                    <td>
                        <div class="action-btns">
                            <a class="act-btn view" title="View Bursary" href="#">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a class="act-btn edit" title="Edit Bursary" href="/singlebusiness/edit/{{ $item->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="act-btn delete" title="Delete Bursary" href="/constituency/delete/{{ $item->id }}">
                                <i class="bi bi-circle"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection