@extends('admin.app')


@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
<div class="btn-success p-2">
    <h5>Registered Bursaries Openings</h5>
</div>
<div class="card">
<div class="card-body">

            <h5 class="card-title text-right">  <a href="{{route('admin.bursary.application.create')}}"><button class="btn btn-warning ">  <i class="fa fa-plus"></i> New Bursary</button></a> </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name</th>
                                <th>Applicants</th>
                                <th>Secondary</th>
                                <th>University</th>
                                <th>Colleges</th>
                                <th>Allocated</th>
                                <th>Percentage</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>3000</td>
                                <td>44</td>
                                <td>30</td>
                                <td>456</td>
                                <td>19</td>
                                <td>29 %</td>
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
</div></td>
                            </tr>
                            @endforeach

                            </tfoot>
                    </table>
                </div>
            </div>
        </div>

</div>




@endsection
