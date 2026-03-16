@extends('backoffice.layouts.app')


@section('nav-bar')
<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src">Laikipia CDF</div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner" style="background-color:#ffffff"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button"
                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
<script>
function goBack() {
    if (document.referrer == "") {
        window.location.href = "/";
    } else {
        window.history.back();
    }
}
</script>

@include('chief.sidebar')


</div>

@endsection

@section('content')



<div class="card">

@include('flash-message')


<div class="card-body">
            <h5 class="card-title">Unreviewed  Applicantions</h5>



            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <!-- <th>Bursary</th> -->
                                <th>Name</th>

                                <th>Date Applied</th>
                                <th>Phone Number</th>
                                <th>Institution</th>
                                <th>Parent</th>
                                <th>Status</th>  
                                <th  class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                @if($item->student->location_id??'null' == Auth::user()->chief->location_id)
                                  
                           
                                
                                <tr>
                                  
                                    <td>{{$item->student->user->first_name??"null"}} {{$item->student->user->last_name??'null'}}</td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>

                                    <td> {{$item->student->user->phone_number}}</td>
                                    <td> {{$item->student->school->school_name}}</td>
                                    <td> {{$item->student->parent->first()->first_name?? "NULL"}} {{$item->student->parent->first()->last_name??"NULL"}} </td>
                                    <td>
                                        @if ($item->status == 'pending')
                                            <span class="badge badge-success">Pending</span>
                                        @elseif ($item->status == 'approved')
                                            <span class="badge badge-danger">Approved</span>
                                        @elseif ($item->status == 'cancelled')
                                            <span class="badge badge-secondary">Cancelled</span>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif  

                                    </td>
                                    
                                
                                    <td class="text-center">
                                        <!-- <a class="btn btn-outline-primary" title="Delete Constituency"
                                            href="{{route('admin.delete-constituency', $item->id)}}">
                                            <i class="fa fa-trash"></i>
                                        </a> -->
                                        <a type="button" class="btn btn-outline-primary" title="View Wards"
                                            href="{{route('chief.application.review',$item->id)}}">
                                            <i class="fa fa-eye mr-1"></i>Review Application
                                        </a>
                                        
                                    </td>
                                </tr>
                                @endif



                            @endforeach

                            </tfoot>
                    </table>
                </div>
            </div>
        </div>

</div>




@endsection
