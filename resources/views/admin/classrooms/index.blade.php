@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection


@section('content')
<div class="card-header btn-success">
    <h5>ECDE Schools</h5>
</div>
<div class="card">
<div class="card-body">
            <h5 class="card-title text-right">  <a href="{{route('admin.ecde-schools.create')}}"><button class="btn btn-danger ">  <i class="fa fa-plus"></i> New School</button></a> </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>School Name</th>
                                <th>Center Code</th>
                             
                                <th>Ward</th>
                               
                                <th style="text-align: right;">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schools as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td style="font-weight: 600;">{{$item->school_name}}</td>
                                <td>{{$item->center_code }}</td>
                                <td>{{$item->ward->name??'-'}}</td>
                                <td>
                                    <div class="table-actions" style="justify-content: flex-end;">
                                        <a class="btn-action btn-view" title="View School"
                                                href="{{ route('admin.ecde-schools.show', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn-action btn-edit" title="Edit School"
                                                href="{{ route('admin.ecde-schools.edit', $item->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.ecde-schools.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this school?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action btn-delete" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                    </div>
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
