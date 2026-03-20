@extends('admin.app')


@section('nav-bar')

@include('admin.layouts.sidebar')

@endsection

@section('content')

<div class="card">
<div class="card-body">
            <h5 >Registered Unions</h5>


            <h5 class="card-title text-right">  <a href="{{route('admin.unions.create')}}"><button class="btn btn-warning ">  <i class="fa fa-plus"></i> Add New Union</button></a> </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Union Name</th>
                                <th>Members</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>10</td>
                                <td>
                                <a class="btn btn-outline-primary" title="See Members"
                                        href="">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-outline-primary" title="Edit Union"
                                        href="{{route('admin.edit.union', $item->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-outline-primary" title="Delete Union"
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
