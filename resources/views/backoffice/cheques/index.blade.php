@extends('backoffice.layouts.app')


@section('nav-bar')
@include('layouts.main_nav')
@endsection

@section('content')
<div class="btn-secondary p-2">
    <h5>Cheques</h5>
</div>
<div class="card">
<div class="card-body">

            <h5 class="card-title text-right">  <a href="{{route('admin.cheques.create')}}"><button class="btn btn-warning ">  <i class="fa fa-plus"></i> New Cheque</button></a> </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SN Number</th>
                                <th>Cheque Number </th>
                                <th>Date Added</th>
                                <th>School </th>
                                <th>Amount</th>   
                                <th>Oustanding Balance</th>
                                <th>Students</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->cheque_number}}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>{{ $item->school }}</td>
                                <td>{{$item->amount}}</td>
                                <td>{{$item->balance}}</td>
                                <td>{{$item->transactions->count()}}</td>
                        
                          
                                <td>   
                                    <a class="btn btn-outline-secondary"
                                        href="{{ route('admin.cheques.assign', ['id' => $item->id]) }}"><i class="fa fa-eye"></i>Assign Students
                                    </a>
                                    <a class="btn btn-outline-primary"
                                        href="{{ route('admin.cheques.view', ['id' => $item->id]) }}"><i class="fa fa-eye"></i>View 
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
