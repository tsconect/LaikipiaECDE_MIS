@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="card-header btn-success">
            <h5>SYSTEM LOGS</h5>
        </div>
    <div class="card ">
      
        <div class="card-body">
          
            <div class=" card-body">
                <div class="table-responsive">
                   <table class="table" id="dt-basic10">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Time</th>
                                <th>Action</th>
                                <th>Performed By</th>
                                <th>Description</th>
                                <th>Asset URL</th>
                                <th >View</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
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
          
                { data: 'description', name: 'description' },
                { data: 'asset_url', name: 'asset_url', orderable: false, searchable: false },
                { data: 'view', name: 'view', orderable: false, searchable: false }
            ],
            dom: 'Blfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
            lengthMenu: [ 10, 100,500,1000,10000,100000,1000000]
        });
    });
</script>



  
@endsection