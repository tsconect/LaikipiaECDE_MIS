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
                                    <button type="submit" class="action-btn delete" title="Delete"><svg viewBox="0 0 20 20" fill="currentColor" width="14" height="14"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg></button>
                                </form>
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
