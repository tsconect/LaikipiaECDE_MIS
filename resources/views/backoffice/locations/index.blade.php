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
            <h5 class="card-title">Locations</h5>

            <h5 class="card-title text-right">  <a href="{{route('admin.location.create')}}"><button class="btn btn-warning ">  <i class="fa fa-plus"></i> Add New Location</button></a> </h5>


            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>County</th>
                                <th>Sub County</th>
                                <th>Ward </th>
                                <th>Location</th>
                                <th>Chief</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->ward->sub_county->county->name}}</td>

                                <td>{{$item->ward->sub_county->name}}</td>                       
                                <td>{{$item->ward->name}}</td>  
                                <td>{{$item->name}}</td>
                                <td>{{$item->chief->user->first_name?? 'Not Assigned'}} {{$item->chief->user->last_name?? ''}}</td>
                             
                            </tr>



                            @endforeach

                            </tfoot>
                    </table>
                </div>
            </div>
        </div>

</div>




@endsection
