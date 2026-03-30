@extends('web.app')

@section('title', 'ECDE Schools')

@section('content')
<div class="container card p-4 mb-2">
    <div class="page-header-container mb-4">
        <h1 class="page-title">ECDE Schools</h1>
        <p class="page-subtitle">Browse early childhood education centres across Laikipia County.</p>
        <small class="text-muted">Total schools: {{ $schools->count() }}</small>
    </div>

    @if($schools->count() > 0)
        <div class="row p-4  g-4">
            
                <div class="col-12 ">
                     <table style="width: 100%;" id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>School Name</th>
                                <th>Center Code</th>
                                <th>County</th>
                                <th>Sub County</th>
                             
                                <th>Ward</th>
                                <th>Sub Location</th>
                               
                                <th style="text-align: center;">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schools as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td style="font-weight: 600;">{{$item->school_name}}</td>
                                <td>{{$item->center_code }}</td>
                                <td>{{$item->ward->subCounty->county->name??'-'}}</td>
                      
                                    <td>{{$item->ward->subCounty->name??'-'}}</td>
                                    <td>{{$item->ward->name??'-'}}</td>
                                    <td>{{$item->ward->subLocation->name??'-'}}</td>
                                <td>
                                    <div class="table-actions text-center" >
                                        <a class="btn-action btn-view" title="View School"
                                                href="{{ route('admin.ecde-schools.show', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                           
                                           
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            </tfoot>
                    </table>
                </div>
           
        </div>

    @else
        <div class="empty-state-container">
            <div class="empty-state">
                <i class="fa fa-building"></i>
                <h5 class="mb-2">No schools found</h5>
                <p class="mb-0">ECDE school records will appear here once available.</p>
            </div>
        </div>
    @endif
</div>
@endsection
