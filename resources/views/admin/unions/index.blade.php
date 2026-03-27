@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>UNIONS</h5>
        </div>
    <div class="card ">
      
        <div class="card-body">
            <h5 class="card-title text-right">
                <a href="{{ route('admin.unions.create') }}"><button class="btn btn-danger ">
                        <i class="fa fa-plus"></i> New Union</button></a>
            </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N </th>
                                <th>Created On </th>
                                <th>Name</th>
                                <th>Members</th>
                   
                                
                           
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unions as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->name }}
                                    </td>
                                    <td>0</td>
                                    
                                    <td>
                                        <a class="btn btn-outline-primary" title="View teacher's metadata"
                                            href="{{ route('admin.unions.show', $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-outline-primary" title="Edit Teacher"
                                            href="{{ route('admin.unions.edit', $item->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.unions.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this union?');">
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
