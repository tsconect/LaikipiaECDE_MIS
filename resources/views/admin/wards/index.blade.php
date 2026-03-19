@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>WARDS</h5>
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
                            
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wards as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                           
                        </tr>
                        @endforeach

                        </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
