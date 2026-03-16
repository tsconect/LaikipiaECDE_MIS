@extends('backoffice.layouts.app')


@section('nav-bar')
@include('chief.sidebar')
@endsection

@section('content')
<div class="btn-secondary p-2">
    <h5> Bursary Applications for  {{Auth::user()->chief->location->name}} ({{ Auth::user()->chief->location_id ?? '' }})</h5>
</div>
<div class="card">
<div class="card-body">

            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                
                                <th>View Applicants</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
            
                                    @if ($item->status == 'open')
                                        <span class="badge badge-success">Open</span>
                                    @elseif ($item->status == 'closed')
                                        <span class="badge badge-danger">Closed</span>
                                    @elseif ($item->status == 'cancelled')
                                        <span class="badge badge-secondary">Cancelled</span>
                                    @else
                                        <span class="badge badge-warning">Unknown</span>
                                    @endif  
                                      
                                </td>
                                
                                <td>
                                    {{ now()->diffInDays($item->deadline) }} days remaining
                                </td>
                                <td class="text-center">{{ $item->studentApplications()->whereHas('student', function ($query) {
                                        $query->where('location_id',  Auth::user()->chief->location_id );
                                    })->count() }}
                                </td>

                          
                                <td class="text-center">      
                                    <a class="btn btn-outline-primary"
                                        href="{{ route('chief.bursary.applications.view', ['id' => $item->id]) }}"><i class="fa fa-eye mr-1"></i>View Applications
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                            </tfoot>
                    </table>
                </div>
            </div>
        </div>

</div>




@endsection
