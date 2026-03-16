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
                <div class="card-header">Rejected Applications</div>

                <div class="card-body">
                    <div class="container mt-3">
                        <form action="{{ route('admin.reports.bursary.rejected')}}" method="GET">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        <select name="ward" class="form-control borderless" id="wardSelect">
                                            <option value="">All Wards</option>
                                            @foreach($wards as $ward)
                                                <option value="{{ $ward }}" {{ $request->ward == $ward ? 'selected' : '' }}>{{ $ward }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col">
                                    <div name="ward" class="form-group">
                                        <select class="form-control borderless" name="educational_level" id="educationLevelSelect">
                                            <option value="">All Educational Level</option>
                                            <option value="secondary" {{ $request->educational_level == 'secondary' ? 'selected' : '' }}>Secondary</option>
                                            <option value="primary" {{ $request->educational_level == 'primary' ? 'selected' : '' }}>Primary</option>
                                            <option value="university" {{ $request->educational_level == 'university' ? 'selected' : '' }}>University</option>
                                            <option value="college" {{ $request->educational_level == 'college' ? 'selected' : '' }}>College</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">SEARCH!</button>
                                    <button type="reset" class="btn btn-danger">RESET!</button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            DOWNLOAD REPORT
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.reports.rejected_pdf', request()->query()) }}" target="_blank">Download To Pdf</a>
                                            <a class="dropdown-item" href="{{ route('admin.reports.rejected_excel', request()->query()) }}">Download To Excel</a>
                                            <a class="dropdown-item" href="{{ route('admin.reports.rejected_excel', request()->query()) }}">Download To Csv</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

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
                                <th>Location</th>
                                <th>Ward</th>
                                <th>Sub County</th>
                                <th>Amount</th> 

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <?php
                            $review = App\Models\ChiefsReview::where('application_id', $item->id)->first();
                            $location = App\Models\Location::where('id', $item->student->location??"null")->first();
                            $committed_review = App\Models\CommitteeReview::where('application_id', $item->id)->first();
                            ?>
                            
                            <tr>
                                
                                <td>{{$item->student->user->first_name??"null"}} {{$item->student->user->last_name??'null'}}</td>
                                {{-- <!-- <td>{{ $review->created_at->diffForHumans() }}</td> -->

                                <!-- <td> {{$item->student->user->phone_number}}</td> -->
                                --}}
                                <td>{{$item->student->id_birth_cert_no??'null'}}</td>
                                <td>  
                                    @if($item->student->gender??'n' == 'male')
                                        Male
                                    @elseif($item->student->gender??'n' == 'female')
                                        Female
                                    @else
                                        Other
                                    @endif
                                </td>
                               
                                <td>  {{$item->student->school->level_of_study ?? 'Blank'}}</td>
                                <td>  {{$item->student->school->school_name ?? 'Blank'}}</td>
                                <td> {{$item->student->school->admission_number ?? 'Blank'}} </td>
                                <td> {{$item->student->school->year_of_study ?? 'Blank'}} </td>
                                <td>{{$location->name??'NULL'}} </td>
                                <td>{{$location->ward->name??'NULL'}}</td>
                                <td> {{$item->student->sub_county??'NULL'}}</td>

                                <td>{{$review->percentage??'N/A'}}</td>
                                <td>{{$committed_review->percentage??'N/A'}}</td>
                                
                                
                                <td> {{$item->transactions->first()->amount??"pending"}}</td>
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
