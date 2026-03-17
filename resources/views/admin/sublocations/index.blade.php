@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
  <div class="card-header btn-success">
            <h5>
                SUB LOCATIONS
            </h5>
        </div>
<div class="card">
<div class="card-body">
            <h5 class="card-title text-right">  <a href="{{ route('admin.sub-locations.create') }}"><button class="btn btn-danger ">  <i class="fa fa-plus"></i> New Sublocation</button></a> </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name</th>
                               
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sublocations as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                              
                                <td>
                                <a class="btn btn-outline-primary" title="View Villages"
                                        href="">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-outline-primary" title="Edit Sublocation"
                                        href="{{ route('admin.sub-locations.edit', $item->id) }}">
                                        <i class="fa fa-edit"></i>
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
