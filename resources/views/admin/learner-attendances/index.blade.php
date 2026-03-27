@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>learners attendance</h5>
        </div>
<div class="card ">



    <div class="card-body">


        <h5 class="card-title text-right"> <a href="{{route('admin.learner-attendances.create')}}"><button class="btn btn-danger ">
        <i class="fa fa-plus"></i> Mark Register</button></a> </h5>
        <div class=" card-body">
            <div class="table-responsive">
                <table  id="dt-basic2" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Student</th>
                            <th>Date</th>

                            <th>Marked By</th>
                            <th>Status</th>
                            <th>Abseentism Reason</th>
                          
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->learner->first_name . ' '. $item->learner->middle_name . ' '. $item->learner->last_name}}  </td>
                            <td>{{$item->date}}</td>
                            <td>{{ $item->teacher->first_name ?? '-' }} {{ $item->teacher->middle_name ?? '-' }} {{ $item->teacher->last_name ?? '-' }}</td>
                            <td>
                                {{ ucfirst($item->status) ?? '-' }} 
                            </td>
                            <td>
                                {{ $item->reason ?? '-' }}
                            </td>
                          


                            <td>
                                <a class="btn btn-outline-primary" title="View Student"
                                href="{{ route('admin.learners.show', $item->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-outline-primary" title="Edit Teacher"
                                    href="{{ route('admin.learners.edit', $item->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.learners.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" title="Delete Student">
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
