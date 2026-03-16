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

@include('layouts.main_nav')


</div>

@endsection

@section('content')



<div class="card">

@include('flash-message')


<div class="card-body">
            <h5 class="card-title">Released Applications </h5>



            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Bursary</th>
                                <th>Name</th>

                                <!-- <th>Date Reviewed</th> -->
                                <!-- <th>Institution</th> -->
                                <th>Chiefs Score (%)</th>
                                <th>Committee Score (%)</th>
                                <th>Status</th>  
                                <th  class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <?php
                            $review = App\Models\ChiefsReview::where('application_id', $item->id)->first();
                            $committed_review = App\Models\CommitteeReview::where('application_id', $item->id)->first();
                            ?>
                            
                            <tr>
                                <td>{{$item->bursary->name??"null"}}</td>
                                <td>{{$item->student->user->first_name??"null"}} {{$item->student->user->last_name??'null'}}</td>
                               {{-- <!-- <td>{{ $review->created_at->diffForHumans() }}</td> -->

                                <!-- <td> {{$item->student->user->phone_number}}</td> -->
                                --}}
                                <td> {{$review->percentage ?? "Not Reviewed" }}  </td>
                                <td>{{$committed_review ->percentage?? "Not Reviewed"}} </td>
                                <td>
                                    @if ($item->status == 'Cheque released')
                                        <span class="badge badge-success">Cheque Released</span>
                                    @elseif ($item->status == 'approved')
                                        <span class="badge badge-danger">Approved</span>
                                    @elseif ($item->status == 'cancelled')
                                        <span class="badge badge-secondary">Cancelled</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif  

                                </td>
                                
                             
                                <td class="text-center">
                                    <!-- <a class="btn btn-outline-primary" title="Delete Constituency"
                                        href="{{route('admin.delete-constituency', $item->id)}}">
                                        <i class="fa fa-trash"></i>
                                    </a> -->
                                    <a type="button" class="btn btn-outline-primary" title="View Wards"
                                        href="{{route('admin.application.view',$item->id)}}">
                                        <i class="fa fa-eye mr-1"></i>View 
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
