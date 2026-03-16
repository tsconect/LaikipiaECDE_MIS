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
    <div class="card-body p-4">
    <h2 class="card-title mb-3">Cheque Details</h2>
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Cheque Number</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->cheque_number}} 
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Amount</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->amount}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Balance</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->balance}}
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Status</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->status}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">School</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->school}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Number Of Students</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->students}}
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <hr>

        <h4>Cheque Transactions</h4>

        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Transaction Type</th>
                    <th>Date </th>
                 
                    <th>School</th>
                     <th>CDF Score(%)</th>
                     <th>Amount </th>
                  
                    <th>Cheque Balance</th>   
                </tr>
            </thead>
            <tbody>
                @foreach($cheque->transactions as $item)
                <tr>
                    <td>{{$item->studentApplication->student->user->first_name??'Null'}} {{$item->studentApplication->student->user->last_name??'Null'}}</td>

                    <td>
                        @if ($item->transaction_type == 'student_assignment')
                         Student Bursary
                        
                        @else
                            <span class="badge badge-warning">Unknown</span>
                        @endif 
                    </td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>{{$item->studentApplication->student->school->school_name??'Null'}}</td>
                    <td>{{$item->studentApplication->committeeReviews->percentage??'Null'}}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{$item->balance}}</td>
  
                </tr>
                @endforeach

                </tfoot>
        </table>


    </div>
</div>




  
    @endsection
