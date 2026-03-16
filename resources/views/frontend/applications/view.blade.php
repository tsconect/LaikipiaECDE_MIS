@extends('frontend.app')
@section('content')

<section class="experience_section layout_padding-top layout_padding2-bottom"  style="background-color: #f5f5f5;">
    
    
    <section class="contact spad mb-4 p-4" >
        <div class="container">
            <div class="row pl-4 align-items-start"> <!-- Remove 'align-items-center' class -->
                <div class="col-md-3 dashboard-menu">
                    <div class="list-group text-center">
                        <a href="{{route ('student.dashboard')}}" class="list-group-item  list-group-item-action mb-2">Dashboard</a>
                        <a href="{{ route('student.applications')}} " class="list-group-item active list-group-item-action mb-2">My Applications</a>
                        <a href=" {{route('student.profile')}}" class="list-group-item list-group-item-action mb-2">Student Profile</a>
                        <a href="{{route('student.account')}} " class="list-group-item list-group-item-action  mb-2">Account Details</a>
                        <a href=" {{route('student.logout')}}" class="list-group-item list-group-item-action mb-2">Log Out</a>
                    </div>
                </div>
                <div class="col-md-9 pl-3">
                    <!-- <p><strong>Hello {{ Auth::user()->first_name ?? 'User'}},</strong>  <br>   </p> -->

                    <h4 class="text-center">Bursary Application</h4>
                    <div class="card-body p-4">
        
                    <!-- parental details -->
                    
                        @if($application->transactions)
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Application Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Funds Disbursed
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Cheque Number</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$application->transactions->cheque->cheque_number}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Amount Assigned</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                {{$application->transactions->amount}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contact Number</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                {{$application->transactions->cheque->contact_person}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Released Date</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                {{$application->transactions->created_at}}
                                </div>
                            </div>
                            <hr>
                        @else
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-uppercase text-sm ">YOUR APPLICATION IS STILL BEING PROCESSED YOU WILL GET SMS FEEDBACK SOON ON THIS NUMBER <strong>{{auth()->user()->phone_number ??"No phone number provided " }}</strong> </p> <a href="{{ route('student.account')}}">Update phone number</a>
                                </div>
                            </div>
                            <hr>
                        @endif
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
           
</section>

@endsection