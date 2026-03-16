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


<div class="container mb-3">
    <div class="row justify-content-center mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Registered Students</div>

                <div class="card-body">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          DOWNLOAD REPORT
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('admin.students.registered_pdf')}}" target="_blank">Download To Pdf</a>
                            <a class="dropdown-item" href="{{ route('admin.reports.approved_excel')}}">Download To Excel</a>
                            <a class="dropdown-item" href="{{ route('admin.reports.approved_excel')}}">Download To Csv</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Institution</th>
                                <th>Parent</th>
                                <th>Location</th>
                                <th>Ward</th>
                                <th>Sub County</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <?php
                            $parent = App\Models\StudentParents::where('application_id', $item->id)->first();
                            $application = App\Models\StudentApplications::where('student_id', $item->id)->first();
                            $location = App\Models\Location::where('id', $item->location)->first();
                            $committed_review = App\Models\CommitteeReview::where('application_id', $item->id)->first();
                            ?>
                            
                            <tr>
                                <td>{{$item->user->first_name??"null"}} {{$item->user->last_name??'null'}}</td>
                                {{-- <!-- <td>{{ $review->created_at->diffForHumans() }}</td> -->

                                <!-- <td> {{$item->student->user->phone_number}}</td> -->
                                --}}
                                <td>  {{$application->schoolDetails->school_name ?? 'Blank'}}</td>
                                <td>{{$item->parent->first_name??'Null'}} {{$item->parent->last_name??'Null'}}</td>
                                <td>{{$location->name??'NULL'}} </td>
                                <td>{{$location->ward->name??'NULL'}}</td>
                                <td> {{$item->sub_county}}</td>
                                
                                
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
