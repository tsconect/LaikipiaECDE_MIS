@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>ACADEMIC QUALIFICATIONS</h5>
        </div>
    <div class="card ">
      
        <div class="card-body">
            <h5 class="card-title text-right">
                <a href="{{ route('admin.education-histories.create') }}"><button class="btn btn-danger ">
                        <i class="fa fa-plus"></i> New Academic Qualification</button></a>
            </h5>
            <div class=" card-body">
                <div class="table-responsive">
                    <table id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N </th>
                                <th>Created On </th>
                                <th>Institution</th>
                                <th>Award</th>
                                <th>Grade</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Cert No</th>
                            
                                
                           
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->institution_name }}</td>

                                    <td>{{ $item->award }}</td>
                                    <td>{{ $item->grade }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>{{ $item->certificate_no }}</td>


                                    <td>
                                        <a class="btn btn-outline-primary" title="View Education History"
                                            href="{{ route('admin.education-histories.show', $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-outline-primary" title="Edit Education History"
                                            href="{{ route('admin.education-histories.edit', $item->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.education-histories.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this education record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Delete Education Record">
                                                <i class="fa fa-trash"></i>
                                        </a>
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
