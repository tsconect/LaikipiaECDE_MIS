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
                                                                    <table class="mb-0 table table-borderless">
                                                                        <tbody>

                                                                            <tr>
                                                                                {{-- <td><b>Usname:</b> </td> --}}
                                                                                <td  > Full Names: <b class="text-success">{{ $data->user->name }} </b> </td>
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
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="main-card mb-3 card">
                            <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate">
                                </i>Contact Teacher Details
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg2-0" role="tabpanel">
                                        <div class="card-body">
                                            <table class="mb-0 table table-borderless">
                                                <tbody>

                                                    <tr>
                                                        {{-- <td><b>Usname:</b> </td> --}}
                                                        <td  > ID NO: &nbsp;&nbsp; <b class="text-success">{{ $data->id_number }} </b> </td>
                                                        <td  >  Gender: &nbsp;&nbsp; <b class="text-success">{{ $data->gender }} </b> </td>
                                                    </tr>
                                                </tbody>

                                                <tbody>

                                                    <tr>
                                                        {{-- <td><b>Usname:</b> </td> --}}
                                                        <td  > DOB: &nbsp;&nbsp; <b class="text-success">{{ $data->dob }} </b> </td>
                                                        <td  >  Next of Kin: &nbsp;&nbsp; <b class="text-success">{{ $data->next_kin_name }} </b> </td>
                                                    </tr>
                                                </tbody>

                                                <tbody>

                                                    <tr>
                                                        {{-- <td><b>Usname:</b> </td> --}}
                                                        <td  > Next of Kin ID No: &nbsp;&nbsp; <b class="text-success">{{ $data->next_kin_id_number }} </b> </td>
                                                        {{-- <td  >  Next of Kin: &nbsp;&nbsp; <b class="text-success">{{ $data->next_kin_name }} </b> </td> --}}
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="d-block text-right card-footer">
                                <a href="javascript:void(0);" class="btn-wide btn btn-success">Save</a>
                            </div> --}}
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title">
                                    <i class="header-icon lnr-graduation-hat icon-gradient bg-love-kiss"> </i>
                                    Teacher Education Details:
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="mb-0 table table-borderless">
                                    <tbody>
                                        {{-- {{ $data->education  }} --}}
                                        <tr>
                                            {{-- <td><b>Usname:</b> </td> --}}
                                            <td  > Education Level: &nbsp;&nbsp; <b class="text-success">{{ $data->education->education_level ?? 'Not Set' }} </b> </td>
                                            @if ($data->education && isset($data->education->union))
                                                <td  >  union: &nbsp;&nbsp; <b class="text-success">{{ $data->education->union}} </b> </td>

                                            @else
                                                <td > union: &nbsp;&nbsp; <span class="text-danger"> Not registered to a union </span> </td>
                                            @endif
                                        </tr>
                                    </tbody>



                                </table>
                            </div>
                            <div class="d-block text-right card-footer">
                                <a href="javascript:void(0);" class="btn-wide btn-shadow btn btn-danger lnt lnr-download" > &nbsp;&nbsp;  Download Teacher Academic Certification.</a>
                            </div>
                        </div>
                        <div class="mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title">
                                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                    Teacher Residents:
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="mb-0 table table-borderless">
                                    <tbody>
                                        {{-- {{ $data->resident  }} --}}
                                        <tr>
                                            {{-- <td><b>Usname:</b> </td> --}}
                                            <td  > Constituency: &nbsp;&nbsp; <b class="text-success">{{ $data->resident?->const?->name ?? 'Not Set' }} </b> </td>
                                            <td  > Ward: &nbsp;&nbsp; <b class="text-success">{{ $data->resident?->ward?->name ?? 'Not Set' }} </b> </td>
                                        </tr>
                                        <tr>
                                            <td  > Sub_location: &nbsp;&nbsp; <b class="text-success">{{ $data->resident?->Sub_location ?? 'Not Set' }} </b> </td>
                                            <td  > village: &nbsp;&nbsp; <b class="text-success">{{ $data->resident?->village ?? 'Not Set' }} </b> </td>
                                        </tr>
                                    </tbody>



                                </table>
                            </div>

                        </div>
                        <div class="mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title">
                                    <i class="header-icon lnr-phone-handset icon-gradient bg-love-kiss"> </i>
                                    Teacher School Contact:
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="mb-0 table table-borderless">
                                    <tbody>
                                        {{-- {{ $data->school_contact  }} --}}
                                        <tr>
                                            {{-- <td><b>Usname:</b> </td> --}}
                                            <td  > name: &nbsp;&nbsp; <b class="text-success">{{ $data->school_contact?->name ?? 'Not Set' }} </b> </td>
                                            <td  > phone: &nbsp;&nbsp; <b class="text-success">{{ $data->school_contact?->phone ?? 'Not Set' }} </b> </td>
                                        </tr>
                                        <tr>
                                            <td  > tsc_number: &nbsp;&nbsp; <b class="text-success">{{ $data->school_contact?->phone ?? 'Not Set' }} </b> </td>
                                            <td  > P.O Box: &nbsp;&nbsp; <b class="text-success">{{ $data->school_contact?->box ?? 'Not Set' }} </b> </td>
                                        </tr>
                                        <tr>
                                            <td  > Category: &nbsp;&nbsp; <b class="text-success">{{ $data->school_contact?->category ?? 'Not Set' }} </b> </td>
                                            <td></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 card">
                            <div class="card-body">
                                <ul class="tabs-animated-shadow tabs-animated nav">
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-c-0" data-toggle="tab"
                                            href="#tab-animated-0" aria-selected="false">
                                            <span>Tab 1</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab"
                                            href="#tab-animated-1" aria-selected="false">
                                            <span>Tab 2</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link active" id="tab-c-2" data-toggle="tab"
                                            href="#tab-animated-2" aria-selected="true">
                                            <span>Tab 3</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab-animated-0" role="tabpanel">
                                        <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever
                                            since the 1500s, when an unknown printer took a galley of type and scrambled it
                                            to make a type specimen
                                            book.
                                            It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane" id="tab-animated-1" role="tabpanel">
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an
                                            unknown
                                            printer took a galley of type and scrambled it to make a type specimen book. It
                                            has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane active" id="tab-animated-2" role="tabpanel">
                                        <p class="mb-0">It was popularised in the 1960s with the release of Letraset
                                            sheets containing Lorem Ipsum passages, and more recently with desktop
                                            publishing software like Aldus
                                            PageMaker including versions of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 card">
                            <div class="card-header card-header-tab-animation">
                                <ul class="nav nav-justified">
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-0"
                                            class="active nav-link">Tab 1</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-1" class="nav-link">Tab
                                            2</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-2" class="nav-link">Tab
                                            3</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg115-0" role="tabpanel">
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing
                                            software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg115-1" role="tabpanel">
                                        <p>Like Aldus PageMaker including versions of Lorem. It has survived not only five
                                            centuries, but also the leap into electronic typesetting, remaining
                                            essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg115-2" role="tabpanel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. It has
                                            survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 card">
                            <div class="card-body">
                                <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-c1-0" data-toggle="tab"
                                            href="#tab-animated1-0" aria-selected="false">
                                            <span class="nav-text">Tab 1</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" id="tab-c1-1" data-toggle="tab"
                                            href="#tab-animated1-1" aria-selected="false">
                                            <span class="nav-text">Tab 2</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link active" id="tab-c1-2" data-toggle="tab"
                                            href="#tab-animated1-2" aria-selected="true">
                                            <span class="nav-text">Tab 3</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab-animated1-0" role="tabpanel">
                                        <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever
                                            since the 1500s, when an unknown printer took a galley of type and scrambled it
                                            to make a type specimen
                                            book.
                                            It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane" id="tab-animated1-1" role="tabpanel">
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an
                                            unknown
                                            printer took a galley of type and scrambled it to make a type specimen book. It
                                            has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane active" id="tab-animated1-2" role="tabpanel">
                                        <p class="mb-0">It was popularised in the 1960s with the release of Letraset
                                            sheets containing Lorem Ipsum passages, and more recently with desktop
                                            publishing software like Aldus
                                            PageMaker including versions of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 card">
                            <div class="card-header-tab card-header-tab-animation card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                    <i class="header-icon lnr-gift icon-gradient bg-love-kiss"> </i>Tabs Alternate
                                    Animation
                                </div>
                                <ul class="nav">
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-0" class="nav-link">Tab
                                            1</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-1" class="nav-link">Tab
                                            2</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-2"
                                            class="nav-link active">Tab 3</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab-eg8-0" role="tabpanel">
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing
                                            software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg8-1" role="tabpanel">
                                        <p>Like Aldus PageMaker including versions of Lorem. It has survived not only five
                                            centuries, but also the leap into electronic typesetting, remaining
                                            essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane active" id="tab-eg8-2" role="tabpanel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. It has
                                            survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block text-center card-footer">
                                <a href="javascript:void(0);" class="btn-wide btn btn-link">Link Button</a>
                                <a href="javascript:void(0);" class="btn-wide btn-shadow btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 card">
                            <div class="tabs-lg-alternate card-header">
                                <ul class="nav nav-justified">
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#tab-eg9-0" class="active nav-link">
                                            <div class="widget-number">Tab 1</div>
                                            <div class="tab-subheading">
                                                <span class="pr-2 opactiy-6">
                                                    <i class="fa fa-comment-dots"></i>
                                                </span>
                                                Totals
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                            <div class="widget-number">Tab 2</div>
                                            <div class="tab-subheading">Products</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#tab-eg9-2" class="nav-link">
                                            <div class="widget-number text-danger">Tab 3</div>
                                            <div class="tab-subheading">
                                                <span class="pr-2 opactiy-6">
                                                    <i class="fa fa-bullhorn"></i>
                                                </span>
                                                Income
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-eg9-0" role="tabpanel">
                                    <div class="card-body">
                                        <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever
                                            since the 1500s, when an unknown printer took a galley of type and scrambled it
                                            to make a type specimen book.
                                            It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg9-1" role="tabpanel">
                                    <div class="card-body">
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown
                                            printer took a galley of type and scrambled it to make a type specimen book. It
                                            has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg9-2" role="tabpanel">
                                    <div class="card-body">
                                        <p class="mb-0">It was popularised in the 1960s with the release of Letraset
                                            sheets containing Lorem Ipsum passages, and more recently with desktop
                                            publishing software like Aldus
                                            PageMaker including versions of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Basic</h5>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-0"
                                            class="active nav-link">Tab 1</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-1" class="nav-link">Tab
                                            2</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-2" class="nav-link">Tab
                                            3</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg10-0" role="tabpanel">
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing
                                            software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg10-1" role="tabpanel">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book. It has survived
                                            not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg10-2" role="tabpanel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. It has
                                            survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Justified Alignment</h5>
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-0"
                                            class="active nav-link">Tab 1</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-1" class="nav-link">Tab
                                            2</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-2" class="nav-link">Tab
                                            3</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg11-0" role="tabpanel">
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing
                                            software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg11-1" role="tabpanel">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book. It has survived
                                            not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg11-2" role="tabpanel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. It has
                                            survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Tabs Variations</h5>
                                <div class="mb-3">
                                    <div role="group" class="btn-group-sm nav btn-group">
                                        <a data-toggle="tab" href="#tab-eg12-0"
                                            class="btn-pill pl-3 active btn btn-warning">Tab 1</a>
                                        <a data-toggle="tab" href="#tab-eg12-1" class="btn btn-warning">Tab 2</a>
                                        <a data-toggle="tab" href="#tab-eg12-2"
                                            class="btn-pill pr-3  btn btn-warning">Tab 3</a>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg12-0" role="tabpanel">
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing
                                            software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg12-1" role="tabpanel">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book. It has survived
                                            not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg12-2" role="tabpanel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. It has
                                            survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Pills</h5>
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg13-0"
                                            class="active nav-link">Pill 1</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg13-1" class="nav-link">Pill
                                            2</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg13-2" class="nav-link">Pill
                                            3</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg13-0" role="tabpanel">
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing
                                            software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg13-1" role="tabpanel">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book. It has survived
                                            not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg13-2" role="tabpanel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. It has
                                            survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Pills</h5>
                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#tab-eg14-0" class="active nav-link">Pill 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#tab-eg14-1" class="nav-link">Pill 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#tab-eg14-2" class="nav-link">Pill 3</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg14-0" role="tabpanel">
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing
                                            software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg14-1" role="tabpanel">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book. It has survived
                                            not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg14-2" role="tabpanel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. It has
                                            survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Button Group Tabs</h5>
                                <div class="mb-3 text-center">
                                    <div role="group" class="btn-group-sm nav btn-group">
                                        <a data-toggle="tab" href="#tab-eg15-0"
                                            class="btn-shadow active btn btn-primary">Tab 1</a>
                                        <a data-toggle="tab" href="#tab-eg15-1" class="btn-shadow  btn btn-primary">Tab
                                            2</a>
                                        <a data-toggle="tab" href="#tab-eg15-2" class="btn-shadow  btn btn-primary">Tab
                                            3</a>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg15-0" role="tabpanel">
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing
                                            software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg15-1" role="tabpanel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. It has
                                            survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                    <div class="tab-pane" id="tab-eg15-2" role="tabpanel">
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. It has not only five centuries, but also the leap into not
                                            only five centuries, but also the leap into
                                            survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
