@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>SYSTEM</span> LOGS</div>
    </div>

    <div class="section-body section-body-flush">
        <div class="table-responsive">
            <table class="data-table dt-admin" id="dt-basic10">
                <thead>
                    <tr>
                        <th>S/NO</th>
                        <th>TIME</th>
                        <th>ACTION</th>
                        <th>PERFORMED BY</th>
                        <th>DESCRIPTION</th>
                        <th>ASSET URL</th>
                        <th>VIEW</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#dt-basic10').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.system.logs') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'time', name: 'created_at' },
            { data: 'action', name: 'action' },
            { data: 'performed_by', name: 'causer.first_name', defaultContent: '-' },
            { data: 'description', name: 'description' },
            { data: 'asset_url', name: 'asset_url', orderable: false, searchable: false },
            { data: 'view', name: 'view', orderable: false, searchable: false }
        ],
        dom: 'Blfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
        lengthMenu: [10, 100, 500, 1000, 10000, 100000, 1000000]
    });
});
</script>
@endsection