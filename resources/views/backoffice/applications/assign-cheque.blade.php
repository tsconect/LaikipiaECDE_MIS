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
        <h2 class="card-title mb-3">Student Details</h2>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->student->user->first_name}} {{$application->student->user->last_name}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->student->user->email}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
            </div>
            <div class="col-sm-9 text-secondary">
               {{$application->student->user->phone_number}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Gender</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->student->gender}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Date Of Birth</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->student->date_of_birth}}
            </div>
        </div>
        <hr>
    
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">School Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->studnt->school->school_name ?? 'Blank'}}
            </div>
        </div>
        <hr>
        <!-- parental details -->

        

        <!-- parental details -->

        
       
         <!-- parental details -->

        <h2 class="card-title mb-3 mt-3">Fee Details</h2>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Total Fees</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->total_fees ?? 'Blank'}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Fees Paid</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->paid ?? 'Blank'}} 
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Fee Balance</h6>
            </div>
            <div class="col-sm-9 text-secondary">
               {{$application->balance ?? 'Blank'}}
            </div>
        </div>
        <hr>

        @if($application->chiefsReviews)
       

        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Chiefs Remark</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                @if(isset($application->chiefsReviews) && $latestReview = $application->chiefsReviews )
                    @if($latestReview->status == 'recommended')
                        Recommended
                    @elseif($latestReview->status == 'not_recommended')
                        Not Recommended
                    @else
                        Blank
                    @endif
                @else
                    Not Reviewed
                @endif
            </div>

        </div>
        @endif

        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">CDF Committe Verdict</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                @if(isset($application->committeeReviews) && $latestReview = $application->committeeReviews)
                    @if($latestReview->approval == 'declined')
                        Declined
                    @elseif($latestReview->approval == 'approved')
                       Approved
                    @else
                        Not Reviewed
                    @endif
                @else
                    Not Reviewed
                @endif
            </div>

        </div>
        <hr>
       
        <hr>
        @if($application->transactions)

        <h2 class="card-title mb-3 mt-3">Cheque Information</h2>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Cheque Number</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->transactions->first()->cheque->cheque_number}}
            </div>
            
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Amount Assigned</h6>
            </div>
            <div class="col-sm-9 text-secondary">
            {{$application->transactions->first()->amount}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Contact Number</h6>
            </div>
            <div class="col-sm-9 text-secondary">
            {{$application->transactions->first()->cheque->contact_person}}
            </div>
        </div>
        <hr>
       
        <hr>
        @else
        <h4>Assign Cheque</h4>
        
        <p class="text-muted">Fill the following details.</p>

        <form action="{{ route('admin.cheques.assign.student')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="cheque_number">Cheque Number</label>
                <select name="cheque_id" id="cheque_id" class="form-control" required>
                    <option value="">Select Cheque</option>
                    @foreach($cheques as $cheque)
                    <option value="{{$cheque->id}}">{{$cheque->cheque_number}}</option>
                    @endforeach
                    
                </select>
            </div>
            <input type="hidden" name="student_id" value="{{$application->student->id}}"> 
            <input type="hidden" name="application_id" value="{{$application->id}}">

           


            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" required min="0">
            </div>

            

            <input type="hidden" name="application_id" value="{{ $application->id }}" id="application_id" class="form-control" required>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endif


       



    </div>
</div>





  
    @endsection
