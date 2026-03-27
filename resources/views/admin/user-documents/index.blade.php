@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>MY DOCUMENTS</h5>
        </div>
    <div class="card ">
      
        <div class="card-body">
            <h5 class="card-title text-right">
                <a href="{{ route('admin.user-documents.create') }}"><button class="btn btn-danger ">
                        <i class="fa fa-plus"></i> Add Document</button></a>
            </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N </th>
                                <th>Created On </th>
                                <th>Name</th>
                                <th>File</th>
                                
                   
                                
                           
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->document->name }}
                                    </td>
                                    <td>
                                        @if ($item->file)
                                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank">
                                                <i class="fa fa-download"></i> 
                                            </a>
                                        @else
                                         N/A
                                         @endif
                                    </td>
                                    
                                    <td>
                                        <a class="btn btn-outline-primary" title="View teacher's metadata"
                                            href="{{ route('admin.user-documents.show', $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-outline-primary" title="Edit Teacher"
                                            href="{{ route('admin.user-documents.edit', $item->id) }}">
                                            <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <form action="{{ route('admin.user-documents.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this document?');">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit" class="btn btn-outline-danger" title="Delete Document">
                                                                                        <i class="fa fa-trash"></i>
                                                                                </form>
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
