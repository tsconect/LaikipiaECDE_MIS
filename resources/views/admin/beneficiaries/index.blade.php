@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>beneficiaries</h5>
        </div>
    <div class="card ">
      
        <div class="card-body">
            <h5 class="card-title text-right">
                <a href="{{ route('admin.beneficiaries.create') }}"><button class="btn btn-danger ">
                        <i class="fa fa-plus"></i> Add beneficiaries </button></a>
            </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N </th>
                                <th>Name </th>
                                <th>Relationship</th>
                                <th>Gender</th>
                                <th>ID Number</th>
                                <th>Phone Number</th>
                                
                   
                                
                           
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                                    <td>{{ $item->relationship }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->id_number }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                   
                                    
                                    <td>
                                        <a class="btn btn-outline-primary" title="View Beneficiary"
                                            href="{{ route('admin.beneficiaries.show', $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-outline-primary" title="Edit Beneficiary"
                                            href="{{ route('admin.beneficiaries.edit', $item->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.beneficiaries.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this beneficiary?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Delete Beneficiary">
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
