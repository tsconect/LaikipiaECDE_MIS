@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>COUNTIES</h5>
        </div>
<div class="card ">



    <div class="card-body">
        <div class=" card-body">
            <div class="table-responsive">
                <table  id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N </th>
                            <th>Name</th>
                            <th>Action</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($counties as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ route('admin.counties.show', $item->id) }}" title="View County">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-outline-primary" href="{{ route('admin.counties.edit', $item->id) }}" title="Edit County">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.counties.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this county?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" title="Delete County">
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
