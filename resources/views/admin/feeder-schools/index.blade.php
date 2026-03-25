@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection


@section('content')
<div class="card-header btn-success">
    <h5>Feeder Schools</h5>
</div>

<div class="card">
<div class="card-body">
            <h5 class="card-title text-right">  <a href="{{route('admin.feeder-schools.create')}}"><button class="btn btn-danger ">  <i class="fa fa-plus"></i> New Feeder School</button></a> </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>School Name</th>
                                <th>NO. C/Rooms</th>
                                <th>Status</th>
            
                                <th>Ward</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->school_name}}</td>
                                <td>{{$item->number_of_classes }}</td>
                                <td>{{$item->class_rooms_status }}</td>
                                <td>{{$item->ward->name}}</td>

                                <td>
                                <a class="btn btn-outline-primary" title="View School"
                                        href="{{ route('admin.feeder-schools.show', $item->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-outline-primary" title="Edit School"
                                        href="{{ route('admin.feeder-schools.edit', $item->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.feeder-schools.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this feeder school?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Delete School">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                   
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
