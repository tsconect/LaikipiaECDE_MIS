@extends('admin.app')


@section('nav-bar')

@include('admin.layouts.sidebar')

@endsection

@section('content')
    @include('flash-message')




    <div class="app-main__inner">
        {{-- <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0"
                    aria-selected="true">
                    <span>Card Tabs</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1"
                    aria-selected="false">
                    <span>Animated Lines</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2"
                    aria-selected="false">
                    <span>Basic</span>
                </a>
            </li>
        </ul> --}}
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-6">

                        {{-- {{ $data }} --}}

                        <div class="">
                            <div class="card-hover-shadow profile-responsive card-border border-success mb-3 card">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-success">
                                        <div class="menu-header-content">
                                            <div class="avatar-icon-wrapper btn-hover-shine mb-2 avatar-icon-xl">

                                                {{-- {{ $data-> }} --}}
                                                <div class="avatar-icon rounded">
                                                    <img src="
                                                    https://cdn-icons-png.flaticon.com/512/65/65581.png
                                                    "
                                                        alt="Avatar 6">
                                                </div>
                                            </div>
                                            {{-- <div>
                                                <h5 class="menu-header-title">{{ $data->user->name }}</h5>
                                                <h5 class="menu-header-title">{{ $data->user->role }}</h5>
                                                <h6 class="menu-header-subtitle">{{ $data->user->email }}</h6>
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>
                                <div class="p-0 card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tab-2-eg1">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                {{-- <div class="widget-content-left">
                                                                    <img class="rounded-circle"
                                                                        src="
                                                                    https://cdn-icons-png.flaticon.com/512/65/65581.png
                                                                    "
                                                                        alt="" width="52">
                                                                </div> --}}
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">
                                                                    <div class="table-card">
            <table class="data-table dt-admin">
                                                                        <tbody>

                                                                            <tr>
                                                                                {{-- <td><b>Usname:</b> </td> --}}
                                                                                <td  > Full Names: &nbsp;&nbsp; <b class="text-success">{{ $data->user->first_name }} {{ $data->user->middle_name }} {{ $data->user->last_name }}  </b> </td>
                                                                                <td  >  Email: &nbsp;&nbsp; <b class="text-success">{{ $data->user->email }} </b> </td>
                                                                            </tr>
                                                                        </tbody>

                                                                        <tbody>

                                                                            <tr>
                                                                                {{-- <td><b>Usname:</b> </td> --}}
                                                                                <td  > Phone: &nbsp;&nbsp; <b class="text-success">{{ $data->phone }} </b> </td>
                                                                                {{-- <td  >  Email: &nbsp;&nbsp; <b class="text-success">{{ $data->user->email }} </b> </td> --}}
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                            @else
</div>
@endsection