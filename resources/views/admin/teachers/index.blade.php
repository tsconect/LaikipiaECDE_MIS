
@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>ECDE <small>TEACHERS</small></h5>
        </div>
    <div class="card ">
      
        <div class="card-body">
            <h5 class="card-title text-right"> <a href="{{ route('admin.generate_staff_returns') }}"><button class="btn btn-warning ">
                        <i class="fa fa-file"></i> Generate <?php $month = date('F ,Y');
                        echo $month; ?> Staff Returns</button></a>
                <a href="{{ route('admin.teachers.create') }}"><button class="btn btn-danger ">
                        <i class="fa fa-plus"></i> New Teacher</button></a>
            </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>ID Number</th>
                                <th>Kra Pin</th>
                                <th>Gender</th>
                           
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->first_name . ' ' . $item->user->middle_name . ' ' . $item->user->last_name }}
                                    </td>
                                    <td>{{ $item->user->email }}</td>
                                    <td>{{ $item->user->phone_number }}</td>
                                    <td>{{ $item->id_number }}</td>
                                    <td>{{ $item->kra_pin }}</td>
                                    <td>{{ $item->gender }}</td>
                                   
                                    <td>
                                        <a class="btn btn-outline-primary" title="View teacher's metadata"
                                            href="{{ route('admin.teachers.show', $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-outline-primary" title="Edit Teacher"
                                            href="{{ route('admin.teachers.edit', $item->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.teachers.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this teacher?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Delete Teacher">
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
