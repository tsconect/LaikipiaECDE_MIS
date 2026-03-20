@extends('admin.app')


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

@include('admin.layouts.sidebar')

</div>

@endsection

@section('content')



<div class="card">

@include('flash-message')


<div class="card-body">
            <h5 class="card-title">Vocational Training Institutes.</h5>

            <h5 class="card-title text-right">  <a href="{{route('admin.const.create')}}"><button class="btn btn-warning ">  <i class="fa fa-plus"></i> Vocational Training Institutes.</button></a> </h5>


            <div class=" card-body">
                <div class="table-responsive">
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name</th>

                                <th>Date Created</th>
                                <th>Date Updated</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>

                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                <a type="button" class="btn btn-outline-primary" title="Create Department"
                                        href="{{url('admin/new-vtc_dept/?vtc='.$item->id)}}">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <a type="button" class="btn btn-outline-primary" title="View dpts in {{ $item->name }}"
                                        href="{{route('admin.dpts_within_vtc',$item->id)}}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a type="button" class="btn btn-outline-primary" title="View {{ $item->name }} vtc dash "
                                        href="{{route('admin.vtc_home',$item->id)}}">
                                        <i class="fa fa-home"></i>
                                    </a>


                                    <!-- Button trigger modal -->

                                    <a class="btn btn-outline-primary" title="Delete Constituency"
                                        href="{{route('admin.delete-constituency', $item->id)}}">
                                        <i class="fa fa-trash"></i>
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
