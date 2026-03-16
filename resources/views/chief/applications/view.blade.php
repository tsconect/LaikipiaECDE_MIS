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
    <div class="card-body p-4">
        @if($application->transactions)

        <h2 class="card-title mb-3 mt-3">Cheque Information</h2>


        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Cheque Number</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                    {{$application->transactions->cheque->cheque_number??'N/A'}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Amount Assigned</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                    {{$application->transactions->amount}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Release Date</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                    {{$application->transactions->cheque->release_date}}
                    </div>
                </div>
                <hr>
            </div>
        </div>

        @endif

    

        <h2 class="card-title mb-3">Student Details</h2>
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->user->first_name}} {{$student->user->last_name}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->user->email}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->user->phone_number}}
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->gender}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Date Of Birth</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->date_of_birth}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Location</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->location}}
                    </div>
                </div>
                <hr>
            </div>
        </div>

         <!-- parental details -->
         <h2 class="card-title mb-3 mt-3">Parents/Guardians Details</h2>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->parent->first()->first_name ?? 'Blank'}}  {{$student->parent->first()->last_name ?? ''}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Parental Status</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->parent->first()->parent_status ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Who Pays School Fees</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->parent->first()->who_pays_fees ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Parents/Guardians Occupation</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->parent->first()->occupation ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Phone Number</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->parent->first()->phone ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">ID Number</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->parent->first()->id_number ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Disabled</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->parent->first()->disability_status ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
        </div>


        <!-- parental details -->
        <h2 class="card-title mb-3 mt-3">School Details</h2>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">School Name</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->school->school_name ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Level Of Study</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->school->level_of_study ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">School Category</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->school->school_category ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Admission Number</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->school->admission_number ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Class/ Year Of Study</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->school->year_of_study ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">County</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->school->county ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Physical Address</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->school->physical_address ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Contact Person</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$student->school->contact_person ?? 'Blank'}}
                    </div>
                </div>
                <hr>
            </div>
        </div>


         <!-- parental details -->

        @if($student->attachments)
            <h2 class="card-title mb-3 mt-3">Attachements</h2>
            <div class="row">
            @foreach($student->attachments as $attachment)
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$attachment->name}}</h6> 
                </div>
                <div class="col-sm-9 text-secondary">
                        <a class="text-primary" href="{{ asset('attachments/student-attachments/' . $attachment->filename) }}" target="_blank">
                        
                            {{ $attachment->filename }} 
                            <!-- <i class="material-icons text-secondary mr-2">file_download</i>  -->
                        </a>
                </div>
            @endforeach

            </div>
            <hr>
        @endif

        <h2 class="card-title mb-3 mt-3">Chiefs Review</h2>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->chiefsReviews->chief->user->first_name ?? 'Not Reviewed'}}               
                 {{$application->chiefsReviews->chief->user->last_name ?? ''}} 

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Recommendation</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                @if(isset($application->chiefsReviews) && $latestReview = $application->chiefsReviews)
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
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Recommendation Percentage</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->chiefsReviews->percentage ?? 'Not Reviewed'}} %
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Justification</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->chiefsReviews->remark ?? 'Not Reviewed'}} 
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Phone Number</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{$application->chiefsReviews->chief->user->phone_number ?? 'Not Reviewed'}} 
            </div>
        </div>
        <hr>
      
        <hr>


       



    </div>
</div>





  
    @endsection
