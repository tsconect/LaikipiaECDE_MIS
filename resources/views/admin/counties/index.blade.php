@extends('backoffice.layouts.app')


@section('nav-bar')


@include('layouts.main_nav')

@endsection

@section('content')

<div class="card">
<div class="card-body">
            <h5 class="card-title">Counties</h5>
            <h5 class="card-title text-right">  <a href="{{route('admin.county.create')}}"><button class="btn btn-warning ">  <i class="fa fa-plus"></i> New County</button></a> </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                {{-- <th>ID </th> --}}
                                <th>Name</th>

                                <th>Date Created</th>
                                <th>Date Updated</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($county as $item)
                            <tr>
                                {{-- <td>{{$item->id}}</td> --}}
                                <td>{{$item->name}}</td>

                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                <a class="btn btn-outline-primary" title="View Wards"
                                        href="">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-outline-primary" title="Delete Constituency"
                                        href="/singlebusiness/edit/{{$item->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-outline-primary" title="Delete Constituency"
                                        href="/constituency/delete/{{$item->id}}">
                                        <i class="fa fa-trash"></i>
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
