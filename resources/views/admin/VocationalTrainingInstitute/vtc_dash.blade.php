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

                        {{-- {{ $vtc }} --}}

                        <div class="">
                            <div class="card-hover-shadow profile-responsive card-border border-success mb-3 card">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-success">
                                        <div class="menu-header-content">
                                            <div class="avatar-icon-wrapper btn-hover-shine mb-2 avatar-icon-xl">

                                                {{-- {{ $data-> }} --}}
                                                <div class="avatar-icon rounded">
                                                    <img src="
                                                    https://png.pngtree.com/png-clipart/20190115/ourlarge/pngtree-graduation-school-student-the-university-png-image_352926.jpg
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
                                                                    <table class="mb-0 table table-borderless">
                                                                        <tbody>

                                                                            <tr>
                                                                                <td>Names: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->name }}</b>
                                                                                </td>
                                                                                <td> Reg Number: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->registration_number }}
                                                                                    </b> </td>
                                                                                <td> P.O Box: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->p_o_box }}
                                                                                    </b> </td>
                                                                            </tr>
                                                                        </tbody>

                                                                        <tbody>

                                                                            <tr>
                                                                                {{-- <td><b>Usname:</b> </td> --}}
                                                                                <td> Area In Hec's: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->area_in_hectares }}
                                                                                    </b> </td>
                                                                                <td> Legal Ownership: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->legal_ownership }}
                                                                                    </b> </td>
                                                                                <td> Infrastracture: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->infrastracture }}
                                                                                    </b> </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

</div>
@endsection