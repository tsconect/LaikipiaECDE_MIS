@extends('admin.app')


@section('nav-bar')
@include('admin.layouts.sidebar')

@endsection

@section('content')
    @include('flash-message')




    <div class="app-main__inner">
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


                                                <div class="avatar-icon rounded">
                                                    <img src="
                                                    https://cdn-icons-png.flaticon.com/512/65/65581.png
                                                    "
                                                        alt="Avatar 6">
                                                </div>
                                            </div>

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
                                                                                <td  > Full Names: &nbsp;&nbsp; <b class="text-success">{{ $data->full_names }}  </b> </td>
                                                                                <td  >  Email: &nbsp;&nbsp; <b class="text-success">{{ $data->email }} </b> </td>
                                                                            </tr>
                                                                        </tbody>

                                                                        <tbody>

                                                                            <tr>
                                                                                {{-- <td><b>Usname:</b> </td> --}}
                                                                                <td  > Phone: &nbsp;&nbsp; <b class="text-success">{{ $data->phone_number }} </b> </td>
                                                                                {{-- <td  >  Email: &nbsp;&nbsp; <b class="text-success">{{ $data->user->email }} </b> </td> --}}
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                            @else
</div>
@endsection