@extends('admin.app')


@section('nav-bar')
    @include('admin.layouts.sidebar')
@endsection

@section('content')
    <div class="card">

        @include('flash-message')


        <div class="card-body">
            <h5 class="card-title">Department Workers</h5>


            <h5 class="card-title text-right">




                <a href="{{ route('admin.generate_dpt_staff_returns') }}"><button class="btn btn-warning ">
                        <i class="fa fa-file"></i> Generate <?php $month = date('F ,Y');
                        echo $month; ?>Department Workers Staff Returns</button></a>

                <a href="{{ route('admin.department_workers.create') }}">

                    <button class="btn btn-warning "> <i class="fa fa-plus"></i>Department Workers.</button></a>
            </h5>


            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name</th>
                                <th>id_number</th>

                                <th>Date Created</th>
                                <th>Date Updated</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->full_names }}</td>
                                    <td>{{ $item->id_number ?? 'n/a' }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a type="button" class="btn btn-outline-primary" title="View Wards"
                                            href="{{ route('admin.wards.all', $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-outline-primary" title="Edit Constituency"
                                            href="{{ url('admin/constituency/edit/' . $item->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Button trigger modal -->

                                        <a class="btn btn-outline-primary" title="Delete Constituency"
                                            href="{{ route('admin.delete-constituency', $item->id) }}">
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
